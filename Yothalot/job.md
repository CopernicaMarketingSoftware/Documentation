#Yothalot\Job

The **Job** class is a class that controls the behavior of jobs. You only can create instances of this class via `Yothalot\Connection.create()`.
The member functions are:
- add (adds information to a job)
- file (adds a file to a job)
- server (adds a server to a job)
- modulo (influences the number of reducer processes)
- maxjobs (set number of max concurent jobs)
- maxfiles (sets max number of files per job)
- maxbytes (sets max number of bytes per job)
- start (starts the job)
- detach (detaches the job)
- wait (wait till job is finished)


###Member functions of Job

- **add**
adds data to the job. The data passed overhere will be passed to the input argument in the member function *map* of the MapReduce implementation. Each call to add() will correspond to a call to the MapReduce::map() method. These mapper processes can run in parallel. Usage:
```php
$job->add("some text");
```

- **file**
adds a data to the job with information on which file the info applies. The file name passed overhere will be passed to the input argument in the member function *map* of the MapReduce class. Each call to file() will correspond to a call to the MapReduce::map() method. These mapper processes can run in parallel. The benefit of using file over add when passing file names is that it enables Yothalot to schedule the task to a node where is likely that that the file is locally stored. This reduces the network trafic. Usage:
````php
$job->file("/eg/path/to/file/on/cluster.txt");
```
or
```php
$job->file("some text", "/eg/path/to/file/on/cluster.txt");
```

- **server**
adds a servername to the job. The server name passed overhere will be passed to the input argument in the member function *map* of the MapReduce implementation. Each call to server() will correspond to a call to the MapReduce::map() method. These mapper processes can run in parallel. The benefit of using server over add is that Yothalot tries (but does not garantee) that the job will be scheduled on the named server. Usage:
```php
$job->server("server.name");
```
or
```php
$job->server("some text","server.name");
```

- **detach**
detaches a job from the master object. If the job has already been started, the job still will run but does not wait for an answer anymore. If the job is scheduled to run but has not started, it will be removed from the schedule. Usage:
```php
$job-detach();
```

- **maxjobs**:
Maximum number of parallel processes that run concurrent for the particular job. Usage:
```php
$job->maxjobs(numberOfMaxJobs);
```

- **maxfiles**:
Maximum number of files per concurrent process in the job. Usage:
```php
$job->maxfiles(numberOfMaxFiles);
```

- **maxbytes**:
Maximum amount of bytes in the files per concurrent process in the job. Usage:
```php
$job->maxbytes(numberOfMaxBytes);
```

- **modulo**
provides the option to forse multiple reducer processes per mapper process. Normally each input
file/data is mapped to one intermediate file with key/value pairs. With modulo the input file is
mapped to multiple intermediate files where modulo of the hashed key determines in which file the key/value pair is stored. Using the modulo of the hashed key ensures that the key/value pairs are nicely distributed over the multiple intermediate files. The benefit of using this option is that the reducer step is better paralizeable. The drawback of this option is that it also increases the number of calls to the finalizer.
Usage:
```php
$job->modulo(numberOfIntermediateFiles);
```

- **start** starts the job. On a started job no data, files, or servers can be added. Usage:
```php
$job->start();
```

- **wait**:
Before you can use the results of the map reduce job, you have to be sure that all the job with all its processes have ended. You can achieve this with wait. Usage:
```php
$job-wait();
```

