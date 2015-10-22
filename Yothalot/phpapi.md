# PHP API

The PHP API is the simplest and most popular map/reduce API that Yothalot offers.
You can use this API to write mapreduce jobs, and to send them to the Yothalot cluster.

The API consists of interfaces and classes to communicate with the cluster. 
Writing a mapreduce job using the PHP API comes down to write a class that implements 
the [Yothalot\MapReduce](copernica-docs:Yothalot/php-mapreduce "MapReduce")
interface, and then to create a connection to the Yothalot cluster using the 
[Yothalot\Connection](copernica-docs:Yothalot/php-connection "Connection") class.

If you have both a connection and mapreduce object, you can then create a 
[Yothalot\Job](copernica-docs:Yothalot/php-job "Job") that you feed with
input and tuning parameters.


## Installation

If you want to use the PHP API you have to install Yothalot and the Yothalot
PHP extension.

* [How to install Yothalot](copernica-docs:Yothalot/installation "Installation")
* [How to install the Yothalot PHP extension](copernica-docs:Yothalot/php-install "PHP Extension Installation")


## The Yothalot\MapReduce interface

To write a mapreduce job, you have to create a class that implements
the [Yothalot\MapReduce](copernica-docs:Yothalot/php-mapreduce) interface.

* [Interface Yothalot\MapReduce "MapReduce"](copernica-docs:Yothalot/php-mapreduce "MapReduce")


## The Yothalot\Race interface

If you want to process a lot of data simultaneously but do not want to use
a reduce step, you can create a class that implements the
[Yothalot\Race](copernica-docs:Yothalot/php-race "Race") interface.

* [Interface Yothalot\Race](copernica-docs:Yothalot/php-race "Race")


## Jobs and connections

Once you've written your own mapreduce or race algorithm, you can turn it into a job,
and send it to the Yothalot cluster. 
Firt you create a Yothalot\Connection:

* [Class Yothalot\Connection](copernica-docs:Yothalot/php-connection "Connection")

Then you create a job using this connection and your mapreduce or race class:

* [Class Yothalot\Job with Yothalot\MapReduce Objects](copernica-docs:Yothalot/php-job "Job with mapreduce objects")
* [Class Yothalot\Job with Yothalot\Race Objects](copernica-docs:Yothalot/php-job-race "Job with race objects")


## Information about the job

Once you have run your mapreduce job you may be interested in the behavior
of the job. The information is given in a couple of classes the main class
is:

* [Class Yothalot\Result](copernica-docs:Yothalot/php-result "Result")


## Utility classes

The classes and interface mentioned above are sufficient for writing and running
mapreduce jobs. As an extra service however, the Yothalot API also allows comes 
with a couple of extra utility classes.

* [Class Yothalot\Path](copernica-docs:Yothalot/php-path "Path")
* [Class Yothalot\Input](copernica-docs:Yothalot/php-input "Input")
* [Class Yothalot\Output](copernica-docs:Yothalot/php-output "Output")

The [Yothalot\Path](copernica-docs:Yothalot/php-path "Path") class can be used
for converting absolute pathnames into pathnames that are relative to the
GlusterFS mount point, and the other way around. This is especial useful if
you use different mount points on different servers.

The [Yothalot\Input](copernica-docs:Yothalot/php-input "Input") and 
[Yothalot\Output](copernica-docs:Yothalot/php-output "Output") classes allow you
to read and write files in the same [format](copernica-docs:Yothalot/internalfiles "Internal File Format")
used internally by the Yothalot framework for intermediate result files.
