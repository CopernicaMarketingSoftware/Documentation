# RabbitMQ configuration

All config file settings that start with rabbitmq-* control how MailerQ
interacts with RabbitMQ. Amongst these settings are the address of the
RabbitMQ server, the queue from which outgoing messages are read, and the
queues to which incoming messages are delivered.


## RabbitMQ address

MailerQ reads the location and authentication information to connect to 
RabbitMQ from its config file. 

```
rabbitmq-address: amqp://login:passwd@hostname/vhost
```

The format of the address is obvious: the "login" and "passwd" hold
the username and password of the RabbitMQ server, the hostname is the name
of the server on which RabbitMQ runs, and the optional vhost is the name
of the "virtual host" inside RabbitMQ that you have reserved for all MailerQ
related data. 

If you leave the "rabbitmq-setting" setting empty, MailerQ uses the "amqp://guest:guest@localhost/"
default value. This default only works if you run RabbitMQ and MailerQ on
the same server, and when you do not use a special vhost. 

If you have a [cluster of RabbitMQ nodes](https://www.rabbitmq.com/clustering.html), 
you can use semicolons to seperate the hostnames: amqp://guest:guest@host1;host2;host3/vhost.
Running a cluster allows you to use [highly available queues](https://www.rabbitmq.com/ha.html).


## RabbitMQ queues

MailerQ uses several queues to manage email messages. All mails that
flow through MailerQ are picked up from and published back to specific queues
in RabbitMQ. The names of these queues are set in the config file. On startup, MailerQ 
reads this configuration and tells RabbitMQ to create the listed queues. This 
means that you do not have to ensure that the queues exists 
before you start up MailerQ: the queues are automatically created.

```
rabbitmq-outbox:        <Name of your outbox message queue>
rabbitmq-inbox:         <Name of your inbox queue>
rabbitmq-reports:       <Name of your reports queue>
rabbitmq-local:         <Name of your local queue>
rabbitmq-refused:       <Name of your refused queue>
rabbitmq-dsn:           <Name of your delivery status notification queue>
rabbitmq-results:       <Name of your result queue>
rabbitmq-success:       <Name of your success queue>
rabbitmq-failure:       <Name of your failure queue>
rabbitmq-retry:         <Name of your retry queue>
```

The messages published to these queues are always in JSON format, and
hold the meta information for each delivery: the envelope, recipient and other
message specific settings.


### Queue for outgoing messages

All emails that MailerQ is going to send out are fetched from the outbox queue. 
The outbox queue feeds MailerQ with messages to be delivered. The
name of this queue can be set with the "rabbitmq-outbox" setting in the
config file. The default value is "outbox".

The outbox queue is the only queue from which messages are read. If you want 
to inject outgoing email messages directly into RabbitMQ, you should 
therefore publish your messages to this outbox queue so that MailerQ 
automatically picks them up and delivers them.

Watch out if you run multiple MailerQ instances. If the individual instances
all send out mail from different IP addresses (because they run on different
servers), it is better to use different outbox queues. Every MailerQ instance
consumes messages from its own queue. You must then also ensure that you publish
messages to the right queue to have them being sent from the right server.
But don't worry for mistakes. If you've set up a [MailerQ cluster](cluster),
messages are automatically moved to the correct queue if they end up in a
wrong outbox queue.


### Queues for incoming messages

The queues other than the outbox queue are used by MailerQ to write data to.
These are for example queues to which the results are written, and queues that
are used for incoming messages. Incoming messages for example come from
the MailerQ SMTP port or are the messages that are dropped in the spool directory.

Messages that are received by MailerQ via one of the injection mechanisms are 
converted into JSON format and published to message queues. The "rabbitmq-inbox" 
setting specifies the default queue for these incoming messages, but other 
queues are used as well.

```
rabbitmq-inbox:     inbox
rabbitmq-local:     local
rabbitmq-reports:   reports
rabbitmq-refused:   refused
```

If you do not set an explicit "inbox" queue, all incoming messages 
are automatically published to the "outbox" queue. This means that all 
incoming messages are automatically sent out again. Leaving this "inbox" queue 
empty is a very common thing to do, especially if you set up MailerQ as a 
retransmitter.

The "refused", "reports" and "local" settings are optional too. If you leave
them empty, MailerQ simply publishes all incoming message to the inbox queue
(or to the outbox queue if no inbox was set). But if you do configure one or 
more of these queues, MailerQ analyzes each incoming
message to see if it should be published to the normal inbox, or to
one of the other queues instead.

MailerQ internally keeps a list of "local" email addresses. This list can be
edited via the management console. If you have configured a "local" message 
queue, and a mail comes in for an address that is on that list, the message 
will not be dropped in a the "inbox" queue, but in the "local" queue instead.

If the local email turns out to be not a normal type of email, but some kind 
of delivery report (or some other kind of report), the message is not even placed 
in the "inbox" queue but goes to the "reports" queue instead. To summarize:

* inbox queue: regular incoming messages
* local queue: incoming messages for local recipient addresses
* reports queue: incoming messages for local recipients that contain a delivery report
* refused queue: incoming messages that were not accepted

The last queue to mention is the "refused" queue. It is used for message that
were not accepted. For example, if you configure MailerQ to listen to one or 
more SMTP ports, and you require incoming connections to authenticate, you might 
receive messages over unauthenticated connections. These messages are rejected and
do not end up in the "inbox" queue. However, for debugging and/or 
security reasons you might still want to find out who is flooding your SMTP 
server. By assigning a value to "rabbitmq-refused", you instruct MailerQ to send 
rejected messages to a special queue where you can inspect these 
refused messages. The default setting for "rabbitmq-refused" is empty,
so that refused messages are not collected.

Be careful here: the queue with refused messages does not automatically
get emptied, and can fill up fast in case of an attack. MailerQ only 
adds messages to it, and it is up to you to periodically check the
contents of the queue and empty it, or to set a max length and/or max
age for messages in the queue (you can use RabbitMQ's web based 
management console to set such limits).


### Delivery status notifications

In the above sections we described the queue from which MailerQ
reads its outgoing messages (the outbox queue) and the queues to which
all incoming messages are published. However, besides handling incoming and 
outgoing messages, MailerQ can also construct and send email messages all 
by itself: delivery status notifications (DSN).

A delivery status notification is an email message that is sent back to
the original envelope address when a delivery fails (technically, it is 
also possible to send such notifications on successful delivery and when
a message gets delayed, but in practice it is mostly used for failure 
notifcations). By default MailerQ does not send such notifications because 
MailerQ uses result queues and JSON to report back the delivery results.
However, if you add a "dsn" property to the JSON of an outgoing message, 
you can instruct MailerQ to send delivery status notifications too.

Technically, a delivery status notification is a regular email, and MailerQ
simply posts a message to the outbox queue when such an email has to be
delivered. If you want to use a different queue than the outbox queue, you
can use the "rabbitmq-dsn" property.

```
rabbitmq-dsn: alternative_dsn_queue
```

The "rabbitmq-dsn" setting is normally used if you want to preprocess
delivery reports before they are sent. By setting the "rabbitmq-dsn" value
to a custom queue, a custom script can pick up the notifications, preprocess
them and put them in the "outbox" queue. 


### Result queues

When a message gets delivered or when a delivery fails, the delivery result
is published to one or more of the result queues, to allow external monitor 
scripts to keep an eye on the deliveries.

```
rabbitmq-results: completed_deliveries
rabbitmq-success: successful_deliveries
rabbitmq-failure: failed_deliveries
rabbitmq-retry: delayed_deliveries
```

The "rabbitmq-results", "rabbitmq-success" and "rabbitmq-failure" settings hold 
the names of the RabbitMQ result queues. MailerQ posts a JSON result object for
every successful delivery to the success queue, and for all failed deliveries to 
the failure queue. This same result object is also sent to the results queue. 
Every result object is thus published to two queues: failures are posted to the 
results queue and the failure queue, while successes are published to the results 
and success queues.

MailerQ only considers a delivery to be a failure when no new delivery attempts 
get scheduled. When a message cannot immediately be delivered, or when it is 
greylisted and will be retried, it is published back to the outbox queue,
and not to the results and/or failure queues.

If you want to process the intermediate results (like greylisting reports) too, 
you can use a retry queue by setting the "rabbitmq-retry" config setting. All
deliveries that failed, but that are published back to the outbox, are also 
posted to this retry queue.

If you're not interested in the results, or when you're only interested in
specific results (like failures), you can set one or more of the result queues 
to empty strings. MailerQ will then not publish messages to them.


## The exchange

The "rabbitmq-exchange" variable holds the name of the RabbitMQ exchange  
that MailerQ uses to publish all messages to. If not explicitly set, MailerQ 
uses the default exchange with an empty name. For most setups, this empty default
exchange is good enough, because messages end up in the right queue anyway.

However, if you want to use a custom exchange, the "rabbitmq-exchange"
setting allows you to do so. The exchange that you assign to this variable
does not have to be created by yourself, because MailerQ automatically creates it 
on startup.

```
rabbitmq-exchange: your_exchange
```

To understand why you would need a custom exchange, you need a litte more
insight knowledge of RabbitMQ. Although we constantly write that MailerQ publishes 
message to specific queues, this is not exactly how RabbitMQ internally works. RabbitMQ 
does not allow messages to be published directly to message queues. Instead, 
it wants messages to be published to an exchange. The exchange then forwards the 
messages to zero or more queues that are bound to it based on the routing key associated with the 
message. Therefore, when we write that "MailerQ publishes a message to the inbox queue", 
we actually mean that "MailerQ publishes a message to the exchange, and uses *the name 
of the inbox queue* as the routing key so that the message *ends up in the inbox queue*." 
In the end, the result is the same.

To be fair, this exchange-routingkey-queue architecture can be pretty powerful. It 
for example allows you to create your own (temporary) queue and bind it to 
the same exchange as the outbox queue so that a *copy* of each message that goes
to the outbox queue ends up in your private queue too. This allows you to monitor 
exactly what is passing through RabbitMQ, without interfering with the message flow. 
Great for monitoring and debugging!

To use the flexibility that RabbitMQ offers, you can use the "rabbitmq-exchange"
setting to assign a custom exchange. If you leave the setting empty however,
the messages still end up in the right queues.



## Persistent and durable settings

In the MailerQ configuration you can specify whether you want queues to be 
durable and whether you want messages to be persistent using the following 
two options:

```
rabbitmq-durable:       true    (default: true)
rabbitmq-persistent:    false   (default: false)
```

MailerQ creates several queues and exchanges in RabbitMQ. When MailerQ starts, it 
first checks if the queues and exchanges that you have configured in the MailerQ
config file exist. If they do not, MailerQ sends instructions to RabbitMQ to
create the required exchanges and queues. RabbitMQ allows you to mark your queues and 
exchanges to be "durable". This means that the exchange or queue will continue to exist 
even when RabbitMQ is restarted. In theory it is a slightly better to enable 
durable queues (but you probably won't notice much of a difference because
the queues and exchanges are automatically re-created on startup anyway).

The "rabbitmq-persistent" setting toggles whether messages published to RabbitMQ 
should be cached in main memory or on disk. With the default "false" setting, 
RabbitMQ keeps messages only in main memory and not on disk.  This is 
much, much faster than storing the messages to disk. It does however bring a higher 
risk, because if RabbitMQ crashes, the messages will be lost. Turning on persistency will 
mean your messages are also saved to disk, and can survive a RabbitMQ crash. But at 
the same time it makes things much slower. We therefore recommend leaving the 
"rabbitmq-persistent" option off (set to "false"). 


## Multiple threads

MailerQ opens a number of different connections to RabbitMQ, and each connection
runs in its own thread. There are seperate threads for consuming from the 
inbox queue and threads for publishing messages to the result queues and/or
back to the outbox queue.

You can specify in the config file that you want to start up multiple consumer
and or multiple publisher threads. If you notice that the consumer of publisher
threads are CPU bound, you can configure MailerQ to start up more queues.

```
rabbitmq-consumers:     1 (default: 1)
rabbitmq-publishers:    1 (default: 1)
```

By adding the "rabbitmq-consumers" and "rabbitmq-publishers" variables to the 
config file, you instruct MailerQ to start up more consumer and/or publisher
threads.


## Compression

The data stream between RabbitMQ and MailerQ can be large. It can even be that
big that it takes up a significant portion of the capacity of your internal
network. To reduce the load on the network, MailerQ supports gzip compression.

MailerQ normally expects messages from RabbitMQ to be JSON encoded. However,
if the AMQP envelope in which the message is wrapped has the "content-encoding" 
property set to "gzip", MailerQ expects the message to be a gzip compressed 
JSON object instead. It first decompresses the message, then it parses the JSON.
This means that you can publish both normal JSON encoded messages to RabbitMQ,
as well as gzip compressed data. If you compress your input JSON, you do have
to make sure that you also set the "content-encoding" header in the AMQP 
envelope that is published to RabbitMQ.

MailerQ not only consumes messages from RabbitMQ, it also publishes messages
back to it, like the results that are sent to the result queues or the 
retries that are published back to the outbox queue. By default, MailerQ only
sends pure JSON to RabbitMQ, without compressing it, even if you used
compression yourself when you published the message to the outbox. If you want
MailerQ to compress the data too, you can use a special setting in the config 
file.

```
rabbitmq-encoding:      gzip
```

The above setting only affects how MailerQ *publishes* messages to RabbitMQ.
Messages consumed from RabbitMQ can still both be compressed or not, because 
MailerQ always inspects the "content-encoding" header from the AMQP envelope.

