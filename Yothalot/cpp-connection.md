# Yothalot::Connection

With the `Yothalot::Connection` class you can create a connection to the
Yothalot cluster, which is needed to send jobs to this cluster. Internally
the `Yothalot::Connection` object connects to your RabbitMQ server and all jobs
that you create, are sent to this RabbitMQ server.

Because in practice the connection to the Yothalot cluster is essentially
a connection to RabbitMQ, you need to pass the login credentials for the
RabbitMQ server to the constructor. The public interface of the Yothalot::Connection
class is:
```cpp
namespace Yothalot {
class Connection
{
public:
    /**
     *  Constructor
     *  @param  host        the host on which RabbitMQ runs
     *  @param  user        the user name for RabbitMQ
     *  @param  password    the password for RabbitMQ
     *  @param  vhost       the virtual host of RabbitMQ
     *  @param  exchange    the exchange for RabbitMQ
     *  @param  routingkey  the routing key for RabbitMQ
     */
    Connection(const std::string & host         = "localhost", // you can use "127.0.0.1" notation as well
               const std::string & vhost        = "/",
               const std::string & user         = "guest", 
               const std::string & passwrd      = "guest", 
               const std::string & exchange     = "", 
               const std::string & routingkey   = "mapreduce");
    /**
     *  flush the connection
     */
    void flush();
};
/**
 *  close namespace
 */
}
```

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

The constructor takes six parameters, all strings, that provide the connection
the information to connect with the RabbitMQ server.
The following connection parameters are available:

* arg1: **host**        - hostname for the RabbitMQ server (default: "localhost")
* arg2: **vhost**       - vhost for the RabbitMQ server (default "/")
* arg3: **user**        - login for the RabbitMQ server (default "guest")
* arg4: **password**    - password for the RabbitMQ server (default "guest")
* arg5: **exchange**    - exchange name for publishing jobs (default "")
* arg6: **routingkey**  - routingkey for publishing jobs (default "mapreduce")

The keys `"exchange"` and `"routingkey"` are the most advanced settings, and in 
most Yothalot environments the default values will suffice, because a normal 
Yothalot installation loads its jobs from the "mapreduce" queue - which is 
exactly the queue where jobs end up if you publish them to the empty exchange 
with routingkey "mapreduce". However, if you want to have a different RabbitMQ 
setup, you can do so and set the `exchange` and `routingkey` accordingly.

Because the default values are good for most use cases, you often see that
connections are created by passing only two parameters:

```cpp
/**
 *  Connection to the Yothalot cluster
 *  @var Yothalot\Connection
 */
Yothalot::Connection myConnection("rabbit1.example.com", "yothalot");

));
```

## Method flush()

Internally, when jobs are created, they are sent  over the AMQP connection
to RabbitMQ. If the connection gets congested, internal buffers might be 
created. In normal circumstances, this is not much of a problem, because
all these buffers get flushed when the connection is destructed, but if 
you want to enforce this flush call, you can explicitly call the flush()
method.

```cpp
// create a yothalot connection
Yothalot::Connetion myConnection("rabbit1.example.com", "yothalot");

// Create a Yothalot Job
Yothalot::Job job(myConnection, "a.out");

// Start the job
job.start();

// we don't want to wait for the connection destructor to flush buffers
connection.flush();

// run long-running algorithm
calculate_pi();
```

In normal circumstances you do not have to flush the connection because
all jobs get flushed when the connection is destructed, or when the
PHP script finishes. However, in circumstances where you are about to
start a long running algorithm after creating a job, you may want to
call this flush method to ensure that all jobs are actually sent.
