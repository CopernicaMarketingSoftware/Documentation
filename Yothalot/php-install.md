# Installation of the PHP extension

In order to use the [Yothalot PHP API](copernica-docs:Yothalot/phpapi "PHP API") you
need to have PHP5 installed on all the nodes in your Yothalot cluster and the
machine that you want to use to start the script from. You can install PHP5
via the repository of your Linux distribution. Besides having PHP5 installed,
you also of course also need to have
[Yothalot itself installed](copernica-docs:Yothalot/installation "Installation of Yothalot")
on all machines in the cluster and on the machine on which you want to run
your script. Finally you need to install the Yothalot PHP extension.
The extension is an open source project that is hosted on
[GitHub](https://github.com/CopernicaMarketingSoftware/Yothalot-PHP). The
project depends on two other open source projects of ours. Firstly, it depends
on our [PHP-CPP](https://github.com/CopernicaMarketingSoftware/PHP-CPP) library,
which is a C++ library that can be used to build PHP extensions. Secondly,
the extension depends on [AMQP-CPP](https://github.com/CopernicaMarketingSoftware/AMQP-CPP),
a C++ library for communicating with a RabbitMQ message broker.

Firstly, download the souce of [PHP-CPP](https://github.com/CopernicaMarketingSoftware/PHP-CPP)
To download the the source of this project you can create a directory, move to this
directory and type:
```
git clone https://github.com/CopernicaMarketingSoftware/PHP-CPP
```
Here we assume that git is already installed. If this is not the case you can install
it from the repository of your Linux distribution.

After having downloaded the project you go to the directory `PHP-CPP`
and type in the command line:

```bash
make -j
```
This will compile the project (to flag -j makes sure that you use all
resources that you have available to you). After the program has been build
you can install it by typing in:

```bash
sudo make install
```
You need to use sudo (or have root access already).

Secondly, you have to download the source of [AMQP-CPP](https://github.com/CopernicaMarketingSoftware/AMQP-CPP)

```bash
git clone https://github.com/CopernicaMarketingSoftware/AMQP-CPP
```
and install it:
```bash
make -j
sudo make install
```

Finally, you can download the source of the [Yothalot-PHP](https://github.com/CopernicaMarketingSoftware/Yothalot-PHP)
extension and install it

```bash
git clone https://github.com/CopernicaMarketingSoftware/Yothalot-PHP
cd Yothalot-PHP
make -j
sudo make install
```
