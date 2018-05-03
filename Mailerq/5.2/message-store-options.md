# Message store options

To reduce the load on RabbitMQ, MailerQ can use an external message store. 
Only the email meta data (like the recipient, the envelope address, et cetera) 
has then to be stored in the JSON object in RabbitMQ, while the full MIME 
data can be stored in the message store.

```
storage-address:        mongodb://hostname/database/collection
storage-threads:        1
storage-policy:         all
storage-ttl:            3600
```

This message store is completely optional: if you set the "storage-address"
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

Some of our issues ran into issues with fetch operations. They reported 
strange hiccups and that MailerQ did not always succeed in fetching data, 
even when it is available. We've added a quick and dirty fix for this by 
simply repeating the fetch operation a couple of times in case of a failure. 
To enable this feature, you can add a special option to the address:

````
storage-address:        mongodb://hostname/database/collection?readAttempts=3
````

The default number of attempts is 1. If you want to repeat failed lookups
a couple of times, you can pass in a higher value.

To prevent that many small read operations are fired at MongoDB, MailerQ 
normally groups fetch operations into a single "multi-get" operation that
fetches many documents with just a single query. This reduces the number of 
queries that are sent to MongoDB, but if one of the requested documents is
hard to find, it also slows down the lookup of all the other documents in 
the same query. To get a balance between this, you can limit the number of 
fetch operations that can be grouped together:

````
storage-address:        mongodb://hostname/database/collection?maxQuerySize=10
````

MongoDB has a limitation of around 16 MB per document (there is some overhead
due to the usage of their internal BSON representation). If MailerQ has to
store a bigger document, the message is split up into smaller parts that are
all individually stored into MongoDB. As a consequence, you can find three 
types of documents in the database.

Most mails are less than 16mb big. So you will mostly see *regular messages*
in the database with the following properties:

* **_id**: unique message identifier
* **value**: the full mime message, normally stored as utf8 data
* **expire**: expiration timestamp
* **modified**: last modified timestamp
* **encoding**: either "gzip" or "identity"

If the message is bigger than 16mb, MailerQ splits up the message and stores 
a *master document* with the following properties:

* **_id**: unique message identifier
* **keys**: array of message identifiers of the individual parts
* **size**: total message size of all the parts together
* **expire**: expiration timestamp
* **modified**: last modified timestamp
* **encoding**: either "gzip" or "identity"

Each individual part of a big message has the following properties:

* **_id**: unique message identifier, this is unique for each part
* **parent**: identifier of the master document
* **value**: part of the message data
* **offset**: the offset of the data into the full message
* **expire**: expiration timestamp
* **modified**: last modified timestamp

## Directory specifics

If you use the "directory://" storage backend, MailerQ stores all the
messages in seperate files on the file system. To prevent that the number of
files in a directory becomes too big, MailerQ creates a nested directory 
structure. By default, this directory structure is four files deep. If you
want to use a different depth, you can specify this via a "depth" parameter:

````
storage-address:        directory:///path/to/directory?depth=3
````


## Threads

Strangely enough, most storage drivers only offer a synchronous and blocking
API. This means that storage operations can only be started after previous
operations were completed. To prevent that the entire MailerQ process gets
blocked while a storage operation is in progress, MailerQ maintains multiple
connections to the storage servers, and starts separate threads in which the
storage operations are being executed.

The number of threads (and the number of storage connections) can be set
using the "storage-threads" variable. If you set this to a higher value,
the throughput of storage operations gets better too.


## Storage policy

The "storage-policy" config file setting tells MailerQ what
type of messages should be stored in the message store. Valid values are "all",
"out", "in" and "none". The "none" setting is meaningful if you only want
MailerQ to *retrieve* mime data from external storage, without ever
starting storage operations.

Before MailerQ publishes a message to RabbitMQ (for example, before it
sends a received message to the inbox queue, or before it send a delayed
message back to the outbox queue) it checks the storage policy to see
whether the mime data should be sent to RabbitMQ too, or that the mime
data should be stored in a different storage system.

If you want all messages to be stored in the message store, use the "all"
policy. If this policy is enabled, MailerQ checks each JSON object
before it gets published to RabbitMQ. If the JSON still contains mime data,
MailerQ removes this data from the JSON and stores it in the message
store instead. The JSON data will be updated with a "key" property that
refers to the data in the message store.

The "in" and "out" policies are more complex. The "out" policy instructs
MailerQ to use the message store for outgoing messages only. If a
message is greylisted or delayed and is published back to the outbox,
MailerQ first strips the mime data from the JSON, and stores that in
the message store. Incoming messages (like the ones that come in on the
SMTP port, or the messages dropped in the spool directory) are not checked
and the full mime data is published to RabbitMQ.

The "out" policy is often used, because most emails get delivered at the
very first attempt, and it is therefore often a waste of resources
to store incoming messages first in a NoSQL environment: the messages will
probably be retransmitted a fraction of a second later. By using the "out"
storage policy, initial injected emails are completely sent to RabbitMQ. Only
if the initial delivery fails and the message is sent back to the outbox for later
delivery, the full MIME data is stripped from the JSON and stored in the
separate storage.

The "out" policy especially makes sense in setups where the majority of
all deliveries succeed at the first attempt, and rescheduled attempts are
likely to be pumped around between MailerQ and RabbitMQ for a number of times.

Only "all", "out" and "none" are meaningful policies. For completeness however,
we also support the "in" property which does exactly the opposite as the "out"
policy: all incoming messages are stored in the message store, and only
meta data is published to RabbitMQ. However, when a mail is delayed and
has to be published back to the outbox, the mime data is kept inside RabbitMQ.


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


## Timeout

MailerQ uses a timeout for storage operations. If the storage server does not
respond within this time, the message is published back to RabbitMQ and will
be retried later.

````
storage-timeout:        20
storage-reschedule:     120
````

With the above settings you tell MailerQ to timeout fetch-operation after 20 
seconds, and publish the mail back to RabbitMQ for 120 seconds.


## Compression

You may choose to compress the messages you store to reduce the load on your storage server
and limit the amount of data you need to send.
This feature can be turned on by specifying "compression=gzip" in the storage URL, e.g.:

````
storage-address:        mongodb://hostname/database/collection?compression=gzip
````

Our NoSQL library will then take care of compressing all data behind the scenes.
Note that this does mean that the contents of your database are no longer human readable.

The compression feature is currently enabled only for

* MongoDB
* Directory
* MySQL
* PostgreSQL

Support for the couchbase and SQLite backends is still in an experimental state.
