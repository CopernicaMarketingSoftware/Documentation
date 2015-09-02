# Hello World!

The common example to show the workings of a map/reduce algorithm
is the word counter. Given a file or a set of files you can create
a map/reduce job that counts all words in them.

````php
/**
 *  WordCount implemented as MapReduce class.
 *
 *  This class implements the Yothalot\MapReduce interface, which 
 *  allows the object to be easily passed around different nodes in
 *  the cluster.
 *
 *  This is a serializable object - which means that it can be 
 *  serialized by the Yothalot framework, and transferred to other
 *  nodes in the Yothalot cluster. It is even possible that the map(),
 *  reduce() and write() methods will all be called on different
 *  nodes in the cluster. Because it is the responsibility of the 
 *  Yothalot framework to make calls to your object at the right time,
 *  you are not supposed to make calls to methods in this class 
 *  yourself
 */
class WordCount implements Yothalot\MapReduce
{
    /**
     *  The Yothalot framework serializes and unserializes objects
     *  to transfer them between nodes, so that the algorithm can run
     *  close to the files that are being mapped and reduced.
     *
     *  If there are PHP files that have to be "require()"-ed before the
     *  object is unserialized, you should implement the "includes()"
     *  method. This returns a list of to-be-included files.
     *
     *  Of course, you must make sure that the file is accessible on
     *  every server that is in the Yothalot cluster. You can for 
     *  example achieve this by storing the PHP files on the GlusterFS 
     *  file system.
     *
     *  @return string[]    Array of to-be-included files
     */
    public function includes()
    {
        // we only have to include this file
        return array(__FILE__);
    }

    /**
     *  The mapper algorithm starts by calling the map() function in
     *  your class for every input value that you send to your mapper.
     *
     *  In this implementation we assume that the input value is a 
     *  string with the relative pathname to a file for which all words
     *  should be called. The pathname is relative to the glusterfs
     *  mount point. However, this $value object can be anything, and
     *  corresponds with the value that you pass in to the $job->add()
     *  method (see below).
     *
     *  @param  mixed       Value that is being mapped (now: a path)
     *  @param  Reducer     Reducer object to which we may emit key/value pairs
     */
    function map($value, Yothalot\Reducer $reducer)
    {
        // the filename that was passed is a relative path, turn this
        // into a full path object on GlusterFS 
        $path = new Yothalot\Path($value);
    
        // the value is a filename that we can open
        if (!is_resource($fp = fopen($value.absolute(), "r"))) return;
        
        // read lines
        while (($line = fgets($fp)) !== false)
        {
            // split line in words, and for each word emit key/value pair:
            // the word is the key, the value the number of times the word was seen
            foreach (explode(" ", $line) as $word) $reducer->emit($word, 1);
        }
        
        // close the file
        fclose($fp);
    }
    
    /**
     *  When the map/reduce algorithm finds multiple identical keys, it
     *  will start making calls to the reduce() method to reduce all the
     *  values linked to one key into a new value. This new found
     *  value should then be passed to the writer.
     *
     *  Note that it is very well possible that the reduce() method will
     *  be called more than once for the same key (for example if so
     *  many keys are found that multiple reducers are started). The 
     *  value that you emit to the writer does not therefore not always
     *  have to be the value that is finally written.
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
        
        // iterate over the found valued
        foreach ($values as $value) $total += $value;
        
        // emit the reduced value to the writer
        $writer->emit($total);
    }
    
    /**
     *  The final step in the reducer process calls the write() method
     *  for every found key, and for each reduced value.
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


// we need access to the Yothalot master process
$master = new Yothalot\Master("rabbit1.yothalot.com","guest","guest","/");

// create a map/reduce job in the master
$job = $master->create(new WordCount());

// add the files in which to look for words, the following three calls
// will result in three calls to the WordCount::map() function. However,
// these functions will be called on one of the nodes on GlusterFS
$job->add("path/to/file1.txt");
$job->add("path/to/file2.txt");
$job->add("path/to/file3.txt");

// wait for the job to be ready (this could take some time because
// the Yothalot master will now start up various mapper, reducer and
// writer processes)
$job->wait();

// the output file is stored on the gluster
$path = new Yothalot\Path("relative/path/in/gluster/results.txt");

// all files are stored in the "path/to/results.txt" file
echo(file_get_contents($path->absolute()));

````

