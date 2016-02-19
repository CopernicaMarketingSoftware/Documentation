# Message store options

To reduce the load on the message queues in RabbitMQ, MailerQ can be set 
up to use an external message store. If you do this, only the email meta
data (like the recipient, the envelope address, et cetera) has to be 
stored in the JSON object that is published to RabbitMQ, while the full 
MIME data can be stored in the message store.

```
storage-address:        mongodb://hostname/database/collection
storage-threads:        1
storage-policy:         all
storage-ttl:            3600
```

The message store is completely optional: if you set the `storage-address`
variable to an empty string, MailerQ will work just as well (even faster 
because no extra communication with the storage server is necessary), but 
the load on RabbitMQ and the network will be higher.


## Supported storage engines

A number of different storage systems are supported: Couchbase, MongoDB 
or plain files stored on the local file system. In theory it is also 
possible to use MySQL, SQLite or PostgreSQL, but it is better 
not to use a relational database, because such systems are not optimized
for document storage.

The address of the message store can be set with the `storage-address`
config file variable. The following addresses are supported:

```
storage-address:        couchbase://password@hostname/bucketname
storage-address:        mongodb://hostname/database/collection
storage-address:        sqlite:///path/to/database/file
storage-address:        mysql://user:password@hostname/databasename
storage-address:        postgresql://user:password@hostname/databasename
storage-address:        dir:///path/to/directory
```

If you have a cluster of Couchbase or MongoDB servers, you can split the 
hostnames with semicolons (`;`). For MongoDB you can also specify 
the name of the replica set in the address if you have more than one server.

```
storage-address:        couchbase://password@host1;host2;host3/bucketname
storage-address:        mongodb://host1;host2;host3/replicaset/database/collection
```

## Storage policy

The `storage-policy` variable allows you to instruct MailerQ when
messages should be stored in the message store. Valid values are "all", 
"out", "in" and "none". The "none" setting is meaningful if you only want
MailerQ to *retrieve* mime data from external storage, without ever 
storing it.

If you want all messages to be stored in the message store, use the "all"
policy. If this policy is enabled, MailerQ filters each JSON object
before it gets published to RabbitMQ. If it still contains mime data,
it will be removed from the JSON and stored in the message store.

The "in" and "out" policies are more complex. The "out" policy instructs 
MailerQ to use the message store to store outgoing messages only. If a 
message is greylisted or delayed and has to be published back to RabbitMQ, 
MailerQ will then first strip the mime from the JSON, and stores that in 
the message store.

The "out" policy is often used, because most emails get delivered at the 
very first attempt, and it is therefore often a waste of resources 
to store the message first in a NoSQL environment. By using the "out" storage 
policy, the initial injected emails are completely stored in RabbitMQ (and
not in the message store). The storage is only used when a mail unexpectedly 
gets delayed or greylisted. 

The final "in" policy can be used if you want all incoming messages to end 
up in the message store: messages that are received on one of the SMTP ports, 
the messages that were dropped in the spool directory and mails injected 
using MailerQ as command-line-utility. Republished messages (delayed mails
and greylisted mails) are not published to storage.


## Threads

Most storage drivers only offer a synchronous and blocking API. This means 
that storage operations can only be started after previous operations were 
completed. To prevent that the entire MailerQ process gets blocked while
a storage operation is in progress, MailerQ starts a couple of different 
threads in which the storage operations are being executed.

The number of threads (and the number of storage connections) can be set
using the `storage-threads` variable. If you set this to a higher value,
the throughput of storage operations gets better too.


## Time-to-live

When you store messages, you probably don't want to keep them forever. 
A message for which the "ttl" (time to live) has expired will 
automatically be removed from the message store by the NoSQL environment.
The ttl (in seconds) of a message in the message store is defined as its 
maximum delivery time added to the `storage-ttl` value. In other words,
a message will be kept in the message store `storage-ttl` seconds after
its maximum delivery time.
[Read more about maximum delivery times here.](delivery-limits#maximum-delivery-time)
