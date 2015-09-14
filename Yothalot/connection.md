# Yothalot\Connection

With the **Yothalot\Connection** class you can create a connection to the
Yothalot cluster, and send jobs to this cluster. Internally, the 
Yothalot\Connection object connects to the RabbitMQ server, and all jobs
that you create, are sent to this RabbitMQ server.

The most important Yothalot\Connection method is `create()`. With this
method you can create a new mapreduce job. The following methods 
are available:

- __construct() (constructor)
- create() (creates a new mapreduce job)
- flush()  (flushes job)

## Constructor

The constructor takes one parameter, an associative array, holding the
address and login data of the RabbitMQ server, as well as the name of
the exchange and routing key to be used for publishing the job.

```php
/**
 *  Create a connection to the Yothalot cluster
 *  @var Yothalot\Connection
 */
$connection = new Yothalot\Connection(array(
   "host"         => "localhost",
   "user"         => "guest",
   "password"     => "guest",
   "vhost"        => "/",
   "exchange"     => "",
   "routingkey"   => "mapreduce"
)); 
```
Where `"host"` holds the hostname of RabbitMQ, `"user"` holds the user name of 
RabbitMQ, `"Password"` holds the password of RabbitMQ, `"vhost"` holds the 
virtual host of RabbitMQ, `"routingkey"` holds the routing key. All keys have a
default value. The default values are "localhost", "guest", "guest", "/", """",
and "mapreduce" respectively.

If you have installed RabbitMQ locally and have used the default configuration settings, the
default values of the associative array should lead to a proper connection to
RabbitMQ. If you run RabbitMQ elsewhere you should set the "host" key to the proper
location. If you have changed the user name of password of RabbitMQ, you should
change the "user" key and "password" key accordingly. If you have created a
specific RabbitMQ vhost environment you can add the specific vhost to the
rabbitmq-vhost variable by setting the "vhost" key.

Finally there are the keys `"exchange"` and `"routingkey"` with their associative
values that you can set. These are advanced
settings and in most Yothalot environments the default values will suffice. In order to
understand what effect they have and when you need to change them, you need to have some
information on how RabbitMQ internally works. RabbitMQ allows you to publish and consume
messages to and from a queue. However, you do not publish directly into a queue. You publish into an
exchange and the exchange figures out to which queues the message has to be published. The name
of the exchange is set with the "exchange" key in the associative array. It is also possible
to provide the exchange some extra information, known as routing key, so it knows to which
queues it has to publish its incoming messages. RabbitMQ has a default exchange with an
empty name (i.e. "") the routing key of this exchange is seen as
the name of the queue to which the message has to be published. Since the default queue
that Yothalot uses is named "mapreduce" you can publish to this queue by publishing to the
exchange "" and use routing key "mapreduce".
As said above, you do not have to change these settings in normal circumstances, but in
some cases you may want to. E.g. if you use RabbitMQ for other software as well and this software
happens to use a queue that is named "mapreduce", you may want to change the name in
Yothalot, so there are no conflicts. You can change the name in Yothalot in the config file.
If you change the name of the queue over there, you also have to change the name of the
routing key (note that it is probably better to use a different vhost if you run into this 
problem). Another use case is that you want to publish to multiple queues for debugging
purposes. You can do this by setting up an exchange that publishes to the mapreduce queue as
well as to the queue that you use for debugging. For more information on how to set up
exchanges in RabbitMQ we refer to their [tutorial](https://www.rabbitmq.com/tutorials/tutorial-four-php.html).

## Method create()

The Yothalot::Connection::create() method is used to create a new 
mapreduce job. It gets one parameter: an instance of your own object
in which your mapreduce algorithm is implemented.

For more information on how to create your own mapreduce objects, see our [hello world!](copernica-docs:Yothalot/helloworld "Hello world!") exampel.

```php
/**
 *  Create a new mapreduce job
 *  This method returns a Yothalot\Job object
 *  @var Yothalot\Job
 */
$job = $connection->create(new MyMapReduceAlgorithm());
```
Where `mapReduce` is an instance of your MapReduce class that implements the Yothalot\Mapreduce interface.
The methods returns a [Yothalot\Job](copernica-docs:Yothalot/job "Job") object. This object can be
used to add data to the job, or to fine tune the performance parameters of the job.
For more information about adding data to the job, or setting these
parameters, see the [job article](copernica-docs:Yothalot/job "Job").


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

In normal circumstances you do not have to flush the connection because
all jobs get flushed when the connection is destructed, or when the
PHP script finishes. However, in circumstances where you are about to
start a long running algorithm after creating a job, you may want to
call this flush method to ensure that all jobs are actually sent.
