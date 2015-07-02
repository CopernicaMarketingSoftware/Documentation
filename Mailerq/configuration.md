# Configuration of MailerQ

MailerQ can be configured, using the config file that can be found at “/etc/mailerq/config.txt”. 
The "config.txt" file holds configuration options for the connection to RabbitMQ, storage engine
(Couchbase, MongoDB, MySQL, SQLite or PostgreSQL) and database (MySQL, SQLite or PostgreSQL)
and other options for MailerQ itself.

## RabbitMQ configuration options

MailerQ loads all email meta data from a RabbitMQ message queue, so make sure that RabbitMQ
is running when you use the MTA. The address and login data to access the message queues can
be set in the following way. These setting should be the same as your RabbitMQ settings
that you configured yourself.

###rabbitmq-host:  `<hostname>`
Hostname of your RabbitMQ server. If you have a cluster of RabbitMQ nodes, you can enter multiple hostnames, delimted by a comma (host1, host2, host3...).

###rabbitmq-user:  `<username>`
User name for RabbitMQ.

###rabbitmq-password: `<password>` 
Password for RabbitMQ.

###rabbitmq-vhost: `<vhost>`
The RabbitMQ environment that MailerQ may use

###rabbitmq-exchange: `<exchange>`
The name of the exchange in RabbitMQ that MailerQ uses to publish all messages to.
If not explicitly set, MailerQ uses an exchange with the name "mailerq".

###rabbitmq-outbox: `<queue name>`
Outbox message queue. All outgoing messages are loaded from here. 
If the outbox queue does not exist yet, MailerQ will create it.

###rabbitmq-results: `<queue name>`
Results message queue. All messages that were delivered or could not be delivered are posted here. If the result queue does not exist yet, MailerQ will create it. You can turn off results queue by leaving this field empty.

###rabbitmq-success: `<queue name>`
Success message queue. All messages that were successfully delivered are posted here. If the success queue does not exist yet, MailerQ will create it. You can turn off success queue by leaving this field empty.

###rabbitmq-failure: `<queue name>`
Failure message queue. All messages that could not be delivered are posted here. If the failure queue does not exist yet, MailerQ will create it. You can turn off failure queue by leaving this field empty.

###rabbitmq-inbox: `<queue name>`
Inbox message queue. All messages that are received on the SMTP port are added to this inbox queue where you can pick them up for further processing. Most users set the inbox queue to the same value as the outbox queue. This will cause MailerQ to automatically forward incoming messages.

###rabbitmq-retry: `<queue name>`
If a message can not immediately be delivered, or when it it greylisted and is going to be retries, it is published back to the outbox queue. MailerQ will later automatically pick it up from this outbox queue. If you want to process those intermediate messages too, you can also set a queue with the 'rabbitmq-retry' queue. All copy of all failed deliveries that are going to be retried are posted there (as well as to the 'outbox' queue).

###rabbitmq-persistent: `<0 or 1>` 
Persistent message delivery mode. You can set this option to 0 to disable persistent delivery mode. It can be useful if your RabbitMQ server cannot keep up with the rate of publishing retries and delivery results. If you enable this feature, all messages published to RabbitMQ will be published _persistently_, meaning that they will be stored to disk by MailerQ.

###rabbitmq-durable: `<0 or 1>`
MailerQ creates its own queues and exchanges in RabbitMQ when it starts. With this setting you can control whether these queues and exchanges should be durable or not.


## Cluster configuration options

It is possible to run multiple instances of MailerQ at the same time, each connected to a different outbox queue. These different instances communicate with each other using a special exchange in RabbitMQ, so that they can forward messages that are published to the wrong outbox to the right MailerQ instance.

To use this feature, you should specify in the configuration file the address of the RabbitMQ server and the name of the exchange that is used for communicating between the MailerQ instances.

###cluster-host: `<hostname>`
Hostname of the RabbitMQ server that is used for communicating between the running MailerQ instances.

###cluster-user: `<username>`
User name for RabbitMQ.

###cluster-password: `<password>`
Password for RabbitMQ.

###cluster-vhost: `<username>`
The RabbitMQ environment that MailerQ uses for cluster communication.

###cluster-exchange: `<username>`
Name of the exchange in RabbitMQ that is used for cluster communication.

 

## Database configuration options

The configuration for the various domains - like the max delivery rate and max connect rate - is stored in a database. The address of this database is set in the config file and should match your database configuration.

