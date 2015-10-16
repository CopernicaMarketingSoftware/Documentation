# Writing a Race C++ Program

To run your Race algorithm on a Yothalot cluster you have to implement
the algorithm in a class and create a little main function that uses this 
class in a particular way, just like you do when writing a Mapreduce algorithm.

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
    virtual void process(const std::string &value) = 0;
};
/**
 *  end namespace
 */
}

```
In your class that inherits from this pure virtual base class you have 
to implement `process()`. Since instances of these classes run in isolation,
you cannot use shared state between them. However, the objects share
resources and multiple calls to `process()` may happen at the same time,
 therefore, you can have race conditions if the objects try to access
the same resource at the same time.

# Create the program

After implementing your mapreduce algorithm you have to create a little 
program that uses this implementation. The program should look as follows:
```cpp
/**
 *  myRace.cpp
 *  main program that is passed to the Yothalot framework
 */

/**
 *  includes
 */
#include <yothalot.h>
#include "MyRace.h"

/**
 *  the main program
 */
int main(int argc, char* argv[])
{
   // Instantiate your class
   MyRace* myR = new MyRace();
   
   // Construct a Yothalot::Program object. You pass the instantiation of
   // your mapreduce class as a first argument and you pass argc and argv
   // as the second and third argument. 
   Yothalot::Program myYothalotProgram(myR, argc, argv);
   
   // return
   return myYothalotProgram.run();
}
```
After you have created the class with your race implementation and the
main program you have to compile it. If you are using gcc you can use something
like:
```bash
g++ myRace.cpp
```
You can of course add the optimization flags that you like, however, you
have to make sure that if you allow the compiler to use certain CPU features
these features should be supported by all CPUs in your Yothalot cluster.

Running the above command will give you a program a.out. The Yothalot
framework will pass this program around to its nodes and multiple calls
to this program may occur on one node.
