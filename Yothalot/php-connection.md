# Yothalot\Connection

With the `Yothalot\Connection` class you can create a connection to the
Yothalot cluster, which is needed to send jobs to this cluster. Internally, the 
`Yothalot\Connection` object connects to your RabbitMQ server, and all jobs
that you create, are sent to this RabbitMQ server.

Because in practice the connection to the Yothalot cluster is essentially
a connection to RabbitMQ, you need to pass the login credentials for the
RabbitMQ server to the constructor. There are only two methods available:

```php
class Yothalot\Connection
{
    public function __construct(array $settings);
    public function flush();
}
```


## Constructor

The constructor takes one parameter, an associative array holding the
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

The following connection parameters are available:

* **host**          - hostname for the RabbitMQ server (default: "localhost")
* **user**          - login for the RabbitMQ server (default "guest")
* **password**      - password for the RabbitMQ server (default "guest")
* **vhost**         - vhost for the RabbitMQ server (default "/")
* **exchange**      - exchange name for publishing jobs (default "")
* **routingkey**    - routingkey for publishing jobs (default "mapreduce")

The keys `"exchange"` and `"routingkey"` are the most advanced settings, and in 
most Yothalot environments the default values will suffice, because a normal 
Yothalot installation loads its jobs from the "mapreduce" queue - which is 
exactly the queue where jobs end up if you publish them to the empty exchange 
with routingkey "mapreduce". However, if you want to have a different RabbitMQ 
setup, you can do so and set the `"exchange"` and `"routingkey"` accordingly.

Because the default values are good for most use cases, you often see that
connections are created by passing only two parameters:

```php
/**
 *  Connection to the Yothalot cluster
 *  @var Yothalot\Connection
 */
$connection = new Yothalot\Connection(array(
    "host"      =>  "rabbit1.example.com",
    "vhost"     =>  "yothalot"
));
```

## Method flush()

Internally, when jobs are created, they are sent in serialized form over the 
AMQP connection to RabbitMQ. If the connection gets congested, internal buffers 
might be created. In normal circumstances, this is not much of a problem, 
because all these buffers get flushed when the connection is destructed, but if 
you want to enforce this flush call, you can explicitly call the flush() method.

```php
// create a yothalot connection
$connection = new Yothalot\Connetion(array(
    "host"      =>  "rabbit1.example.com",
    "vhost"     =>  "yothalot"
));

// create a yothalot job
$job = new Yothalot\Job($connection, new MyMapReduceAlgorithm());

// start the job
$job->start();

// we don't want to wait for the connection destructor to flush buffers
$connection->flush();

// run long-running algorithm
calculate_pi();
```

In normal circumstances you do not have to flush the connection because
all jobs get flushed when the connection is destructed, or when the
PHP script finishes. However, in circumstances where you are about to
start a long running algorithm after creating a job, you may want to
call this flush method to ensure that all jobs are actually sent.
