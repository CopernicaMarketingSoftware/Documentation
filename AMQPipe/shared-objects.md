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

* void initialize(const AMQPipe::app *app, int plugin);
* void process(const AMQPipe::app *app, int plugin, const AMQPipe::Message *message);
* void cleanup(const AMQPipe::app *app, int plugin);

The `initialize()` function is called by AMQPipe right after the application
is started and your plugin is loaded. You can use it for initializing certain 
variables, for example to set up a database connection.

The `process()` function is the function that is going to be called for every
message that is consumed from the message queue.

The last function that your plugin can export is the `cleanup()` function.
This function is called by AMQPipe right before the AMQPipe process stops 
running, and may be used to clean up things.

All functions are optional, if you leave them out of your plugin, AMQPipe
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

If you write your own plugin, you should also use this event loop mechanism if 
you want to perform I/O operations. For example, if you want to run a database
query, you should not do a blocking query, but use the event loop instead to
register a callback function that gets called when the answer from the database 
is available. This allows AMQPipe to run other plugins while your plugin is
waiting for the answer from the database.

It is of course not always possible to use this event loop mechanism, because not
all database API's have a non-blocking nature. When you call a C or C++ function 
from such a database API to send a query to a database, that function automatically 
blocks until the answer from the database comes back. In such setups, it is best 
for your plugin to create a new thread, and do the blocking calls from out of 
this thread. This ensures that your plugin will not bring the main AMQPipe 
thread to a stop.

The main React-CPP event loop can be accessed from the global `AMQPipe::loop` 
variable. This is an instance of the React-CPP `MainLoop` class.

