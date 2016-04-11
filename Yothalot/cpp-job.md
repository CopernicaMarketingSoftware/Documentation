# Yothalot::Job

With the **Yothalot::Job** class you can create, tune and control mapreduce
and racer jobs. A job holds the name of the [mapreduce](cpp-program)
or [racer](cpp-race "Racer") program, the
input data and several performance settings.

The most important member functions of Yothalot::Job are the 
ones with which you add input data to the job, and the method to start the
job. You can also set all sort of tuning parameters to make your job faster,
or to reduce the amount of resources that your job takes.

```cpp
namespace Yothalot{
class Job
{
public:
    // Constructor for a job
    Job(const Yothalot::Connection &connection, const std::string &mapReduceOrRacerProgName);
    
    // adding input data to a job
    void add(const std::string &data);
    void server(const std::string &data, const std::string &server = "");
    void file(const std::string &data, const std::string &file = "");

    // running the job
    void start();
    void detach();
    Yothalot::Result wait();
    
    // tuning the job
    void modulo(size_t modulo);
    void maxfiles(size_t max);
    void maxbytes(size_t max);
    void maxprocesses(size_t max);
    void maxmappers(size_t max);
    void maxreducers(size_t max);
    void maxwriters(size_t max);
};
}
```

## Constructor

The constructor takes two parameters, a [Yothalot::Connection](cpp-connection) 
and the filename of your program that holds the [mapreduce](cpp-program)
or [racer](cpp-race "Racer") algorithm.

```cpp
// create a connection
Yothalot::Connection connection("rabbit1.example.com", "yothalot");

// create a job
Yothalot::Job job(connection, "a.out");
```

## Adding input data

The `add()` method is used to add input data to the job. You must add the input
data before you start the job. All the data that you add to the job will be passed
to the `map()` method in your own mapreduce object.

There is a one-to-one relation between the number of times that you call the 
`add()` method and the number of mapper processes, or process processes in the case
of a Racer, that are started on the cluster: 
every call to the `add()` method automatically results in a mapper process that 
is started, and the value that you pass to this add() function is used as the 
input data for the `map()` method of this mapper process.

Because of this direct relation, it is best practice to only add things like file names to
your job, so that the mapper processes will have plenty of stuff to process, and
that no trivial mapper processes are started.

If you do add a file name to the job, you must of course make sure that this
file is available on every node in the cluster, because you can not know in
advance on which server a job is going to run. If each Yothalot node has
access to your GlusterFS cluster, this is guaranteed.

```cpp
// create a connection
Yothalot::Connection connection("rabbit1.example.com", "yothalot");

// create a job
Yothalot::Job job(connection, "a.out");
// feed the job with input data
job.add("input data");
job.add("more data");
job.add("even more data");
```

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

```cpp
// construct a job
Yothalot::Job job(connection, "a.out");

// add data for which it is not important on which server it runs
job.add("random data");
job.add("more random data");

// add data that can best be processed on "server7"
job.server("server specific data", "server7.example.com");
job.server("more server specific data", "server7.example.com");

// add data that can best be processed on a server that has local
// access to a specific file
job.file("file specific data", "path/to/some/file.txt");

// add data that can best be processed on a server that has local
// access to a specific file, and the data is the file name itself
job.file("path/to/some/file.txt");
```

When the jobs are distributed over the Yothalot nodes, the master Yothalot
server will do its best to assign the server specific jobs to "server7.example.com",
and the file specific job to a server that holds a local copy of the specified
file. This is only a hint, if the desired server is not available, the job will
be assigned to a different server instead.


## Running a job

After you have added all the data to your job you can start the job with 
`start()`. Once a job has been started it is no longer possible to add input 
data to the job, and it is no longer possible to tune the job. If you want
to wait for your job to finish, you can call the `wait()` method. The program
will be blocked on this function, till the entire job is finished.


```cpp
// construct a job
Yothalot::Job job(connection, "a.out");

// add data for which it is not important on which server it runs
job.add("random data");
job.add("more random data");

// start the job
job.start();

// wait for the job to finish
job.wait();

// because the job is now finished, we can use the output data of the job

```

The counter part of the `wait()` method is the `detach()` method. This detaches
the program from the job - while the job continues to run in the background. In practice
it is not necessary to explicitly call `detach()` because active jobs are 
automatically detached when the program ends. The only effect of the `detach()` 
call is that it becomes impossible to call `wait()` later on, because the job
is already detached.

## Getting information from your job

Besides that the `wait()` method blocks your program while it waits for the
job to complete, the method also return a [Yothalot::Result](cpp-result "Result")
object with all kind of information about the performance and behavior of
the job.

## Tuning the job

There are many methods to tune your job's performance. You can for example set the
modulo so that the mapped data is split up into multiple groups that are 
individually reduced and written, or you can limit the number of processes
that are started.

```cpp
namespace Yothalot{

class Job
{
public:
    // functions for performance tuning
    void modulo(size_t modulo);
    void maxfiles(size_t max);
    void maxbytes(size_t max);
    void maxprocesses(size_t max);
    void maxmappers(size_t max);
    void maxreducers(size_t max);
    void maxwriters(size_t max);
};
}
```

All of the above methods accept one parameter: an integer value with the
max setting. You must set these tuning parameters *before* you start the job.
For an explanation of the  meaning of all the tuning parameters, see the special in-depth
[article about tuning mapreduce jobs](tuning).

