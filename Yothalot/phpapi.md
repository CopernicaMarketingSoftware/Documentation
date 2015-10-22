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


## Core classes and interfaces

To write a mapreduce or race job, you create a class that implements
either the [Yothalot\MapReduce](copernica-docs:Yothalot/php-mapreduce) 
or [Yothalot\Race](copernica-docs:Yothalot/php-race) interface. An
instance of such an object can be wrapped in a [Yothalot\Job](copernica-docs:Yothalot/php-job)
object and sent to the cluster.

* [Interface Yothalot\MapReduce](copernica-docs:Yothalot/php-mapreduce)
* [Interface Yothalot\Race](copernica-docs:Yothalot/php-race)
* [Class Yothalot\Connection](copernica-docs:Yothalot/php-connection "Connection")
* [Class Yothalot\Job with Yothalot\MapReduce Objects](copernica-docs:Yothalot/php-job "Job with mapreduce objects")
* [Class Yothalot\Result](copernica-docs:Yothalot/php-result "Result")


## Utility classes

The classes and interface mentioned above are sufficient for writing and running
mapreduce jobs. As an extra service however, the Yothalot API also comes 
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
