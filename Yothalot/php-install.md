# Installation of the PHP extension

Yothalot can be used with a [PHP API](Yothalot/phpapi "PHP API"). This PHP API enables you to run PHP scripts
with mapreduce jobs on the Yothalot cluster. The API also makes it easy to
start up these jobs from within PHP. Before you can
use the PHP API you need to install PHP and the Yothalot-PHP extension besides
Yothalot. This page discusses how to install these. If you want to install
Yothalot you are referred to our [Installation](Yothalot/installation "Installation of Yothalot")
page.


## Installation of PHP5

In order to use the [Yothalot PHP API](Yothalot/phpapi "PHP API") you
need to have PHP5 installed on all the nodes in your Yothalot cluster and on the
machine that you use to start the job from. The easiest way to install
PHP5 is to install it via the repository of your Linux distribution. Note
that only PHP5 is supported and that you have to use the Zend engine.
Currently we do not support HHVM. 


## Installation of the Yothalot-PHP extension

The Yothalot-PHP extension is an open source project that is hosted on
[GitHub](https://github.com/CopernicaMarketingSoftware/Yothalot-PHP). The
project depends on two other open source projects of ours. Firstly, it depends
on our [PHP-CPP](https://github.com/CopernicaMarketingSoftware/PHP-CPP) library,
which is a C++ library that can be used to build PHP extensions. This allowed
us to build the extension in C++. Secondly, the extension depends on
[AMQP-CPP](https://github.com/CopernicaMarketingSoftware/AMQP-CPP),
a C++ library for communicating with a RabbitMQ message broker. Since Yothalot
uses RabbitMQ for its communication, the PHP extension needs to have access
to RabbitMQ as well. This library is perfectly suited for this.

Because Yothalot-PHP depends on the [PHP-CPP](https://github.com/CopernicaMarketingSoftware/PHP-CPP)
and [AMQP-CPP](https://github.com/CopernicaMarketingSoftware/AMQP-CPP) libraries, these libraries need
to be installed before [Yothalot-PHP](https://github.com/CopernicaMarketingSoftware/Yothalot-PHP)
can be installed. Let us start by downloading and installing the PHP-CPP
library.

The easiest way to download PHP-CPP is by using Git. If Git is not installed
on your system we advise you to install it since you can also use it for downloading
the other projects. You can use the repository of your
Linux distribution to install Git. If Git is installed you can create a directory,
move to this directory and type in:

```bash
git clone https://github.com/CopernicaMarketingSoftware/PHP-CPP
```

This command will download the current version of PHP-CPP in the directory
PHP-CPP in the directory you are located in. After you have downloaded PHP-CPP
you can go the the PHP-CPP directory and create the library from the source.
You can do this by typing in:
```bash
make
```
(note that you should do this in the PHP-CPP directory).
After you have build the library form the source, you can install it by
typing in:
```bash
sudo make install
```
This will install the PHP-CPP library on the system. Since the library will
be installed in some system directories you need to have super user privileges
for this command.

After you have installed the PHP-CPP library you can install the AMQP-CPP
library. The installation of the AMQP-CPP library is similar to the installation
of the PHP-CPP library. You can download the source by typing in:
```bash
git clone https://github.com/CopernicaMarketingSoftware/AMQP-CPP
```
Now if you move to the AMQP-CPP directory you can install the AMQP-CPP library
by typing in:
```bash
make
sudo make install
```
Just like above these commands will create the library from the downloaded
source and install it on the system.

Finally, you can download and install the Yothalot-PHP library. The commands
for doing this are:

```bash
git clone https://github.com/CopernicaMarketingSoftware/Yothalot-PHP
cd Yothalot-PHP
make
sudo make install
```
When you have installed the Yothalot-PHP library on all the nodes on your
cluster and on the system you want to use to start up your jobs, you can
use the [PHP API](Yothalot/phpapi "PHP API").
