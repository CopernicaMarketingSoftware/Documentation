# Configuration file

All the settings of the AMQPipe process manager can be set in the configuration
file. This file holds the login credentials to connect to RabbitMQ, the max
number of simultaneous processes to run, and the name of the exchange to which
messages are published.

When AMQPipe starts, it will first check for a configuration file name
".amqpipe" in your home directory, and if that does not exist, it will load
the system wide "/etc/amqpipe" configuration file.

All the settings from the configuration file can also be supplied as command
line arguments, with two extra dashes in front of the variable name. For example,
you may use the command line argument `--rabbitmq-host=queue.example.com` to
override the `rabbitmq-host` variable from the config file.


## RabbitMQ connection

AMQPipe connects to a RabbitMQ message broker to load messages. The address
of this message broker should be set using the following variables in the
config file:


```txt
rabbitmq-host:      localhost
rabbitmq-user:      guest
rabbitmq-password:  guest
rabbitmq-vhost:     /
```

Of course, you should replace the hostname and login credentials with settings
that work for you.


## AMQP traffic

The AMQPipe process manager loads AMQP messages from a message queue, runs
your scripts to process that data, and sends the generated data back to
RabbitMQ. Any output that your scripts generate, but also meta information
about your script, will be put back in RabbitMQ. In the configuration file
you can set the name of the queue from which message are loaded, and the name
of the exchange to which the generated messages are published.


``txt
rabbitmq-queue:     myqueue
rabbitmq-exchange:  myexchange
```

The `rabbitmq-queue` variable specifies the queue _from which messages are loaded_,
and the `rabbitmq-exchange` variable holds the name of the exchange _to which
messages are published_. When AMQPipe publishes a message to this exchange, it
uses different routing keys to specify whether a program or script succesfully
completed, or somehow crashed or was killed during the execution. Inside your
RabbitMQ queue topology you can use these routing keys to redirect messages
to specific queues (for example, you can decide to put the output of all
crashed scripts into one queue, and the output of all succesful scripts in a
different queue, or you can for example choose to ignore output from succesful
scripts).

The queue and exchange _are not declared_ by AMQPipe. You must make sure that
the exchange and queue are declared before you start AMQPipe.


## Specify plugin or script

For all messages loaded from RabbitMQ, the AMQPipe process manager runs
your program(s) or script(s) to process them. With the `plugin` variable
you can specify the location of your script(s).


```txt
plugin:           /path/to/your/plugin
```

The path to you plugin should either be:

* An executable file
* A shared object (\*.so) file
* Or a directory

If you specify an executable file, AMQPipe will start that executable for
every message that is consumed from RabbitMQ. Be aware that if you want to
use a script for processing messages (for example, a PHP script), you must
turn that script first into an executable program. You do this by adding
a [shebang](http://en.wikipedia.org/wiki/Shebang_%28Unix%29) to your script,
and by setting the executable bit (you can use the command `chmod 755
yourscript.php` for that):


```php
#!/usr/bin/php
<?php
// read data from stdin
$input = stream_get_contents(STDIN);

// @todo add your own code
?>
```


A special sort of plugins are _shared objects_. A shared object is written
in C++ and is loaded by AMQPipe when the application starts. Unlike
executables, which are started for every consumed messages, a shared
object is only loaded once, and the same function from that shared
object gets called for each consumed message.

The third possible value that can be set is the path to a directory. If
you set the `plugin` variable to a directory, AMQPipe will run all
executable files and all shared objects _from that directory_ for
incoming messages. The plugins are loaded in alphabetical order.


## Input

Normally, AMQPipe sends the complete message body that was loaded from RabbitMQ
directly to 'stdin' of your script. Inside your script you read in this data
from stdin, process it, and generate the output. However, the AMQP protocol has
way more data than just the message body - every message has a full envelope
and header holding all sort of additional properties. However, this meta data
is normally _not_ exposed to your scripts or programs.

If you're also interested in the envelope information, you can set the
input format to JSON. When you do this, AMQPipe will turn the message body and the
message envelope into one big JSON object, and sends this JSON object to
'stdin' of your script. Your script should read in this message body, and parse
the JSON.


``txt
input-format:     json
input-encoding:   base64
```


Currently, two sort of input formats are supported: `message` (which is the default)
to only send the raw message body to your script, and `json` to turn the envelope
and the message in one big JSON array.

Besides the input-format, you can also set the variable `input-encoding`. If you
use RabbitMQ for queueing binary data, it is not possible to turn this data into
valid JSON objects. By setting the `input-encoding` to `base64` you tell AMQPipe
to first convert the message to base64 encoding before it is sent to your script.
The default settings for the `input-encoding` is `none`.


## Max processes

AMQPipe runs multiple processes in parallel to optimize the use of the resources
of the server. You can control the number of processes to run with the
`max-processes` variable. It is best to set this to a number close to the number
of CPU's you have available on your server.


``txt
max-processes:    16
```


## Process limits

To prevent that scripts or programs get out of control, you may set limits on the
time a script takes to complete, or the amount of memory it can consume. When this
limit is reached, AMQPipe automatically kills the program.


```txt
max-virt-memory:  2GB
max-memory:       2GB
max-real-time:    3600
max-cpu-time:     60
```


The `max-*-memory` are set in bytes, but you can use postfixes like 'MB' and 'GB'.
The `max-*-time` variables are set in number of seconds. All variables have a default
value of `unlimited`.

The memory limits set the maximum amount of virtual memory and total memory.

The `max-real-time` controls how many seconds a process may exist before it is killed,
while `max-cpu-time` limits the number of seconds of CPU time that a process
may use.
