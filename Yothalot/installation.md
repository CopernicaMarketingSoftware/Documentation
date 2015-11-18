# Installation

This page discusses how you can install and create a Yothalot cluster. Since
Yothalot uses some proven technologies developed by others some extra programs need to be installed as well.
The installation of these programs is discussed here too. If you simply want
to try out Yothalot you do not need to create a complete cluster and do not
have to follow all the steps discussed over here. You can go to our
[Setting up a local Yothalot configuration](copernica-docs:Yothalot/local-installation) page
instead.


## Some background

A working Yothalot cluster is actually composed out of two clusters, a cluster
used for storage and a cluster that is used for the actual computations.
These clusters may physically exist out of the same systems our different
ones, as long as they are connected. For the
storage side Yothalot depends on [GlusterFS](http://www.gluster.org/), a distributed
file system. Therefore, if you want to use Yothalot a GlusterFS cluster needs to be configured too.

The computational side is handled by Yothalot itself, where it uses messages
to communicate between the several processes that run on this cluster. These
messages are handled by [RabbitMQ](https://www.rabbitmq.com/), a proven message
broker. Therefore, RabbitMQ needs to be installed too in order to use Yothalot.

Below you can find some installation guidelines on how to create a GlusterFS
cluster and links to various resources are provided. Moreover, some configuration
settings specific for using GlusterFS with Yothalot are discussed. The page
also discusses how the install and configure RabbitMQ. Finally the page
discusses how Yothalot itself can be installed and configured. If you want
to have some extra information about the connection between the storage and
computation cluster you can read the [Files on the Yothalot cluster](copernica-docs:Yothalot/files "Files and paths")
documentation.


## Installation and configuration of GlusterFS

GlusterFS is a distributed file system that should be configured before
Yothalot can be used. The GlusterFS project contains a large amount of documentation on how to
setup and configure GlusterFS. A quick install guide of GlusterFS can
be found [here](http://gluster.readthedocs.org/en/latest/Quick-Start-Guide/Quickstart/).
A more in-depth guide is available [here](http://gluster.readthedocs.org/en/latest/Install-Guide/Overview/).
We advise you to follow the steps described over there for your use case
to setup your GlusterFS cluster.

If you have GlusterFS installed and configured you have to mount the GlusterFS file system
on the machines that you want to include in the Yothalot cluster. Every Yothalot
node needs access to the file system. You can make a mount point with the following
command:

```bash
sudo mount -t glusterfs nameOfCluster:/volume-name /path/to/mount/point
```

For efficiency purposes Yothalot automatically tries to assign jobs to nodes in the cluster that have
local access to the files that are mapped or reduced. To find out on which
servers the files are stored, Yothalot runs the `getfattr` command line tool. For a
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
able to connect to it. You can install these packages with:
```bash
$ sudo rpm -i /path/to/rabbitmq-server_version.rpm
```
for Red Hat based systems or:
```bash
$ sudo dpkg -i path/to/rabbitmq-server_version.deb
```
for Debian based systems.


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
install Yothatlot. You can download packages of the latest version of Yothalot
for Debian based (Debian, Ubuntu, etc) and Red Hat based environments 
(Red Hat, Fedora, CentOS, etc) from our [Download page](/download "Download Page").
These packages should be installed on the nodes that will form your Yothalot cluster.
You can install these packages with:
```bash
$ sudo rpm -i /path/to/yothalot-version.rpm
```
for Red Hat based systems or:
```bash
$ sudo dpkg -i path/to/yothalot-version.deb
```
for Debian based systems.
These commands will install Yothalot. However, there is one library on which
Yothalot depend that you should install yourself. The library on which Yothalot
depends is the JSON-C library, its installation is discussed below.


### Installation of json-c

Yothalot uses JSON objects to pass the information over the RabbitMQ queues.
For the construction of these JSON objects Yothalot relies on the [JSON-C](https://github.com/json-c/json-c/wiki)
library. Therefore you need to have this library installed on the systems
where Yothalot is installed. In particular Yothalot uses version 0.12 of
this library. Since older versions are not compatible with this version we
advise you to get the correct version from [GitHub](https://github.com/json-c/json-c/tree/json-c-0.12)
instead of trying to install it from the repository of your Linux distribution.
You can use Git to download the source code of the correct version. If you
have not installed Git on your system we advise you to install it as it can
also be used to download the source code that is necessary to [build the PHP API](copernica-docs:Yothalot/php-install "PHP Extension Installation").
For the installation of Git you can use the repository of your Linux distribution.
If you have Git installed you can create a directory, move to this directory
and type in:
```bash
git clone --branch json-c-0.12 https://github.com/json-c/json-c
```
The above command will download the source code of the correct version of the JSON-C library
After you have downloaded the source code you move to the directory `json-c`
and type in:
```bash
sh autogen.sh
./configure
```
These commands will result in a Makefile with which you can build your version
of the JSON-C library. To actually build the library you can type:
```bash
make
```
After having build the library you can install it by typing in:
```bash
sudo make install
```
Since the library will be installed in some system directories you need
to have super user privileges.


### Installation of LZ4 (optional)

Yothalot can compress the files that it is using for storing intermediate
results. This is useful as it reduces the network overhead in the cluster.
However, it comes at a cost, compressing and decompressing the files
takes some CPU time. The compression that Yothalot uses is [LZ4](http://cyan4973.github.io/lz4/).
If you want to want to make use of the compression functionality you have to install
the LZ4 library on all the nodes in your cluster. If you do not install this library, Yothalot will work but
does not compress the files.

Installing the LZ4 library is simple. If you have Git installed you move
to a directory where you can store the source code of LZ4 and type in:
```bash
git clone https://github.com/Cyan4973/lz4/
```
After this command there should be a directory called lz4. Move to this
directory and type in:
```bash
make
sudo make install
```
Now LZ4 is installed on your system.

** Note that you have to install the LZ4 library on each node in your cluster 
if you want to use the compression functionality or on none if you do not want
to use it.**

## Configuration of Yothalot

After the installation of Yothalot on all the nodes in the cluster you have
to configure Yothalot. Yothalot reads its configuration standard 
from the `/etc/yothalot/config.txt` config file. In this configuration file you can configure your Yothalot process.
We have a special [configuration section](copernica-docs:Yothalot/configuration)
on this website that explains all the settings from this config file.


## Getting a license

You can try out Yothalot without having a license. However, without a license
Yothalot is limited to one node and four concurrent processes. Besides the
restriction on the amount of resources that Yothalot will use, the behavior
is exactly the same as Yothalot installation without this limitation (see our
[Setting up a local Yothalot configuration](copernica-docs:Yothalot/local-installation)
documentation for more information on this). If you want to use Yothalot to
its full potential you need to have a license. You can get your license via the [License Page](/license) using your Copernica 
account credentials. If you do not have an account yet, you can create one
[over here](/account/register "Create an account"). Of course Yothalot should be aware
of your license. On a clean installation the path to the license is 
the same as the path of the [configuration file](copernica-docs:Yothalot/configuration)
(i.e. `/etc/yothalot`). So you can install the license file in this path on
each node. However, you can change the default path in the [configuration file](copernica-docs:Yothalot/configuration)
via:
```
license:        <Path to your license>
```
If you have questions about your license, feel free to send an email to
[support@copernica.com](mailto:support@copernica.com).


## Starting the processes

After having installed Yothalot on all the nodes that you want to use and
installed all the license files, you have to start a Yothalot process on
each node. You do not have to add extra command line arguments to specify
which node is the master node. This will be figured out by Yothalot itself.


## Using Yothalot

When you have all the processes running: a distributed GlusterFS file system,
a RabbitMQ server, and one or more Yothalot processes on different
machines in your network, you're ready to start running map/reduce jobs. To
create a map/reduce job, you can use one of our API's:

* [C++ API](copernica-docs:Yothalot/cppapi)
* [PHP API](copernica-docs:Yothalot/phpapi)

(Note that in order to use the PHP API you need to [install](copernica-docs:Yothalot/php-install "PHP Extension Installation")
the Yothalot PHP extension first)

That is all there is. Your Yothalot cluster is ready to go. If you are curious on how
to use it you can have a look at our MapReduce [Hello world!](copernica-docs:Yothalot/helloworld)
example, or read the documentation of the API of that language that you are using.

