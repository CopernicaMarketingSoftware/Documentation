# Writing a Mapreduce C++ Program

To run your mapreduce algorithm on a Yothalot cluster you have to implement
the algorithm in a class and create a little main function that uses this 
class in a particular way.

## The MapReduce Class

The class that you have to create for your mapreduce algorithm should inherit 
from the following pure virtual base class.

```cpp
/**
 *  MapReduce.h
 *  Pure virtual MapReduce base class
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
 *  Forward declarations
 */
class Reducer;
class Key;
class Values;
class Writer;

/**
 *  Class definition
 */
class MapReduce
{
public:
    /**
     *  The mapper step
     *  @param  value       The value to map
     *  @param  size        Size of the value
     *  @param  reducer     The result object to which key/value pairs can be mapped
     */
    virtual void map(const std::string &value, Reducer &reducer) = 0;

    /**
     *  Function to reduce a key that comes with a number of values
     *  @param  key         The key that should be reduced
     *  @param  values      Iteratable object with values that come with this key
     *  @param  writer      The result object to which values can written to
     */
    virtual void reduce(const Key &key, const Values &values, Writer &writer) = 0;

    /**
     *  Function to write the final result
     *  @param  key         The key for which a single value was found
     *  @param  value       The found value
     */
    virtual void write(const Key &key, const Value &value) = 0;
};
/**
 *  end namespace
 */
}

```
In your class that inherits from this pure virtual base class you have 
to implement your mapper step in `map()`, your reducer step in `reduce()`,
and your writer step in `write()`. Since instances of these classes run
in isolation, you cannot use shared state between them. However, the objects
share resources and multiple calls to `map()`, `reduce()`, and `write()`
may happen at the same time, therefore, you can have race conditions
if the objects try to access the same resource at the same time.

As you may have noticed the MapReduce class uses types: `Reducer`, `Writer`,
`key`, `value`, and `values`. You can find the properties of these types
on our [Yothalot Types](copernica-docs:Yothalot/cpp-types) page.

# Create the program

After implementing your mapreduce algorithm you have to create a little 
program that uses this implementation. The program should look as follows:
```cpp
/**
 *  myMapReduce.cpp
 *  main program that is passed to the Yothalot framework
 */

/**
 *  includes
 */
#include <yothalot.h>
#include "MyMapReduce.h"

/**
 *  the main program
 */
int main(int argc, char* argv[])
{
   // Instantiate your class
   MyMapReduce* myMR = new MyMapReduce();
   
   // Construct a Yothalot::Program object. You pass the instantiation of
   // your mapreduce class as a first argument and you pass argc and argv
   // as the second and third argument. 
   Yothalot::Program myYothalotProgram(myMR, argc, argv);
   
   // return
   return myYothalotProgram.run();
}
```
After you have created the class with your mapreduce implementation and the
main program you have to compile it. If you are using gcc you can use something
like:
```bash
g++ myMapReduce.cpp
```
You can of course add the optimization flags that you like, however, you
have to make sure that if you allow the compiler to use certain CPU features
these features should be supported by all CPUs in your Yothalot cluster.

Running the above command will give you a program a.out. The Yothalot
framework will pass this program around to its nodes and multiple calls
to this program may occur on one node.
