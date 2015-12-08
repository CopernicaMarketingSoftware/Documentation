# Installation

This page explains how to install and create a full Yothalot cluster, including
the installation of the external programs and libraries that Yothalot depends on.
If you simply want to try out Yothalot first without setting up a full cluster,
you can follow this installation guide too, but skip installing and setting up
GlusterFS: Yothalot can use a local file system if it runs on just a single node.


## Some background

A working Yothalot cluster is composed out of two clusters, a distributed
file system for storage and a cluster of servers used for running the algorithms.
Very often the same servers are used for these clusters: the clusters that make
up the distributed file system are then the same servers that run the mapreduce
jobs - but in theory it is very well possible to use different servers for the
distributed file system and different servers for running the jobs.

For the storage side Yothalot depends on [GlusterFS](http://www.gluster.org/), an
open source distributed file system. If you want to set up a Yothalot cluster,
you therefore first need to set up a GlusterFS cluster.

The computational side is handled by Yothalot itself, with one Yothalot daemon
process running on each server that is part of the cluster. These yothalot
processes use message queues to communicate. These queues are handled by
[RabbitMQ](https://www.rabbitmq.com/). RabbitMQ needs to be installed too in
order to use Yothalot.

Below you can find installation guidelines on how to create a GlusterFS
cluster, how to set up RabbitMQ and links to various resources. After GlusterFS
and RabbitMQ are installed, setting up Yothalot just comes down to starting the
"yothalot" daemon process on each of your servers. If you want to have extra
information you can read the [Files on the Yothalot cluster](copernica-docs:Yothalot/files "Files and paths")
documentation.


## Installation and configuration of GlusterFS

GlusterFS is a distributed file system that must be configured before Yothalot
can be used. The GlusterFS project contains a lot of documentation on how to
setup and configure GlusterFS. A quick install guide of GlusterFS can
be found [here](http://gluster.readthedocs.org/en/latest/Quick-Start-Guide/Quickstart/).
A more in-depth guide is available [here](http://gluster.readthedocs.org/en/latest/Install-Guide/Overview/).
We advise you to follow the steps described over there.

Once you have GlusterFS installed and configured you must mount this file system
on each of the machines that you are going to include in the Yothalot cluster.
Every server that you want to use for running Yothalot jobs needs access to the
distributed file system. You can make such a mount point with the following command:

```bash
sudo mount -t glusterfs glusterfsserver:/volume-name /path/to/mount/point
```

Yothalot automatically tries to assign jobs to nodes in the cluster that have
local access to the files that are being mapped or reduced. To find out on which
servers the files are stored, Yothalot runs the `getfattr` command line tool.
However, for a reason that is not completely clear to us, root privileges are
required to run this tool. As a consequence, you need to give special rights
to the Yothalot process to be able to run this command with root privileges.

The easiest way to do this is to add an extra line to the `/etc/sudoers` file
that says that the user that you use for running the yothalot process, may start
the `getfattr` tool without entering a password:

```
username ALL=(ALL) NOPASSWD: /usr/bin/getfattr
```

When you make changes to the sudoers file, better use the `visudo` tool instead of
writing to `/etc/sudoers` directly. This prevents you from locking yourself out
if you make a mistake.


## Installation and configuration of RabbitMQ

After you've set up GlusterFS, the next stop is to install and configure
RabbitMQ. Yothalot depends on this for all its queueing and inter process
communication. You need one running RabbitMQ instance (or if you want high availability
maybe even a cluster of instances) before you start Yothalot. We do not intend to write
a full installation guide for RabbitMQ here (you can find a full guide on the
[www.rabbitmq.com](https://www.rabbitmq.com) website), but we do have
some tips, tricks and recommendations.


### Make sure you use the right RabbitMQ version

The RabbitMQ version that is installed in the repository of your operating
system might be outdated. You really need a version that is up-to-date, because
Yothalot uses a couple of new features that were only recently added to RabbitMQ.
We recommend downloading and installing RabbitMQ directly from the
[www.rabbitmq.com](https://www.rabbitmq.com) website instead of using the version
that comes with your OS.

[Click here to download and install RabbitMQ](https://www.rabbitmq.com/download.html).

The RabbitMQ installation has to be **at least version 3.3.1+** for Yothalot to be
able to connect to it. For Red Hat based systems (like Red Hat, Fedora and CentOS)
you can install the downloaded file with the `rpm` tool:

```bash
$ sudo rpm -i /path/to/rabbitmq-server_version.rpm
```

For Debian based systems (like Debian or Ubuntu), the `dpkg` should be used to
install the downloaded package:

```bash
$ sudo dpkg -i path/to/rabbitmq-server_version.deb
```


### Check the RabbitMQ login and password

By default, when you install RabbitMQ, it creates a first user with login
"guest" and password "guest". This default login only works if you connect
to RabbitMQ locally (from localhost). In the Yothalot cluster however, machines
from all over the cluster need to connect to the RabbitMQ server, so you need
a login that also works from remote machines. You therefore either need to add
a user with a different name and password, or you should configure RabbitMQ to
allow "guest/guest" logins from remote hosts.

The `loopback_users` setting in the RabbitMQ config file can be used for that.
By including this option in the RabbitMQ config file, you tell RabbitMQ that it
is OK to login with "guest/guest", even if the user comes from a remote location.
If you do include this setting, do make sure that you also have a firewall running,
because you do not want everyone from all over the internet to connect to your
RabbitMQ instance!

[Read more about setting up loopback_users](https://www.rabbitmq.com/access-control.html).


### RabbitMQ management plugin

RabbitMQ comes with a very nice web interface. However, this web interface is not
enabled by default, and must be explicitly configured. We recommend doing this,
because it is much easier to control RabbitMQ via a web browser, than with command
line tools. You can find an article on the RabbitMQ website that explains how to
do this:

[https://www.rabbitmq.com/management.html](https://www.rabbitmq.com/management.html)


## Installation of Yothalot

After GlusterFS and RabbitMQ have been installed and configured, you're ready to
install Yothatlot. You can download packages of the latest version of Yothalot
for Debian based (Debian, Ubuntu, etc) and Red Hat based environments
(Red Hat, Fedora, CentOS, etc) from our [Download page](/download "Download Page").
These packages should be installed on the nodes that will form your Yothalot cluster.
Just like the RabbitMQ packages mentioned above, you need to `rpm` or `dpkg` tools
to install the packages:

```bash
$ sudo rpm -i /path/to/yothalot-version.rpm
```

```bash
$ sudo dpkg -i path/to/yothalot-version.deb
```

This installs the Yothalot server and the yothalot library that you need for
writing mapreduce jobs. However, the Yothalot daemon application only works if
the curl library is available on your system too.

### Installation of libcurl

The curl library can generally be found in your operating systems repository. If
it can't be found in there head over to [the libcurl website](http://curl.haxx.se/download.html)
to download packages for the latest version.

### Installation of LZ4 (optional)

Yothalot creates intermediate files when it runs mapreduce jobs. Yothalot can
compress these intermediate files to save disk space and network bandwith.
However, this comes at a cost: compressing and decompressing the files
takes CPU time. The compression that Yothalot uses is [LZ4](http://cyan4973.github.io/lz4/).
If you want the intermediate files to be compressed you need to have the LZ4
library installed on all the nodes in your cluster. If this library is not
installed, Yothalot will work just as well, but does not compress intermediate
files.

Installing the LZ4 library is simple. If you have Git, just give the following
instructions:

```bash
git clone https://github.com/Cyan4973/lz4/
cd lz4
make
sudo make install
```

Now LZ4 is installed on your system. Note that you have to install LZ4 on each
server in the cluster if you want to use the compression functionality.


## Configuration of Yothalot

You are almost ready to start. Before you start the Yothalot process on each of
your nodes, you first have to manually edit the `/etc/yothalot/config.txt` config
file. In this configuration file you can configure your Yothalot process.
We have a special [configuration section](copernica-docs:Yothalot/configuration)
on this website that explains all the settings from this config file.

The Yothalot process automatically detects the GlusterFS mount point, and will
read and write the intermediate files to this mount point. If you run Yothalot
locally, without access to a GlusterFS mount point, you must include an extra
option in the config file to tell Yothalot where its "virtual" distributed
file system can be found. See our special article about [setting up a local Yothalot environment](copernica-docs:Yothalot/local-installation)
for more information.


## Getting a license

Yothalot is a commercial product; you need a license to run it. Without a valid
license, Yothalot is limited to run on only one node and it only runs four concurrent
processes. To unlock the full potential of Yothalot you can get a license via
the [License Page](/license). The license file should be stored on each server
in your cluster. In the `/etc/yothalot/config.txt` configuration file you can
specify the path to this license file.

```
license:        <Path to your license>
```

If you have questions about your license, feel free to send an email to
[support@copernica.com](mailto:support@copernica.com).


## Starting the processes

After having installed the license on the nodes, you can start a Yothalot process
on each server. You do not have to add extra command line arguments, just run
`yothalot` from the command line.


## Using Yothalot

Now it is time to start writing and running mapreduce jobs. You can use one of
our API's for that:

* [C++ API](copernica-docs:Yothalot/cppapi)
* [PHP API](copernica-docs:Yothalot/phpapi)

(Note that in order to use the PHP API you need to [install](copernica-docs:Yothalot/php-install "PHP Extension Installation")
the Yothalot PHP extension first)

That is all there is. Your Yothalot cluster is ready to go. If you are curious on how
to use it you can have a look at our MapReduce [Hello world!](copernica-docs:Yothalot/helloworld)
example, or read the documentation of the API of that language that you are using.

