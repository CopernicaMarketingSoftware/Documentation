# C++ API

The C++ API is for those who need the speed of a native implementation
for mapreduce algorithms. You can use the API to write mapreduce jobs
in C++ and send them to the Yothalot cluster.

With the C++ API you write a C++ executable (so you do have to include 
a main() function in your algorithm). This executable has to be installed on
each of the servers in the Yothalot cluster (it could therefore be useful
to store the executable on GlusterFS, so that each of the servers automatically
has access to it). The Yothalot process starts up this executable with
specific command line arguments and input data, so that (a part of the)
mapreduce algorithm gets executed. You do not have to process these
command line arguments and input, because that is done by the mapreduce
framework.

To send the job to the Yothalot cluster, you simply have to start the
executable without any command line arguments -- or use the [Yohtalot::Connection](copernica-docs:Yothalot/cpp-connection)
and [Yohtalot::Job](copernica-docs:Yothalot/cpp-job) classes from the C++ API to start the job programmatically. 

## Installation

If you want to use the C++ API you have to install Yothalot and the Yothalot
library.

* [How to install Yothalot](copernica-docs:Yothalot/installation "Installation")
* [How to install the Yothalot C++ library](copernica-docs:Yothalot/cpp-install "C++ Library Installation")
 

## The Yothalot mapreduce program

To write a mapreduce job, you simply have to create a program that follows
some specific rules so Yothalot can use it.

* [MapReduce program "MapReduce program"](copernica-docs:Yothalot/cpp-program)


## The Yothalot race program

If you want to process a lot of data simultaneously but do not want to use
a reduce step, you can create a program that follows the Race API so Yothalot
can use it.

* [Race program "Race program"](copernica-docs:Yothalot/cpp-program-race "Race")


## Jobs and connections

Once you've written your own mapreduce or race algorithm, you can turn it into a job,
and send it to the Yothalot cluster. The following classes are necessary for
that:

* [Class Yothalot::Connection](copernica-docs:Yothalot/cpp-connection "Connection")
* [Class Yothalot::Job with Yothalot::MapReduce Objects](copernica-docs:Yothalot/cpp-job "Job with mapreduce objects")
* [Class Yothalot::Job with Yothalot::Race Objects](copernica-docs:Yothalot/cpp-job-race "Job with race objects")


## Information about the job

Once you have run your mapreduce job you may be interested in the behavior
of the job. The information is given in a couple of classes the main class
is:

* [Class Yothalot::Result](copernica-docs:Yothalot/cpp-result "Result")


## Classes 

In order to create a Yothalot MapReduce program you have to use some specific
classes since instances of these classes are provided to you via the arguments
of the `reducer()` and `writer()` member functions. Information about these
classes is given in:

* [Yothalot Classes](copernica-docs:Yothalot/cpp-classes "Yothalot Classes")


## Utility classes

The classes mentioned above are sufficient for writing and running mapreduce
jobs. As an extra service however, the Yothalot API also allows comes with
a couple of extra utility classes.

* [Class Yothalot::Path](copernica-docs:Yothalot/cpp-path "Path")
* [Class Yothalot::Input](copernica-docs:Yothalot/cpp-input "Input")
* [Class Yothalot::Output](copernica-docs:Yothalot/cpp-output "Output")

The [Yothalot::Path](copernica-docs:Yothalot/cpp-path "Path") class can be used
for converting absolute pathnames into pathnames that are relative to the
GlusterFS mount point, and the other way around. This is especial useful if
you use different mount points on different servers.

The [Yothalot::Input](copernica-docs:Yothalot/cpp-input "Input") and 
[Yothalot::Output](copernica-docs:Yothalot/cpp-output "Output") classes allow you
to read and write files in the same compressed format used by the Yothalot 
framework internally for intermediate result files.