Using a database is optional. Without it, MailerQ will simply send e-mails using default settings, and it is not possible to set the delivery rates for specific domains.

The MailerQ MTA supports a number of database engines: MySQL, SQLite and PostgreSQL. The SQLite is the simplest one and the easiest one to set up (you do not need a seperate database server for it). However, the other supported engines are faster and better suited for high performance servers.

###database: `<database address>`
Name of the MySQL database that MailerQ can use to get the mail sending settings. You will need to have a database in place already. The format for the database address is:

```
sqlite:///path/to/database/file
mysql://user:password@hostname/databasename
postgresql://user:password@hostname/databasename
```

MailerQ automatically creates or alters missing or incomplete tables. If you use a MySQL or PostgreSQL database, you should ensure that the specified database is already created, and that MailerQ has enough privileges to create and modify tables. For a SQLite database you only have to make sure that the database file is writable.

In normal operations you do not need to login to the database yourself and run any queries, but if you do like to access that data you are free to do so. MailerQ reloads data from the database every couple of minutes, so any changes you make will automatically come into effect without the need to restart the MTA.

## Message store options

Sometimes MailerQ needs to republish mails back into the message queue - for example when a message is greylisted and should be retried later. When this republishing is done a few times for a single delivery, it causes extra network traffic between MailerQ and RabbitMQ. This traffic can be large, especially if emails contain attachments and/or embedded content.

To overcome this, MailerQ can be configured to store the full message bodies in a seperate storage system, and use RabbitMQ only for the email meta data (which is much smaller).

You can use a number of different storage systems for this: Couchbase, MongoDB, Mysql, Sqlite and PostgreSQL. (Be aware that in practice it only makes sense to use Couchbase or MongoDB, because it can handle the required high loads. If you do not have a Couchbase or MongoDB server, you can better not set up a storage system and put the message bodies in RabbitMQ, than using one of the SQL alternatives).

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

## Automatic retry limit

If, for one reason or another, a message could not immediately be delivered, the message is put back in the outbox message queue to be retried later.

The interval between attempts grows with the number of attempts. The second attempt will be made only a few minutes after the first, the 10th or 20th attempt can even be many hours or days later. The default number of attempts and the amount of time spent retrying can both be set in the config file.


###max-attempts: `<number of attempts>`
Maximum number of retry attempts. If delivery doesn't succeed in this number of attempts, it is marked as failed and no more delivery attempts will be taken.

###max-deliver-time: `<delay in seconds from first attempt>`
Maximum time in which retry attempts are made. If delivery doesn't succeed during this time, it is marked as failed and will be no further attempts.

## Normalize line endings

All lines in an email MIME message must be terminated with linefeed-newline (\r\n). If you use other line endings (for example only newlines, without the linefeeds) the mail might not be delivered and DKIM signing could fail.

Normally, MailerQ trusts you to supply valid MIME messages, with valid line endings. However, if you want MailerQ to repair your messages if the line endings are incorrect, you can enable the following option.

###normalize-mime: `<0|1>`
Let MailerQ normalize line endings to linefeed-newline.


## Domain limits

MailerQ uses seperate throttle settings for individual domains. The maximum number of simultaneous connections, maximum number of messages per minute and maximum number of new connections per minute can all be set for specific domains. It is thus possible to have different limits for mails sent to GMAIL.COM and for mails to VERYSMALLCOMPANY.COM. All these settings can be configured using MailerQ's online management console.

MailerQ always checks if there are domain specific settings stored in the database. If no specific settings can be found in the database, the server will rely on the defaults set in the configuration file. The following config file variables can be used to set these defaults.

###domain-maxmessages: `<messages>`
Default maximum amount of messages delivered per minute, set to '-1' for no limit. Only used for domains for which no other limit is set.

###domain-maxconnects: `<connection attempts>`
The maximum number of connection attempts to make to a domain in one minute, set to '-1' for no limit. Only used for domains for which no other limit is set.

###domain-maxconnections: `<connections>`
The maximum number of connections to a domain that can exist at the same time, set to '-1' for no limit. Only used for domains for which no other limit is set.

###domain-maxqueue: `<length>`
The max number of messages that are kept in memory for this domain. Use '-1' for unlimited.



## IP address limits

