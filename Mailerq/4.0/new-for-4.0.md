# What is new in version 4.0?

MailerQ version 4.0 has some pretty big changes compared to the previous
3.0 branch. This includes various new features and bug fixes, as well as numerous
fundamental changes.


## Performance

One of the main performance bottlenecks with the 3.0 version was the
CPU utilization of the master thread. MailerQ 4.0 therefore has a whole
different architecture.

Internally, MailerQ starts many different threads, each one managing SMTP
traffic, communication with RabbitMQ, disk IO for log files, among other things.
These threads need to synchronize once in a while to exchange 
data, access the application-wide counters such as number of deliveries per 
domain, and to fetch the latest errors. These global settings are managed by 
the master thread.

In MailerQ 3.0, the majority of all CPU time was spent by this master
thread; other threads spent a lot of time waiting for the
master thread get synchronize. We've changed the architecture of MailerQ so that 
worker threads
- depend less on the master thread; 
- can access more data asynchronously;
- can go longer without needing to resynchronize.

Besides that, we reduced the amount of data that is kept in main memory. Most 
of the counters inside MailerQ were used only to display fancy but unnecessary 
charts on the management console, and were not used to deliver mail. These 
counters have been removed; this also means the management console has become
less cluttered.


## Incompatibilities

MailerQ 4.0 is not completely compatible with version 3.0. 

Firstly, the configuration file has different settings: some settings are no 
longer supported, others have been added, and the values of some settings are 
interpreted differently.

The JSON data that you inject in MailerQ is not fully compatible with
the old data format, although it has not changed significantly. If you're 
not using anything fancy, but just the "envelope", "recipient" and "mime"
properties, there is nothing to worry about. The results that are published
back to the result queues on the other hand, have changed. The JSON 
result objects contain more data than they did before.

The tables in the SQL database have changed too. More data is kept in the 
database, and less settings come from the config file, allowing the user to
make more changes on the fly without having to restart MailerQ.  Some tables are 
no longer supported because the data from multiple tables have been merged into 
a single table.


## JSON data

The "queues" property in the input JSON is now treated differently. Previously,
if you added a "queues" property to the JSON, _all_ defaults from the config
file were ignored, and the settings inside the "queues" property were used
instead. With the new MailerQ 4.0 setup, the config file defaults are no
longer ignored. Only for queues that are present inside the JSON, the config
file setting is discarded and the value from the JSON is used.

````json
{
    "recipient": "info@example.com",
    "mime": "....",
    "queues": {
        "results": "custom-result-queue",
        "failure": null
    }
}
````

Previously (up to MailerQ version 3), all result queues set in the config file
were ignored, simply because a "queues" property was set in the JSON. With
MailerQ 4.0, the config file settings for the success, retry and dsn queues 
are still respected because they are missing in the JSON. The settings in
the config file for the results and failure queues are overridden by the
JSON values.


## Result objects

Just like MailerQ 3.0, MailerQ 4.0 also publishes the delivery results to
success, failure and result queues. However, the format of the message has
changed significantly. Where a single "state" property was used in 3.0, we now use
a "state" and "result" property to set both the state in the SMTP protocol
where the error occured, and the type of result in that state.

This gives you a better insight in the reason why a delivery failed, but
it also means that you will have to update your scripts to handle these
new type of errors.

We have also add more data and more fields to the result objects, so that
you can better find out what went wrong in your email delivery.

For a full explanation of the new error format, see our
[documentation about the result queues](json-results).


## RabbitMQ connection

The RabbitMQ connection in the config file now uses a single "amqp-address"
setting. Instead of seperately setting the username, password, hostname and 
vhost in the config file, you can now assign it a single string formatted by 
"amqp://user:password@hostname/vhost".


## Storage engine

The format for storage addresses has changed slightly. MongoDB
connections now use a "mongodb://" prefix, and also the address for
Couchbase connection has changed a little (to "couchbase://password@hostname/bucket?options").

MailerQ has been updated to use the very latest versions of the MongoDB 
and Couchbase client libraries. For MongoDB, we had to switch to a complete 
new client library because MongoDB ceased developing the old "mongoc" driver. 
If you want to connect with MongoDB, make sure you have the latest version
of the [MongoDB C driver](https://github.com/mongodb/mongo-c-driver) on 
your system.

Many NoSQL client libraries sadly only offer a blocking API. 
To prevent storage operations blocking deliveries, MailerQ therefore starts up 
seperate threads that execute such operations. Possible hiccups in fetching or 
storing MIME data no longer interfere with mail deliveries. MailerQ 4.0 has a 
special config file option that you can use to set the number of threads for 
these storage operations. If you notice a lot of hiccups in storage operations, 
you can increment this value.

Besides these traditional NoSQL engines, we now also support a filesystem-based 
storage engine: setting the "storage-address" variable to "dir:///path/to/dir" 
stores all data in files in a directory. This is ideal for testing purposes!


## DNS lookups

The previous versions of MailerQ used its own non-blocking resolver
for DNS lookups. A consequence of this setup was that the system wide
resolver settings (like settings found in the "etc/resolv.conf" and 
"/etc/gai.conf" files) were not (always) respected. You could thus end up 
in a situation where MailerQ used different DNS data and IP addresses than 
you would expect after changing your system-wide resolver settings.

To fix this, we chose to remove MailerQ's own non-blocking resolver, and now
use the normal resolver functions from the system wide C library. The downside
of this approach is that DNS lookups can now be blocking again. To solve
this, MailerQ starts up a number of threads for DNS lookups to prevent that 
slow DNS servers interrupt mail deliveries. The number of threads to start 
is a config file option.

Other DNS related options in the config file are no longer supported.
These settings can now be set in the system wide "/etc/resolv.conf" setting.

MailerQ 3.0 used a helo-file in which you could list all HELO/EHLO names
for the local IP addresses. This file is no longer used, the EHLO/EHLO names
can now be managed via the management console.


## Log files

The format of the log files have been changed. With every new release we
added more columns to the log file, and it became more and more difficult
to maintain compatible files (MailerQ also reads its own log files to show
them via the management console, and therefor does not only write to logs,
but also has recognize them). 

We've decided to introduce a whole new log file format for MailerQ 4.0 that
is easier to read, both for humans as well as for management console.


## Spool directories

MailerQ can be configured to use a spool directory. This spool directory
is being monitored by MailerQ and every valid MIME formatted file that
you drop into this directory is automatically picked up, processed and delivered.

This spool directory allows you to inject email more easily into MailerQ.
The old injection methods (SMTP, command line utility, and sending mail
directory to RabbitMQ) of course all still work.


## Running behind a proxy

You can now run MailerQ behind a HAProxy server. The "smtp-proxy" setting
can be used to instruct MailerQ which connections come from the proxy
server, and which are raw connections that came directly from the internet.

Connections that came in via a HAProxy proxy server are treated differently.
The first couple of bytes on these incoming connections are interpreted as
the special PROXY header, and the remote IP address of the client is
extracted from that header.


## Delivery Status Notifications

MailerQ 4.0 now fully supports DSN. Although the majority of our users
only use MailerQ to send out email, and not to deliver or receive bounce
emails, we have implemented this extension to the SMTP protocol as well.


## DMARC processing

MailerQ can automatically recognize DMARC report messages, and publishes
them to the "reports" queue. If you use MailerQ as an incoming server to
process delivery status notifications and disposition notifications, you
can also set it up to collect dmarc reports.

