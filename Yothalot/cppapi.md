# C++ API

The C++ API is for those who need the speed of a native implementation
for mapreduce algorithms. You can use the API to write mapreduce jobs
in C++ and send them to the Yothalot cluster.

With the C++ API you write an executable (so you have to write 
a main() function too). This executable has to be installed on
each of the servers in the Yothalot cluster. The Yothalot process will
start up this executable with specific command line arguments and input 
data, so that (a part of the) mapreduce algorithm gets executed. 

Besides the main() function that you have to supply, you also have to
implement the map/reduce algorithm. For this, the C++ offers a virtual
base class that you have to extend in your program. This base class
has various methods for mapping, reducing and writing that should all
be implemented by you.


## Installation

If you want to use the C++ API you only have to install Yothalot. Make sure
that Yothalot is also installed on the machine where you build your mapreduce
programs since building the program requires the yothalot library that comes
with the Yothalot installation.

* [How to install Yothalot](copernica-docs:Yothalot/installation "Installation")
 

## Mapreduce algorithms

You can run a mapreduce task on the Yothalot cluster by extending a virtual
base class that is supplied by the Yothalot framework:

* [Class Yothalot::MapReduce](copernica-docs:Yothalot/cpp-mapreduce "MapReduce")


## Creating your program

To turn your algorithm into an executable that can run on the Yothalot
cluster, you have to add a "main()" function to it, and process the
command line arguments that are passed to it by Yothalot. The C++ API
offers a very useful utility class for parsing these arguments, so that 
your main() function normally does not need more than 3 lines of code:

* [Creating a mapreduce program](copernica-docs:Yothalot/cpp-program "Writing a program")

It is also possible to use Yothalot to run programs that do not hold a mapreduce 
algorithm. The requirements of these programs and there use is discussed in:

* [Creating non mapreduce programs](copernica-docs:Yothalot/cpp-other "Writing non mapreduce programs")


## Starting a Yothalot job

You start up a job by calling the Yothalot program and the appropriate
command line arguments. The options are discussed on this page:

* [Starting a Yothalot job](copernica-docs:Yothalot/cpp-start "Start up a job")


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


## Full class reference

The following classes are offered by the Yothalot framework:
* [Class Yothalot::Input](copernica-docs:Yothalot/cpp-input "Input")
* [Class Yothalot::Inputs](copernica-docs:Yothalot/cpp-input "Inputs")
* [Class Yothalot::Key](copernica-docs:Yothalot/cpp-classes "Classes"),
* [Class Yothalot::MapReduce](copernica-docs:Yothalot/cpp-mapreduce "MapReduce")
* [Class Yothalot::Output](copernica-docs:Yothalot/cpp-output "Output")
* [Class Yothalot::Path](copernica-docs:Yothalot/cpp-path "Path")
* [Class Yothalot::Record](copernica-docs:Yothalot/record "Record")
* [Class Yothalot::Reducer](copernica-docs:Yothalot/cpp-classes "Classes"),
* [Class Yothalot::Result](copernica-docs:Yothalot/cpp-result "Result")
* [Class Yothalot::Scalar](copernica-docs:Yothalot/cpp-scalar "Scalar"),
* [Class Yothalot::Tuple](copernica-docs:Yothalot/cpp-tuple "Tuple"),
* [Class Yothalot::Value](copernica-docs:Yothalot/cpp-classes "Classes"),
* [Class Yothalot::Values](copernica-docs:Yothalot/cpp-classes "Classes"),
* [Class Yothalot::Writer](copernica-docs:Yothalot/cpp-classes "Classes")
