# Configuration file

All the settings of the AMQPipe process manager can be set in the configuration
file. This file holds the login credentials to connect to RabbitMQ, the max
number of simultaneous processes to run, and the names of exchanges to which
messages should be published.

When AMQPipe starts, it will first check for a configuration file name 
".amqpipe" in your home directory, and if that does not exist, it will load
the system wide "/etc/amqpipe" configuration file.

All the settings from the configuration file can also be supplied as command
line arguments, with two extra dashes in front of the variable name (for example,
you may use the command line argument `--rabbitmq-host=queue.example.com` to
override the `rabbitmq-host` variable from the config file.


## RabbitMQ connection

AMQPipe connects to a RabbitMQ message broker to load messages. The address
of this message broker should be set using the following variables in the 
config file:

````txt
rabbitmq-host:      localhost
rabbitmq-user:      guest
rabbitmq-password:  guest
````

Of course, you should replace the hostname and login credentials with settings
that work for you.


## AMQP traffic

The AMQPipe process manager loads AMQP messages from a message queue, runs
your scripts to process that data, and sends the generated data back to
RabbitMQ. Any output that your scripts generate, but also meta information
about your script, will be put back in RabbitMQ. In the configuration file
you can set the name of the queue from which message are loaded, and the name 
of the exchange to which the generated messages are published.

````txt
rabbitmq-queue:     myqueue
rabbitmq-exchange:  myexchange
````

The `rabbitmq-queue` variable specifies the queue _from which messages are loaded_,
and the `rabbitmq-exchange` variable holds the name of the exchange _to which
messages are published`. When AMQPipe publishes a message to this exchange, it
uses different routing keys to specify whether a program or script succesfully 
completed, or somehow crashed or was killed during the execution. Inside your
RabbitMQ queue topology you can use these routing keys to redirect messages 
to specific queues (for example, you can decide to put the output of all
crashed scripts into one queue, and the output of all succesful scripts in a
different queue, or you can for example choose to ignore output from succesful
scripts).


## Input

Normally, AMQPipe sends the complete message body that was loaded from RabbitMQ 
directly to 'stdin' of your script. Inside your script you can read in this data
from stdin, process it, and generate the output. However, the AMQP protocol has
way more data than just the message body - every message has a full envelope 
and header holding all sort of additional properties. If you're also interested
in the information from this envelope, you can set the input format to JSON.

When the input format is set to JSON, AMQPipe will turn the message body and the
message envelope into a 



## Max processes




