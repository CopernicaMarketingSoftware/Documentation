#Yothalot\Job

In the **Yothalot\Job** class you can store all the information of a mapreduce job. It stores the mapreduce algorithm, the information about the data the algorithm is applied to, and several performance settings. You can only create instances of this class via `Yothalot\Connection.create()` [see Connection](copernica-docs:Yothalot/connection "Connection"). This ensures that each job is linked to a valid connection. 

The most important member functions of Yothalot\Job are probably the methods with which you add `data()`, `file()`, and `server()` information to the job and where you `start()` and `wait()` the job. The following member functions are available: 

- add (adds data to a job)
- file (adds a file to a job)
- server (adds a server name to a job)
- start (starts the job)
- detach (detaches the job)
- wait (wait till job is finished)
- maxjobs (set number of max concurent jobs)
- maxfiles (sets max number of files per job)
- maxbytes (sets max number of bytes per job)
- modulo (influences the number of reducer processes)

##Method add()
The Yothalot::Job::add() method is used to add data to the job. The data is passed to the first argument of the member function `map()` in your mapreduce class. You can e.g. add a string that contains the name of the file that holds the data to the job (although there is a better way of doing this as is discussed below). Each call to `add()` corresponds to a call to the `MapReduce::map()` method. These mapper processes can ran in parallel. 
```php
/**
  * Add data to your job
  * This data should be a string
  */
$job->add(data);
```
where `data` is the data you want to add to the job. Note that `data` should be serializable. Another aspect that should be taken into account is that in the current Yothalot implementation all the data that is passed with `add()` is kept in memory. So, do not parse a data file yourself and add each datum from this file with a separate call to `data()`, since this will imply that the entire data file (together with some overhead) is kept in memory.

##Method file()
The Yothalot::Job::file() method is used to add a filename to the job. Although it is possible to add a filename via the `add()` method, using the `file()` method is preferred. Since your files are stored in a cluster, each file is accessible on each node, yet, each node does not hold all files locally. It is in general good practice to run a job on a node where the file is locally stored to reduce the amount of network traffic. If you pass a file name via the `add()` method, Yothalot is unaware that the string that you are adding is actually a file name. Therefore, Yothalot cannot schedule the job to a node that has local access to this file. If you use `file()` instead, Yothatlot is aware that the string is a file name and tries to schedule the process on an appropriate node. Besides that Yothalot becomes aware that the string that is passed is a filename `file()` behaves just like `add()`. Each call to `file()` corresponds to a call to the `MapReduce::map()` method. Also in this case these mapper processes can run in parallel.

```php
/**
 * Add a file name to your job.
 * This file name should be a string.
 */
$job->file("file");
```
where `"file"` is a string with the complete absolute path to the location of the file (you may want to have a look at [Files and paths](LINK) for more information on paths).

It may be that you want to add data to your job together with a hint to Yothalot that the process with that data should be scheduled on a node that has locally stored a certain file. This is possible with an overloaded version of `file()`.
```php
/**
 * Add data and a file name to your job.
 * This file name should be a string.
 */
$job->file(data, "file");
```
where `data` is serializable and holds the data you want to pass and `"file"` is the absolute path to file that Yothalot uses as a hint to schedule the process with.

##Method server()
Like `file()` adds a filename to the job, `server()` adds a server name to the job. It may be that you want to run a job on a specific server, e.g. because it hosts a database that you want to use. In order to make Yothalot aware that the name you pass is a server name you use `server()`. Yothalot tries to schedule the process of the job that uses this server name on the server with the particular name (note that there is no guarantee that the process is scheduled on the named server). Besides the extra hint to Yothatalot that the string that is passed is a server name, `server()` behaves just like `add()` and `file()`. Each call to `server()` corresponds to a call to the `MapReduce::map()` method. Also in this case these mapper processes can run in parallel.
```php
/**
 * Add a server name to your job
 * This server name should be a string
 */

$job->server("server.name");
where `"server.name"` is the name of the sever.
```
It is likely that you want to add some data to your job with a hint to Yothalot that the process with that particular data should be scheduled on a server with a particular name. This is possible with the overloaded version of `data()` that takes two input arguments. 
```php
/**
 * Add data and a server name to your job.
 * This server name should be a string.
 */
$job->server(data,"server.name");
```

##Method start()
After you have added all the data to your job you can start the job with `start()`. Once a job has been started it is no longer possible to add data, files, or servers to the job.
```php
/**
 * start a job
 */
$job->start();
```

##Method wait()
Before you can use the results of the map reduce job, you have to be sure that the job with all its processes has ended. Therefore, before you use results of the map reduce job you have to call `wait()`. Note that in the current implementation a job that waits is still counted as a running job. So, if you have a mapreduce procedure that calls other mapreduce procedures that at a certain point in time all wait you may run out of resources.
```php
/**
 * wait till the job has ended before you can use its returned results
 */
$job-wait();
```

##Method detach()
The method Yothalot::Job::detach method detaches a job from the master object. If the job has already been started, the job still will run but does not wait for an answer anymore. In practice using `detach()` is the same as not calling `wait()`. The main difference is that if `detach()` is called you cannot call `wait()` anymore.

```php
/**
 * Detach the job from the master and ignore its results
 */ 
$job-detach();
```

##Method maxprocesses()
The maximum number of processes that may concurrently run for a particular job can be set with `maxprocesses()`. This is an optimization setting with which you can fine tune the behavior of the mapreduce job. In general, if you set it to low you will waste valuable resources, if you set it to high processes will compete with each other which will create a lot of extra overhead. You can also use this option to distribute resources over several jobs that are run simultaneously on the same cluster. You probably do not want to set it higher than the maximum number of CPUs in your cluster.   
```php
/**
 * Set the maximum number of processes of a job that may run concurrently 
 */
$job->maxprocesses(numberOfMaxJobs);
```

##Method maxfiles()
The maximum number of files per concurrent process in the job can be set with `maxfiles()`. Just like the `maxprocesses()` member, `maxfiles()` is an optimization setting. It sets the maximum number of files that one concurrent process may process. If it is set to low you may need extra processes to process all the files, which increases the overhead of creating extra processes. If you set it to high you do less work in parallel. The best number of course depends on the algorithm but also on the file sizes. So, it interacts with `maxbytes()` (see below).
```php
/**
 * Set the maximum number of files that a process may consume
 */
$job->maxfiles(numberOfMaxFiles);
```

##Member maxbytes()
The member `maxbytes()` sets the maximum bytes that one process in the job may use. Just like with `files()` there is a trade-off between the overhead of creating extra processes and the possibility to perform more work in parallel. If it is set to low, 
```php
/**
 * Set the number of bytes that a process maximally may process
 */
$job->maxbytes(numberOfMaxBytes);
```

##Member modulo()
With the member `modulo()` you can just like with the `max*` members tweak the performance of the algorithm. The setting provides the option to force multiple reducer processes per mapper process. Normally each input file/data is mapped to one intermediate file with key/value pairs. With modulo the input file is mapped to multiple intermediate files where modulo of the hashed key determines in which file the key/value pair is stored. Using the modulo of the hashed key ensures that the key/value pairs are nicely distributed over the multiple intermediate files. The benefit of using this option is that the reducer step is better paralizeable. The drawback of this option is that it also increases the number of calls to the finalizer.
Usage:
```php
/**
 * Setting the number of possible reducer processes per map process
 */
$job->modulo(numberOfIntermediateFiles);
```


