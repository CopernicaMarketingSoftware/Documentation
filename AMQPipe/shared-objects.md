# C++ shared object files

One of the cool things about AMQPipe is that you can not only instruct it to
run scripts and programs to process AMQP messages, but that you can also write
native C++ plugins. If you assign a *.so shared object file to the `plugin`
variable in the configuration file, or if you include one or more of these *.so
shared object files in the directory with all the plugins, AMQPipe will load
these shared object files on startup, and for every consumed message, it will
call a function in this shared object file to process the message.

Using shared object files instead of scripts has a lot of advantages:

* It is much faster, because no new processes have to be forked off
* No IO operations are necessary - the plugin has direct access to the memory
* No JSON conversion is necessary to convert data before it is passed to a plugin
* Writing a C++ plugin gives you access to many features that are not available in scripts

The downside of C++ plugins is that they are a little more complicated to develop,
and if you mess up, you run the risk of crashing the entire AMQPipe process.


## Callbacks

Inside your plugin, you should export three functions that are automatically
called by AMQPipe:

* void initialize(AMQPipe::app &app, int plugin);
* void process(AMQPipe::app &app, int plugin, AMQPipe::Message &&message);
* void cleanup(AMQPipe::app &app, int plugin);

The `initialize()` function is called by AMQPipe right after the application
is started and your plugin is loaded. You can use it for initializing certain
variables, for example to set up a database connection. The `cleanup()` function
does exactly the opposite, and is called right before AMQPipe shuts down and
may be used to clean up things.

The `process()` function is the real work horse. This function is going to be
called for _every single message that is consumed_ from the message queue.

All functions are optional. If you leave them out of your plugin, AMQPipe
will run the default behavior for them.


## Event loops

