# Installation

Yothalot uses [GlusterFS](http://www.gluster.org/) as its distributed
file system and [RabbitMQ](https://www.rabbitmq.com/) for its communication.
Before you can use Yothalot you need to have these installed and
configured. This page provides some installation guidelines for these
packages and provides links to various resources.


## Installation and configuration of GlusterFS

The GlusterFS project contains a large amount of documentation on how to
setup and configure GlusterFS. A quick install guide of GlusterFS can
be found [here](http://gluster.readthedocs.org/en/latest/Quick-Start-Guide/Quickstart/).
A more in-depth guide is available [here](http://gluster.readthedocs.org/en/latest/Install-Guide/Overview/).
We advise you to follow the steps described over there for your use case
to setup your GlusterFS cluster.

If you have GlusterFS installed and configured you have to mount the file system
on the machines that you want to include in the Yothalot cluster. Every Yothalot
node needs access to the file system. You can make a mount point with the following
command:

```bash
sudo mount -t glusterfs nameOfCluster:/volume-name /path/to/mount/point
```

Yothalot automatically tries to assign jobs to nodes in the cluster that have
local access to the files that are mapped or reduced. To find out on which
servers files are stored, Yothalot runs the `getfattr` command line tool. For a
reason that is not completely clear to us, only the root user may do this. For
Yothalot to work properly you therefore need to give special privileges to run
this command.

The easiest way to do is, is to add an extra line to the `/etc/sudoers` file
that says that the user that you use for running the yothalot process, may start
the `getfattr` tool without entering a password:

```
username ALL=(ALL) NOPASSWD: /usr/bin/getfattr
```

To make changes to the sudoers file, better use the `visudo` tool instead of
writing to `/etc/sudoers` directly. This prevents you from locking yourself out
if you make a mistake.


## Installation and configuration of RabbitMQ

After you've set up GlusterFS, the next stop is to install and configure
RabbitMQ. Yothalot depends on this for all its queueing and inter process
communication. You therefore need a running RabbitMQ instance (or even better:
a cluster of instances) before you can start Yothalot. We do not intend to write
a full installation guide for RabbitMQ here (you can find a full guide on the
[www.rabbitmq.com](https://www.rabbitmq.com) website), but we do have
some tips, tricks and recommendations.


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


### Check the RabbitMQ login and password

By default, when you install RabbitMQ, it creates a first user with login
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


### RabbitMQ management plugin

RabbitMQ comes with a very nice web interface. However, this
web interface is not enabled by default, and must be explicitly configured. We
recommend doing this, because it is much easier to control RabbitMQ via a web
browser, than with command line tools. You can find an article on the RabbitMQ
website that explains how to do this:

[https://www.rabbitmq.com/management.html](https://www.rabbitmq.com/management.html)

## Installation of Yothalot

After GlusterFS and RabbitMQ have been installed and configured, you're ready to
install Yothatlot. At this point in time, we do not have finished our download
section, but if you're interested, drop us an email at [info@copernica.com](mailto:info@copernica.com).

The yothalot process reads its configuration from the `/etc/yothalot/config.txt`
config file. In this configuration file you can configure your Yothalot process.
We have a special [configuration section](copernica-docs:Yothalot/configuration)
on this website that explains all the settings from this config file.


## Installation of an API

When you have all the processes running: a distributed GlusterFS file system,
a RabbitMQ server, and one or more Yothalot processes on different
machines in your network, you're ready to start running map/reduce jobs. To
create a map/reduce job, you can use one of our API's:

* [PHP API](copernica-docs:Yothalot/phpapi)
* [C++ API](copernica-docs:Yothalot/cppapi)

That is all there is. Your Yothalot cluster is ready to go. If you are curious on how
to use it you can have a look at our MapReduce [Hello world!](copernica-docs:Yothalot/helloworld)
example, or read the documentation of the API of that language that you are using.

