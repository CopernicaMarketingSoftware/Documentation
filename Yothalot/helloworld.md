# Hello World!

The common example to show the workings of a map/reduce algorithm
is the word counter. Given a file or a set of files you can create
a map/reduce job that counts all words in them.

````php
// the actual implementation of the algorithm
class WordCount implements Yothalot\MapReduce
{
    // map a certain value, and feed thise key/value pairs to the reducer
    function map($value, Yothalot\Reducer $reducer)
    {
        // the value is a filename that we can open
        if (!is_resource($fp = fopen($value, "r"))) return;
        
        // read lines
        while (($line = fgets($fp)) !== false)
        {
            // split line in words, and for each word emit key/value pair:
            // the word is the key, the value the number of times the word was seen
            foreach (explode(" ", $line) as $word) $reducer->emit($word, 1);
        }
    }
    
    // reduce a set of values that all share the same key, and pass them to the writer
    function reduce($key, Yothalot\Values $values, Yothalot\Writer $writer)
    {
        // total number of occurances for the word
        $total = 0;
        
        // iterate over the found valued
        foreach ($values as $value) $total += $value;
        
        // done
        $writer->emit($total);
    }
    
    // write the reduces values to storage
    function write($key, $value)
    {
        // write the key value pair
        file_put_contents("path/to/results.txt", "$key: $value\n", FILE_APPEND);
    }
}


// connection with the Yothalot master process
$master = new Yothalot\Master("rabbit1.yothalot.com","guest","guest","/");

// create a map/reduce job in the master
$job = $master->create(new WordCount());

// add the files in which to look for words
$job->add("path/to/file1.txt");
$job->add("path/to/file2.txt");
$job->add("path/to/file3.txt");

// wait for the job to be ready
$job->wait();

// all files are stored in the "path/to/results.txt" file
echo(file_get_contents("path/to/results.txt"));

````