AMQPipe is a single-threaded application that is built around a
[React-CPP](http://www.react-cpp.com) event loop. This allows AMQPipe to use
a single thread in which many different file descriptors are active, without ever
making a blocking system call to read or write from such a file descriptor.

AMQPipe often has many different file descriptors open at the same time. It
has for example a TCP socket connection to the RabbitMQ server, and it monitors
filedescriptors to the scripts to collect the stdout and stderr
streams. However, none of the operations on these filedescriptors is a blocking
operation. Instead, the React-CPP event loop is used in which all these
filedescriptors are monitored, and every time that one of these filedescriptors
becomes readable or writable, the event loop notifies the AMQPipe program to
start reading or writing.

If you write your own plugin, you should also use this event loop mechanism
to perform I/O operations. For example, if you want to run a database
query, you should not do a blocking query, but use the event loop instead to
register a callback function that gets called when the answer from the database
is available. This allows AMQPipe to process other messages while your plugin is
waiting for an answer from the database.

It is of course not always possible to use the event loop mechanism. For example,
not all database API's have a non-blocking interface. When you call a C or C++ function
from such a database API to send a query to a database, that function automatically
blocks until the answer from the database comes back. In such setups, it is best
for your plugin to create a new thread, and do the blocking calls from out of
this thread. This ensures that your plugin will not bring the main AMQPipe
thread to a stop.

The main React-CPP event loop can be accessed by calling the `app.loop()`
method.


## The AMQP connection

The AMQP connection is directly exposed to your plugin. This implies that your
plugin can do almost everything with AMQP: it may declare other queues and
exchanges, publish messages to different types of exchanges, it could even start
a new consumer. This makes a C++ plugin much more powerful than a regular script
that is started by AMQPipe, because a regular script can only send output to
stdout, which is automatically published to RabbitMQ. A C++ plugin does not have
to send data to stdout, but has direct access to the AMQP connection to do
whatever it wants.

The AMQP connection that is exposed is the AMQP::Connection object from the
[AMQP-CPP](https://github.com/CopernicaMarketingSoftware/AMQP-CPP) library.
Normally, when you use this library, you need to pass an object to this connection
object that does all the I/O handling, and you need to instruct the connection
object to parse incoming data. However, AMQPipe does this for you, so you can
safely use this AMQP::Connection object to send instructions to RabbitMQ.


## Ownership of control

When AMQPipe calls one of the functions from your plugin (`initialize()`,
`process()` or `cleanup()`) it hands control over to your plugin. From this
moment on, your plugin is in control, and it is up to your plugin to do whatever
it wants to do, and when it is ready, to pass control over to the next plugin, or,
when no more plugins exist, to hand control back to AMQPipe.

If you fail to do this, and do not pass on the control to the next plugin or
back to AMQPipe, resources are lost, and AMQPipe will eventually get stuck.


## Example plugin

Writing plugins is not that hard. The following example plugin is a *dummy*
plugin that creates a database connection using an imaginary simple database API,
and that stores all consumed messages in that database. We use an imaginary
database API so that our code looks as simple as possible. The database API is
blocking, so we create a thread for storing the messages.

````c++
#include <amqpipe.h>
#include <simpledb.h>

/**
 *  Database connection handle
 *  @var void*
 */
static void *dbhandle;

/**
 *  Worker thread to execute code in a different thread
 *  This is a utility class from the REACT-CPP library that starts up a new
 *  thread, and a communication channel to this new thread so that 'std::function'
 *  objects can be passed to the new thread
 *  @var React::Worker
 */
static React::Worker *workerthread;

/**
 *  From outside the thread, we also want to be able to send 'std::function'
 *  objects back to the main thread.
 *  @var React::Worker
 */
static React::Worker *mainthread;


/**
 *  Function that gets called by AMQPipe to initialize our plugin
 *  @param  app     The AMQPipe application
 *  @param  plugin  Plugin number
 */
void initialize(AMQPipe::App &app, int plugin)
{
    // connect to the database (this is a blocking call, but when the AMQPipe
    // program is being initialized, blocking calls are not so bad as the
    // seem
    dbhandle = simpledb_connect("localhost","login","password");

    // create a worker thread, and a communication channel to the main thread
    workerthread = new React::Worker();
    mainthread = new React::Worker(app.loop());

    // we can now hand control over to the next plugin, but because the
    // app.plugin() function throws an out-of-bounds exception when an
    // invalid ID was supplied, we add a try-catch block
    try
    {
        // tell the next plugin to initialize too
        app.plugin(plugin+1).initialize();
    }
    catch (...)
    {
        // there is no next plugin, tell the app to start consuming
        app.start();
    }
}

/**
 *  Function that gets called for every message that is consumed from RabbitMQ
 *  @param  app         The AMQPipe application
 *  @param  plugin      Plugin number
 *  @param  message     The consumed message
 */
void process(AMQPipe::App &app, int plugin, AMQPipe::Message &&message)
{
    // we don't want to run a blocking database query here, so we are going
    // to send the message to the other thread in which we can do the
    // query, copy the message to a pointer, so that we can more easily
    // capture it in a lambda
    auto msg = std::make_shared<AMQPipe::Message>(std::move(message));

    // pass the message to the thread
    worker->execute([msg, plugin]() {

        // this code runs in a different thread, now we can do the blocking
        // call to store the message in the database
        simpledb_query(dbhandle, "insert into messages (body) values (%s)", msg->message());

        // after the message is stored, we should hand control over to the
        // next plugin, but we want to do that from the main thread, so
        // we're going to execute a function in the main thread
        mainthread->execute([msg, plugin]() {

            // we're going to move the message to the next plugin, but the
            // App::plugin() could throw an exception if there is no next plugin
            try
            {
                // pass message to next plugin
                app.plugin(plugin+1).process(message);
            }
            catch (...)
            {
                // no next plugin is available, acknowledge the message
                message.ack();
            }
        });
    });
}

/**
 *  Function that is called when AMQPipe shuts down
 *  @param  app
 *  @param  plugin
 */
void cleanup(AMQPipe::App &app, int plugin)
{
    // because the other thread may still be busy running queries, we just
    // add an instruction to the worker thread to close the db connection
    workerthread->execute([]() {

        // disconnect database
        simpledb_close(dbhandle);

        // go back to the main thread to tell the next plugin to cleanup
        mainthread->execute([app, plugin]() {

            // stop the thread communication channels
            delete workerthread;
            delete mainthread;

            // maybe there is no next plugin
            try
            {
                // tell the next plugin to cleanup
                app.plugin(plugin+1).cleanup();
            }
            catch (...)
            {
                // no next plugin exists, tell the app to stop running
                app.stop();
            }
        });
    });
}
````
