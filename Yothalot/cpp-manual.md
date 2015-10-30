# Start a Job Manually 

You can start a Yothalot job by running the [program](copernica-docs:Yothalot/cpp-program "Program")
that uses your [MapReduce](copernica-docs:Yothalot/cpp-mapreduce "MapReduce algorithm")
or [racer](copernica-docs:Yothalot/cpp-race "Racer algorithm") algorithm and add some
command line parameters to it. 

When you start your program manually it does not matter where this program
is started. However, you have to make sure that all nodes have access to this program, since each node can start up
a new map or reduce task for which it needs your program. The easiest way
to achieve this is to copy your program to the GlusterFS cluster. After all,
each node of the Yothalot cluster should have access to the GlusterFS
cluster in order to be able to have access to the data. Some extra information
is given below in the **Be aware of paths** section below.


## Information about the connection

If you execute your program it will start a Yothalot job. A Yothalot job
needs to have information about the connection it has to use. Therefore,
information about your connection has to be available to your application.
You can provide this information via several command line options, which
are discussed below. Passing the command line options with the information
can be a bit tedious, so there is another way to provide the information
to your program. The program tries to read a configuration file in
`/etc/yothalot/config.txt`, the same [configuration file](copernica-docs:Yothalot/configuration)
that the nodes are also using. In order to read this file from your program
it has to be available on the system where you start up the program. If
this file is not available and there are no command line arguments passed,
the program tries to set up a connection with standard settings. These
standard settings are discussed per option below as well. Finally you
should note that command line options are leading and thus have priority 
over the settings in `/etc/yothalot/config.txt`.

The command line options that are available to set up the connection are:

*   --rabbitmq-host
*   --rabbitmq-user
*   --rabbitmq-password
*   --rabbitmq-vhost
*   --rabbitmq-exchange
*   --rabbitmq-mapreduce
*   --wait


### Option rabbbitmq-host
With this option you can set the host name of the RabbitMQ server that 
Yothalot should use for its connection. If the option is not passed to
your program and `/etc/yothalot/config.txt` is not available the host is
set to `localhost`.

### Option rabbitmq-user
With this option you can set the user name of the RabbitMQ server that
Yothalot should use for its connection. If the option is not passed to
your program and `/etc/yothalot/config.txt` is not available it will use
`guest` as user name.

### Option rabbitmq-password
With this option you can set the password of the RabbitMQ server that
Yothalot should use for its connection. If the option is not passed to
your program and `/etc/yothalot/config.txt` is not available it will use
`guest` as password.


### Option rabbitmq-vhost
With this option you can set the virtual host name of the RabbitMQ server
that Yothalot should use for its connection. If the option is not passed to
your program and `/etc/yothalot/config.txt` is not available the local host
is set to `log`.

### Option rabbitmq-exchange
With this option you can set the name of the exchange of RabbitMQ that is
used by Yothalot. If the option is not passed to your program and
`/etc/yothalot/config.txt` the exchange is empty.

### Option rabbitmq-mapreduce
With this option you can set the name of the RabbitMQ queue for the mapreduce
jobs. If the option is not passed to your program and `/etc/yothalot/config.txt` 
is not available it will set the mapreduce queue to `mapreduce`.

### Option wait
Option wait is not really an option to control the connection. The option
tells the program you have started if it should wait for the Yothalot
job to be finished or not in order to terminate. You can e.g. use it to
see when a job is finished. In the case of a Yothalot::Racer job, the
returned output, if any, will be shown as a JSON object. This output can
be passed to file so you can use it later.


## Passing data to your program

Besides information about the connection, the other important aspect of
starting up a job is providing information about the data that needs to
be processed. This information can also be provided via standard input.
You can pass extra arguments to your program and Yothalot will pass these
arguments to the first argument of the `map()` method in your created MapReduce
class.


## Be aware of paths

Yothalot needs to know where files and other resources are located on the GlusterFS file system.
Therefore, it is important that you provide the absolute paths to these resources.
Providing these paths via the command line is cumbersome and it requires 
that all nodes have the same mounting point. To solve this issue we have created 
a utility class [Yothalot::Path](copernica-docs:Yothalot/cpp-path "Path")
that makes switching between relative and absolute paths easy. By using this
class in your program you can pass relative paths as arguments to your
program and use absolute paths if you want to access a file or other resource.

Yet, there is one issue that [Yothalot::Path](copernica-docs:Yothalot/cpp-path "Path")
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
