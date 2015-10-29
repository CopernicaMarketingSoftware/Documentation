# The Yothalot\MapReduce interface

If you want to write a mapreduce algorithm, you have to create a class that
implements the Yothalot\MapReduce interface. This interface contains all the 
methods for the MapReduce algorithm.

If you write your own class, you have to implement this interface, and you are
thus also required to implement all these methods. The interface looks as
follows:


```php
interface Yothalot\MapReduce
{
    public function includes();
    public function map($value, Yothalot\Reducer $reducer);
    public function reduce($key, Yothalot\Values $values, Yothalot\Writer $writer);
    public function write($key, $value);
}
```

When you write your own mapreduce classes, keep in mind that the Yothalot framework
distributes a job over multiple servers, and runs it in parallel. It is
therefore possible that your object gets serialized and is moved to a different
server, and that multiple calls to map(), reduce() and write() happen at the
same time, which could lead to race conditions if they all try to access the
same resource.


## Serializing and unserializing

The Yothalot framework serializes and unserializes your objects to distribute them
over different nodes in the cluster. This means that your object is converted in
a stream of bytes (serialized), the stream is given to another node, this other
node converts this stream into your object again (unserialize). If there are
any files that have to be included before the object is unserialized, you
have to name these files in the `includes()` method. This ensures that your
objects can properly be reconstructed.

```php
class MyMapReduce implements Yothalot\MapReduce
{
    /**
     *  Files that should be loaded before the object is unserialized
     *  @return string[]
     */
    public function includes()
    {
        return array(__FILE__);
    }
    
    // @todo implement the other methods
}
```

PHP classes are serializable by default. If you however want to write your own
custom serialize and unserialize algorithm, you can simply implement the
[Serializable interface](http://php.net/manual/en/class.serializable.php):

```php
class MyMapReduce implements Yothalot\MapReduce, Serializable
{
    /**
     *  Files that should be loaded before the object is unserialized
     *  @return string[]
     */
    public function includes()
    {
        return array(__FILE__);
    }

    /**
     *  Serialize the object into a string value
     *  @return string
     */
    public function serialize()
    {
        // @todo add your implementation
    }
    
    /**
     *  Counter part of the resize() method: turn a string back into an object
     *  @param  string
     */
    public function unserialize($input)
    {
        // @todo add your implementation
    }
    
    // @todo implement other methods from the 
}
```

## Mapping
The first step in a mapreduce algorithm is the map step in which you map data
to key value pairs. This step should be implemented in the `map()` method of your class.
The method receives two parameters. The first parameter contains the input data
that you have to map. The content of this parameter is what you pass to the
`Yothalot\Job` `add()` method, which is discussed in [Yothalot\Job](copernica-docs:Yothalot/php-job "Job")
The second argument provides `map()` the information what to do with the mapped results.
This is a `Yothalot\Reducer` object, which is a very simple
object with only one method: `emit()`. With this `emit()` method you can 
emit key/value pairs to the reducer. The `emit()` method takes two parameters: a
key and a value. You can only use scalars or arrays of scalars for keys
and values. It is not possible to emit objects or deeply nested data
structures. An example of a `map()` function is:

```php
class MyMapReduce implements Yothalot\MapReduce
{
    /**
     *  Implementation for a mapper function
     *  @param  mixed       Value that is being mapped
     *  @param  Reducer     Reducer object to which we may emit key/value pairs
     */
    public function map($value, Yothalot\Reducer $reducer)
    {
        // imagine that the to-be-mapped data is a string, and we want to 
        // emit key/value pairs for all the words found in the string
        foreach (explode(" ", $value) as $word)
        {
            // emit a key/value pair to the reducer
            if (strlen($word) > 0) $reducer->emit($word, 1);
        }
    }
    
    // @todo implement other methods
}
```

## Reducing

When the same key was multiple times emitted by the `map()` method, the different
values are reduced into a single new value. This is done by the `reduce()`
method. The `reduce()` method takes three parameters. The first two arguments contain
the key for which values are going to be reduced, and a traversable set of
values that are linked to that key. This set of values should be reduced
into one value. The third argument is a `Yothalot\Writer` object with
which you can emit the reduced value. The `emit()` method in the `Yothalot\Writer`
class takes one parameter: the reduced value. You can only use scalars
for these values, or an array containing scalars. An example of a reducer
step looks like:

```php
class MyMapReduce implements Yothalot\MapReduce
{
    /**
     *  Implementation for the reduce function
     *  @param  mixed       The key for which values should be reduced
     *  @param  Values      Traversable object with values linked to the key
     *  @param  Writer      Object to which the reduced value can be sent
     */
    public function reduce($key, Yothalot\Values $values, Yothalot\Writer $writer)
    {
        // total of all values
        $total = 0;
        
        // iterate over the values
        foreach ($values as $value) $total += $value;
        
        // emit the result to the writer
        $writer->emit($total);
    }
    
    // @todo implement other methods
}
```

Keep in mind that it is very well possible that the reduce() method gets called 
more than once for the same key. This for example happens when so many keys were 
found that multiple chained reducers are started. The value that you emit might 
therefore be an intermediate value that is going to be reduced for a second or
third time.


## Writing

After all mappers ran, and everything has been reduced to single keys with single
values, the results are ready to be written to some kind of storage. The Yothalot
framework calls your `write()` method for this. The `write()` method receives
two parameters. The first being the key and the second being the value. For
each key value pair write is called.

```php
class MyMapReduce implements Yothalot\MapReduce
{
    /**
     *  Implement a write function:
     *  @param  mixed       The key for which the result comes in
     *  @param  mixed       Fully reduced value
     */
    public function write($key, $value)
    {
        // simply write to an output file
        file_put_contents("/path/to/output.txt", "$key: $value\n", FILE_APPEND);
    }
}
```

It is completely up to you to decide where you want to write your results to.
Keep in mind however that you can [tune your job](copernica-docs:Yothalot/tuning)
in such a manner, that multple writers can be started at the same time. You should
therefore use some kind of locking if you want all your writers to write to the
same resource.
