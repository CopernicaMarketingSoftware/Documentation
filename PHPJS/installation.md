# How to install PHP-JS

PHP-JS depends on a couple of other libraries and applications. Before you install PHP-JS you must make sure that the following other
libraries and tools are installed:

* C++ compiler (clang is prefered)
* PHP development environment
* PHP-CPP
* Google's V8 Javascript Engine

We are not going to help you set up
a PHP build environment, or tell you how to install a C++ compiler -- Google is your friend here, and there are
a billion websites explaining how to achieve this. However, PHP-CPP
and V8 are less well documented, so we will describe how to install these, before we start with PHP-JS.

During this tutorial you will use Git and Make, and it is assumed that you have these installed.

## Installing PHP-CPP

[PHP-CPP](https://www.php-cpp.com) is a library (also made
by Copernica, just like PHP-JS) that allows one to create native PHP
extensions using C++. PHP-JS is built on top of this library, because
the API of the V8 engine also uses C++.

### Download PHP-CPP

The first thing you have to do, is [download PHP-CPP (stable)](http://www.php-cpp.com/download)
from the PHP-CPP website. And unarchive to your desired location.

### Build PHP-CPP

Next, we have to build the project. Open the terminal, and navigate
to the directory where you have unarchived PHP-CPP to. You will find
a file called _Makefile_. To build the project, execute the following command:

```bash
make
```

After building has finished, install the library using like so:

```bash
sudo make install
```

PHP-CPP is now successfully installed!

## Installing Google's V8 javascript Engine

[V8](https://code.google.com/p/v8/) is Google's open source JavaScript engine.
You can follow their [tutorial](https://developers.google.com/v8/build)
if you prefer, but we think it is a bit vague, so we provide our own step by
step walkthrough.

Google uses its own wrapper around Git, called depot_tools.
You will need this to download the V8 source.
Depot_tools also has its own [tutorial](http://dev.chromium.org/developers/how-tos/install-depot-tools), but again we provide our own here.

### Download & install depot_tools

Using the terminal, navigate to the folder where you want to store depot_tools,
and download the project using the following terminal command:

```bash 
git clone https://chromium.googlesource.com/chromium/tools/depot_tools.git 
```

### Add depot_tools to your PATH variable

The easiest way to use depot_tools is to add it to your PATH variable.
Below is the command for doing this. Do not exit the terminal, or your
path variable will reset!

```bash
export PATH=`pwd`/depot_tools:"$PATH"
```

To test if depot_tools is correctly configured, type the following command:

```bash
gclient 
```

If installed correctly, a list of possible commands appears, and a .gclient
directory is created in your home directory.

### Download & build V8

Next up is downloading the V8 source code. Navigate to the folder
where you want to store the V8 source folder. Depot_tools provides
the following command for downloading V8:

```bash
fetch v8 && cd v8
```

This likely takes quite some time. After downloading is complete, you
will be put inside the v8 source directory. By default, the latest -
unstable - version is selected. This might work for you, but sometimes
this version will simply segfault.

The version we have tested with - and that seems to work - is 4.4.9.1.
To select this version to be built, execute the following command:

```bash
git checkout 4.4.9.1
```

You can now build v8, using the following command.

```bash
make library=shared i18nsupport=off native 
```

This can take some time. The _native_ argument makes sure V8
is built for your current platform, and the _library=shared_
argument tells make to build V8 as a shared library.


The _i18nsupport=off_ makes sure that the v8 engine does not build the
provided i18n library. The reason to not do this is that this usually
clashes with the system-provided i18n library (the shared object names
are the same and a package update could wipe it, or - if you install it
in some other directory - won't find it). Usually the system-provided
library works well enough.

### Install V8

Finally, you will have to install V8 manually, as its *Makefile* does not support *install*.
This happens in two steps, the first being the copying of include files.

There are two possible locations you can copy the include files to, and both are provided below.
For this tutorial, it does not matter which one you choose. Take the
one you prefer, but if you do not know what to choose, we recommend the first.

**Location 1 (recommended)**

```bash
sudo cp include/*.h /usr/local/include
```

**Location 2**
```bash
sudo cp include/*.h /usr/include 
```

Next to the include files, you also need to copy the compiled libraries.
The compiled files can be found in v8/out/native/lib.target.
Again, there are two possibilities:

```bash
sudo cp out/native/lib.target/libv8.so /usr/lib 
```

```bash
sudo cp out/native/lib.target/libv8.so /usr/local/lib
```

You now have successfully installed Google's V8 JavaScript Engine.

## Installing PHP-JS

Installing PHP-JS is very similar to installing PHP-CPP.
Start by opening the terminal.
Download the library at the [GitHub page](https://github.com/CopernicaMarketingSoftware/PHP-JS) and unarchive it.

Navigate to the PHP-JS source folder, where you will see a file called *Makefile*.
Build the project with this command:
```bash
make 
```

When building is done, install the library:
```bash 
sudo make install 
```

PHP-JS is now ready to use!

