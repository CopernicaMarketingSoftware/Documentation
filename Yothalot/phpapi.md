# PHP API

Here is an overview of the Yothalot PHP API. The Yothalot PHP API is built 
around a couple of classes from which the [Yothalot\Connection](copernica-docs:Yothalot/php-connection)
and [Yothalot\Job](copernica-docs:Yothalot/php-job) classes are the most 
important. The interface [Yothalot\MapReduce](copernica-docs:Yothalot/php-mapreduce)
is also essential, because you have to implement this interface in your
scripts.

The interfaces and classes that are available are:
* [Connection](copernica-docs:Yothalot/php-connection "Connection") (Set up a connection to the cluster)
* [MapReduce](copernica-docs:Yothalot/php-mapreduce "MapReduce") (Interface for MapReduce algorithms)
* [Job](copernica-docs:Yothalot/php-job "Job") (Serializable objects that hold job details)
* [Input](copernica-docs:Yothalot/php-input "Input") (Utility class to read input files)
* [Output](copernica-docs:Yothalot/php-output "Output") (Utility class to write output files)
* [Path](copernica-docs:Yothalot/php-path "Files and paths") (Change between absolute and relative paths)
