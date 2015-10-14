# PHP API

The PHP API is the simplest and most popular map/reduce API that Yothalot offers.
You can use it to write mapreduce jobs, and to send them to the Yothalot cluster.

The API consists of an interface, and classes to communicate with the cluster. 
Writing a mapreduce job in PHP normally comes down to write a class that implements 
the [Yothalot\MapReduce](copernica-docs:Yothalot/php-mapreduce "MapReduce")
interface, and then to create a connection to the Yothalot cluster using the 
[Yothalot\Connection](copernica-docs:Yothalot/php-connection "Connection") class.

If you have both a connection and mapreduce object, you can then create a 
[Yothalot\Job](copernica-docs:Yothalot/php-job "Job") that you feed with
input and tuning parameters.


## The Yothalot\MapReduce interface

To write a mapreduce job, you simply have to create a class that implements
the [Yothalot\MapReduce](copernica-docs:Yothalot/php-mapreduce) interface.

* [Interface Yothalot\MapReduce "MapReduce"](copernica-docs:Yothalot/php-mapreduce "MapReduce")


## The Yothalot\Race interface

To process a lot of data simultaneously but only get the result that is
available first, you simply have to create a class that implements the
[Yothalot\Race](copernica-docs:Yothalot/php-race "Race") interface.

* [Interface Yothalot\Race](copernica-docs:Yothalot/php-race "Race")


## Jobs and connections

Once you've written your own mapreduce algorithm, you can turn it into a job,
and send it to the Yothalot cluster. The following two classes are necessary for
that:

* [Class Yothalot\Connection](copernica-docs:Yothalot/php-connection "Connection")
* [Class Yothalot\Job](copernica-docs:Yothalot/php-job "Job")

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
to read and write files in the same compressed format used by the Yothalot 
framework internally for intermediate result files.
