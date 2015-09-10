# Yothalot\Connection

With the **Yothalot\Connection** class you can create a connection to the
Yothalot cluster, and send jobs to this cluster. Internally, the 
Yothalot\Connection object connects to the RabbitMQ server, and all jobs
that you create, are sent to this RabbitMQ server.

The most important Yothalot\Connection method is `create()`. With this
method you can create a new mapreduce job. The following otgher methods 
are available:

- __construct() (constructor)
- create() (creates a new mapreduce job)
- flush()  (flushes job)

## Constructor

The constructor takes six parameters, holding the address and login data
of the RabbitMQ server, as well as the name of the exchange and routing
key to be used for publishing the job.

```php
/**
 *  Create a connection to the Yothalot cluster
 *  @var Yothalot\Connection
 */
$connection = new Yothalot\Connection("host","user","password","vhost","exchange","routingkey");
```
Where `"host"` is the hostname of RabbitMQ, `"user"` is the username of 
RabbitMQ, `"Password"` is the password of RabbitMQ, `"vhost"` is the 
virtual host of RabbitMQ, `"routingkey"` is the routing key.

In most Yothalot environments, the queue to which mapreduce jobs are published
is called "mapreduce". To submit jobs to this queue, you can use an empty
exchange name, and "mapreduce" as the routing key. By doing this, you
ensure that the jobs published on the connections do end up in this queue.
 

## Method create()

The Yothalot::Connection::create() method is used to create a new 
mapreduce job. It gets one parameter: an instance of your own object
in which your mapreduce algorithm is implemented.

For more information on how to create your own mapreduce objects, see ????

```php
/**
 *  Create a new mapreduce job
 *  This method returns a Yothalot\Job object
 *  @var Yothalot\Job
 */
$job = $connection->create(new MyMapReduceAlgorithm());
```

The methods returns a linkto:Yothalot\Reduce object. This object can be
used to add data, or to finetune the performance parameters of the job.
For more information about adding data to the job, or setting these
parameters, see the job article.

Where `mapReduce` is an instance of your MapReduce class that implements the Yothalot\Mapreduce interface.


## Method flush()

Internally, when jobs are created, they are sent in serialized form over 
the AMQP connection to RabbitMQ. If the connection gets congested, internal
buffers might be created. In normal circumstances, this is not much of
a problem, because all these buffers get flushed when the connection 
is destructed, but if you want to enforce this flush call, you can 
explicitly call the flush() method.

```php
/**
 *  Flush the connection to enforce that buffered jobs are sent 
 *  over the connection. This connection hangs until all jobs have
 *  been sent and the buffers have been emptied.
 */
$connection->flush();
```

