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
reads this configuration and tells RabbitMQ to create the queues listed in
the config file. This means that you do not have to ensure that the queues exists 
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

All emails that MailerQ sends out are fetched from the outbox queue. This
outbox queue feeds MailerQ with messages to be delivered. The
name of this queue can be set with the "rabbitmq-outbox" setting in the
config file. The default value is "outbox".

The outbox queue is the only queue from which messages are read. All other 
queues are just used to publish messages to. If you want to inject outgoing
email messages directly into RabbitMQ, you should publish your messages to 
this outbox queue so that MailerQ automatically picks them up and delivers
them.


### Queues for incoming messages

All queues other than the outbox queue are used by MailerQ to write data to.
These are for example queues to which the results are written, and queues for
incoming messages. Incoming messages are messages that are being received
by MailerQ, for example on its SMTP port or in its spool directory.

Messages that are received by MailerQ via one of the injection mechanisms are converted 
into JSON and published to message queues. The "rabbitmq-inbox" setting specifies 
the queue to which all these correctly received messages are delivered, and 
"rabbitmq-refused" holds the messages that were delivered to the SMTP port, 
but that were not accepted (e.g., because the client did not correctly authenticate). 

```
rabbitmq-inbox:     inbox
rabbitmq-refused:   refused
rabbitmq-reports:   reports
rabbitmq-local:     local
```

The "inbox" queue is not the only queue to which incoming messages are published, 
it is slightly more complicated than that. When MailerQ receives a message, 
the message is analyzed first. If it contains a delivery report (or
some other kind of report), the message is not placed in the "inbox" queue but
in the "reports" queue instead. If by accident or on purpose a 
non-regular mail comes in on the SMTP port (for example a bounced email or a DMARC
report). Such mails will not be published to the regular inbox queue, but to the 
reports queue where you can further inspect them.

Each incoming mail is also checked to see whether the recipient 
appears on the list of "local" email addresses that can be managed via the
management console. If the recipient appears on this list, the email is accepted 
(even when it came in over an unauthenticated SMTP connection) and is
stored in the "local" message queue.

Messages that do not contain a report and that are also not local (this
normally is the majority of all messages) are sent to the "inbox" queue.
To summerize, incoming messages are published to one of the following four
queues:

* inbox queue: regular incoming messages
* local queue: incoming messages for local recipient addresses
* reports queue: incoming messages that contain a delivery report
* refused queue: incoming messages that were not accepted

The names of all these queues are optional and you may set them all to empty 
strings. If you do not set an explicit "inbox" queue, all incoming messages 
are automatically published to the "outbox" queue. This means that all 
incoming messages are automatically sent out again. Leaving this "inbox" queue 
empty is a very common thing to do, especially if you set up MailerQ as a 
retransmitter.

You can also leave the "local" and "reports" queue settings empty. If you 
do this MailerQ will not explicitly check whether an email was sent to a 
local address and/or whether an incoming message contained a delivery report. 
All incoming messages are treated as regular incoming messages 
and are sent to the inbox queue.

When you configure MailerQ to listen to one or more SMTP ports, and you
also require incoming connections to authenticate, you might receive
messages over unauthenticated connections. These messages are rejected and
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
notifcations). If you explicitly configure a message to trigger such
status notifications on failure, MailerQ will create a status notification 
when the message could not be delivered.

A delivery status notification is just a regular email message that is sent
back to the original envelope over the SMTP protocol. By default MailerQ
adds such notifications to the normal "outbox" queue so that they get
delivered just like all other messages. However, you can include a 
"rabbitmq-dsn" setting in the config file to instruct MailerQ to not publish
these notifications to the outbox queue, but to a different queue instead.

```
rabbitmq-dsn: alternative_dsn_queue
```

The "rabbitmq-dsn" setting is normally used to preprocess
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
Every result object is indeed published to two queues: failures are posted to the 
results queue and the failure queue, while successes are published to the results 
and success queues.

MailerQ only considers a delivery to be a failure when no new delivery attempts 
get scheduled. When a message cannot immediately be delivered, or when it is 
greylisted and will be retried, it is published back to the outbox queue instead,
and not to the results and/or failure queues.

If you want to process the intermediate results (like greylisting reports) too, 
you can use a retry queue by setting the "rabbitmq-retry" config setting. All
deliveries that failed, but that are published back to the outbox queue for
a new attempt, will also be posted to this retry queue.

If you're not interested in the results, or when you're only interested in
specific results (like failures), you can set the result queues to empty
strings. MailerQ will then not publish messages to them.


## The exchange

The "rabbitmq-exchange" variable holds the name of the exchange in RabbitMQ 
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
rabbitmq-durable:       <1 or 0> (default: 1)
rabbitmq-persistent:    <1 or 0> (default: 0)
```

MailerQ creates several queues and exchanges in RabbitMQ. When MailerQ starts, it 
first checks if the queues and exchanges that you have configured in the MailerQ
config file exist. If they do not, MailerQ sends instructions to RabbitMQ to
create the required exchanges and queues. RabbitMQ allows you to mark your queues and 
exchanges to be "durable". This means that the exchange or queue will continue to exist 
even when RabbitMQ is restarted. 

In theory it is a slightly better to enable durable queues (but you probably 
won't notice much of a difference). If you ever have to 
restart RabbitMQ for whatever reason, all queues and exchanges will still exist and 
your scripts will immediately be able to publish messages to these queues. If "rabbitmq-durable"
is turned off, all exchanges and queues will be created once MailerQ starts. If you run a 
script BEFORE you start MailerQ you could possibly lose messages.

The "rabbitmq-persistent" setting toggles whether messages published by MailerQ 
should be cached in main memory or on disk. With the default "0" setting, RabbitMQ 
keeps messages only in main memory and not on disk.  This is 
much, much faster than storing the messages to disk. It does however bring a higher 
risk, because if RabbitMQ crashes, the messages will be lost. Turning on persistency will 
mean your messages are also saved on disk, and can survive a RabbitMQ crash. But at 
the same time it makes things much slower. We therefore recommend leaving the 
"rabbitmq-persistent" option off (set to "0"). 


