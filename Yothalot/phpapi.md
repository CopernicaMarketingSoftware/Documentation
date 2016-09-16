# PHP API

After the installation of the [PHP API](php-install "PHP Extension Installation")
you can use the simplest and most popular map/reduce API that Yothalot offers.
You can use this API to write mapreduce jobs and send them to the Yothalot cluster.
With this API you can also write jobs that process a lot of data without
reducing it, so called race jobs, and send these to the Yothalot cluster.


## Installation

If you want to use the PHP API you have to install besides Yothalot the Yothalot
PHP extension.

* [How to install Yothalot](installation "Installation")
* [How to install the Yothalot PHP extension](php-install "PHP Extension Installation")


## Core classes and interfaces

To run a Yothalot mapreduce task you first have to write a class that implements
the [Yothalot\MapReduce](php-mapreduce "MapReduce")
interface. In this class you write your mapreduce algorithm. Besides implementing
the mapreduce interface you have to set up a connection to Yothalot with the
[Yothalot\Connection](php-connection "Connection")
class. In the connection you provide the credentials to set connect to Yothalot.
With your mapreduce implementation and the connection you can create a
[Yothalot\Job](php-job "Job"). If you have this job you
can run the job after having added the data on which the job should run.
Optionally you can set some performance settings. That is it. You can wait
for the job to be processed and retrieve some [results](php-result "Result")
about the behavior of the job, or you can detach your script and let
Yothalot do its work while you do other work. If you want to process a lot
of data and are not interested in the reduce step of the mapreduce algorithm
you can implement a class using the [Yothalot\Race](php-race "Race")
interface instead of the [Yothalot\MapReduce](php-mapreduce "MapReduce")
interface, with which you create a race job. The implementation of a race job is
besides implementing a different interface similar to implementing a mapreduce job.
Besides that it is also possible to run a single task on the Yothalot cluster. You
do this by implementing the [Yothalot\Task](php-task "Task") interface.

* [Interface Yothalot\MapReduce](php-mapreduce "MapReduce")
* [Interface Yothalot\Race](php-race "Race")
* [Interface Yothalot\Task](php-task "Task")
* [Class Yothalot\Connection](php-connection "Connection")
* [Class Yothalot\Job](php-job "Job")
* [Class Yothalot\Pool](php-pool "Pool")
* [Class Yothalot\Result](php-result "Result")
* [Class Yothalot\RaceResult](php-raceresult "RaceResult")
* [Class Yothalot\TaskResult](php-taskresult "TaskResult")

## Utility classes

The classes and interface mentioned above are sufficient for writing and running
mapreduce jobs. As an extra service however, the Yothalot API also comes 
with a couple of extra utility classes.

The [Yothalot\Path](php-path "Path") class can be used
for converting absolute pathnames into pathnames that are relative to the
GlusterFS mount point, and the other way around. This is especially useful if
you use different mount points on different servers.

The [Yothalot\Input](php-input "Input") and
[Yothalot\Output](php-output "Output") classes allow you
to read and write files in the same [format](internalfiles "Internal File Format")
used internally by the Yothalot framework for intermediate result files.

* [Class Yothalot\Path](php-path "Path")
* [Class Yothalot\Input](php-input "Input")
* [Class Yothalot\Output](php-output "Output")


## Overview of all interfaces and classes

* [Interface Yothalot\MapReduce](php-mapreduce "MapReduce")
* [Interface Yothalot\Race](php-race "Race")
* [Interface Yothalot\Task](php-task "Task")
* [Class Yothalot\Connection](php-connection "Connection")
* [Class Yothalot\Input](php-input "Input")
* [Class Yothalot\Job](php-job "Job")
* [Class Yothalot\Pool](php-pool "Pool")
* [Class Yothalot\Output](php-output "Output")
* [Class Yothalot\Path](php-path "Path")
* [Class Yothalot\RaceResult](php-raceresult "RaceResult")
* [Class Yothalot\TaskResult](php-taskresult "TaskResult")
* [Class Yothalot\Record](record "Record")
* [Class Yothalot\Reducer](php-reducer "Reducer")
* [Class Yothalot\Result](php-result "Result")
* [Class Yothalot\Values](php-values "Values")
* [Class Yothalot\Writer](php-writer "Writer")
