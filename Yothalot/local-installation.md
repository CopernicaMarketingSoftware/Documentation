# Setting up a local Yothalot configuration

If you just want to run Yothalot in a test or development environment, you
can install it locally. Setting up Yothalot locally is easier than setting up a 
complete cluster, because you do not have to set up the distributed GlusterFS 
file system.

That is the most important difference, all the other tools are necessary too for
a local setup: a RabbitMQ message broker, the JSON-C library and, of course,
the Yothalot process. For more information on how to set up all these tools
and libries, see the [installation guide](Yothalot/installation).

## Installation of RabbitMQ locally

Unlike what is being described in the [installation guide](Yothalot/installation),
it is not at all a problem that RabbitMQ only allows "guest/guest" logins if you
run it locally. You do not have to change any RabbitMQ configuration files, when
both Yothalot and RabbitMQ run on the same machine.


## Configuration of Yothalot

The Yothalot configuration file, `/etc/yothalot/config.txt`, needs an adjustment
to instruct Yothalot that you want to use a special directory as virtual 
"distributed file system". The only thing that you need to set is the `base-directory` 
option. By setting this varible you inform Yothalot what base directory holds the 
data and where it can create its temporary files. You can for example set it to 
a subdirectory of your home dir:

```
base-directory:         /home/username/yothalot-base-dir
```

Do make sure that this directory exists! Alternatively, you can set it to the 
system-wide temp directory:

```
base-directory:         /tmp
```

If you use the [PHP API](Yothalot/phpapi "PHP API") locally too, you 
also have to adjust the pathname in the PHP yothalot.ini file. This file is often stored
in `/etc/php5/mods-available/` and is called `yothalot.ini`. You should add
the following line

```
yothalot.base-directory = /home/username/yothalot-base-dir
```


## Getting a license

You don't need a license to run Yothalot locally. However, without a license the 
number of simultaneous processes is limited to 4. This is sufficient for testing
and debugging. Once you want to run larger jobs, or run Yothalot on more that
one machine, you can get a license via the [License Page](/license).


## Using Yothalot

After having installed and configured Yothalot you can start the Yothalot sever
and send jobs to it by using the [C++ API](Yothalot/cppapi).
You can also use the [PHP API](Yothalot/phpapi), yet, if you want
to use the PHP API you need to [install](Yothalot/php-install "PHP Extension Installation")
our Yothalot PHP extension first.
