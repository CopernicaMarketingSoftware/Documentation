# Configuring MailerQ to connect with RabbitMQ

MailerQ reads the location and authentication information to connect to RabbitMQ
from its config file. Make sure you include the following variables
in the MailerQ configuration file (`/etc/mailerq/config.txt`):

```
rabbitmq-address:          <URL of RabbitMQ server>
```

The `rabbitmq-address` variable holds the URL of your RabbitMQ server, in 
`amqp://username:password@hostname/vhost` format. 

If you have 
a [cluster of RabbitMQ nodes](https://www.rabbitmq.com/clustering.html) they have to 
be separated by a semi-colon (e.g. host1;host2;host3;). Setting up a cluster means you 
will have highly available queues.

[Read more about highly available queues](https://www.rabbitmq.com/ha.html)

The `username` and `password` fields inside the `rabbitmq-address` variable hold
the username and password of the RabbitMQ server, as set in the RabbitMQ
configuration. The default is `guest/guest`, which only works when connecting to
localhost. If you run RabbitMQ on a separate server, you will need to set your
own username and password, or configure the RabbitMQ server to allow `guest/guest`
logins from remote hosts (see [RabbitMQ's Access Control Configuration](https://www.rabbitmq.com/access-control.html "RabbitMQ's Access Control Configuration")).

The `vhost` field is, by default, empty. If you created a specific RabbitMQ vhost
environment, you can set this.

## Persistent and durable settings

In the MailerQ configuration you can set queues to be durable and messages to be 
persistent using the following options:

```
rabbitmq-durable:       <1 or 0>
rabbitmq-persistent:    <1 or 0>
```

MailerQ creates several queues and exchanges in RabbitMQ. When MailerQ starts, it 
first checks if the queues and exchanges that you have configured in the MailerQ
config file exist. If they do not, MailerQ sends instructions to RabbitMQ to
create the required exchanges and queues. RabbitMQ allows you to mark your queues and 
exchanges to be "durable". This means that the exchange or queue will continue to exist 
even when RabbitMQ is restarted. 

In theory it is a little bit better to enable durable queues (but you probably 
won't notice much of a difference). If you ever have to 
restart RabbitMQ for whatever reason, all queues and exchanges will still exist and 
your scripts will immediately be able to publish messages to these queues. If `rabbitmq-durable`
is turned off, all exchanges and queues will be created once MailerQ starts. If you run a 
script BEFORE you start MailerQ you could possibly lose messages.

The `rabbitmq-persistent` setting toggles whether messages should be cached in 
main memory or disk. With the default `0` setting, when a message is published 
to a queue, RabbitMQ saves this message in main memory and not on disk.  This is 
much, much faster than storing the messages to disk. Saving the message in main 
memory however does bring a higher risk, because if RabbitMQ crashes, messages 
in RabbitMQ will be lost. Turning on persistent will mean your messages are also 
saved on disk, but at the same time it makes things much slower. We therefore 
recommend leaving the `rabbitmq-persistent` option off (on 0). 

## Setting up queues and exchanges

MailerQ uses several queues and exchanges to manage email messages. MailerQ creates 
these queues itself, in the MailerQ configuration you can name these queues. Only the 
MailerQ outbox is mandatory; if you want to disable the other queues, the field behind them 
 can be simply be left empty. 

```
rabbitmq-exchange:      <Name of your rabbitmq exchange> 
rabbitmq-outbox:        <Name of your outbox message queue>
rabbitmq-results:       <Name of your result queue>
rabbitmq-success:       <Name of your success queue>
rabbitmq-failure:       <Name of your failure queue>
rabbitmq-retry:         <Name of your retry queue>
rabbitmq-dsn:           <Name of your delivery status notification queue>
rabbitmq-inbox:         <Name of your inbox queue>
rabbitmq-refused:       <Name of your refused queue>
rabbitmq-reports:       <Name of your reports queue>
rabbitmq-local:         <Name of your local queue>
```

The `rabbitmq-exchange` variable holds the name of the exchange in RabbitMQ 
that MailerQ uses to publish all messages to. If not explicitly set, MailerQ 
uses an exchange with an empty name. You do not have to create the exchange yourself. 
If the exchange does not exist at startup, RabbitMQ automatically creates 
the exchange.

### Sending email

The `rabbitmq-outbox` queue is the queue which hold all messages waiting to be 
picked up and delivered by MailerQ. There are four ways to get messages into this 
outbox queue; you can:
*   drop files into MailerQ's spool directory; 
*   use MailerQ as a Command Line utility to read messages from standard input;
*   send files to the built-in MailerQ SMTP server;
*   send JSON-encoded email directly to RabbitMQ.

[Read our separate article to learn more about sending email](send-email).

### Delivery report queues

The `rabbitmq-results`, `rabbitmq-success` and `rabbitmq-failure` variables hold 
the names of the different RabbitMQ result queues. MailerQ posts a copy of messages
that have successfully been delivered to the success queue, a copy of messages that 
could not be delivered to the failure queue, and a copy of all messages, both failed 
and successfully delivered to the results queue. 

If a message cannot immediately be delivered, or when it it greylisted and will 
be retried, it is published back to the outbox queue. MailerQ will automatically 
pick it up from this outbox queue at a later time. If you want to process those 
intermediate messages too, you can also use the retry queue by setting the 
`rabbitmq-retry` variable. Copies of all failed deliveries that are going to be 
retried are posted there (as well as to the outbox queue).

If you're not interested in the results, or when you're only interested in
specific results (like failures), you can leave these values empty.

[Read our separate article about the result queues](result-queue)

### Incoming messages

Besides sending email, MailerQ also opens up SMTP ports to which email can be 
delivered. This allows you to inject email into MailerQ using the SMTP protocol.

Messages that are received on one of the SMTP ports are published to different queues.
The `rabbitmq-inbox` setting specifies the queue to which all correctly received
messages are delivered, and `rabbitmq-refused` holds the messages that were delivered
to the SMTP port, but that were not accepted (e.g., because the client
did not correctly authenticate). 

The `rabbitmq-reports` variable holds the queue to which all delivery status reports are
submitted. If, by accident or on purpose, a non-regular mail comes in on the
SMTP port (for example a bounced email), it will not be published to the 
regular inbox queue, but to the reports queue instead.

A very common setup is to assign the same queue to the `rabbitmq-outbox` and
the `rabbitmq-inbox` variables. By doing this, you ensure that all messages
that are sent to the SMTP port of MailerQ are automatically forwarded to
the actual recipient.

Another queue that deals with incoming messages is the `rabbitmq-local` queue. 
Normally when you send an email to MailerQ using SMTP, you will first have to 
authenticate before MailerQ accepts the message. However, sometimes you will 
want emails sent to certain (local) email addresses to be accepted without 
authenticationbefore placing them into the `rabbitmq-local` queue. These can be 
set in the [MailerQ management console](management-console).

When MailerQ recognizes these messages, it will move them to the `rabbitmq-local` 
queue, which you can specify in the configuration file. 

[Read more about incoming messages](incoming-messages)

### Bounces & RabbitMQ

MailerQ can send a Delivery Status Notification (DSN) when it is unable to 
deliver email. These bounce messages are regular MIME messages that are published 
to the outbox queue so that they are sent using the normal mail algorithm. If you 
want to publish these DSN messages to a different queue (for example because you 
want to send them using a seperate MailerQ instance, or because you want to preprocess
these messages before you move them to the outbox queue), you can set the
`rabbitmq-dsn` variable. It holds the name of the queue to which bounces are
published.

[Read more about how MailerQ handles bounces](sending-bounces)

## Cluster configuration options

If you run MailerQ on multiple servers, you can set up a cluster of MailerQ instances, 
and connect each one of them to the same RabbitMQ exchange. The different instances
periodically announce their existence on this shared queue, so that they are
all aware of each other, and can forward messages to each other.

If you do set up a cluster of MailerQ instances, it is important that each of the
MailerQ instances connects _to the same RabbitMQ_ instance for the cluster
communication. It is perfectly valid to use different RabbitMQ instances
for queueing emails and results, but the cluster exchange must
be located on the same RabbitMQ instance. That's why the config file allows you
to set both a `rabbitmq-address` variable with the address of the RabbitMQ server 
from which the emails are loaded, and a `cluster-address` variable to set the 
RabbitMQ instance that is used by all MailerQ instances for their internal 
communication.

One of the advantages of setting up a cluster is that messages unable to
be processed by one MailerQ instance are automatically handed over to another.
If one of the MailerQ instances consumes a message from its outbox, but sees 
that this message can only be sent from a MailerQ instance running on a 
different server (because only that other server is configured with the 
appropriate IP address), it will automatically forward the message to the outbox 
queue of the appropriate MailerQ instance.

To let the MailerQ servers communicate with each other, you need to specify a 
special cluster exchange on RabbitMQ. The `cluster-*` variables below identify 
an exchange in a RabbitMQ instance.

```
cluster-address:        <URL of the RabbitmQ server used for the cluster>
cluster-exchange:       <Name of the exchange in RabbitMQ used for cluster communication>
```

