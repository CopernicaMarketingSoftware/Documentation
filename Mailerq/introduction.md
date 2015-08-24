# Getting started with MailerQ

MailerQ relies on [RabbitMQ](https://www.rabbitmq.com) for its message queues. 
RabbitMQ is a server application that deals with message queue'ing. Before you're 
going to install and configure MailerQ, you must therefore first make sure you 
have access to a working RabbitMQ server. If you have a working and up-to-date 
RabbitMQ server, you can proceed with setting up MailerQ. Otherwise, check our 
[using RabbitMQ article](copernica-docs:Mailerq/rabbitmq).

**MailerQ requires RabbitMQ version 3.3.1+**

## Installing MailerQ

After you've installed your RabbitMQ server, you can proceed with setting up MailerQ. 
Installing the MailerQ Mail Transfer Agent (MTA) on a Linux server is easy. We have 
[downloads](/product/download "Download MailerQ") for Debian based environments
(Debian, Ubuntu, etc) and for Red Hat based environments (Red Hat, Fedora, CentOS, etc).

After you have [downloaded](/product/download "Download MailerQ") the appropriate 
MailerQ .deb or .rpm file, you can install it on your system. This can probably 
be achieved by double-clicking on it if you have a desktop computer, or with 
one of the following command line instructions:

## Red Hat based environments:

```bash
$ sudo rpm -i /path/to/mailerq-version.rpm
```

## Debian based environments:

```bash
$ sudo dpkg -i path/to/mailerq-version.deb
```


Now MailerQ is installed on your system. The MTA can be started by entering the
"mailerq" command on the command line. But before you do this, you probably
want to make some changes to the configuration file.

## Configuration

The [MailerQ configuration file](copernica-docs:Mailerq/configuration "MailerQ configuration")
can be found in the "/etc/mailerq" directory and is named "config.txt". It holds
many options that you should set before you can start mailerq. The most important
options are the address and login credentials of your RabbitMQ message broker
and your license key. We have documented [all supported configuration options](copernica-docs:Mailerq/configuration "MailerQ configuration").
A number of options require special attention.

### RabbitMQ configuration

The most important settings in the config file of course deal with RabbitMQ.
The hostname of the RabbitMQ server, and the names of the exchanges and queues
should all be specified in the config file. MailerQ helps you in setting up the
RabbitMQ configuration: if you include a queue or exchange in the config file
that does not yet exist, it will automatically be created by MailerQ.

Keep in mind that all results are also published to RabbitMQ. If you run MailerQ
in production, this could result in queues that are built up rappidly. To prevent
that your RabbitMQ server runs out of resources, you either have to ensure that
you periodically clean these queues, or you should configure MailerQ not to publish results.

### Database configuration

Besides the _essential_ settings to connect to RabbitMQ, you probably also want to
connect to a SQL database. Such a database is used by MailerQ to store the configuration
of email throttling settings, DKIM keys, flood patterns and any other delivery settings.
By default, MailerQ sets up a SQlite database for these settings. However, MySQL and
PostgreSQL are faster and better suited for high performance servers.

If you are happy to use the standard SQLite database you do not need to change any
of the settings in the database configuration file. If you want MailerQ to store the
settings in a different database , you will have to specify the database address.
You can find more information on how to do so in the database configuration settings.

MailerQ automatically creates or alters missing or incomplete tables. If you use a
MySQL or PostgreSQL database, you should ensure that the specified database is
already created, and that MailerQ has enough privileges to create and modify tables.
For a SQLite database you only have to make sure that the database file is writable.

You must also make sure that you've installed the necessary database libraries on
your system so that MailerQ can actually _connect_ to the database. If you use the
default SQLite database, you must ensure that the sqlite3 library is installed on
your server. For MySQL you need the mysqlclient or mariadbclient library, and for
PostgreSql you need to pq library.

### License file

The configuration file also holds a reference to a license file. After creating a
MailerQ account, you can [download a license from this website](/product/license).
If you have questions about your license, feel free to send an email to
[info@mailerq.com](mailto:info@mailerq.com).

## Let's get started!

Now you're ready to get started. Enter "mailerq" on the command line and your MTA is running.

```bash
$ mailerq
```

MailerQ comes with a web based
[management console](copernica-docs:Mailerq/management-console "An MTA with a management console")
that you can use to monitor exactly what is happening. This MTA console can be opened
from your browser. The port number and password can be set in
the [config file](copernica-docs:Mailerq/configuration "MailerQ configuration"). 
The default location is http://your-server-name:8485.

To start sending mails with MailerQ, you need
[to publish an e-mail to the appropriate message queue](copernica-docs:Mailerq/send-email "Send emails with MailerQ")
in RabbitMQ or use one of our [examples]copernica-docs:Mailerq/mailerq-examples "MailerQ examples").
