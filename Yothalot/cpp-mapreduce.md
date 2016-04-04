# Writing a C++ Mapreduce Algorithm

To run your mapreduce algorithm on a Yothalot cluster you have to implement
the algorithm in a class that inherits form Yothalot::MapReduce. This class
should then be called from an [executable](Yothalot/cpp-program "Create a Yothalot executable")

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
     *  @param  Key        The value to map
     *  @param  Value      Size of the value
     *  @param  reducer    The result object to which key/value pairs can be mapped
     */
    virtual void map(const Yothalot::Key &key, const Yothalot::Value &value, Yothalot::Reducer &reducer) = 0;
    
    /**
     *  Function to reduce a key that comes with a number of values
     *  @param  key         The key that should be reduced
     *  @param  values      Iteratable object with values that come with this key
     *  @param  writer      The result object to which values can written to
     */
    virtual void reduce(const Yothalot::Key &key, const Yothalot::Values &values, Yothalot::Writer &writer) = 0;

    /**
     *  Function to write the final result
     *  @param  key         The key for which a single value was found
     *  @param  value       The found value
     */
    virtual void write(const Yothalot::Key &key, const Yothalot::Value &value) = 0;
    
};
/**
 *  end namespace
 */
}

```
In your class that inherits from this pure virtual base class you have
to implement your mapper step in `map()`, your reducer step in `reduce()`,
and your writer step in `write()`.


## Mapping

The `map()` method is used to map the keys and values, the first part of
the mapreduce process. The keys and values for the mapper process are passed to `map()` via its
first argument, of type `Yothalot::Key`, and its second argument, of type
Yothalot::Value. The Yothalot::Key and Yothalot::Value types are tuples
whose fields can be of type `int32_t`, `int64_t`, `double` and string types.
More information on these types is given in the [Yothalot Classes](Yothalot/cpp-classes)
documentation 
 
The third argument that `map()` receives is used to provide `map()` the
information what to do with the data once it has been mapped into keys and values.
The argument is of type `Yothalot::Reducer`. This `Yothalot::Reducer` class has one member
function that is of importance for the map method , `emit()`. After you have
mapped your data into keys and values you can use `emit()` to pass these
keys and values to the next step in your mapreduce algorithm, the reducer step.
Member `emit()` receives two arguments, a key and a value. These arguments
have type `Yothalot::Key` and `Yothalot::Value` respectively as well.
An example of `map()` is:

```cpp
class MyMapReduce : public Yothalot::MapReduce
{
public :
    /**
     *  Implementation for a mapper function
     *  @param  const char *          Value that is being mapped
     *  @param  Yothalot::Reducer     Reducer object to which we may emit key/value pairs
     */
    virtual void map(const Yothalot::Key &key, const Yothalot::Value &value, Yothalot::Reducer &reducer) override
    {
        // simplest mapper possible, just pass through
        reducer.emit(key, value);
    }
    // @todo implement other methods
};
```
Note that the different calls to `map()` run in isolation. So, you cannot
use shared state between two mappers. However, the objects share resources
and multiple calls to `map()`, probably happen at the same time, therefore,
you can have race conditions if the objects try to access the same resource
at the same time.


## Reducing

In the mapper processes you map your data into key value pairs. When the
same key is emitted by the mapper processes multiple times you will get
multiple values that all have the same key. The reduce step in a mapreduce
algorithm will reduce these multiple values into a single new value. So,
you end up with unique keys that all hold just one value. This is exactly done
by `reduce()`. The `reduce()` member takes three arguments. The first
argument is the key of type `Yothalot::Key`. Each key is at least passed
by `map()` once.

The second argument are the values of type `Yothalot::Values`.
These are the values that belong to the particular key that is passed as
the first argument. Since there are multiple values for one key, the type
`Yothalot::Values` is a class that can hold multiple `Yothalot::Value`s
(note the difference) with which you easily can iterate over all the values
that it stores. It is your job to reduce all these values into one reduced
value.

The third argument that `reduce()` takes is of type `Yothalot::Writer`.
Just like `map` needs to know what it should do with the key value pairs,
`reduce()` needs to know what it should do with the reduced value. This
information is taken from the third argument `Yothalot::Writer`. `Yothalot::Writer` has just
like `Yothalot::Reducer` one member function `emit()`. This `emit()` member
function only takes one argument, the reduced value. After all the key is already
known. The reduced value is of type `Yothalot::Value`.

An example of a reducer is:
```cpp
class MyMapReduce : public Yothalot::MapReduce
{
public:
    /**
     *  Implementation for the reduce function
     *  @param  Yothalot::Key         The key for which values should be reduced
     *  @param  Yothalot::Values      Iterateable object with values linked to the key
     *  @param  Yothalot::Writer      Object to which the reduced value can be sent
     */
    virtual void reduce(const Yothalot::Key &key, const Yothalot::Values &values, Yothalot::Writer &writer) override
    {
        // total of all values
        int64_t total = 0;
        
        // iterate over the values
        for (auto value : values) total += value.int64(0);
        
        // emit the result to the writer
        Yothalot::Value value = {total};
        writer.emit(value);
    }
    
