# Your first extension

When you create your own PHP-CPP extension, you also have to compile and
deploy it. A normal PHP script only has to be copied to a web server to be 
deployed, but it takes a little more effort to deploy an extension: you need
a Makefile, an extension specific php.ini file and of course the *.cpp files
in which you implement your extension.

To help you out with these steps, we have created an almost empty extension with 
all these required files. It contains a sample Makefile, a sample configuration 
file, and a first main.cpp file in which the get_module() call is already 
implemented. This gives you a kickstart in developing an extension.

* [EmptyExtension.zip](http://www.php-cpp.com/EmptyExtension.zip)
* [EmptyExtension.tar.gz](http://www.php-cpp.com/EmptyExtension.tar.gz)

## Makefile

The EmptyExtension file contains a Makefile with instructions for the compiler.
You will have to make some (small) changes to this Makefile to make it compatible
with your extension. The most important things you want to modify are the NAME
variable, and probably also the INI_DIR.

```
#
#   Makefile template
#
#   This is an example Makefile that can be used by anyone who is building
#   his or her own PHP extensions using the PHP-CPP library. 
#
#   In the top part of this file we have included variables that can be
#   altered to fit your configuration, near the bottom the instructions and
#   dependencies for the compiler are defined. The deeper you get into this
#   file, the less likely it is that you will have to change anything in it.
#

#
#   Name of your extension
#
#   This is the name of your extension. Based on this extension name, the
#   name of the library file (name.so) and the name of the config file (name.ini)
#   are automatically generated
#

NAME                =   yourextension


#
#   Php.ini directories
#
#   In the past, PHP used a single php.ini configuration file. Today, most
#   PHP installations use a conf.d directory that holds a set of config files,
#   one for each extension. Use this variable to specify this directory.
#
#	In Ubuntu 14.04 Apache 2.4 is used, which uses the mods-available directory
# 	instead of a conf.d directory. In 16.04 the directory changed yet again.
#   This has to be checked.
#

UBUNTU_MAJOR  := $(shell /usr/bin/lsb_release -r -s | cut -f1 -d.)
OVER_SIXTEEN  := $(shell echo "${UBUNTU_MAJOR} >= 16" | bc)
OVER_FOURTEEN := $(shell echo "${UBUNTU_MAJOR} >= 14" | bc)

ifeq (${OVER_SIXTEEN}, 1)
	INI_DIR		=	/etc/php/7.0/mods-available/
else ifeq (${OVER_FOURTEEN}, 1)
	INI_DIR		=	/etc/php5/mods-available/
else
	INI_DIR		=	/etc/php5/conf.d/
endif


#
#   The extension dirs
#
#   This is normally a directory like /usr/lib/php5/20121221 (based on the 
#   PHP version that you use. We make use of the command line 'php-config' 
#   instruction to find out what the extension directory is, you can override
#   this with a different fixed directory
#

EXTENSION_DIR       =   $(shell php-config --extension-dir)


#
#   The name of the extension and the name of the .ini file
#
#   These two variables are based on the name of the extension. We simply add
#   a certain extension to them (.so or .ini)
#

EXTENSION           =   ${NAME}.so
INI                 =   ${NAME}.ini


#
#   Compiler
#
#   By default, the GNU C++ compiler is used. If you want to use a different
#   compiler, you can change that here. You can change this for both the 
#   compiler (the program that turns the c++ files into object files) and for
#   the linker (the program that links all object files into the single .so
#   library file. By default, g++ (the GNU C++ compiler) is used for both.
#

COMPILER            =   g++
LINKER              =   g++


#
#   Compiler and linker flags
#
#   This variable holds the flags that are passed to the compiler. By default, 
#   we include the -O2 flag. This flag tells the compiler to optimize the code, 
#   but it makes debugging more difficult. So if you're debugging your application, 
#   you probably want to remove this -O2 flag. At the same time, you can then 
#   add the -g flag to instruct the compiler to include debug information in
#   the library (but this will make the final libphpcpp.so file much bigger, so
#   you want to leave that flag out on production servers).
#
#   If your extension depends on other libraries (and it does at least depend on
#   one: the PHP-CPP library), you should update the LINKER_DEPENDENCIES variable
#   with a list of all flags that should be passed to the linker.
#

COMPILER_FLAGS      =   -Wall -c -O2 -std=c++11 -fpic -o
LINKER_FLAGS        =   -shared
LINKER_DEPENDENCIES =   -lphpcpp


#
#   Command to remove files, copy files and create directories.
#
#   I've never encountered a *nix environment in which these commands do not work. 
#   So you can probably leave this as it is
#

RM                  =   rm -f
CP                  =   cp -f
MKDIR               =   mkdir -p


#
#   All source files are simply all *.cpp files found in the current directory
#
#   A built-in Makefile macro is used to scan the current directory and find 
#   all source files. The object files are all compiled versions of the source
#   file, with the .cpp extension being replaced by .o.
#

SOURCES             =   $(wildcard *.cpp)
OBJECTS             =   $(SOURCES:%.cpp=%.o)


#
#   From here the build instructions start
#

all:                    ${OBJECTS} ${EXTENSION}

${EXTENSION}:           ${OBJECTS}
                        ${LINKER} ${LINKER_FLAGS} -o $@ ${OBJECTS} ${LINKER_DEPENDENCIES}

${OBJECTS}:
                        ${COMPILER} ${COMPILER_FLAGS} $@ ${@:%.o=%.cpp}

install:        
                        ${CP} ${EXTENSION} ${EXTENSION_DIR}
                        ${CP} ${INI} ${INI_DIR}
                
clean:
                        ${RM} ${EXTENSION} ${OBJECTS}

```

## CMakeLists.txt
If you prefer cmake, here is sample configuration for extension builds. 
File is not included into sample extension archive.
Dont forget to adjust you extension name.

```
cmake_minimum_required(VERSION 3.17)
project(yourextension)

set(CMAKE_CXX_STANDARD 20)

add_library(yourextension SHARED main.cpp)

# Adjust path if needed.
link_directories(/usr/local/lib)

find_library(PHP_CPP_LIB NAMES libphpcpp.so)
target_link_libraries(yourextension ${PHP_CPP_LIB})

if (APPLE)
    link_directories(/usr/local/lib)
    include_directories(/usr/local/include)
    set_property(TARGET yourextension PROPERTY PREFIX "")
    set_property(TARGET yourextension PROPERTY OUTPUT_NAME "yourextension.so")
    set_property(TARGET yourextension PROPERTY SUFFIX "")
endif()
```


## Yourextension.ini

Your extension should not only have a Makefile, but also an initial
yourextension.ini file. This file is much simpler than the Makefile. You
should also modify this file to refer to the real name of your extension
(instead of yourextension.so).

```
extension=yourextension.so
```

## Main.cpp

The last file that is available in this EmptyExtension file is the actual
implementation of the extension. Because the extension is empty (duh!) the
contents of this main.cpp need a lot of modification: you will have to add
all your functions and classes to it.

```cpp
#include <phpcpp.h>

/**
 *  tell the compiler that the get_module is a pure C function
 */
extern "C" {
    
    /**
     *  Function that is called by PHP right after the PHP process
     *  has started, and that returns an address of an internal PHP
     *  strucure with all the details and features of your extension
     *
     *  @return void*   a pointer to an address that is understood by PHP
     */
    PHPCPP_EXPORT void *get_module() 
    {
        // static(!) Php::Extension object that should stay in memory
        // for the entire duration of the process (that's why it's static)
        static Php::Extension extension("yourextension", "1.0");
        
        // @todo    add your own functions, classes, namespaces to the extension
        
        // return the extension
        return extension;
    }
}
```
