# Writing a C++ Race Algorithm

If you want to process a lot of data simultaneously in a general way and
do not want to use a reduce and write step, you can create a program that
follows the Race API so you can use the Yothalot framework to parallelize
the work for you.

To run your race algorithm on a Yothalot cluster you have to implement
the algorithm in a class that inherits form Yothalot::Race. This class
should then be called from an [executable](copernica-docs:Yothalot/cpp-program "Create a Yothalot executable")


## The Race Class

The class that you have to create for your race algorithm should inherit 
from the following pure virtual base class.

```cpp
/**
 *  Race.h
 *  Pure virtual Race base class
 */

/**
 *  Include guard
 */
#pragma once

/**
 *  Includes
 */
#include <string>
#include "keyvalue.h"

/**
 *  Set up namespace
 */
namespace Yothalot {
/**
 *  Class definition
 */
class Race
{
public:
    /**
     *  The process
     *  @param  value       The value to map
     *  @param  size        Size of the value
     *  @param  reducer     The result object to which key/value pairs can be mapped
     */
    virtual Result process(const char *value, size_t size) = 0;
};
/**
 *  end namespace
 */
}

```
In your class that inherits from this pure virtual base class you have 
to implement `process()`.

## Processing
The part that needs to be implemented by you is the `process()` method.
In this method you implement your algorithm that processes the data. 
The data that needs to be processed is passed to `process()` via its first
argument of type `const char *` and the second argument that holds the length
of the data of type `size_t`. Note that each single piece of data that you
pass to your Yothalot program will result in a call to `process()`. So, although it possible to call
process on each single piece of data, this will result in a lot of calls to `process()`,
each call having some overhead. Therefore, you want to provide `process()` with
enough data in that single argument to keep it busy for a while. E.g. you can
pass strings that contain the name of a file that contains some data that you want to 
process. If you pass some file names, some processes can nicely run in parallel and the
overhead is not to large. Passing data can be done in multiple ways and is
described in the [using a Yothalot::Job](copernica-docs:Yothalot/cpp-job) 
and [starting up a job manually](copernica-docs:Yothalot/cpp-manual) articles.

The `process()` method returns a type Yothalot::Result. When `Yothalot::Result` object
that is returned holds the value null, the Yothalot framework keeps on processing. However,
if the data is non-null, all processes will be ended. With this functionality 
it is not only easy to process a lot of data, but you can also use it for
searching to a lot of data. Once you have found an occurrence of the thing
you are looking for you simply pass the location and you are done. An example
of a race algorithm is:

```cpp
class MyRace : public Yothalot::Race
{
public:
    /**
     *  Implementation for a process function
     *  @param  std::string       Value that is being mapped
     *  @return Yothalot::Value   Your return value
     */
    virtual Yothalot::Value process(const char *value, size_t size) override
    {
        // @todo:   implement your process algorithm
        
        // if the result is zero the job will continue else the result 
        // will be returned by the job and the job will be stopped
        // We will process all data so we can just return a zero
        return  0;
    }
}
```
Since instances of these classes run in isolation, you cannot use shared
state between them. However, the objects share resources and multiple calls
to `process()` may happen at the same time, therefore, you can have race
conditions if the objects try to access the same resource at the same time.

After having created your race algorithm in the above described way
you can call your algorithm from a little 
[executable](copernica-docs:Yothalot/cpp-program "Create a Yothalot program")
