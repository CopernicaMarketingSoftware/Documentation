# PHP API

After the installation of the [PHP API](copernica-docs:Yothalot/php-install "PHP Extension Installation")
you can use the simplest and most popular map/reduce API that Yothalot offers.
You can use this API to write mapreduce jobs and send them to the Yothalot cluster.
With this API you can also write jobs that process a lot of data without
reducing it, so called race jobs, and send these to the Yothalot cluster.


## Installation

If you want to use the PHP API you have to install besides Yothalot the Yothalot
PHP extension.

* [How to install Yothalot](copernica-docs:Yothalot/installation "Installation")
* [How to install the Yothalot PHP extension](copernica-docs:Yothalot/php-install "PHP Extension Installation")


## Core classes and interfaces

To run a Yothalot mapreduce task you first have to write a class that implements
the [Yothalot\MapReduce](copernica-docs:Yothalot/php-mapreduce "MapReduce")
interface. In this class you write your mapreduce algorithm. Besides implementing
the mapreduce interface you have to set up a connection to Yothalot with the
[Yothalot\Connection](copernica-docs:Yothalot/php-connection "Connection")
class. In the connection you provide the credentials to set connect to Yothalot.
With your mapreduce implementation and the connection you can create a
[Yothalot\Job](copernica-docs:Yothalot/php-job). If you have this job you
can run the job after having added the data on which the job should run.
Optionally you can set some performance settings. That is it. You can wait
for the job to be processed and retrieve some [results](copernica-docs:Yothalot/php-result "Result")
about the behavior of the job, or you can detach your script and let
Yothalot do its work while you do other work. If you want to process a lot
of data and are not interested in the reduce step of the mapreduce algorithm
you can implement a class using the [Yothalot\Race](copernica-docs:Yothalot/php-race)
interface instead of the [Yothalot\MapReduce](copernica-docs:Yothalot/php-mapreduce "MapReduce")
interface, with which you create a race job. The implementation of a race job is
besides implementing a different interface similar to implementing a mapreduce job.
A race job also returns result if you call the option wait. The class in 
which the result are returned is the [Yothalot\RaceResult](copernica-docs:Yothalot/php-raceresult "RaceResult")
class.

* [Interface Yothalot\MapReduce](copernica-docs:Yothalot/php-mapreduce)
* [Interface Yothalot\Race](copernica-docs:Yothalot/php-race)
* [Class Yothalot\Connection](copernica-docs:Yothalot/php-connection "Connection")
* [Class Yothalot\Job](copernica-docs:Yothalot/php-job "Job")
* [Class Yothalot\Result](copernica-docs:Yothalot/php-result "Result")
* [Class Yothalot\RaceResult](copernica-docs:Yothalot/php-raceresult "RaceResult")

## Utility classes

The classes and interface mentioned above are sufficient for writing and running
mapreduce jobs. As an extra service however, the Yothalot API also comes 
with a couple of extra utility classes.

The [Yothalot\Path](copernica-docs:Yothalot/php-path "Path") class can be used
for converting absolute pathnames into pathnames that are relative to the
GlusterFS mount point, and the other way around. This is especial useful if
you use different mount points on different servers.

The [Yothalot\Input](copernica-docs:Yothalot/php-input "Input") and
[Yothalot\Output](copernica-docs:Yothalot/php-output "Output") classes allow you
to read and write files in the same [format](copernica-docs:Yothalot/internalfiles "Internal File Format")
used internally by the Yothalot framework for intermediate result files.

* [Class Yothalot\Path](copernica-docs:Yothalot/php-path "Path")
* [Class Yothalot\Input](copernica-docs:Yothalot/php-input "Input")
* [Class Yothalot\Output](copernica-docs:Yothalot/php-output "Output")


## Overview of all interfaces and classes

* [Interface Yothalot\MapReduce](copernica-docs:Yothalot/php-mapreduce)
* [Interface Yothalot\Race](copernica-docs:Yothalot/php-race)
* [Class Yothalot\Connection](copernica-docs:Yothalot/php-connection "Connection")
* [Class Yothalot\Input](copernica-docs:Yothalot/php-input "Input")
* [Class Yothalot\Job](copernica-docs:Yothalot/php-job "Job")
* [Class Yothalot\Output](copernica-docs:Yothalot/php-output "Output")
* [Class Yothalot\Path](copernica-docs:Yothalot/php-path "Path")
* [Class Yothalot\RaceResult](copernica-docs:Yothalot/php-raceresult "RaceResult")
* [Class Yothalot\Record](copernica-docs:Yothalot/record "Record")
* [Class Yothalot\Result](copernica-docs:Yothalot/php-result "Result")
