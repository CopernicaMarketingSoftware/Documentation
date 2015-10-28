# Manually start a Job

You can start a Yothalot job by running the [program](copernica-docs:Yothalot/cpp-program "Program")
that uses your [MapReduce](copernica-docs:Yothalot/cpp-mapreduce "MapReduce algorithm")
or [race](copernica-docs:Yothalot/cpp-race "Race algorithm") algorithm. 
It does not matter where this program is started. However, you have to make sure
that all nodes have access to this program, since each node can start up
a new map or reduce task for which it needs your program. The easiest way
to achieve this is to copy your program to the GlusterFS cluster. After all,
each node of the Yothalot cluster should have access to the GlusterFS
cluster in order to be able to have access to the data. 


## Information about the connection

If you execute your program it will start a Yothalot job. A Yothalot job
needs to have information about the connection it has to use. Therefore,
information about your connection has to be available to your application.
You can provide this information via several command line options, which
are discussed below. Passing the command line options with the information
can be a bit tedious, so there is another way to provide the information
to your program. The program tries to read a configuration file in
`/etc/yothalot/config.txt`. This [configuration file](copernica-docs:Yothalot/configuration)
is the same as the configuration file that the nodes are also using. 
This file has therefore to be available on the system where you start up
the program. If this file is not available and there are no command line
arguments passed, the program tries to set up a connection with standard
settings. Finally you should note that command line options are leading
and thus have priority over the settings in `/etc/yothalot/config.txt`.

The command line options that are available to set up the connection are:

*   --rabbitmq-host
*   --rabbitmq-user
*   --rabbitmq-password
*   --rabbitmq-vhost
*   --rabbitmq-exchange
*   --rabbitmq-mapreduce


### Option rabbbitmq-host
With this option you can set the host name of the RabbitMQ server that 
Yothalot should use for its connection.

### Option rabbitmq-user
With this option you can set the user name of the RabbitMQ server that
Yothalot should use for its connection.

### Option rabbitmq-password
With this option you can set the password of the RabbitMQ server that
Yothalot should use for its connection.

### Option rabbitmq-vhost
With this option you can set the virtual host name of the RabbitMQ server
that Yothalot should use for its connection.

### Option rabbitmq-exchange
With this option you can set the name of the exchange of RabbitMQ that is
used by Yothalot.

### Option rabbitmq-mapreduce
With this option you can set the name of the RabbitMQ queue for the mapreduce
jobs.


## Passing data to your program

Besides information about the connection, the other important aspect of
starting up a job is providing information about the data that needs to
be processed. This information can also be provided via standard input.
You can pass extra arguments to your program and Yothalot will pass these
arguments to the first argument of the `map()` method in your created MapReduce
class.


# Be aware of paths

Yothalot needs to know where files are located on the GlusterFS file system.
Therefore, it is important that you provide the absolute paths to the files.
Providing these paths via the command line is cumbersome and it requires 
that all nodes have the same mounting point. To solve this issue we have created 
a utility class [Yothalot::Path](copernica-docs:Yothalot/cpp-path "Path")
that makes switching between relative and absolute paths easy. By using this
class in your program you can pass relative paths as arguments to your
program and use absolute paths if you want to access a file or other resource.

However, there is one issue that [Yothalot::Path](copernica-docs:Yothalot/cpp-path "Path")
does not solve, the path to your program. You run your program to start up
a job, this job later on starts up your program with a couple of extra arguments
to run your `map()`, `reduce()`, or `write()` methods. In order to do this, 
Yothalot needs to know where your program is located, or a place to look
where your program may be located. You can of course start up your program
using the absolute path, however, this requires again that all nodes have
the same mounting point. Therefore it is easier to store your Yothalot
programs in a directory and add this directory to your PATH environment.
This PATH environment tells where to look for programs. To extent the PATH
you can add:

```bash
PATH=$PATH:/path/to/yothalotPrograms
export PATH
```
at the end of `.bashrc` or `.bash_profile` of the user that runs Yothalot.
To make it immediately effective you type:

```bash
source .bashrc
```
Now yothalot knows where to look for your program.
