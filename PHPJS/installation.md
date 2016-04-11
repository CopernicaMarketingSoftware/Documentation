# Installation instructions

PHP-JS is a PHP extension written in C++ that first has to be compiled and 
deployed on your server(s). To do this, you need the following tools on your
system:

* A modern C++ compiler with C++11 support (like g++ or clang)
* The PHP development environment
* GNU make
* Git
* The PHP-CPP library
* The Google V8 Javascript library

We are not going to help you install a compiler, set up a PHP build environment, 
or tell you how to install make or git -- there are a billion websites explaining 
how to achieve this. However, PHP-CPP and V8 are less well documented, so we will 
describe how to install these, before we start with PHP-JS.


## Installing PHP-CPP

[PHP-CPP](https://www.php-cpp.com) is a library (also made by Copernica, just like 
PHP-JS) that allows one to create native PHP extensions using C++. PHP-JS is built 
on top of PHP-CPP, so you need it before you can proceed with installing PHP-JS.

You can download [the latest PHP-CPP (stable) release](http://www.php-cpp.com/download)
from the PHP-CPP website, or get the latest unstable version from 
[GitHub](https://github.com/CopernicaMarketingSoftware/PHP-CPP). If you
want to use and compile the latest version from GitHub (which often is also the 
best and most up-to-date version available), you can enter the following
command line instructions in your terminal:

```bash
git clone https://github.com/CopernicaMarketingSoftware/PHP-CPP
cd PHP-CPP
make
sudo make install
```

If you prefer a stable release over the bleeding edge master branche, visit
[the releases overview](https://github.com/CopernicaMarketingSoftware/PHP-CPP/releases)
on GitHub to fetch the latest version. After you've downloaded an appropriate
version, you can install it (replace "X.Y" with the version number you're using):

```bash
wget https://github.com/CopernicaMarketingSoftware/PHP-CPP/archive/vX.Y.tar.gz
tar xfz vX.Y.tar.gz
cd PHP-CPP-X.Y
make
sudo make install
```

If you run into problems downloading or installing PHP-CPP, please check the
[PHP-CPP installation guide](http://www.php-cpp.com/documentation/install).



## Installing the Google V8 Javascript engine

Next stop is to install the V8 Javascript engine that is made by Google. We had 
some problems understanding the official installation guide, so we wrote [a much 
simpler installation guide](copernica-docs:PHPJS/v8) instead.

If you don't feel like reading this full installation tutorial, you can also directly
enter the following instructions in your terminal to install V8:

```bash
git clone https://chromium.googlesource.com/chromium/tools/depot_tools.git
export PATH=`pwd`/depot_tools:"$PATH"
gclient
fetch v8
cd v8
git checkout 5.1.299
make library=shared i18nsupport=off native
sudo cp include/*.h /usr/include
sudo cp out/native/lib.target/libv8.so /usr/lib 
sudo ldconfig
```


## Installing PHP-JS

Installing PHP-JS is very similar to installing PHP-CPP. You can also choose
between installing the latest [bleeding edge unstable version from
GitHub](https://github.com/CopernicaMarketingSoftware/PHP-JS), or one
of the [versioned releases](https://github.com/CopernicaMarketingSoftware/PHP-JS/releases).

Before installing PHP-JS you'll have to copy 2 files from the v8 installation directory.
You'll have to copy `out/native/natives_blob.bin` and `out/native/snapshot_blob.bin` into the
PHP-JS directory. We can't ship these files as they depend on your local v8 build.
After you've done this you can simply compile PHP-JS using ```make```. To then install
it systemwide using ```sudo make install```.

*Watch out*! Although the "sudo make install" instruction mentioned above works on 
most systems, on some environments you will have to do some things manually.
The "sudo make install" instruction copies the "php-js.ini" configuration file to 
the system wide "/etc/php/mods-available" directory. If you are on a system that
uses a different location for the php.ini files, you should copy this php-js.ini
file by hand to the appropriate directory.

After you've installed PHP-JS, you should tell PHP to enable the extension:

```bash
sudo php5enmod php-js
```

And - if you're using an Apache web server - restart this webserver:

```bash
sudo apache2ctl restart
```