Just like it is possible to set limits for a domain, it is also possible to set limits per IP address. The following variables can be used to limit the deliveries to IP addresses. The values for the IP limits in the "config.txt" file are the default values and can be overridden for specific domains in via the management console or in the database.

###ip-maxmessages: `<messages>`
Default maximum amount of messages delivered per minute, -1 for no limit. Only used for IP's linked to domains for which no other limit is set.

###ip-maxconnects: `<connection attempts>`
The maximum number of connection attempts to make to an IP address in one minute, -1 for no limit. Only used for IP's linked to domains for which no other limit is set.

###ip-maxconnections: `<connections>`
The maximum number of connections that can exist at the same time to an IP address, -1 for no limit. Only used for IP's linked to domains for which no other limit is set.

## Connection limits

Each connection that is made with a remote server also has its limits, and just like the settings per domain and per IP address, these settings can also be configured for specific domains. The settings in the config file are the defaults in case no settings for a domain exist in the database.

###connection-maxmessages: `<messages>`
This setting defines the maximum number of messages that are sent over a connection, before the connection is closed. When the maximum number of messages is reached, the connection is closed and subsequent messages are sent over a new connection. Set this value to -1 if there should be no limit.

###connection-maxidle: `<miliseconds>`
This variable defines for what time in milliseconds a connection is kept open while it is idle. If two messages to the same domain are sent within the "connection-maxidle" time, they are sent over the same connection. If the time between the messages is greater than the "connection-maxidle" time, the connection closes and a new connection has to be opened before the message can be sent.

###connection-secure: `<0 or 1>`
This value is either 1 or 0 and it tells MailerQ to try to use encrypted TLS connections to communicate with the remote server. Communication over TLS is slower than communicating over a normal unencrypted connection.

## Number of threads

MailerQ starts up multiple worker threads for various tasks. There is a thread for writing to the log file, a thread for loading messages from RabbitMQ, and a thread for writing them back to RabbitMQ, and special threads to communicate with the database and storage.

Next to these threads, MailerQ starts additional threads for sending out SMTP messages. The number of SMTP threads to start can be configured with the max-threads variable. On a dedicated machine it is wise to set this to a value close to the number of cores in the machine (minus about five for the threads mentioned above).

###max-threads: `<threads>`
Number of worker threads for sending out mail and doing the SMTP communication.

## Number of connections in total

To prevent the server from running out of file descriptors, it only opens a certain number of connections at the same time. Make sure that this variable does not exceed the limit for the number of open files! To let everthing work smoothly, leave at least 100 file descriptors to the application that can be used for communication with databases, logfiles, message queues and dns servers.

###max-connections: `<connections>`
The maximum number of connections at the same time.

## Memory usage configuration

To prevent the server from running out of memory, you can limit the number of messages loaded into memory.

###max-messages: `<messages>`
This is the number of messages that MailerQ loads from RabbitMQ and stores in internal in-memory queues.

###max-queues: `<queues>`
This is the maximum number of queues which MailerQ is allowed to keep in memory, excluding the temporary queues.

###max-memory: `<memory>`
Max memory to use by MailerQ. This setting can be specified in GB or MB (for example '16GB' or '512MB'). To set it to u###imited leave the value empty.

When the max memory limit is reached, MailerQ stops loading messages from the message queue until more memory is available.

## Management console

MailerQ opens a web port that can be used for monitoring the application. Go with your browser to http://your-server-name:port to access this management console.

###www-ip: `<ip address>`
By default, the MailerQ management console can be accessed via all the IP addresses that are available on the server. If you only want to use a single IP, you can use this setting.

###www-host: `<hostname>`
MailerQ automatically detects its hostname by doing a reverse DNS lookup. If you want to use a different host instead, you can use this variable.

###www-port: `<port>`
Specific port opened to your management console.

###www-certificate: `<certificate file>`
Path to certificate file for HTTPS.

###www-privatekey: `<private key file>`
Path to private key file for HTTPS.

###www-ciphers: `<cipher list>`
Colon-separated list of allowed ciphers for HTTPS.

###www-dir: `<path to 'www' dir>`
Directory holding the static content (html, javascript, images, css) of the admin console.

###www-password: `<password>`
Password you want to use to login into the MailerQ management console. Leave this empty if you do not want to use a password for the management console. Make sure to install a firewall so that the web interface can only accessed by you - especially if you do not use a password.


## SMTP server

