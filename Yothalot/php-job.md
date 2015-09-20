# Yothalot\Job

With the **Yothalot\Job** class you can create, tune and control mapreduce 
jobs. A job holds the mapreduce algorithm, the input data and several
performance settings.

The most important member functions of Yothalot\Job are the
ones with which you add input data to the job, and the method to start the
job. You can also set all sort of tuning parameters to make your job faster,
or to reduce the amount of resources that your job takes.

```php
class Yothalot\Job
{
    // constructor
    public function __construct(Yothalot\Connection $connection, Yothalot\MapReduce $algorithm);
    
    // adding input data to a job
    public function add($data);
    public function server($data, $server = null);
    public function file($data, $file = null);

    // running the job
    public function start();
    public function detach();
    public function wait();
    
    // tuning the job
    public function modulo($modulo);
    public function maxfiles($max);
    public function maxbytes($max);
    public function maxprocesses($max);
    public function maxmappers($max);
    public function maxreducers($max);
    public function maxwriters($max);
    
}
```

## Constructor

The constructor takes two parameters, a [Yothalot\Connection](copernica-docs:Yothalot/php-connection) 
and an instance of your own object in which your mapreduce algorithm is implemented.

For more information on how to create your own mapreduce objects, see our 
[hello world!](copernica-docs:Yothalot/helloworld "Hello world!") example.

```php
// create a connection
$connection = new Yothalot\Connection(array(
    "host"  =>  "rabbit1.example.com",
    "vhost" =>  "yothalot"
));

// create a job
$job = new Yothalot\Job($connection, new MyMapReduceAlgorithm());

// feed the job with input data
$job->add("input data");
$job->add("more data");
$job->add("even more data");

// start the job
$job->start();
```

## Adding input data

The `add()` method is used to add input data to the job. You must add the input
data before you start the job. All the data that you add to the job will be passed
to the `map()` method in your own mapreduce object.

There is a one-to-one relation between the number of times that you call the 
`add()` method and the number of mapper processes that are started on the cluster: 
every call to the `add()` method automatically results in a mapper process that 
is started, and the value that you pass to this add() function is used as the 
input data for the `map()` method of this mapper process.

Because this direct relation, it is best to only add things like file names to
your job, so that the mapper processes will have plenty of stuff to process, and
that no trivial mapper processes are started.

If you do add a file name to the job, you must of course make sure that this
file is available on every node in the cluster, because you can not know in
advance on which server a job is going to run.


## Controlling the server

Every call to the `add()` method results in a mapper process that is started
somewhere on the Yothalot cluster. This is done randomly: the first available
node receives the job. However, if you want to control on which server the
mapper is going to run, you can use the `server()` or `file()` methods to pass
a hint to the Yothalot framework about the server that can best be used to run 
the job.

The `server()` and `file()` methods do *exactly the same* as the `add()` method, 
with one exception: they accept a second parameter that you can use to give a 
hint on which server to run the job:

```php
// construct a job
$job = new Yothalot\Job($connection, new MyMapReduceAlgorithm());

// add data for which it is not important on which server it runs
$job->add("random data");
$job->add("more random data");

// add data that can best be processed on "server7"
$job->server("server specific data", "server7.example.com");
$job->server("more server data", "server7.example.com");

// add data that can best be processed on a server that has local
// access to a specific file
$job->file("file specific data", "path/to/some/file.txt");

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

If you want to wait for your job to finish, you can call the `wait()` method.
This will block your PHP script until the mapreduce job is finished. This could
take some time, so you better only call this `wait()` method if it is not much
of a problem that your PHP scripts gets in a blocked state.

```php
// construct a job
$job = new Yothalot\Job($connection, new MyMapReduceAlgorithm());

// add data for which it is not important on which server it runs
$job->add("random data");
$job->add("more random data");

// start the job
$job->start();

// wait for the job to finish
$job->wait();

// because the job is now finished, we can use the output data of the job
$output = file_get_contents("path/to/output/file.txt");
```

The counter part of the `wait()` method is the `detach()` method. This detaches
the script from the job - while the job continues to run in the background. In practice
it is not necessary to explicitly call `detach()` because active jobs are 
automatically detached when the PHP script ends. The only effect of the `detach()` 
call is that it becomes impossible to call `wait()` later on, because the job
is already detached.


## Tuning the job

There are many methods to tune your job performance. You can for example set the
modulo so that the mapped data is split up into multiple groups that are 
individually reduced and written, or you can limit the number of processes
that are started.

```php
class Yothalot\Job
{
    // functions for performance tuning
    public function modulo($modulo);
    public function maxfiles($max);
    public function maxbytes($max);
    public function maxprocesses($max);
    public function maxmappers($max);
    public function maxreducers($max);
    public function maxwriters($max);
}
```

All of the above methods accept one parameter: an integer value with the
max setting. You must set these tuning parameters *before* you start the job.
For an explanation of the  meaning of all the tuning parameters, see the special in-depth
[article about tuning mapreduce jobs](copernica-docs:Yothalot/tuning).

