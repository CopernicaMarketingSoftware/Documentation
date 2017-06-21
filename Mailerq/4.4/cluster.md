# Cluster configuration

If you run multiple MailerQ instances, you can set up a MailerQ cluster. 
All instances will so be aware of the other running MailerQ servers,
and share information and hand over undeliverable messages. 
Setting up a cluster has many advantages:

- the management console of each MailerQ instance has links to the other instances
- when one instance modifies settings, it automatically notifies the entire cluster
- messages published to a wrong outbox queue are handed over to other instances

Every MailerQ server in the cluster shares its configuration with the other
instances. This allows the management consoles to link to each other, 
and more importantly, to trigger other instances to reload cached data
when settings change. For example, when you add a DKIM key via the management
console of your first MailerQ server, the other MailerQ servers also have
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
"rabbitmq-address" setting.

It is important that every running MailerQ instance _uses the same cluster settings_. 
Even when your instances all have their own private RabbitMQ server, the instances 
must still share the same values for the "cluster-address" and "cluster-exchange"
settings.

It is also recommended to use the same relational database for each instance.
By doing this, the instances use the same delivery throttles and DKIM keys.


## How does it work internally?

All instances create a private message queue in RabbitMQ and bind this private
queue to the cluster exchange. By doing this, each MailerQ instance receives all 
messages that are published by the other instances. Each instances also periodically 
sends it's local IP addresses and some other configuration settings to this exchange. 
The announcement messages end up in all the private queues of the instances, and 
everyone in the cluster receives information about everyone.

When a change is made via one of the management consoles,
a message is sent to the cluster exchange, so that each server in the cluster
can reload the delivery limits from the database.


## RabbitMQ clustering vs. MailerQ clustering

Be aware that both RabbitMQ and MailerQ support clustering, but that from a 
technical standpoint this clustering has a whole different meaning. Clustering for 
RabbitMQ means that queues are shared amongst different RabbitMQ instances, so that 
no messages are lost when one of the RabbitMQ servers crash.

For MailerQ clustering means something different: the individual servers communicate
and share data with each other, but it does not necessarily mean that emails will
still be delivered when one of the servers crash. If no other server has access
to the same IP addresses as the crashed server, there is no way that any other
server can take over the deliveries. If you do want to achieve this, you have
to set up a [heartbeat daemon](http://www.linux-ha.org/wiki/Heartbeat) so that other 
servers can automatically jump in and take over when one of the servers fails.


