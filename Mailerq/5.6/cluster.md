# Cluster configuration

If you run multiple MailerQ instances, you can set up a MailerQ cluster. 
All instances will be aware of the other running MailerQ servers,
share information and hand over undeliverable messages. 
Setting up a cluster has many advantages:

- the management console of each MailerQ instance has links to the other instances
- when one instance modifies settings, it automatically notifies the entire cluster
- messages published to a wrong outbox queue are handed over to other instances

Every MailerQ server in the cluster shares its configuration with the other
instances. This allows the management consoles to link to each other, 
and more importantly, to trigger other instances to reload cached data
when settings change. For example, when you add a DKIM key via the management
console of your first MailerQ server, the other MailerQ servers will also have
direct access to this new DKIM key.

Another advantage of setting up a cluster is that email messages automatically
end up in the right outbox queue. In a normal cluster setup, you run multiple
servers and on each server you run a single MailerQ instance. Each instance 
reads from its own outbox queue (instead of having all instances consume from 
the same queue, which is not recommended). If you want to send out an email from
a specific IP address, you therefore must make sure that the message ends up 
in the right outbox queue. However, if you do publish a message to a wrong queue,
the MailerQ inter-cluster communication ensures that the message will be moved
to the right outbox queue.


## Config file options

There are two config file settings relevant for setting up a cluster:

```
cluster-address:        amqp://login:passwd@host/vhost
cluster-exchange:       cluster
```

Both cluster settings are optional. If you leave them empty, the exchange 
"cluster" is used, and the same server address as is set in the 
"rabbitmq-address" setting. Note that the cluster exchange setting may not be the same
as the "rabbit-address" setting, because the cluster type is different from the normal
exhange type. This is so that cluster messages are spread out to all nodes in the cluster.

It is important that every running MailerQ instance _uses the same cluster settings_. 
Even when your instances all have their own private RabbitMQ server, the instances 
must still share the same values for the "cluster-address" and "cluster-exchange"
settings.

It is also recommended to use the same relational database for each instance.
By doing this, the instances use the same delivery throttles and DKIM keys.

If your RabbitMQ server supports secure connections, you can configure MailerQ
to connect to an "amqps://" address instead. The communication between MailerQ
and RabbitMQ will then be encrypted.

```
cluster-address:        amqps://guest:guest@hostname/vhost
cluster-verify:         false
```

MailerQ checks the server certificate when it connects to a secured RabbitMQ
server. If this certificate can not be verified with one of the known openssl
certificate authorities, MailerQ refuses to set up a connection. If you use a
self-signed certificate, you may want to skip this extra test, and set the
config file option "cluster-verify" to "false".



## How does it work internally?

All instances create a private message queue in RabbitMQ and bind this private
queue to the cluster exchange. By doing this, each MailerQ instance receives all 
messages that are published by the other instances. Each instance also periodically 
sends its local IP addresses and some other configuration settings to this exchange. 
The announcement messages end up in all the private queues of the instances, and 
everyone in the cluster receives information about everyone.

When a change is made via one of the management consoles,
a message is sent to the cluster exchange, so that each server in the cluster
can reload the delivery limits from the database.


## RabbitMQ clustering vs. MailerQ clustering

Be aware that both RabbitMQ and MailerQ support clustering, but that from a 
technical standpoint this clustering has a whole different meaning. Clustering for 
RabbitMQ means that queues are mirrored across different RabbitMQ instances, so that 
no messages are lost when one of the RabbitMQ servers crashes.

For MailerQ clustering means something different: the individual servers communicate
and share data with each other, but it does not necessarily mean that emails will
still be delivered when one of the servers crash. If no other server has access
to the same IP addresses as the crashed server, there is no way that any other
server can take over the deliveries. If you do want to achieve this, you have
to set up a [heartbeat daemon](http://www.linux-ha.org/wiki/Heartbeat) so that other 
servers can automatically jump in and take over when one of the servers fails.


## Command line option

To find out if the cluster is working, you can simply go to the management console
of one of your MailerQ instances. If the console shows hyperlinks to your other
MailerQ instances, you know that the instances have identified each other over
the shared RabbitMQ exchange. You can also start MailerQ with the "--list-cluster"
command line argument to find out if the cluster is working:

```
$ mailerq --list-cluster
```

If you start MailerQ like this, it will connect to the cluster and wait for one
second. All the MailerQ instances that announce themselves within that second
are displayed. Normally, all instances in the cluster report within this timeout.
However, if your servers or internal network is overloaded, the 1 second period
could be too limited. In that case you can change the "cluster-timeout" variable
to use a different timeout. This setting can be set in the config file or via the command line:

```
$ mailerq --list-cluster --cluster-timeout=5
```


## Accessing the cluster yourself

You can also write your own scripts or programs to access the cluster. You can
for example write an application that connects to RabbitMQ, and that publishes a 
single JSON message to the cluster exchange to instruct all running MailerQ 
instances that they should reload the database:

````
{ "reload": true; }
````

If the above instruction is received by a MailerQ instance, it will immediately
connect to the database and reload all settings from it.

It's also possible to intercept all cluster traffic. For this you simply have
to create a queue in RabbitMQ and bind it to the shared cluster exchange. All
messages that are sent to the cluster will then also end up in your queue. By
reading out the messages from the queue, you will exactly see what is going on.

Tip: normally all MailerQ instances report once every couple of minutes their
status on the cluster. If you do not want to wait that long, you can send a
single "hello" json message:

````
{ "hello": true; }
````

