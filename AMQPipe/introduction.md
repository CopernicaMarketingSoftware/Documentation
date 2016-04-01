# AMQPipe documentation

AMQPipe is a task manager application that reads messages from a 
RabbitMQ message queue, passes the message to a script or program, 
and publishes the result of that scripts or programs back to RabbitMQ. 
The AMQPipe program ensures that your servers are fully optimized, 
because it runs as many scripts or programs in parallel as you have 
configured.


## Configuration file

In the configuration you can specify from which RabbitMQ message queue 
AMQPipe reads its messages, and to which exchange the results are
published back. You can also set the location of the scripts and programs
in the message queue, and other configurable options.

[Read more about the config file](AMQPipe/configuration)


## Script input

In the default setup, AMQPipe passes the raw message that was consumed
from RabbitMQ to your scripts or applications, and publishes the raw
output of the script back to RabbitMQ. If you want your script to also
have access to the meta data of each AMQP message (this is the 
information stored in the envelope) you can instruct AMQPipe to 
feed your scripts with JSON input.

[Read more about the JSON format](AMQPipe/json)


## Script output

The raw output of each script is directly published back to RabbitMQ.
Besides this raw output, AMQPipe also adds meta data to each published
message in the AMQP envelope. In this meta data AMQPipe adds for
example the result code of the script, the output sent to stderr (if
there was such output), and/or the signal that killed the script.

[Read more about the meta result data](AMQPipe/results)


## C++ API

Besides running scripts and applications, AMQPipe comes with a C++
API that allows you to write your own plugins that process messages.

[Read more about C++ API](AMQPipe/shared-objects)
