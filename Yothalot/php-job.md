# Yothalot\Job

With the **Yothalot\Job** class you can create, tune and control mapreduce 
jobs. A job holds the mapreduce algorithm, the input data and several
performance settings.

The most important member functions of Yothalot\Job are probably the
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

The constructor takes two parameters, a Yothalot\Connection and an instance of
your own object in which your mapreduce algorithm is implemented.

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

The `add()` method is used to add input data to the job. There is a very direct
one-to-one relation between the number of times that you call this `add()` method
and the number of mapper processes that are started on the cluster: every call
to the `add()` method automatically results in a mapper process that is started, 
and the variable that you pass to this add() function is used as the input data 
for the `map()` function of this mapper process.

Because this direct relation, it is best to only add things like file names to
your job, so that the mapper process will have plenty of stuff to process, and
that no trivial mapper processes are started.

If you do add a file name to the job, you must of course make sure that this
file is available on every node in the cluster, because you can not know in
advance on which server the job is going to run.


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

The counter part of the `wait()` method is the `detach()` method. This detaches
the job from your script. In practice it is not necessary to explicitly call 
`detach()` after you've called `start()`, because running jobs are automatically 
detached when the PHP script ends. The only effect of the `detach()` call is
that it becomes impossible to call `wait()` later on.


## Tuning the job





##Method maxprocesses()
The maximum number of processes that may concurrently run for a particular
job can be set with `maxprocesses()`. This is an optimization setting
with which you can fine tune the behavior of the mapreduce job. In
general, if you set it to low you will waste valuable resources, if you
set it to high processes will compete with each other which will create
a lot of extra overhead. You can also use this option to distribute
resources over several jobs that are run simultaneously on the same
cluster. You probably do not want to set it higher than the maximum
number of CPUs in your cluster.   
```php
/**
 * Set the maximum number of processes of a job that may run concurrently 
 */
$job->maxprocesses(numberOfMaxJobs);
```

##Method maxfiles()
The maximum number of files per concurrent process in the job can be set with
`maxfiles()`. Just like the `maxprocesses()` member, `maxfiles()` is an
optimization setting. It sets the maximum number of files that one concurrent
process may process. If it is set to low you may need extra processes to process
all the files, which increases the overhead of creating extra processes.
If you set it to high you do less work in parallel. The best number of
course depends on the algorithm but also on the file sizes. So, it
interacts with `maxbytes()` (see below).
```php
/**
 * Set the maximum number of files that a process may consume
 */
$job->maxfiles(numberOfMaxFiles);
```

##Member maxbytes()
The member `maxbytes()` sets the maximum bytes that one process in
the job may use. Just like with `files()` there is a trade-off between
the overhead of creating extra processes and the possibility to perform
more work in parallel. If it is set to low, 
```php
/**
 * Set the number of bytes that a process maximally may process
 */
$job->maxbytes(numberOfMaxBytes);
```

##Member modulo()
With the member `modulo()` you can just like with the `max*` members
tweak the performance of the algorithm. The setting provides the
option to force multiple reducer processes per mapper process. Normally
each input file/data is mapped to one intermediate file with key/value
pairs. With modulo the input file is mapped to multiple intermediate
files where modulo of the hashed key determines in which file the
key/value pair is stored. Using the modulo of the hashed key ensures
that the key/value pairs are nicely distributed over the multiple
intermediate files. The benefit of using this option is that the reducer
step is better paralizeable. The drawback of this option is that it
also increases the number of calls to the finalizer.
Usage:
```php
/**
 * Setting the number of possible reducer processes per map process
 */
$job->modulo(numberOfIntermediateFiles);
```
