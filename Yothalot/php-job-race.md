# Yothalot\Job with Race classes

The **Yothalot\Job** class that holds a Race class can almost be used the same as
a [job that holds a MapReduce class](copernica-docs:Yothalot/php-job "Job"),
except for some small differences. Most tuning settings do not make sense 
for a Race job (e.g. the max number of reducers). Also, a Yothalot\Job that
holds a Race class returns the result of the process method in wait().

Since most of the tuning settings of a MapReuduce job do not make sense 
for a Race job the interface of a Yothalot\Job class that uses a Yothalot\Race
class is somewhat smaller.

```php
class Yothalot\Job
{
    // constructor
    public function __construct(Yothalot\Connection $connection, Yothalot\Race $algorithm);
    
    // adding input data to a job
    public function add($data);
    public function server($data, $server = null);
    public function file($data, $file = null);

    // running the job
    public function start();
    public function detach();
    public function wait();
    
    // setting resources
    public function maxprocesses($max);
}
```

## Constructor

The constructor takes two parameters, a [Yothalot\Connection](copernica-docs:Yothalot/php-connection) 
and an instance of your own Race object in which your process algorithm
is implemented.

```php
// create a connection
$connection = new Yothalot\Connection(array(
    "host"  =>  "rabbit1.example.com",
    "vhost" =>  "yothalot"
));

// create a job
$job = new Yothalot\Job($connection, new MyRaceAlgorithm());

// feed the job with input data
$job->add("input data");
$job->add("more data");
$job->add("even more data");

// wait for the jobx
$x = $job->start();
```

## Adding input data

The `add()` method is used to add input data to the job. You must add the input
data before you start the job. All the data that you add to the job will be passed
to the `process()` method in your own race object.

Just like with Mapreduce jobs, there is a one-to-one relation between the
number of times that you call the `add()` method and the number of race 
processes that are started on the cluster. Every call to the `add()` method
automatically results in a race process that is started, and the value
that you pass to this add() function is used as the input data for the
`process()` method of this race process. This implies that just like with the
mapreduce jobs you have to make sure that a race process has enough work
to do with the data you pass. However, this restriction is less strict then
in the mapreduce case since when one result is returned all other processes
are stopped as well.

If you do add a file name to the job, you must of course make sure that this
file is available on every node in the cluster, because you can not know in
advance on which server a job is going to run. If each Yothalot node has
access to your GlusterFS cluster, this is guaranteed.


## Controlling the server

Just like with a mapreduce job, every call to the `add()` method results
in a process that is started somewhere on the Yothalot cluster. This is
done randomly: the first available node receives the job. However, if you
want to control on which server the process is going to run, you can use
the `server()` or `file()` methods to pass a hint to the Yothalot framework
about the server that can best be used to run the job.

The `server()` and `file()` methods do *exactly the same* as the `add()` method, 
with one exception: they accept a second parameter that you can use to give a 
hint on which server to run the job:

```php
// construct a job
$job = new Yothalot\Job($connection, new MyRaceAlgorithm());

// add data for which it is not important on which server it runs
$job->add("random data");
$job->add("more random data");

// add data that can best be processed on "server7"
$job->server("server specific data", "server7.example.com");
$job->server("more server data", "server7.example.com");

// add data that can best be processed on a server that has local
// access to a specific file
$job->file("file specific data", "path/to/some/file.txt");

// add data that can best be processed on a server that has local
// access to a specific file, and the data is the file name itself
$job->file("path/to/some/file.txt");

// start the job
$job->start();
```

When the jobs are distributed over the Yothalot nodes, the master Yothalot
server will do its best to assign the server specific jobs to "server7.example.com",
and the file specific job to a server that holds a local copy of the specified
file. This is only a hint, if the desired server is not available, the job will
be assigned to a different server instead.

Note that the input data should be serializable because it is transferred to
other servers.


## Running a job

After you have added all the data to your job you can start the job with 
`start()`. Once a job has been started it is no longer possible to add input 
data to the job, and it is no longer possible to tune the job.

If you want to wait for the first non zero result, you can call the `wait()`
method. This method will return the first non zero value that is returned from the
`process()` method of your Race class after which the entire job stops. You
will get a zero value if all data you have passed to the job have been processed
and `process()` always returned a zero.

Note that calling `wait()` will block your PHP script until a non zero value
is returned or when all data is processed. This could take some time, so
you better only call the `wait()` method if it is not much of a problem
that your PHP scripts gets in a blocked state.

```php
// construct a job
$job = new Yothalot\Job($connection, new MyRaceAlgorithm());

// add data for which it is not important on which server it runs
$job->add("random data");
$job->add("more random data");

// start the job
$job->start();

// wait for the job to finish and get a result
$x = $job->wait();

// $x is the first non zero result that was returned
// or zero if all data have been processed and there
// where no non zero retuns
echo($x);
```

The counter part of the `wait()` method is the `detach()` method. This detaches
the script from the job - while the job continues to run in the background. In practice
it is not necessary to explicitly call `detach()` because active jobs are 
automatically detached when the PHP script ends. The only effect of the `detach()` 
call is that it becomes impossible to call `wait()` later on, because the job
is already detached.


## Tuning the job

There is one method to tune your job's performance, or actually in the
case of a race job, set the resources that that job may use. 

```php
class Yothalot\Job
{
    // functions for resource tuning
    public function maxprocesses($max);

}
```
The above method accepts one parameter: an integer value. If you want to
limit the resources that the race job may use you have to set it before
you call start.
