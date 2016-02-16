# Message store options

To reduce the load on the message queues in RabbitMQ, you can set up an 
alternative message store. If you do this, only the email meta
data (like the recipient, the envelope address, et cetera) has to be 
stored in the JSON object that is published to RabbitMQ, while the full 
MIME data can be stored in a different storage environment.

```
storage-address:        mongodb://hostname/database/collection
storage-threads:        1
storage-policy:         all
storage-ttl:            3600
```

The message store is completely optional: if you set the `storage-address`
to an empty string, MailerQ will work just as well (even faster because 
no extra communication with the storage server is necessary), but the 
load on RabbitMQ and the network will be higher.


## Supported storage engines

You can use a number of different storage systems: Couchbase, MongoDB 
or plain files stored on the local file system. In theory it is also 
possible to use MySQL, SQLite or PostgreSQL, but it is better 
not to use such a relational database, because such systems are not optimized
for document storage.

The address of your storage solution can be set using the `storage-address`
config file option. The following addresses are supported:

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

The `storage-policy` variable allows you to instruct MailerQ what type of
messages should be stored in the message store. Valid values are "all", 
"out", "in" and "none".

If you set the policy to "in", MailerQ only stores incoming messages 
in the document store: messages that are received on one of the SMTP ports,
the messages that were dropped in the spool directory and mails injected
using MailerQ as command-line-utility. The mime data is stored in the
external storage system, and the JSON data that is published to 
RabbitMQ contains a key to this data.

You can also use the policy "out". This instructs MailerQ to use the 
message store for outgoing messages. If a message is greylisted or delayed 
and has to be published back to RabbitMQ, MailerQ will then first strip 
the mime from the JSON, and stores that in the message store.

To store both incoming as well as outgoing messages, use the "all" policy,
and to not store any messages at all, use "none". If you use the "none"
setting, MailerQ can still use the message store for *retrieving* messages.

We normally advise to set this property to "out". Most emails get delivered 
at their very first attempt, and it is therefore often a waste of resources 
to store the message first in a NoSQL environment. By using the "out" storage 
policy, the initial injected emails are completely stored in RabbitMQ, and 
the storage is only used when a mail unexpectedly gets delayed or greylisted. 


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

@todo write this
