# How to install PHP-CPP

Before you can build your own super fast native PHP extension using the 
PHP-CPP library, you will first have to install the PHP-CPP library on your 
system(s).

Luckily, for most of us (those who use Linux or Apple environments), this 
will be a piece of cake. If you're on a different platform however, you are 
left on your own, because we (as in me, the PHP-CPP developer), only uses 
Linux systems. There is however no reason why this library should not also 
work on other platforms, because it only uses straight forward C++ code. 
Thus, if you are on a different platform and have managed to compile the 
library on it, please give us feedback so that we can update these 
installation instructions and include other platforms as well.

## Download

Installation begins with downloading the source code. You can either
download the latest release from our
[download](http://www.php-cpp.com/download) page, or get the
latest bleeding edge work-in-progress version from 
[GitHub](https://github.com/CopernicaMarketingSoftware/PHP-CPP).

To get the latest GitHub version, run the following command from the command
line:

```
$ git clone https://github.com/CopernicaMarketingSoftware/PHP-CPP.git
```

After you've downloaded the software (either from our website, or directly
from GitHub), change your working directory to the PHP-CPP directory, and open
the file named "Makefile" with your editor of choice.

The Makefile is a file that holds settings and instructions for the compiler.
In 96 out of 100 situations, the default settings in this Makefile will
already be perfect for you, but you may want to have a look at it and make
(small) changes to it. You can for example change the installation directory,
and the compiler that is going to be used.

After you've checked that all settings in the Makefile are correct, you can
build the software. Do this by running the following command from within
the PHP-CPP directory.

```
$ make
```
This will start the compiler and build the library.


## Compiling on OSX?

If you compile the software on OSX, you may run into linking and "unresolved
symbol" errors. In that case you will have to make a change to the Makefile.
Somewhere in this Makefile there is an option "LINKER_FLAGS". This option
should be extended, and the extra flag "-undefined dynamic_lookup" should
be added to it.

After you ran 'make', and the PHP-CPP library was built, all that is left to do is 
install it on your system. You can use the "make install" command for it.
This command should be executed as root, either by using "sudo", or by
logging on as root first.

`$ sudo make install`

That was it! After these steps you are now the happy owner of a system with 
PHP-CPP installed and nothing can stop you from building your first fast 
native PHP extension.
