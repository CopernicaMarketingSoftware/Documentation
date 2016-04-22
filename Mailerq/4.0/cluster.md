# Cluster configuration

If you run multiple MailerQ instances, you can set up a MailerQ cluster. 
All instances will so be aware of the other running MailerQ servers,
and share information and hand over undeliverable messages. 
Setting up a cluster has many advantages:

- the management console of each MailerQ instance has links to the other instances
- cached data gets reset by all instances in the entire cluster
- messages are handed over between instances

Every MailerQ server in the cluster shares its configuration with the other
instances. This allows the management consoles to link to each other, 
and more importantly, to trigger other instances to reload cached data
when settings change. For example, when you add a DKIM key via the management
console of your first MailerQ server, the other MailerQ servers also have
direct access to this new DKIM key.

Another advantage of setting up a cluster is that email messages that can not
be sent by one MailerQ instance are automatically handed over to other servers.
If one of the MailerQ instances consumes a message from the outbox, but sees 
that this message can only be sent from a MailerQ instance running on a 
different server (because only that other server is configured with the 
appropriate IP address), it will automatically forward the message to the outbox 
queue of that MailerQ instance.


## Config file options

There are four config file settings relevant for setting up a cluster:

```
cluster-address:        amqp://login:passwd@host/vhost
cluster-exchange:       cluster
www-host:               
server-id:              1
```

Both cluster settings are optional. If you leave them empty, the exchange "cluster" is 
used, and the same server address as is set in the "rabbitmq-address" setting.

It is important that every instance _uses the same cluster settings_. Even when
every instance has its own private RabbitMQ server, all instances must have the 
same values for "cluster-address" and "cluster-exchange". Every individual MailerQ 
instance should also have unique "www-host" and "server-id" values set. If left empty 
MailerQ identifies the hostname by reverse DNS lookup.

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


