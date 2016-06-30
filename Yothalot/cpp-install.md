# C++ Library Installation

# Installation of the C++ API

In order to use the C++ API you need to have some libraries and of course
the Yothalot-CPP-API installed on your nodes.

The libraries that you need are:
*   libev, 
*   json-c
*   c-ares
*   AMQP-CPP
*   REACT-CPP

## Installation of the necessary libraries

The libev, json-c, and c-ares libraries are all packaged in the repositories
of the popular Linux distributions. You can use your package manager to install
them.

AMQP-CPP is our own developed library for communicating with a RabbitMQ
message broker. The project is open source and is available on 
[github](https://github.com/CopernicaMarketingSoftware/AMQP-CPP).
To install the library you can create a directory, move to this directory and type:

```bash
git clone https://github.com/CopernicaMarketingSoftware/AMQP-CPP
make
make install
```
For the last command you need to have root privileges. The above command
assumes that you have git installed. If this is not the case you can install
it from the repository of your Linux distribution.


REACT-CPP is our own opensource C++ event loop library. You can find the project
on [github](https://github.com/CopernicaMarketingSoftware/REACT-CPP)
In order to get the library you can type in the following commands in 
your terminal:
```bash
git clone https://github.com/CopernicaMarketingSoftware/REACT-CPP
make
```
To execute `make` you probably need to have root privileges.

## Installation of the C++ API
After you have [downloaded](/download) the C++ API you can install it 
using:

```bash
$ sudo rpm -i /path/to/yothalot-cpp-api-version.rpm
```
for Red Hat based systems or:
```bash
$ sudo dpkg -i path/to/yothalot-cpp-api-version.deb
```
for debian based systems.

After you have installed the necessary libraries you can create your 
Yothalot [mapreduce](cpp-program "MapReduce program")
and [regular and race](cpp-other "Regualar and race program") programs.
