# Cluster configuration

If you run multiple MailerQ instances, you can set up a MailerQ cluster. 
Each instance will so be aware of the other running MailerQ servers,
and can share information and hand over undeliverable messages. 
Setting up a cluster has many advantages:

- the management console has links to the other instances
- cached data gets reset by the entire cluster
- messages are handed over between instances

Each MailerQ server in the cluster communicates its configuration to the other
instances. This allows the management consoles to link to each other, 
and more importantly, to trigger the other instance to reload cached data
when settings change.

Another advantage of setting up a cluster is that messages that can not
be processed by one MailerQ instance are automatically handed over to another.
If one of the MailerQ instances consumes a message from the outbox, but sees 
that this message can only be sent from a MailerQ instance running on a 
different server (because only that other server is configured with the 
appropriate IP address), it will automatically forward the message to the outbox 
queue of that MailerQ instance.


## Config file options

There are two config file settings relevant for setting up a cluster: the
"cluster-address" and the "cluster-exchange" setting.

```
cluster-address:        amqp://login:passwd@host/vhost
cluster-exchange:       cluster
```

Both settings are optional. If you leave them empty, the exchange "cluster" is 
used, and the same server address as is set in the "rabbitmq-address" setting.

It is important that every instance _uses the same cluster settings_! Even when
every instance has its own private RabbitMQ server, all instances must have the 
same values for the "cluster-address" and "cluster-exchange" settings. That is 
exactly why the config file allows you to set both a "rabbitmq-address" variable 
with the address of the RabbitMQ server from which the emails are loaded, and a 
"cluster-address" variable to set the RabbitMQ instance that is used by all MailerQ 
instances for their internal communication.

It is also recommended to use the same relational database for each instance.
By doing this, you can use the same delivery throttles for all running servers.


## How does it work internally?

All instances create a private message queue and bind it to the cluster exchange.
By doing this, each server receives all messages that are published to this
exchange.

Besides that, all instances periodically send their local IP addresses and some other 
configuration settings to this exchange. This message ends up in the private queue 
of each instance, so that everyone receives information about the other servers.

When a form is submitted via the management console of one of the instances,
this instance sends a message to the cluster, so that each server in the cluster
can reset its cached data, and reload the delivery limits from the database.