MailerQ can open a SMTP port to accept incoming emails. All mails that are received on the SMTP port will automatically be published on the [inbox queue](copernica-docs:Mailerq/configuration/#rabbitmq-inbox "inbox queue"). If this inbox queue is set to the same value as the outbox queue (which most users do), MailerQ automatically forwards all received messages.

The recommended SMTP port is 25\. To open this port however, MailerQ needs to be started with root privileges. After the port is opened, MailerQ changes its identity to a different (and safer) user.

Be aware that by opening the SMTP port you might create an open SMTP proxy that the world can use for sending out spam. It therefore is wise to configure your firewall to only allow access from trusted hosts. The smtp-range setting can be used to limit access from specific IP addresses. Connections from other sources are blocked. The IP range must be set in [CIDR notation](http://en.wikipedia.org/wiki/Classless_Inter-Domain_Routing#CIDR_notation).

Besides limiting the IP addresses that are able to deliver mail to MailerQ through the SMTP port, authentication can also be required by setting the smtp-username and smtp-password options. By default these are empty, meaning no authentication is required.

To protect the messages delivered from eavesdropping, TLS can be enabled by setting the smtp-certificate and smtp-key to the full path containing the certificate and private key, respectively.

###smtp-ip: `<ip address>`
Normally, MailerQ opens a socket that can be accessed via all the IP addresses that are available on the server. If MailerQ should only be accessible via a specific IP address, you can set that IP with this setting. Make sure the IP address is assigned to the server.

###smtp-port: `<port number>`
Number for the SMTP port. If this is a set to a value lower than 1024, MailerQ needs to be started by user root.

###smtp-range: `<ip range>`
The IP range from which incomming connections are allowed in CIDR notation.

###smtp-username: `<username>`
The username clients have to authenticate for SMTP email delivery.

###smtp-password: `<password>`
The username clients have to authenticate for SMTP email delivery.

###smtp-certificate: `<filename>`
The full path and filename to the file containing the certificate

###smtp-key: `<filename>`
The full path and filename to the file containing the private key

###smtp-ciphers: `<cipher list>`
Colon-separated list of allowed ciphers to use when securing incoming SMTP connections with TLS.

###smtp-proxy:
Enable the PROXY protocol. If this is enabled, MailerQ will expect a PROXY v2 header at the start of every incoming SMTP connection. Be aware that enabling this option without using a PROXY-enabled frontend will break incoming SMTP functionality.


## Logging

All abnormal events are logged to the error logfile. This includes failures like databases that are suddenly offline, or RabbitMQ connections that are lost. The name and error of the error log file can be set with the error-log setting.

###error-log: `<filename>`
Filename to which errors are logged. The file must of course be writable for MailerQ.

MailerQ also create logfiles for all delivery attempts and for all downloads. Every time that MailerQ tries to send out an email, it writes a line to the send log. When MailerQ downloads a file from the internet (for example an image or an RSS feed) it logs this in the downloads log.

With the following settings you can specify to which directory the logs should be written, the name of the log files (you specify a prefix, MailerQ automatically rotates the log files, and appends a number to prefix), and the maximum size of a log file before MailerQ moves on to the next log file. The number of log files that MailerQ keeps on disk can be limited by setting the 'history' option.

###send-log-directory: `<directory>`
Directory where logfiles with send attempts are stored. The directory must be writable for MailerQ.

###send-log-prefix: `<prefix>`
Prefix of the name of the log files. Default is "attempts.log".

###send-log-history: `<number of files>`
This option holds the number of old delivery logfiles to keep on disk before oldest files are removed.

###send-log-maxsize: `<size>`
Maximum size of the log file, before MailerQ rotates the log files and continues writing to a new file. Default is "100MB".

###send-log-maxage: `<seconds>`
Maximum age of a log file. MailerQ rotates the log files when the current log file gets older than the specified number of seconds. If not set, log files are not rotated based on age.

###download-log-directory: `<directory>`
Directory where logfiles with downloads are stored. The directory be writable for MailerQ.

###download-log-prefix: `<prefix>`
Prefix of the name of the log files. Default is "downloads.log".

###download-log-history: `<number of files>`
This option holds the number of old download logfiles to keep on disk before oldest files are removed.

###download-log-maxsize:  `<size>`
Maximum size of the log file, before MailerQ rotates the log files and continues writing to a new file. Default is "100MB".

###download-log-maxage: `<seconds>`
Maximum age of a log file. MailerQ rotates the log files when the current log file gets older than the specified number of seconds. If not set, log files are not rotated based on age.

## License

To work properly, MailerQ needs a license file. The license file can be [downloaded](http://mailerq.com/product/license "MailerQ license") from the MailerQ website. You can store the file anywhere on the file system.

###license: `<path to license.txt>`
The path to the license file. The default path is "/etc/mailerq/license.txt".

## User

If you have configured MailerQ to use ports lower than 1024 (like port 25 for SMTP and/or port 80 for the management console), the MTA must be started as user root. Once the ports have been opened, MailerQ changes its identity to the user set in the config file.

###user: `<user name>`
The user name to change identify to after the SMTP and HTTP ports have been opened.

## Plugins

Normally, MailerQ tries to load plugins from the default plugin directory, which is `/usr/share/mailerq/plugins`. However, if you want to load plugins from another directory instead, you can use the option below to specify the directory from which to load the plugins. Beware, MailerQ will silently continue when the specified directory can not be found, possibly causing plugins not to be loaded without a warning.

###plugin-directory: `<path>`
The path to the directory where the plugins are located.

## Smarthosts

When all messages need to be routed via an external mailserver, the smarthost option can be used. This global setting will cause all messages to be routed via the specified smarthost, where authentication is performed using the specified credentials.

###smarthost: `<hostname>`
Hostname of the smarthost.

###smarthost-port: `<port>`
Port number on which to contact the smarthost. Defaults to 25 if omitted.

###smarthost-username: `<username>`
Username to authenticate to the smarthost. Omit if no authentication is required.

###smarthost-password: `<password>`
Password to authenticate to the smarthost. Omit if no authentication is needed.

## DNS settings

You can override the settings that MailerQ uses to communicate with DNS settings. By default, MailerQ does 4 attempts to resolve a domain, and uses a timeout of 5 seconds to wait for an answer before it proceeds to the next server to resolve the domain. These settings can be changed.

The first lookup is done using UDP. If the response from the DNS server is truncated because it does not fit in a UDP datagram, MailerQ opens a TCP connection to the same DNS server to repeat the request. You can also modify this behavior and enforce that MailerQ only uses TCP, or only uses UDP.

When MailerQ sets up an SMTP connection, it first sends out the "HELO" message as is required by the SMTP protocol. (In fact, it first tries the more modern "EHLO" command defined by the ESMTP protocol). With this HELO or EHLO message a hostname is sent to the remote server that identifies the sender. Normally, MailerQ automatically detects which hostname to use (it simply does a reverse DNS query).

If you want to override this with different values you can add a helo map file in which you provide your own HELO hostnames.

The file should contain IPs and hostnames in following format:

```
10.0.0.1 hostname1.example.com
10.0.0.2 hostname2.example.com
[...]
```

###dns-timeout: `<timeout>`
Timeout in milliseconds before MailerQ proceeds to next DNS server. Default is 5000 milliseconds.

###dns-attempts: `<attempts>`
Number of attempts before giving up, defaults to 4.

###dns-force: `<"udp"|"tcp">`
The communication channel to use, either "udp" or "tcp". The default value is to use both.

###dns-helofile: `<filename>`
Loaction of the file containing HELO map.

## Debugging

When you're debugging or testing, you can force MailerQ to deliver all messages to a fixed IP address and port. You can for example use the [smtp-sink](http://www.postfix.org/smtp-sink.1.html) program for catching all these dummy deliveries.

It is recommended to only use this option for debugging; for other purposes such as routing all emails to a single external host the smarthost option should be utilized. This is because internally, MailerQ is still constructing queues and throttling domains, while the server for each domain is equal. With the smarthost option, these internal performance wastes are omitted and everything is routed directly to the external server, improving performance.

###smtp-sink-ip: `<ip address>`
Debug/test IP address to deliver all outgoing emails to.

###smtp-sink-port: `<port>`
Debug/test port number to deliver all outgoing emails to.

###smtp-sink-username: `<username>`
Username to authenticate to the sink.

###smtp-sink-password: `<password>`
Password to authenticate to the sink.

## Lockfile

To prevent that MailerQ starts more than once, MailerQ stores its process ID (pid) in a lockfile. The name and location of the lockfile can be set in the configuration file.

###lock: `<filename>`
Location of the lock file. Default is "/tmp/mailerq.pid".
