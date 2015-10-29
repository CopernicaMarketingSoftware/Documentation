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
[GitHub](https://github.com/CopernicaMarketingSoftware/Yothalot-PHP).
To download the the project you can create a directory, move to this
directory and type:

```bash
git clone https://github.com/CopernicaMarketingSoftware/Yothalot-PHP
```
Here we assume that git is already installed. If this is not the case you can install
it from the repository of your Linux distribution.

After having downloaded the project you go to the directory `Yothalot-PHP`
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