    // @todo implement other methods
};
```
Above we said that the second argument, values, contains the values that
belong to a certain key. This is only partly part of the story. If we would have
implemented Yothalot to only start a reducer if all values for a specific
key would be available, Yothalot would be very inefficient. Because, if
all values have to be available, a reducer step can only be started if all
mapper processes have been finished. This would harm the parallelization
of the mapreduce task. Moreover, the task needs to have a lot of extra memory
or disk space since all key value pairs should stay somewhere before
the reduce step starts. Therefore, Yothalot starts reducer tasks if there
are enough values for one key to reduce. So the argument values contain the values that are at
that time available or even a subset if there are so many values
that consuming them at once takes to many resources. This implies that
your reduced value may be re-reduced in a next reduce step. This is inherit
to efficient mapreduce tasks and is something to be aware of.

You should also note that a reducer will not be called for keys that have only
one value since there is nothing to reduce. Therefore, if you want to do
some extra processing on all keys in your mapreduce algorithm, you should do
this in the writing phase, since the writing method will be called for each
key.

## Writing

After all mappers have ran, and everything has been reduced to keys with single
values, the results are ready to be written to some kind of storage. The Yothalot
framework calls your `write()` method for this. The `write()` method has two
arguments the first argument is the key of type `Yothalot::Key` and the second
argument is the value of type `Yothalot::Value` that belongs to the particular
key. It is completely up to you to decide where you want to write your results to.
An example of a `write()` method is:

```cpp
class MyMapReduce : public Yothalot::MapReduce
{
public:
    /**
     *  Implement a write function:
     *  @param  Yothalot::Key   The key for which the result comes in
     *  @param  Yothalot::Value Fully reduced value
     */
    virtual void write(const Yothalot::Key &key, const Yothalot::Value &value) override
    {
        // simply write to an output file
        std::ofstream outfile;
        
        // Open the file.
        outfile.open("/path/to/output.txt", std::ios_base::app);
        
        // Write to it.
        outfile << key.string(0) << " : " << value.string(0) << std::endl; 
    }
    // @todo: implement other methods
};
```
So there is your mapreduce task. One `mapper()` will start for each string of
data that you pass to it. These mappers may run in parallel. Yothalot starts a
`reduce()` task on keys that have enough values. These reducers may run
in parallel as well. So, the mapreduce process is nicely parallelizable.
The only part that is not parallelizable on default is the writer task.
If you want to use multiple writers as well, you can do so by using some
tuning parameters about which you can read in [tune your job](Yothalot/tuning).
However, you should be aware that if you want to write with multiple writers
to the same resource you should use some kind of locking mechanism.

After having created your mapreduce algorithm in the above described way
you can call your algorithm from a little
[executable](Yothalot/cpp-program "Create a Yothalot program").
