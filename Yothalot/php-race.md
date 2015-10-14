# Yothalot\Race

Yothalot is specially developed for mapreduce tasks. Yet, it turns out that 
the Yothalot framework provides some extra useful features besides running 
mapreduce algorithms. E.g. it is possible to easily process a lot of files
simultaneously. This can be done by using empty reducer and writer steps. 
However, there is one limitation in this process. You have to wait till
all files are processed. What if you want to process a lot of files, but
you are only interested in the first result you get? Yothalot\Race is a
solution for this problem. Using Yothalot\Race is as simple as using 
Yothalot\MapReduce, or maybe even simpler. Instead of creating a class
that implements the Yothalot\MapReduce interface you create a class that
implements the Yothalot\Race interface. You can  use this class like you
use your mapreduce classes. That is it. 

## Yothalot\Race interface

Your class that processes files in a race has to implement the Yothalot\Race
interface. This interface looks as follows:
```php
{
    public function includes();
    public function process();
}
```
When you write your own race classes, keep in mind that the Yothalot
framework distributes a job over multiple servers, and runs it in parallel. 
It is therefore possible that your object gets serialized and is moved to
a different server, and that multiple calls to process happen at the same time.
After all you want to process your files simultaneously. However, calling 
process at the same time could lead to race conditions (the type of race 
you do want to avoid) if calls are trying to access the same resource
at the same time.

## Serializing and unserializing

The Yothalot framework serializes and unserializes your objects to distribute them
over different nodes in the cluster. If there are any files that have to be
included before the object is unserialized, you can name these files in the
`includes()` method.

```php
class MyRace implements Yothalot\Race
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
class MyRace implements Yothalot\Race, Serializable
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

## Processing

The last part that needs to be implemented is the `process()` method. In this
method you implement your algorithm that processes the data. The method receives
one parameter, the data, and has to return.

```php
class MyRace implements Yothalot\Race
{
    /**
     *  Implementation for a process function
     *  @param  mixed       Value that is being mapped
     *  @return mixed       Your return value
     */
    public function process($value)
    {
        // @todo:   implement your process algorithm that 
        //          uses value and returns a result         
        
        return result;
    }

    // @todo implement other methods
}
```


