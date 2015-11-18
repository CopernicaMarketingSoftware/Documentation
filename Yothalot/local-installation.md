# Setting up a local Yothalot configuration

This page gives guidance for those who want to use Yothalot locally.
Setting up a local Yothalot configuration is easier than setting up a complete
cluster and is therefore perfectly suited if you want to try out Yothalot. Having a local
configuration is also great for creating new mapreduce algorithms that
can directly be tested on a small set of the data. This enables you to quickly 
try out new algorithms and procedures as the turnaround cycle of starting up
a job and receiving results takes only a couple of seconds, one of the advantages
of Yothalot over Hadoop. 

Although Yothalot will be used locally, Yothalot will still act as if it
is running on a cluster. There is no difference in behavior between running a
job locally or on a cluster. Only the amount computation resources are of
course limited if you use Yothalot locally. Because there is no difference
in behavior you are also sure that if a job runs correctly locally, it will
run correctly on the cluster.

Because there is no difference in behavior of using Yothalot in a cluster or
locally, Yothalot uses the same technology for communicating with itself locally that
it uses for its communication in the cluster. For its communication Yothalot
uses message and [RabbitMQ](https://www.rabbitmq.com/) as message broker. Therefore,
in order to use Yothalot locally you need to have RabbitMQ locally installed as well.

Yothalot needs to use a distributed file system when it runs on cluster so
that it has access to all the files on all the nodes. This is not necessary
if Yothalot runs locally, since all local files are locally available. Because
Yothalot uses GlusterFS as its distributed file system and GlusterFS behaves
exactly the same as a local file system, there is again no change in behavior
of running Yothalot locally or globally. So, if Yothalot is used locally
there is no need to install a distributed file system that is to no avail in
a local setting.

What follows is a description of the installation and configuration of
RabbitMQ in a local setting and the installation and configuration of Yothalot,
also in a local setting.


## Installation of RabbitMQ locally

As mentioned above, Yothalot uses RabbitMQ for its internal communication.
Therefore you need to have RabbitMQ installed if you want to use Yothalot.
Since Yothalot uses some features that are recently added to RabbitMQ you need
to use **RabbitMQ version 3.3.1 or higher**. To be sure that you have a recent
enough version you can download a package with the current RabbitMQ server
from [here](https://www.rabbitmq.com/download.html).

You can install these packages with:
```bash
$ sudo rpm -i /path/to/rabbitmq-server_version.rpm
```
for Red Hat based systems or:
```bash
$ sudo dpkg -i path/to/rabbitmq-server_version.deb
```
for Debian based systems.

Since RabbitMQ creates on installation a first user with login "guest", and password "guest",
which can be accessed locally (from localhost), you can use the default and do
not have to configure anything for a working RabbitMQ connection.
The server should start up automatically. So this is all that is necessary
for getting a locally running RabbitMQ server.

### RabbitMQ management plugin

RabbitMQ comes with a very nice web interface. However, this
web interface is not enabled by default, and must be explicitly configured. We
recommend doing this, because it is much easier to control RabbitMQ via a web
browser, than with command line tools. You can find an article on the RabbitMQ
website that explains how to do this:

[https://www.rabbitmq.com/management.html](https://www.rabbitmq.com/management.html)


## Installation of Yothalot

After RabbitMQ has been installed and configured, you're ready to
install Yothatlot. You can download packages of the latest version of Yothalot
for Debian based (Debian, Ubuntu, etc) and Red Hat based environments 
(Red Hat, Fedora, CentOS, etc) from our [Download page](/download "Download Page").

If you have downloaded the appropriate package you can install it by typing in:
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


### Installation of JSON-C

Yothalot uses JSON objects to pass the information over the message queues.
For the construction of these JSON objects Yothalot relies on the [JSON-C](https://github.com/json-c/json-c/wiki)
library. Therefore you need to have this library installed. In particular Yothalot uses version 0.12 of
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
and put it in the json-c directory within the directory in which you executed the above command.
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
to have super user privileges. Now the JSON-C library is installed and you can continue
with configuring Yothalot.


## Configuration of Yothalot

After the installation of Yothalot your have to configure it. Yothalot reads its configuration 
from the `/etc/yothalot/config.txt` configuration file.
We have a special [configuration section](copernica-docs:Yothalot/configuration)
on this website that explains all the settings from this configuration file. Yet,
since you are using Yothalot locally you probably can use the default settings.
The only thing that you need to set is the `base-directory` option. Since
you are not using a GlusterFS cluster you need to inform Yothalot what base
directory holds the data and where it can create its temporary files. This
is what `base-directory` does. You can set it e.g. to your Yothalot working
directory in your home directory with:
```
base-directory:         /home/username/yothalotWork
```

Note: if you want to use the [PHP API](copernica-docs:Yothalot/phpapi "PHP API")
locally as well, you need to adjust the pathname to the working directory in
the PHP yothalot.ini file. After you have [installed](copernica-docs:Yothalot/php-install "PHP Extension Installation")
the PHP API, this file is located in `/etc/php5/cli/conf.d/`
and is called `xx-yothalot.ini` (where `xx` is a number). You should add
the following line
```
yothalot.base-directory = /home/username/yothalotWork
```


## Getting a license

You do not need to have a license if you want to run Yothalot locally. However, without
a license the number of processes that can run simultaneously is limited to 4.
For trying out Yothalot or for trying and creating new algorithms
on a small subset of the data this should be sufficient. If you hove more
local resources available that you want to use, you can get a license via
the [License Page](/license) using your Copernica account credentials. If
you do not have an account yet, you can create one [over here](/account/register "Create an account").
Of course Yothalot should be aware of your license. On a clean installation the path to the license is 
the same as the path of the [configuration file](copernica-docs:Yothalot/configuration)
(i.e. `/etc/yothalot`). So you can install the license file in this path.
However, you can change the default path in the [configuration file](copernica-docs:Yothalot/configuration)
via:
```
license:        <Path to your license>
```
If you have questions about your license, feel free to send an email to
[support@copernica.com](mailto:support@copernica.com).


## Using Yothalot

After having installed and configured Yothalot you can start the Yothalot sever
and send jobs to it by using the [C++ API](copernica-docs:Yothalot/cppapi).
You can also use the [PHP API](copernica-docs:Yothalot/phpapi), yet, if you want
to use the PHP API you need to [install](copernica-docs:Yothalot/php-install "PHP Extension Installation")
our Yothalot PHP extension first.
