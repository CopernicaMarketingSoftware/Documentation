# Publishing results

AMQPipe consumes messages from RabbitMQ - passes them to your script or scripts -
and publishes the results _back to RabbitMQ_. But how does it do this?

In the configuration file, you set the name of an exchange that is used by 
AMQPipe for publishing results. Every time a script completes, it will
publish a message with the generated output to this exchange.


## Routing key

When a script finishes, AMQPipe checks the exit status of the script. If it
exited normally (with exit code 0), the output of the script is collected,
and published to the configured RabbitMQ exchange. AMQPipe will use routing key 
`success` for such results. The following routing keys are used by AMQPipe:

* `success`: successfully completed script (exit code 0)
* `warning`: successfully completed script (exit code 0), that also generated output on stderr
* `error`: script that terminated with an exit code other that 0
* `killed`: script that was terminated by a signal

You can make use of these routing keys to create a topology of message queues.
You can for example create a dedicated queue for errors, or you can decide
to automatically dispose all results that were not succesful, and only
collect the output of succesfully completed scripts.


## Headers

AMQPipe stores meta information about the script in the `headers` property
of the AMQP envelope. This `headers` property is a table, in which the 
following (optional) properties are set:

* server: hostname of the server on which the script ran
* script: pathname to the script
* pid: process ID of the script
* exitcode: optional exit code of the script
* signal: optional signal that killed the script
* errors: optional output to stderr that the script generated
* started: starttime of the script as unix timestamp
* finished: endtime of the script as unix timestamp

If you have a script that processes completed message, you can read out this
header, and utilize this meta information.


## Multiple plugins

If you have configured AMQPipe to run multiple plugins (you can do this by setting
the `plugin` property in the configuration file to a directory instead of a single
file), AMQPipe will pass the output of the first plugin as input to the second
plugin. The result that is published back to RabbitMQ is the output of the last
plugin. If one of the earlier plugins does not terminate correctly (with an exit 
status other than zero), AMQPipe will not call the subsequent plugins, but will
report the result immediately back to RabbitmQ.

In case of a multi-plugin setup, the `started` property holds the time when the
first plugin or script started, and the `finished` property the time when the
last plugin completed. All stderr output of all plugins or scripts in the chain
will be collected, and stored in the `errors` property.
