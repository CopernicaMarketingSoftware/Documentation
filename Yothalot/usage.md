# Yothalot usage

This page explains how to use Yothalot. If you better learn by example, see our [hello world](Yothalot/hellowordl) for map reduce.


## Creating a serializable class

The Yothalot framework serializes and unserializes objects and transfers
them between nodes, so that the algorithm can run close to the files 
that are being mapped and reduced. These objects are instances of a class that you have to
create. Yothalot requires that your class implements the Yothalot\Mapreduce interface.
This interface requires that you implement a map function, which implements your mapping algorithm, a reduce function, which implements your reduce algorithm, and a write function, which implements the final step in your map reduce algorithm. Moreover, you have to implement a function `includes` that returns the names of php files that are necessary for your mapreduce class, with the inclusion of the file in which the mapreduce class is located.

An example of a minimal map reduce class is:
```php
<?php
class MinimalMapReduceClass implements Yothalot\MapReduce
{     
    /**
     *  Return the files that have to be included 
     *  @return string[]    Array of to-be-included files
     */
    public function includes()
    {
        // we only include this file
        return array(__FILE__);
    }

    /**
     *  @param  mixed       Input that is being mapped 
     *  @param  Reducer     Reducer object to which we may emit key/value pairs
     */
    function map($input, Yothalot\Reducer $reducer)
    {
        // Use the input (e.g. to open a file)
        // Map thing in the file and emit them to the reducer with:
        $reducer->emit($key, $value);
    }
    
    /**
     *  @param  mixed       The key for which values should be reduced
     *  @param  Values      Traversable object with values linked to the key
     *  @param  Writer      Object to which the reduced value can be sent
     */
    function reduce($key, Yothalot\Values $values, Yothalot\Writer $writer)
    {
        // The reduce step where the result is at the end emitted to the writer
        $writer->emit($result);
    }
    
    /**
     *  @param  mixed       The key for which the result comes in
     *  @param  mixed       Fully reduced value
     */
    function write($key, $value)
    {
        // Do something with the map reduced result (e.g. store it in a file on the gluster).
        // the output file is stored on the gluster
        $path = new Yothalot\Path("results.txt");
    
        // write the key value pair to a file
        file_put_contents($path->absolute(), "$key: $value\n", FILE_APPEND);
    }
}
```
While the above class is the bare minimum that you need to implement,
there is nothing that stops you to expand the class in all possible ways.

##[Set up a Yothalot\Connection](Yothalot/connection)

After you have created a MapReduce class with your map reduce algorithm, you have to create an instance of the connect object that connects Yothalot to RabbitMQ.

Usage:
```php
$master = new Yothalot\Connection("host","user","password","vhost","exchange","routingkey");
```
Where `"host"` is the hostname of RabbitMQ, `"user"` is the username of RabbitMQ, `"Password"` is the password of RabbitMQ, `"vhost"` is the virtual host of RabbitMQ, `"routingkey"` is the routing key.
After a master object has been created we can tell the master to create a new MapReduce job. Each job needs to have a MapReduce implementation. Usage:
```php
$myMapRed = new MinimalMapReduceClass(); 
$job = $master->create($myMapRd);
```
More information on the Connection object can be found [here](Yothalot/connection)

##[Use the Yothalot\Job](Yothalot/job)
As shown above, jobs can be added to the master object. After the creation 
of a job we can add data, a file, or a information on a server to the job with 
*add*, *file*, and *server*. After 
data is added to the job, the mapper algorithm starts by calling the map()
function in your class for every input value that you send to your mapper.
When the mapper algorithm emits identical keys, the Yothalot framework
will start making calls to the reduce() method to reduce the values 
linked to these keys. This reduced value should be passed to the writer.

It is very well possible that the reduce() method gets called more than
once for the same key (for example if so many keys were found that 
multiple reducers were started). The value that you emit might therefore
be an intermediate value that is going to be reduced for a second or
third time before it is finally written.
The final step in the reducer process calls the write() method once for 
every found key, and for each reduced value. The exact behavior of the map
reduce algorithm, we can finetuned per job.

###Adding data to the job.

We add some filenames to the job. The file names passed overhere will be passed to the input argument of the member function *map* of the MapReduce class. Each call to file() will correspond to a call to the MapReduce::map() method. These mapper processes can run in parallel. Usage:
```php
$job->file("/path/to/cluster/file1.log");
$job->file("/path/to/cluster/file2.log");
$job->file("/path/to/cluster/file3.log");
$job->file("/path/to/cluster/file4.log");
```

###Start the job
We start the job with **start**. On a started job no data, files, or servers can be added. Usage:
```php
$job->start();
```

###Wait for the job
Before you can use the results of the map reduce job, you have to be sure that all the job with all its processes have ended. You can achieve this with **wait**. Usage:
```php
$job-wait();
```

This is the most basic scenario for running a MapReduce job. For a complete overview of all the options of **job** we refere to the page with the description of [Yothalot\Job](Yothalot/job).
