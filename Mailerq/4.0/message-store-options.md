# Message store options

To reduce the load on RabbitMQ, MailerQ can be set 
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

The message store is completely optional: if you set the "storage-address"
variable to an empty string, MailerQ works just as well (even faster 
because no extra communication with the storage server is necessary), but 
the load on RabbitMQ and the network will be much higher.


## Supported storage engines

A number of different storage systems are supported: Couchbase, MongoDB 
or plain files stored on the local file system. In theory it is also 
possible to use MySQL, SQLite or PostgreSQL, but it is better 
not to use a relational database, because such systems are not optimized
for document storage.

The address of the message store can be set with the "storage-address"
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

MailerQ relies on external libraries to be present on your system to communicate
with the external storage engine. The Couchbase C client library has to be
installed if you want to use the Couchbase storage engine, and the Mongo C Driver
is needed to connect to MongoDB.


## MongoDB specifics

The address string to connect to MongoDB is directly passed to the MongoDB
driver. All the options that are supported by this driver can be used in
the address string.

[Click here for the MongoDB documentation](https://docs.mongodb.org/manual/reference/connection-string/)

We discovered that MongoDB sometimes has strange hickups and that it does
not always succeeds in fetching data, even when it is available. We've added
a quick and dirty fix for this by simply repeating the fetch operation
a couple of times in case of a failure. To enable this feature, you can
add a special option to the address:

````
storage-address:        mongodb://hostname/database/collection?readAttempts=3
````

The default number of attempts is 1. If you want to repeat failed lookups
a couple of times, you can pass in a higher value.


## Storage policy

The "storage-policy" config file setting tells MailerQ what
type of messages should be stored in the message store. Valid values are "all", 
"out", "in" and "none". The "none" setting is meaningful if you only want
MailerQ to *retrieve* mime data from external storage, without ever 
storing it.

Before MailerQ publishes a message to RabbitMQ (for example, before it
sends a received message to the inbox queue, or before it send a delayed 
message back to the outbox queue) it checks the storage policy to see
whether the mime data should be sent to RabbitMQ too, or that the mime
data should be stored in a different storage system, 

If you want all messages to be stored in the message store, use the "all"
policy. If this policy is enabled, MailerQ checks each JSON object
before it gets published to RabbitMQ. If it still contains mime data,
it will be removed from the JSON and stored in the message store. The "all"
policy matches incoming messages that go to one of the incoming queues, as
well as delayed messages that are published back to the outbox.

The "in" and "out" policies are more complex. The "out" policy instructs 
MailerQ to use the message store to store outgoing messages only. If a 
message is greylisted or delayed and is published back to the outbox, 
MailerQ first strips the mime data from the JSON, and stores that in 
the message store. Incoming messages (like the ones that come in on the
SMTP port, or the messages dropped in the spool filter) are not stored
in NoSQL storage but the full mime data is published to RabbitMQ.

The "out" policy is often used, because most emails get delivered at the 
very first attempt, and it is therefore often a waste of resources 
to store the message in a NoSQL environment: the message is expected to be removed 
only a fraction of a second later. By using the "out" storage policy, the 
initial injected emails are completely sent to RabbitMQ. Only if the initial
delivery fails and the message is rescheduled for later delivery, the full 
MIME data is stripped from the JSON and stored in the separate storage.

The "out" policy especially makes sense because in most setups the majority of
all deliveries succeed, and rescheduled attempts are likely to be
rescheduled a number of times, and will be pumped around between MailerQ and
RabbitMQ for a number of times. 

Only "all", "out" and "none" are meaningful policies. For completeness however,
we also support the "in" property which does exactly the opposite as the "out"
policy: all incoming messages are stored in the message store, and only
meta data is published to RabbitMQ. However, when a mail is delayed and
has to be published back to the outbox, the mime data is kept inside RabbitMQ.


## Threads

Most storage drivers only offer a synchronous and blocking API. This means 
that storage operations can only be started after previous operations were 
completed. To prevent that the entire MailerQ process gets blocked while
a storage operation is in progress, MailerQ starts a couple of different 
threads in which the storage operations are being executed.

The number of threads (and the number of storage connections) can be set
using the "storage-threads" variable. If you set this to a higher value,
the throughput of storage operations gets better too.


## Time-to-live

When you store messages, you probably don't want to keep them forever in
your message store. To overcome this, every message has a time-to-live value,
and expired message are automatically removed from storage. The "storage-ttl"
config option specifies the default time-to-live that is used for message 
that are stored in the document store.

Note that the time-to-live is added _to the mail max delivery time_. If you try
to send out an email using MailerQ, and that email has to be delivered within 
24 hours, and your "storage-ttl" is set to 3600 seconds (one hour), the
mime data will be stored in NoSQL for at most 25 hours.

