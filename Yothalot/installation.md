# Installation

Yothalot uses [GlusterFS](http://www.gluster.org/) as its distributed
file system and [RabbitMQ](https://www.rabbitmq.com/) for its communication.
Before you can use Yothalot you need to have these installed and
configured. This page provides some installation guidelines for these
packages and provides links to various resources. 


## Installation and configuration of GlusterFS

The GulsterFS project contains a large amount of documentation on how to 
setup and configure GlusterFS. A quick install guide of GlusterFS can
be found [here](http://gluster.readthedocs.org/en/latest/Quick-Start-Guide/Quickstart/).
A more in-depth guide is available [here](http://gluster.readthedocs.org/en/latest/Install-Guide/Overview/).
We advise you to follow the steps described over there for your use case
to setup your GlusterFS cluster.

If you have GlusterFS installed and configured on your cluster you
have to mount the cluster to the machine where you run Yothalot. You
can do this by typing in:
```bash
sudo mount -t glusterfs nameOfCluster: /mount/point/
```

After this step you have access to all the files in the cluster.


## Installation and configuration of RabbitMQ

Yothalot heavenly depends on RabbitMQ for all its queueing. You therefore need a 
running RabbitMQ instance (or better: a cluster of instances) before you can start 
Yothalot. We do not intend to write a full installation guide for RabbitMQ here 
(you better check the [www.rabbitmq.com](https://www.rabbitmq.com) website for that), 
but we do have some tips, tricks and recommendations.


### Make sure you use the right RabbitMQ version

The RabbitMQ version that is installed in the repository of your operating 
system might be outdated. You really need a version that is up-to-date, 
because Yothalot uses a couple of new features that were only recently
added to RabbitMQ. We recommend downloading and installing RabbitMQ
directly from the [www.rabbitmq.com](https://www.rabbitmq.com) website
instead of using the version that comes with your OS.

[Click here to download and install RabbitMQ](https://www.rabbitmq.com/download.html).

The RabbitMQ installation has to be **at least version 3.3.1+** for Yothalot to be 
able to connect to it.


### Check your login and password

By default, when you install RabbitMQ, it creates the first user with login 
"guest" and password "guest". You can only use this default login if you connect 
to RabbitMQ locally (from localhost). If you connect from a remote host, the "guest/guest" 
login does not work. Therefore, if you install RabbitMQ and Yothalot on different machines, 
you either need to add a user with a different name and password, or you should configure 
RabbitMQ to allow "guest/guest" logins from remote hosts as well.

The `loopback_users` setting in the RabbitMQ config file can be used for that. 
By including this option in the RabbitMQ config file, you tell RabbitMQ that it is OK to 
login with "guest/guest", even if the user comes from a remote location. If you do 
include this setting, please make sure that you also have a firewall running, 
because you do not want everyone from all over the internet to connect to your 
RabbitMQ instance!

[Read more about setting up loopback_users](https://www.rabbitmq.com/access-control.html).


### Management plugin

RabbitMQ comes with a very nice web interface. However, this 
web interface is not enabled by default, and must be explicitly configured. We 
recommend doing this, because it is much easier to control RabbitMQ via a web 
browser, than with command line tools. You can find an article on the RabbitMQ 
website that explains how to do this:

[https://www.rabbitmq.com/management.html](https://www.rabbitmq.com/management.html)

## Installation of Yothalot

After GlusterFS and RabbitMQ have been installed and configured, Yothatlot can be
installed. You can download a Yothalot package for your distribution from our 
[Download page](LINK). After having downloaded the package you can install it on
Debian based systems with:

```bash
sudo pkg -i /path/to/yothalot-version.rpm
```
On Red Hat based systems you can use:

```bash
$ sudo rpm -i /path/to/yothalot-version.rpm
```
Does a package "automatically" set up the php modules? If not a user should
add Yothalot to php with:
```bash
sudo php5enmod yothalot
```

## Connecting Yothalot with RabbitMQ 

When you want to send jobs to the Yothalot cluster, you actually send the job to a RabbitMQ
message queue. Therefore, when you create an instance of the connection object, you have to pass
RabbitMQ's credentials to it. 

```php
// construct the connection to the RabbitMQ server
$master = new Yothalot\Connection(array(
   "host"         => "localhost",
   "user"         => "guest",
   "password"     => "guest",
   "vhost"        => "/",
)); 
```
Yothalot\Connection takes an associative array in which the keys "host, "user",
"password" and "vhost" can be set to specific values. With the "host" key you set
the host name of the server where RabbitMQ runs. With the "user" key you set the user
name of RabbitMQ and with the "password" key you set its password.
If you have created a specific RabbitMQ vhost environment you can add the
specific vhost to the rabbitmq-vhost variable by setting the "vhost" key.
The default values for "host", "user", "password", and "vhost" are, "localhost",
"guest", "guest", and "/" respectively. For more information and some advanced
setting we refer to the [Connectio](copernica-docs:Yothalot/connection "Connection") documentation.

For more information on how to use Yothalot see our [Hello world!](copernica-docs:Yothalot/hellowordl) example. 
