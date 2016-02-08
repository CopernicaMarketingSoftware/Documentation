# Getting started with MailerQ

MailerQ is a Mail Transfer Agent (MTA) that uses [RabbitMQ](https://www.rabbitmq.com) 
for its message queues. Before you install and configure MailerQ, you will need to download 
and set up RabbitMQ (version 3.3.1+). Once RabbitMQ is installed and you have access to a running and 
up-to-date RabbitMQ server, you can proceed with installing MailerQ. For tips on 
how to install RabbitMQ, read our [RabbitMQ installation article](rabbitmq-install "RabbitMQ installation").

## Installing MailerQ

After installing your RabbitMQ server, you can proceed with setting 
up MailerQ. Installing the MailerQ Mail Transfer Agent (MTA) on a Linux 
server is easy. We have [downloads](/product/download "Download MailerQ")
for Debian based (Debian, Ubuntu, etc) and Red Hat based environments 
(Red Hat, Fedora, CentOS, etc).

After [downloading](/product/download "Download MailerQ") the appropriate 
MailerQ .deb or .rpm file, you can install it on your system. This can probably 
be achieved by double-clicking on it if you have a desktop computer, or with 
one of the following command line instructions:

### Red Hat based environments:

```bash
$ sudo rpm -i /path/to/mailerq-version.rpm
```

### Debian based environments:

```bash
$ sudo dpkg -i path/to/mailerq-version.deb
```

Now that MailerQ is installed on your system, the MTA can be started by entering the
"mailerq" command on the command line. But before you do this, you probably
want to make some changes to the configuration file.

## Configuration

MailerQ is configured via one central configuration file `config.txt` that can 
be found in the `/etc/mailerq` directory. It holds many options that you should
set before you can start MailerQ. The most important options are the address
and login credentials of your RabbitMQ message broker and your license key
location. The configuration of these options is discussed below. A complete 
list of all options on how MailerQ interacts with RabbitMQ can be found 
[here](rabbitmq-config "Connect MailerQ with RabbitMQ").
A list of other configurable options is given [here](configuration "MailerQ configuration").

### Configuring MailerQ to connect with RabbitMQ

MailerQ reads the location and authentication information to connect with RabbitMQ
from its config file. Make sure you include the following variables
in the MailerQ configuration file (/etc/mailerq/config.txt):

```
rabbitmq-address:          <URL of RabbitMQ server> (default: amqp://guest:guest@localhost/)
```

The `rabbitmq-address` variable holds the URL of your RabbitMQ server, in 
`amqp://username:password@hostname/vhost` format.

If you have 
a [cluster of RabbitMQ nodes](https://www.rabbitmq.com/clustering.html), they have to 
be separated by a semi-colon (e.g. host1;host2;host3;). Setting up a cluster means you 
will have highly available queues. Since MailerQ 4.0, even setting up a single
node will create a cluster.
[Read more about highly available queues](https://www.rabbitmq.com/ha.html)

The `username` and `password` fields inside the `rabbitmq-address` variable hold
the username and password of the RabbitMQ server, as set in the RabbitMQ
configuration. The default is `guest/guest`, which only works when connecting to
localhost. If you run RabbitMQ on a separate server, you will need to set your
own username and password, or configure the RabbitMQ server to allow `guest/guest`
logins from remote hosts (see [RabbitMQ's Access Control Configuration](https://www.rabbitmq.com/access-control.html "RabbitMQ's Access Control Configuration")).

The `vhost` field is, by default, empty. If you created a specific RabbitMQ vhost
environment, you can set this.

These basic settings enable MailerQ to connect to RabbitMQ. A complete list of all
configurable options on how MailerQ interacts with RabbitMQ can be found
[here](rabbitmq-config "Connect MailerQ with RabbitMQ").

### License file

After creating a MailerQ account, you can [download a license from this website](/product/license). 
MailerQ should be aware of the location of this license. This location can be 
set in the configuration file via:

```
license:		<Path to your license> (empty by default)
```

On a clean installation, the path to the license is set to the same directory 
as config.txt (i.e. `/etc/mailerq/license.txt`). If you have questions about your license, 
feel free to send an email to [info@mailerq.com](mailto:info@mailerq.com).

With these configuration steps you are ready to start. However, we do recommend 
reading the [page](rabbitmq-config "Connect MailerQ with RabbitMQ") 
on how MailerQ interacts with RabbitMQ and checking all other configuration 
options, so you can adjust your configuration accordingly.

## Let's get started!

Now you're ready to get started. Enter `mailerq` on the command line and your MTA is running.

```bash
$ mailerq
```

MailerQ comes with a web based
[management console](management-console "An MTA with a management console")
that you can use to monitor exactly what is happening. This MTA console can be opened
from your browser. The port number and password can be set in
the config file (for more information see [Management Console](management-console "Management console"). 
The default location is `http://your-server-name:8485`.

To start sending mails with MailerQ, you need to
[publish an e-mail to the appropriate message queue](send-email "Send emails with MailerQ")
in RabbitMQ or use one of our [examples](mailerq-examples "MailerQ examples").

