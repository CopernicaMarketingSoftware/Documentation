# Hello World!

The common example to show the workings of the map/reduce algorithm is the word 
counter. Given a file or a set of files you can create a map/reduce job that 
counts all words in them. The mapper processes create the initial key/value 
pairs for each found word, and the reducers sum up these values to get to the 
total number of words.

Because Yothalot comes with a simple PHP API, we show how you can implement 
the WordCount map/reduce job in PHP. You simply start by writing your own
WordCount class that implements the Yothalot\MapReduce interface. This 
MapReduce interface prescribes that you implement the methods "map()", 
"reduce()" and "write()": the three common steps of the map-reduce algorithm. 

Besides these three methods you also need to implement the "includes()" method
that return the names of the PHP files that should be loaded before a WordCount
instance is unserialized.


````php
<?php
/**
 *  WordCount.php
 *
 *  This is a serializable class - which means that it can be serialized by the 
 *  Yothalot framework, and transferred to other nodes in the Yothalot cluster. 
 *  It is therefore possible that the map(), reduce() and write() methods will 
 *  all be called on different nodes in the cluster. It is the responsibility of
 *  the Yothalot framework to make calls to your object at the right time. You 
 *  are not supposed to make calls to methods of this class yourself.
 */
class WordCount implements Yothalot\MapReduce
{
    /**
     *  The Yothalot framework serializes and unserializes objects and transfers
     *  them between nodes, so that the algorithm can run close to the files 
     *  that are being mapped and reduced.
     *
     *  If there are PHP files that have to be loaded before an object is 
     *  unserialized, you should implement this method to return the names of
     *  these files.
     *
     *  Of course, you must make sure that the files returned by this method are
     *  accessible on all the servers that are in the Yothalot cluster. You can
     *  for example achieve this by simply storing your PHP files on the 
     *  distributed GlusterFS file system.
     *
     *  @return string[]    Array of to-be-included files
     */
    public function includes()
    {
        // we only have to include this file
        return array(__FILE__);
    }

    /**
     *  The mapper algorithm starts by calling the map() function in your class
     *  for every input value that you send to your mapper.
     *
     *  In this WordCount example the input value is a string with a file name.
     *  This name is relative to the GlusterFS mount point.
     *
     *  @param  mixed       Value that is being mapped (in this example: a path)
     *  @param  Reducer     Reducer object to which we may emit key/value pairs
     */
    function map($value, Yothalot\Reducer $reducer)
    {
        // the filename that was passed is a relative path, turn this
        // into a full path object on GlusterFS 
        $path = new Yothalot\Path($value);
    
        // the value is a filename that we can open
        if (!is_resource($fp = fopen($path->absolute(), "r"))) return;
        
        // read one line at a time (this implementation is scalable, only one
        // line is being read, so that the script never has to use a lot of 
        // memory to load the entire file)
        while (($line = fgets($fp)) !== false)
        {
            // split line in words, and for each word emit key/value pair:
            // the word is the key, the value the number of times the word was seen
            foreach (explode(" ", trim($line)) as $word) $reducer->emit($word, 1);
        }
        
        // close the file
        fclose($fp);
    }
    
    /**
     *  When the mapper algorithm emits identical keys, the Yothalot framework
     *  will start making calls to the reduce() method to reduce the values 
     *  linked to these keys. This reduced value should be passed to the writer.
     *
     *  It is very well possible that the reduce() method gets called more than
     *  once for the same key (for example if so many keys were found that 
     *  multiple reducers were started). The value that you emit might therefore
     *  be an intermediate value that is going to be reduced for a second or
     *  third time because it is finally written.
     *
     *  In this specific WordCount implementation, the key is a word, and
     *  values is a list of numbers telling how often the word was found.
     *
     *  @param  mixed       The key for which values should be reduced
     *  @param  Values      Traversable object with values linked to the key
     *  @param  Writer      Object to which the reduced value can be sent
     */
    function reduce($key, Yothalot\Values $values, Yothalot\Writer $writer)
    {
        // total number of occurances for the word
        $total = 0;
        
        // iterate over the found values (the Yothalot\Values class is a 
        // traversable class, over which you can iterate).
        foreach ($values as $value) $total += $value;
        
        // emit the reduced value to the writer
        $writer->emit($total);
    }
    
    /**
     *  The final step in the reducer process calls the write() method once for 
     *  every found key, and for each reduced value.
     *
     *  In this specific WordCount example, the key is a word, and the
     *  value the total number of occurances
     *
     *  @param  mixed       The key for which the result comes in
     *  @param  mixed       Fully reduced value
     */
    function write($key, $value)
    {
        // the output file is stored on the gluster
        $path = new Yothalot\Path("relative/path/in/gluster/results.txt");
    
        // write the key value pair to a file
        file_put_contents($path->absolute(), "$key: $value\n", FILE_APPEND);
    }
}
?>
````

To send this job to the Yothalot cluster, you can write a second script that 
creates a "WordCount" instance, and sends it to the Yothalot master node.
This master node will send your object to one or more nodes in cluster where
the actual algorithm will run.

````php
<?php
/**
 *  Dependencies
 */
require_once('WordCount.php');

/**
 *  Create an instance of the WordCount algorithm
 *  @var WordCount
 */
$wordcount = new WordCount();

/**
 *  We want to send this WordCount instance to the Yothalot master. To do this,
 *  we need an instance of this master object.
 *
 *  (Under the hood, you do not connect with the Yothalot master process, but to
 *  a RabbitMQ message queue, the login details are therefore the RabbitMQ 
 *  details)
 *
 *  @var Yothalot\Master
 */
$master = new Yothalot\Master("rabbit1.yothalot.com","guest","guest","/");

/**
 *  Now that we have access to the master, we can tell the master to create a 
 *  new MapReduce job, using our WordCount implementation. The return value
 *  is a Yothalot\Job object, that has many methods to feed data to the job,
 *  and to finetune the job.
 *
 *  @var Yothalot\Job
 */
$job = $master->create($wordcount);

/**
 *  Now we can feed the job with data that has to be mapped. In this WordCount
 *  example we assign path names of files for which we want to count words. Each
 *  call to this add() method, corresponds to a call to the WordCount::map()
 *  method. These mapper processes can run in parallel.
 */
$job->add("path/to/file1.txt");
$job->add("path/to/file2.txt");
$job->add("path/to/file3.txt");

/**
 *  Wait for the job to be ready (this could take some time because the Yothalot
 *  master has to start up various mapper, reducer and writer processes to 
 *  run the job)
 */
$job->wait();

/**
 *  The WordCount class wrote its output to a file on the distributed file
 *  system. To find out what the absolute path name of this file is on this 
 *  machine, we  make use of the Yothalot\Path class to turn the relative name
 *  into an absolute path (GlusterFS must be mounted on this machine)
 *
 *  @var Yothalot\Path
 */
$path = new Yothalot\Path("relative/path/in/gluster/results.txt");

/**
 *  Show the found words
 */
echo(file_get_contents($path->absolute()));
?>
````

