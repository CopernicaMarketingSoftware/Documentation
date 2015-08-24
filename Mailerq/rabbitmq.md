# RabbitMQ configuration options

MailerQ needs access to a working [RabbitMQ message queue](http://www.rabbitmq.com "RabbitMQ website"), 
an application built to effectively handle messages and message queues. MailerQ uses RabbitMQ to 
handle the queuing of its email messages. The RabbitMQ installation does not have to be on the 
same server as the MailerQ installation, however the standard RabbitMQ login settings (guest/guest) only 
works when connecting to localhost. 

The address and login data to access RabbitMQ can be set in the RabbitMQ configuration options. Make 
sure these settings correspond with those in your [RabbiMQ configuration](http://www.rabbitmq.com/configure.html "RabbitMQ configuration documentation"). 

The RabbitMQ installation has to be **at least version 3.3.1+** for MailerQ to be able to connect to it. Keep this in mind 
when installting RabbitMQ from older repositories (e.g. Ubuntu 12.02).

Read our [tips & tricks article for more information](copernica-docs:MailerQ/rabbitmq-tips-and-tricks "RabbitMQ tips and tricks")

In the MailerQ configuration file, you can set the following options for RabbitMQ: 

```
rabbitmq-host:          <Hostname(s) of your RabbitMQ server(s)>
rabbitmq-user:          <Your RabbitMQ username>
rabbitmq-password:      <Your RabbitMQ password>
rabbitmq-vhost:         <The RabbitMQ environment MailerQ may use>
rabbitmq-exchange:      <Name of your rabbitmq exchange> 
rabbitmq-outbox:        <Name of your outbox message queue>
rabbitmq-results:       <Name of your result queue>
rabbitmq-success:       <Name of your success queue>
rabbitmq-failure:       <Name of your failure queue>
rabbitmq-bounces:       <Name of your bounces queue>
rabbitmq-reports:       <Name of your reports queue>
rabbitmq-retry:         <Name of your retry queue>
rabbitmq-inbox:         <Name of your inbox queue>
rabbitmq-persistent:    <1 or 0>
rabbitmq-durable:       <1 or 0>
```

The `rabbitmq-host` variable holds the hostname of your RabbitMQ server. If you have 
a cluster of RabbitMQ nodes they have to be separated by a semi-colon (e.g. host1;host2;host3;).

The `rabbitmq-user` and `rabbitmq-password` variables need to hold the username and 
password for your RabbitMQ server, as set in your RabbitMQ configuration. The default 
username is guest/guest, however this only works when connecting to localhost. If you 
run RabbitMQ on a separate server, you will need to set your own username and password. 

If you have a specific RabbitMQ vhost environment MailerQ should use you can specify 
the RabbitMQ vhost by adding the specific vhost to the `rabbitmq-vhost` variable. 

The `rabbitmq-exchange` variable holds the name of the exchange in RabbitMQ 
that MailerQ uses to publish all messages to. If not explicitly set, MailerQ 
uses an exchange with the name "mailerq". An exchange is a very simple thing. On 
one side it receives messages from producers and the other side it pushes them to queues. 
The exchange must know exactly what to do with a message it receives. 

The `rabbitmq-outbox` variable holds name of your outbox message queue. All 
outgoing messages are loaded from here. If the outbox queue does not exist, 
MailerQ will create one automatically.

A special queue is the 'rabbitmq-inbox' queue. MailerQ can open up a
SMTP port to accept incoming messages. All messages received on the port are
automatically published to the inbox queue, in the same JSON format used in
the outbox queue. If you want all messages accepted on the SMTP port to 
automatically be forwarded to the specified recipient, you should set the 
inbox queue to the same queue as the outbox queue. You can also choose to 
specify a different inbox queue if you like to handle the incoming messages 
differently.

The `rabbitmq-results`, `rabbitmq-success` and `rabbitmq-failure` variables hold 
the names of the different RabbitMQ 'result'-queues. MailerQ posts a copy of messages 
that have been successfully delivered to the success-queue, a copy of messages that 
 could not be delivered to the failure-queue, and a copy of all messages, both failed 
 and successfully delivered to the results-queue. 

If a message can not immediately be delivered, or when it it greylisted and
will be retried, it is published back to the outbox queue. MailerQ
will automatically pick it up from this outbox queue later. If you want to
process those intermediate messages too, you can also set a queue with the
'rabbitmq-retry' queue. All copy of all failed deliveries that are going to
be retried are posted there (as well as to the 'outbox' queue).

If you want to disable any of result or retry queues, simply leave its value empty. The
outbox and inbox queues can not be empty.

MailerQ can also track refused messages. Refused messages are messages
that we did not accept. This happens to messages delivered without first
authenticating that are also not delivery reports. Authentication is only
necessary if the 'smtp-username' and 'smtp-password' properties are set
or if a plugin is installed supporting authentication. If no queue is set
to store delivery reports, they will also require authentication.

By setting `rabbitmq-persistent` to 1 you turn on persistent message delivery mode. 
If you enable this feature, all messages published to RabbitMQ will be 
published persistently, meaning that they will be stored to disk by MailerQ.
This can be useful if your RabbitMQ server cannot keep up with the rate of publishing 
retries and delivery results. 

## Bounce reports

If you want MailerQ to generate bounce reports when it is unable to deliver
mail, you can set the 'rabbitmq-bounces' queue. Note that this queue will
only contain messages that generate an error directly as they are being
sent. If the receiving mail daemon pretends to accept the message and
later decides it does not like it after all, it should send a bounce
message back the the original envelope address.

To have MailerQ actually deliver bounce reports back to the original sender
of the message, this option should be set to the same queue as the outbox.
MailerQ will then generate a report, attach the original message to it as
an attachment and send it back to the envelope address. If this option is
used, it is recommended to set the 'bounce-envelope' property in your 
MailerQ configuration:

```
bounce-envelope:            mailer-daemon@localhost
```

If you want MailerQ to process incoming delivery reports, you can use
the 'rabbitmq-reports' queue. If this queue is set, all delivery reports
will be placed inside this queue. Authentication is then disabled for
delivery reports, meaning they can deliver these messages despite of
whether or not the remote daemon has authenticated with us or not.


## Cluster configuration options

If you run MailerQ on multiple servers, you can set up a cluster.
Every MailerQ instance in the cluster needs its own outbox (you can
thus not share multiple outbox queues). If one of the MailerQ
instances consumes a message from the outbox, but sees that it
can only be sent from a MailerQ server that runs on a different
server (because only that other server is configured with the
appropriate IP address), it will automatically publish the message
to the outbox queue of the MailerQ instance.

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

If not set, cluster exchange will be created on same RabbitMQ
instance as the outbox.


   