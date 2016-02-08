# Setting up RabbitMQ

MailerQ heavenly depends on RabbitMQ for all its queueing. You therefore need a 
running RabbitMQ instance (or better: a cluster of instances) before you can start 
MailerQ. We do not intend to write a full installation guide for RabbitMQ here 
(you better check the [www.rabbitmq.com](https://www.rabbitmq.com) website for that), 
but we do have some tips, tricks and recommendations.


## Make sure you use the right RabbitMQ version

The RabbitMQ version that is installed in the repository of your operating 
system might be outdated. You really need a version that is up-to-date, 
because MailerQ uses a couple of new features that were only recently added to RabbitMQ. 
We recommend downloading and installing RabbitMQ directly from the [www.rabbitmq.com](https://www.rabbitmq.com) 
website instead of using the version that comes with your OS.

[Click here to download and install RabbitMQ](https://www.rabbitmq.com/download.html).

The RabbitMQ installation has to be **at least version 3.3.1+** for MailerQ to be 
able to connect to it.


## Check your login and password

By default, when you install RabbitMQ, it creates the first user with login 
"guest" and password "guest". You can only use this default login if you connect 
to RabbitMQ locally (from localhost). If you connect from a remote host, the "guest/guest" 
login does not work. Therefore, if you install RabbitMQ and MailerQ on different machines, 
you either need to add a user with a different name and password, or you should configure 
RabbitMQ to allow "guest/guest" logins from remote hosts as well.

The `loopback_users` setting in the RabbitMQ config file can be used for that. 
By including this option in the RabbitMQ config file, you tell RabbitMQ that it is ok to 
login with "guest/guest", even if the user comes from a remote location. If you do 
include this setting, please make sure that you also have a firewall running, 
because you do not want everyone from all over the internet to connect to your 
RabbitMQ instance!

[Read more about setting up loopback_users](https://www.rabbitmq.com/access-control.html).


## Management plugin

Just like MailerQ, RabbitMQ comes with a very nice web interface. However, this 
web interface is not enabled by default, and must be explicitly configured. We 
recommend doing this, because it is much easier to control RabbitMQ via a web 
browser, than with command line tools. You can find an article on the RabbitMQ 
website that explains how to do this:

[https://www.rabbitmq.com/management.html](https://www.rabbitmq.com/management.html)


## Don't run out of resources

MailerQ not only uses RabbitMQ to fetch the messages that it is going to send, 
but also publish back the delivery results (if you have this configured). If 
you do not process these delivery results in time, you run the risk that your 
RabbitMQ server runs out of resources (memory or disk space). This can especially 
happen in a production  environment, where many messages are published and consumed.

So, when you run MailerQ in production, do make sure that you have set up cronjobs 
or other scripts that periodically or continuously process the messages from the 
result queues. If you do not do this, your RabbitMQ server will run out of resources fast.

Are you looking for a tool to consume messages from RabbitMQ message queues, and 
to pipe the input to scripts to process these messages? Check our [AMQPipe application](https://www.amqpipe.com).


## Configuring MailerQ to connect with RabbitMQ

MailerQ reads the location and authentication information to connect to RabbitMQ
from its config file. Make sure you include the following variables
in the MailerQ configuration file (/etc/mailerq/config.txt):

```
rabbitmq-host:          <Hostname(s) of your RabbitMQ server(s)>
rabbitmq-user:          <Your RabbitMQ username>
rabbitmq-password:      <Your RabbitMQ password>
rabbitmq-vhost:         <The RabbitMQ environment MailerQ may use>
```

The `rabbitmq-host` variable holds the hostname of your RabbitMQ server. If you have 
a [cluster of RabbitMQ nodes](https://www.rabbitmq.com/clustering.html) they have to 
be separated by a semi-colon (e.g. host1;host2;host3;). Setting up a cluster means you 
will have highly available queues.

[Read more about highly available queues](https://www.rabbitmq.com/ha.html).

The `rabbitmq-user` and `rabbitmq-password` variables hold the username and 
password for your RabbitMQ server, as set in your RabbitMQ configuration. The default 
username is guest/guest, however this only works when connecting to localhost. If you 
run RabbitMQ on a separate server, you will need to set your own username and password,
or configure the RabbitMQ server to allow guest/guest logins from remote hosts (see [RabbitMQ's Access Control Configuration](https://www.rabbitmq.com/access-control.html "RabbitMQ's Access Control Configuration")).

If you have created a specific RabbitMQ vhost environment you can add the specific vhost
to the `rabbitmq-vhost` variable. The default vhost is "/".


## Persistent and durable settings

In the MailerQ configuration you can set queues to be durable and messages to be 
persistent using the following options:

```
rabbitmq-durable:       <1 or 0>
rabbitmq-persistent:    <1 or 0>
```

MailerQ creates several queues and exchanges in RabbitMQ. When MailerQ starts it 
first checks if the queues and exchanges that you have configured in the MailerQ
config file exist. If they do not, MailerQ sends instructions to RabbitMQ to
create the required exchanges and queues. RabbitMQ allows you to mark your queues and 
exchanges to be "durable". This means that the exchange or queue will continue to exist 
even when RabbitMQ is restarted. 

In theory it is a little bit better to enable durable queues. If you ever have to 
restart RabbitMQ for whatever reason, all queues and exchanges will still exist and 
your scripts will immediately be able to publish messages to these queues. If durable 
is turned off all exchanges and queues will be created once MailerQ starts (because 
MailerQ makes sure all queues and exchanges are created once it starts). If you run a 
script BEFORE you start MailerQ you could possibly lose messages. This, by the way, is
mostly a theoretical difference, in practice you probably won't notice much of a 
difference.

Another setting is the "persistent" setting, which is a 'per-message' setting. When a 
message is published to a queue, RabbitMQ saves this message in the fast main memory and 
not on disk. This is much, much faster than storing the messages to disk. Saving 
the message in main memory does bring a higher risk, because if RabbitMQ crashes, messages 
in RabbitMQ will be lost. Turning on persistant will mean your messages are also saved on disk, 
but at the same time it makes things much slower. We therefore recommend leaving the 
`rabbitmq-persistent` option off (on 0). 


## Setting up queues and exchanges

MailerQ uses several queues and exchanges to manage email messages. MailerQ creates 
these queues itself, in the MailerQ configuration you can name these queues. Only the 
MailerQ outbox is mandatory, if you want to disable the other queues they can be simply 
left empty. 

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
```


The `rabbitmq-exchange` variable holds the name of the exchange in RabbitMQ 
that MailerQ uses to publish all messages to. If not explicitly set, MailerQ 
uses an exchange with an empty name. You do not have to create the 
exchange yourself. If the exchange does not exist MailerQ at startup, RabbitMQ 
automatically creates the exchange.


### Sending email

The `rabbitmq-outbox` queue is the queue which hold all messages waiting to be 
picked up and delivered by MailerQ. There are three ways to get messages into this 
outbox queue: You can write a script that uses the AMQP protocol to publish messages
straight into the outbox queue, you can use MailerQ's built-in SMTP server or use 
MailerQ in CLI mode to read messages from standard input. 

[Read our separate article to learn more about sending email](send-email)


### Delivery report queues

The `rabbitmq-results`, `rabbitmq-success` and `rabbitmq-failure` variables hold 
the names of the different RabbitMQ result queues. MailerQ posts a copy of messages
that have successfully been delivered to the success-queue, a copy of messages that 
could not be delivered to the failure-queue, and a copy of all messages, both failed 
and successfully delivered to the results-queue. 

If a message cannot immediately be delivered, or when it it greylisted and
will be retried, it is published back to the outbox queue. MailerQ
will automatically pick it up from this outbox queue at a later time. If you want to
process those intermediate messages too, you can also set the
`rabbitmq-retry` variable. Copies of all failed deliveries that are going to
be retried are posted there (as well as to the 'outbox' queue).

If you're not interested in the results, or when you're only interested in
specific results (like failures), you can leave these values empty.

[Read our separate article about the result queues](result-queue)


### Incoming messages

Besides sending email, MailerQ also opens up SMTP ports to which email can be 
delivered. This allows you to inject email into MailerQ using the SMTP protocol.

Messages that are received on one of the SMTP ports are published to different queues.
The `rabbitmq-inbox` setting specifies the queue to which all correctly received
messages are delivered, and `rabbitmq-refused` holds the messages that were delivered
to the SMTP port, but that were not accepted (for example because the client
did not correctly authenticate). 

The `rabbit-reports` queue is the queue to which all delivery status reports are
submitted. If, by accident or on purpose, a non-regular mail comes in on the
SMTP port (for example a bounced email), it will not be published to the 
regular inbox queue, but to the reports queue instead.

A very common setup is to assign the same queue to the `rabbitmq-outbox` and
the `rabbitmq-inbox` variables. By doing this, you ensure that all messages
that are sent to the SMTP port of MailerQ are automatically forwarded to
the actual recipient.

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

If you do not explicitly set the `mailerq-bounces` variable, it will be set
to the outbox queue, so that DSN's are normally sent.

[Read more about how MailerQ handles bounces](sending-bounces)


## Cluster configuration options

If you run MailerQ on multiple servers, you can set up a cluster of MailerQ instances, 
and connect each one of them to the same RabbitMQ exchange. The different instances
periodically announce their existance on this shared queue, so that they are
all aware of each other, and can forward messages to each other.

If one of the MailerQ instances consumes a message from its outbox, but sees 
that this message can only be sent from a MailerQ server that runs on a different server 
(because only that other server is configured with the appropriate IP address), it will 
automatically forward the message to the outbox queue of the appropriate MailerQ instance.

To let the MailerQ servers communicate with each other, you need
to specify a special cluster exchange on RabbitMQ. All cluster-*
variables below identify an exchange in a RabbitMQ instance.

```
cluster-host:           <Hostname of the RabbitmQ server used for the cluster>
cluster-user:           <RabbitMQ username>
cluster-password:       <RabbitMQ password>
cluster-vhost:          <The RabbitMQ vhost for MailerQ cluster communication>
cluster-exchange:       <Name of the exchange in RabbitMQ used for cluster communication>
```

If not set, the cluster exchange will be created on the same RabbitMQ
instance as the outbox.

