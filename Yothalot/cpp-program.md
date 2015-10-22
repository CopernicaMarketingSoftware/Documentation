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


## Mapping

The `map()` method is called when data is being mapped. It receives two parameters:
the input data as std::string and a `Yothalot::Reducer` object. The data is
passed to the mapper member via member `add()`, `filename()`, or `server()`
of the [Yothalot::Job](copernica-docs:Yothalot/cpp-job).

The `Yothalot::Reducer` object is a very simple object with only one method: `emit()`.
You can emit key/value pairs to the reducer, that will later be reduced.

```cpp
class MyMapReduce : public Yothalot::MapReduce
{
    public :
    /**
     *  Implementation for a mapper function
     *  @param  std::string           Value that is being mapped
     *  @param  Yothalot::Reducer     Reducer object to which we may emit key/value pairs
     */
    virtual void map(const std::string &value, Yothalot::Reducer &reducer) override
    {
        // imagine that the to-be-mapped data is a string, and we want to 
        // emit key/value pairs for all the words found in the string

        std::istringstream iss(value);
        std::string word;
        while(iss >> word)
        {   
            reducer.emit(word, 1);
        }

    }
    // @todo implement other methods
}
```

The `emit()` method in the `Yothalot::Reducer` class takes two parameters: a
Yothalot::Key and a Yothalot::Value. See
[Yothalot Classes](copernica-docs:Yothalot/cpp-classes "Yothalot Classes")
for a description of these types.


## Reducing

When the same key was multiple times emitted by the `map()` method, the different
values are reduced into a single new value. This is done by the `reduce()`
method.

The `reduce()` method takes three parameters: the key for which values are going
to be reduced, a traversable set of two or more values that are linked to that
key, and a `Yothalot::Writer` object to which you can emit the reduced value.

```cpp
class MyMapReduce : public Yothalot::MapReduce
{
    /**
     *  Implementation for the reduce function
     *  @param  Yothalot::Key         The key for which values should be reduced
     *  @param  Yothalot::Values      Iterateable object with values linked to the key
     *  @param  Yothalot::Writer      Object to which the reduced value can be sent
     */
    virtual void function reduce(Yothalot::Key key, Yothalot::Values values, Yothalot::Writer writer) override
    {
        // total of all values
        int total = 0;
        
        // iterate over the values
        for (auto value : values) total += value;
        
        // emit the result to the writer
        writer.emit(total);
    }
    
    // @todo implement other methods
}
```

The `emit()` method in the `Yothalot::Writer` class takes one parameter: the
reduced value of type [Yothalot::Value](copernica-docs:Yothalot/cpp-classes "Yothalot Classes")
Keep in mind that it is very well possible that the reduce() method gets called 
more than once for the same key. This for example happens when so many keys were 
found that multiple chained reducers are started. The value that you emit might 
therefore be an intermediate value that is going to be reduced for a second or
third time.


## Writing

After all mappers ran, and everything has been reduced to single keys with single
values, the results are ready to be written to some kind of storage. The Yothalot
framework calls your `write()` method for this.

```cpp
class MyMapReduce : public Yothalot::MapReduce
{
    /**
     *  Implement a write function:
     *  @param  Yothalot::Key   The key for which the result comes in
     *  @param  Yothalot::Value Fully reduced value
     */
    virtual void write(Yothalot::Key key, Yothalot::Value value) override
    {
        // simply write to an output file
        std::ofstream outfile;
        outfile.open("/path/to/output.txt", std::ios_base::app);
        outfile << key << " : " << value << std::endl; 
    }
}
```

It is completely up to you to decide where you want to write your results to.
Keep in mind however that you can [tune your job](copernica-docs:Yothalot/tuning)
in such a manner, that multple writers can be started at the same time. You should
therefore use some kind of locking if you want all your writers to write to the
same resource.


## Create the program

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
