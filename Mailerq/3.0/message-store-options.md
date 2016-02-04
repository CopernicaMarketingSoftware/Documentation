# Message store options

Sometimes MailerQ needs to republish mails back into the message queue - for example when a message is greylisted and should be retried later. When this republishing is done a few times for a single delivery, it causes extra network traffic between MailerQ and RabbitMQ. This traffic can be large, especially if emails contain attachments and/or embedded content.

To overcome this, MailerQ can be configured to store the full message bodies in a seperate storage system, and use RabbitMQ only for the email meta data (which is much smaller).

You can use a number of different storage systems for this: Couchbase, MongoDB, Mysql, Sqlite and PostgreSQL. (Be aware that in practice it only makes sense to use Couchbase or MongoDB, because these can handle the required high loads. If you do not have a Couchbase or MongoDB server, you better not set up a storage system and put the message bodies in RabbitMQ, instead of using one of the SQL alternatives).

###storage: `<storage address>`
The address of a storage server can be specified as follows:

```
couchbase://password@hostname/bucketname
couchbase://password@host1;host2;host3/bucketname
mongo://hostname/database/collection
mongo://host1;host2;host3/replicaset/database/collection
sqlite:///path/to/database/file
mysql://user:password@hostname/databasename
postgresql://user:password@hostname/databasename
```

If you have a cluster of couchbase or MongoDB servers, you can split the different hostname with semi colons (';'). For MongoDB you also need to specify the name of the replica set in the address if you have more than one server.

This is an optional setting. If you leave it empty, the full message bodies are always kept in RabbitMQ. MailerQ will work just as well (even faster because no extra communication with the storage server is necessary), but the load on RabbitMQ and the network will be higher.

We intend to add support for other key/value stores as well.

