# Yothalot\Racer

Yothalot was designed to run map/reduce jobs. However, since Yothalot
had to be able distribute jobs over different servers for that, we
decided to also support different types of jobs: like racer jobs.

The *Yothalot\Racer* class offers you the possibility to start a number of
parallel running PHP scripts. The result of the first job to
complete is returned back to you. This could for example be useful if you
try to locate information in a large set of log files -- as soon as one
job finds the appropriate entry in the log the result is returned an all
other jobs are stopped.

## Yothalot\Racer interface

To write a racer job, you have to create a class that implements this
Yothalot\Racer interface. This interface looks as follows:

```php
<?php
interface Yothalot\Racer
{
    public function includes();
    public function process();
}
?>
```
When you write your own racer class, keep in mind that the Yothalot
framework distributes the job over multiple servers. It is therefore possible
that your object gets serialized and is moved to a different server, and
that multiple instances are running at the same time.


## Serializing and unserializing

The Yothalot framework serializes and unserializes your objects to distribute them
over different nodes in the cluster. If there are any files that have to be
included before the object is unserialized, you can name these files in the
`includes()` method.

```php
<?php
class MyRacer implements Yothalot\Racer
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
class MyRacer implements Yothalot\Racer, Serializable
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
(the job did not win the race), or an array of arrays with results if the algorithm
is won.

```php
<?php
class MyRacer implements Yothalot\Racer
{
    /**
     *  Implementation for a process function
     *  @param  mixed       Value that is being mapped
     *  @return mixed       Your return value
     */
    public function process($value)
    {
        // does this job win the race?
        if (check_if_data_contains_what_we_were_looking_for($value))
        {
            // return the found data (all other running sub-jobs will be killed)
            return array("result", extract_appropriate_data($value));
        }
        else
        {
            // data was not found, let other processes continue
            return NULL;
        }
    }
}
?>
```

## Update your connection after using it for mapreduce tasks

If you haven't set up a connection yet, you can skip this section and
go to our [Yothalot\Connection](copernica-docs:Yothalot/php-connection "Connection") page. If you have set up a connection for
mapreduce tasks you have to update it in order to use it for racer tasks.
The reason is that mapreduce and racer tasks are very similar. In order
to avoid conflicts racer tasks should use another queue than  mapreduce
tasks, nameley the racer queue. To achieve this you update the routing key
in your connection. A standard racer connection looks like:

```php
/**
 *  Connection to the Yothalot cluster
 *  @var Yothalot\Connection
 */
$connection = new Yothalot\Connection(array(
    "host"      =>  "rabbit1.example.com",
    "vhost"     =>  "yothalot",
    "routingkey =>  "racer" 
)); 
```
For more information you can see our [Yothalot\Connection](copernica-docs:Yothalot/php-connection "Connection") page.
