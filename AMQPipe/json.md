# JSON specification

If you set the `input-format` variable in the config file to `json`, your 
script(s) will receive JSON input from AMQPipe instead of just the message
bodies. Besides the message body, this JSON object also holds additional 
information about the consumed message. The format of this input is as follows:


````javascript
{
    "exchange":         "the exchange to which the message was original published",
    "routing-key":      "the routing key that was used for publishing",
    "expiration":       "string value",
    "reply-to":         "string value",
    "correlation-id":   "string value",
    "priority":         0,
    "delivery-mode":    0,
    "headers":          {},
    "content-encoding": "string value",
    "content-type":     "string value",
    "cluster-id":       "string value",
    "app-id":           "string value",
    "user-id":          "string value",
    "type-name":        "string value",
    "timestamp":        0,
    "message-id":       "string value",
    "message":          "the full message body loaded from RabbitMQ"
}
````


Most of the above properties are optional, and are only included in the
JSON if they were also set in the header frame of the consumed AMQP message. 
The `message` property holds the actual message body, and the `exchange` 
and `routing-key` properties hold the name of the exchange and the routing 
key that were used when the message was originally published to RabbitMQ. All
the other properties come from the AMQP envelope, and are only set
if the application that originally published the message, had also set 
them in the envelope (and most application don't do that).

The AMQP protocol specifies all of the above properties, but RabbitMQ
ignores most of them, and does not assign a semantic meaning to them.
Applications are free to use most of the properties for whatever purpose 
they like. Only if the publishing application included the properties 
when the message was published, you will find them in the JSON input
of your script.

The `headers` property holds a table with additional properties. This
property _is_ used by AMQPipe.


## Property `headers`

When AMQPipe publishes the output of a script or program back to RabbitMQ, 
it uses the 'headers' property in the envelope to store meta information 
about the completed script. In this header, you can find the following 
information:

* The hostname of the server on which the script ran
* The name of the script
* The process ID (pid) of the script
* The script exit code (0 for success)
* The signal number that killed the script (if it was killed by a signal)
* Any output that the script sent to stderr
* The time when the script started
* The time when the script exited

When you're writing a script that processes messages that were published
by a different AMQPipe instance, you will typically see JSON messages
like this one:


````javascript
{
    "exchange":     "result-exchange",
    "routing-key":  "error",
    "headers": {
        "server":   "my.taskserver.com",
        "script":   "/path/to/myscript.php",
        "pid":      17211,
        "exitcode": 787,
        "signal":   11,
        "errors":   "PHP Notice: undefined variable $x",
        "started":  "2015-05-01 13:12:55",
        "finished": "2015-05-01 13:12:57",
    },
    "message":  "This is the script output"
}
````


Some of the fields are optional. For example, if the program was not killed
by a signal, the `signal` property will not be included, and if no stderr
output was created, the `errors` property will not be available. The
`exitcode` property is only included for programs that terminated normally
(thus not by a signal). The `exitcode` and `signal` properties will never
both be set.

Because the AMQP protocol only allows a limited size for the envelope, the 
output that was sent to stderr is sometimes truncated.

