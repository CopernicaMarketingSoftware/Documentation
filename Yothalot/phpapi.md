# PHP API

The PHP API is the simplest and most popular mapreduce API that Yothalot offers.
You can use it to write mapreduce jobs, and to send them to the Yothalot cluster.

The API consists of interfaces that you can implement, and classes that you can
use to communicate with the cluster.

## Interfaces

To write a mapreduce job, you simply have to create a class that implements
the [Yothalot\MapReduce](copernica-docs:Yothalot/php-mapreduce) interface.

* [Interface Yothalot\MapReduce](copernica-docs:Yothalot/php-mapreduce "MapReduce")


## Jobs and connections

Once you've written your own mapreduce algorithm, you can turn it into a job,
and send it to the Yothalot cluster. The following two classes can be used for
that:

* [Class Yothalot\Connection](copernica-docs:Yothalot/php-connection "Connection")
* [Class Yothalot\Job](copernica-docs:Yothalot/php-job "Job")

The [Yothalot\Connection](copernica-docs:Yothalot/php-connection "Connection")
class is used for setting up a connection to the Yothalot cluster. The 
[Yothalot\Job](copernica-docs:Yothalot/php-job "Job") class is used for running
and tuning a mapreduce job.


## Utility classes

The classes and interface mentioned above are sufficient for writing and running
mapreduce jobs. But the Yothalot API also allows comes with a couple of extra
utility classes that might be useful.

* [Class Yothalot\Path](copernica-docs:Yothalot/php-path "Path")
* [Class Yothalot\Input](copernica-docs:Yothalot/php-input "Input")
* [Class Yothalot\Output](copernica-docs:Yothalot/php-output "Output")

The [Yothalot\Path](copernica-docs:Yothalot/php-path "Path") class can be used
for converting absolute pathnames into pathnames that are relative to the
GlusterFS mount point, and the other way around.

The [Yothalot\Input](copernica-docs:Yothalot/php-input "Input") and 
[Yothalot\Output](copernica-docs:Yothalot/php-output "Output") classes allow you
to read and write files in the same compressed format that the Yothalot 
framework internally uses for its temporary intermediate result files.
