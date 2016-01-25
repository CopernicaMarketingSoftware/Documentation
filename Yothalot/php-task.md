# Yothalot\Task

Yothalot was designed to run map/reduce jobs. However, since Yothalot
had to be able distribute jobs over different servers for that, we
decided to also support different types of jobs: like normal jobs.

The *Yothalot\Task* class offers you the possibility to run a single job on the
yothalot cluster. This for example can be used to start more advanced map reduce
jobs that need access to the glusterfs during creation.

## Yothalot\Task interface

To write a task job, you have to create a class that implements this
Yothalot\Task interface. This interface looks as follows:

```php
<?php
interface Yothalot\Task
{
    public function includes();
    public function process($value);
}
?>
```

## Serializing and unserializing

The Yothalot framework serializes and unserializes your object to distribute them
over a node in the cluster. If there are any files that have to be included
before the object is unserialized, you can name these files in the `includes()` method.

```php
<?php
class MyTask implements Yothalot\Task
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
?>
```

PHP classes are serializable by default. If you however want to write your own
custom serialize and unserialize algorithm, you can simply implement the
[Serializable interface](http://php.net/manual/en/class.serializable.php):

```php
<?php
class MyTask implements Yothalot\Task, Serializable
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
?>
```

## Processing

The final method that should be implemented is the `process()` method. In this
method you implement your data processing algorithm. The method receives
one parameter, the data, and should return NULL if the algorithm was not completed
(the job did not win the race), or a non NULL value if the algorithm is won.

```php
<?php
class MyTask implements Yothalot\Task
{
    /**
     *  Implementation for a process function
     *  @param  mixed       Value that is being mapped
     *  @return mixed       Your return value
     */
    public function process($value)
    {
        // long processing job that runs on the yothalot cluster

        // output that we will return to the caller
        return array(1, 2, 3);
    }
}
?>
```

