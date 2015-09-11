# Magic interfaces

A core PHP installation comes with a number of special "magic" PHP interfaces
that script writers can implement to add special features to a class. These are
interfaces with names like 'Countable', 'ArrayAccess' and 'Serializable'.
The features that these interfaces bring, can also be implemented using PHP-CPP.

You may wonder why PHP sometimes uses [magic methods](copernica-docs:PHPCPP/magic-methods)
(for example `__set` and `__unset)` and sometimes uses interfaces to change
the behavior of a class. There does not seem to be any uniformity in this choice.
To us it is unclear why some special features are implemented with magic methods,
while others are activated by implementing interfaces. In our eyes the Serializable
interface could just as well have been implemented with magic `__serialize()`
and `__unserialize()` methods, or the `__invoke()` method could just as well
have been an "Invokable" interface. PHP is not a standardized language, and some
things just seem to be the way they are because someone felt like implementing
it this way or another...

Nevertheless, the PHP-CPP library tries to stay as close to PHP as possible.
That's why in your C++ classes you can also use the special interfaces -
and because C++ does not have interfaces like PHP has, classes with pure virtual
methods are used instead.

## Support for the SPL

A standard PHP installation comes with the Standard PHP Library (SPL). This is
an extension that is built on top of the Zend engine and that uses features from
the Zend engine to create classes and interfaces like Countable, Iterator
and ArrayAccess.

The PHP-CPP library also has interfaces with these names, and they behave
in more or less the same way as the SPL interfaces. But internally, the PHP-CPP
library does not depend on the SPL. If you implement a C++ interface like
Php::ArrayAccess or Php::Countable, it is something different than writing
a class in PHP that implements a SPL interface.

Both PHP-CPP and the SPL are directly built on top of the Zend core and offer
the same sort of features, but they do not rely on each other. You can thus safely
use PHP-CPP if you have not loaded the SPL extension.

## The Countable interface

By implementing the Php::Countable interface, you can create objects that can
be passed to the PHP count() function.

```cpp
#include <phpcpp.h>

/**
 *  The famous counter class, now also implements
 *  the Php::Countable interface
 */
class Counter : public Php::Base, public Php::Countable
{
private:
    /**
     *  The internal counter value
     *  @var int
     */
    int _value = 0;

public:
    /**
     *  C++ constructor and C++ destructor
     */
    Counter() {}
    virtual ~Counter() {}

    /**
     *  Methods to increment and decrement the counter
     */
    Php::Value increment() { return ++_value; }
    Php::Value decrement() { return --_value; }

    /**
     *  Method from the Php::Countable interface, that
     *  is used when a Counter instance is passed to the
     *  PHP count() function
     *  
     *  @return long
     */
    virtual long count() override { return _value; }
};

/**
 *  Switch to C context to ensure that the get_module() function
 *  is callable by C programs (which the Zend engine is)
 */
extern "C" {
    /**
     *  Startup function that is called by the Zend engine
     *  to retrieve all information about the extension
     *  @return void*
     */
    PHPCPP_EXPORT void *get_module() {

        // extension object
        static Php::Extension myExtension("my_extension", "1.0");

        // description of the class so that PHP knows
        // which methods are accessible
        Php::Class<Counter> counter("Counter");

        // add methods
        counter.method("increment", &Counter::increment);
        counter.method("decrement", &Counter::decrement);

        // add the class to the extension
        myExtension.add(std::move(counter));

        // return the extension
        return myExtension;
    }
}
```

The Counter class that we used before has been modified to show how to make
classes that implement the Php::Countable interface. It is very simple, all you
have to to is add the Php::Countable class as base class. This Php::Countable
class has one pure virtual method, count(), that has to be implemented.

And that's is all that you have to do. There is no need to register the special
count() function inside the get_module() function, adding Php::Countable as
base class is sufficient.

```php
<?php
// create a counter
$counter = new Counter();
$counter->increment();
$counter->increment();
$counter->increment();

// show the current value
echo(count($counter)."\n");
?>
```

The output is, as expected, the value 3.

## The ArrayAccess interface

A PHP object can be turned into a variable that behaves like an array by
implementing the Php::ArrayAccess interface. When you do this, objects can be
accessed with array access operators ($object["property"]).

In the following example we use the Php::Countable and the Php::ArrayAccess
interfaces to create an associative array class than can be used for storing
strings (remember: this is just an example, PHP already has support for
associative arrays, so it is debatable how useful the example is).

```php
#include <phpcpp.h>

/**
 *  A sample Map class, that can be used to map string-to-strings
 */
class Map : public Php::Base, public Php::Countable, public Php::ArrayAccess
{
private:
    /**
     *  Internally, a C++ map is used
     *  @var    std::map<std::string,std::string>
     */
    std::map<std::string,std::string> _map;

public:
    /**
     *  C++ constructor and C++ destructpr
     */
    Map() {}
    virtual ~Map() {}

    /**
     *  Method from the Php::Countable interface that
     *  returns the number of elements in the map
     *  @return long
     */
    virtual long count() override
    {
        return _map.size();
    }

    /**
     *  Method from the Php::ArrayAccess interface that is
     *  called to check if a certain key exists in the map
     *  @param  key
     *  @return bool
     */
    virtual bool offsetExists(const Php::Value &key) override
    {
        return _map.find(key) != _map.end();
    }

    /**
     *  Set a member
     *  @param  key
     *  @param  value
     */
    virtual void offsetSet(const Php::Value &key, const Php::Value &value) override
    {
        _map[key] = value.stringValue();
    }

    /**
     *  Retrieve a member
     *  @param  key
     *  @return value
     */
    virtual Php::Value offsetGet(const Php::Value &key) override
    {
        return _map[key];
    }

    /**
     *  Remove a member
     *  @param key
     */
    virtual void offsetUnset(const Php::Value &key) override
    {
        _map.erase(key);
    }
};

/**
 *  Switch to C context to ensure that the get_module() function
 *  is callable by C programs (which the Zend engine is)
 */
extern "C" {
    /**
     *  Startup function that is called by the Zend engine
     *  to retrieve all information about the extension
     *  @return void*
     */
    PHPCPP_EXPORT void *get_module() {

        // extension object
        static Php::Extension myExtension("my_extension", "1.0");

        // description of the class so that PHP knows
        // which methods are accessible
        Php::Class<Map> map("Map");

        // add the class to the extension
        myExtension.add(std::move(map));

        // return the extension
        return myExtension;
    }
}
```

The Php::ArrayAccess has four pure virtual methods that have to be implemented.
These are methods to retrieve and overwrite an element, to check if an element
with a certain key exists, and a method to remove an element. In the example
these methods have all been implemented to be forwarded to a regular
C++ std::map object.

Inside the get_module() function, the Map is registered and added to
the extension. But unlike many other examples, none of the class methods are
exported to PHP. It only implements the Php::Countable interface and
Php::ArrayAccess interface, so it is perfectly usable to store and retrieve
properties, but from a PHP script it does not have any callable methods.
The following script shows how to use it.

```php
<?php
// create a map
$map = new Map();

// store some values
$map["a"] = 1234;
$map["b"] = "xyz";
$map["c"] = 0;

// show the values
echo($map["a"]."\n");
echo($map["b"]."\n");
echo($map["c"]."\n");

// access a value that does not exist
echo($map["d"]."\n");

// this will result in a fatal error,
// the ArrayAccess methods are not exported to user space
echo($map->offsetGet("a")."\n");

?>
```

The output speaks for itself. The map has three members, "1234" (a string variable), "xyz" and "0".

## The Traversable interface

Classes can also be used in foreach loops, just like regular arrays. If you want
to enable this feature, your class should extend from the Php::Traverable base
class and implement the getIterator() method.

```php
<?php
// fill a map
$map = new Map();
$map["a"] = 1234;
$map["b"] = 5678;

// iterate over it
foreach ($map as $key => $value)
{
    // output the key and value
    echo("$key: $value\n");
}
?>
```

The PHP-CPP library implements iterators in a slightly different manner than
the SPL does, and that you are used to if you have been working with PHP.
In PHP, to make a class traversable (usable in foreach loops), you have to implement
either the Iterator interface, or the IteratorAggregate interface. This is
a peculiar architecture - if not to say faulty. When you think about it, it is
not the container object itself that is the iterator, that container object is
only iterat_able_! It is _being iterated over_. In our above example,
the $map variable is not the actual iterator, but the container that is iterated over.
The real iterator is a hidden object that is not exposed to your PHP script and
that controls the foreach loop. The SPL however, would call the map an iterator too.

In PHP-CPP we have therefore decided not to follow the SPL API, and create
a completely new way of implementing traversable classes. To make a class traversable,
it must be extended from the Php::Traversable base class, that forces you to
implement the getIterator() method. This method should return a Php::Iterator instance.

The Php::Iterator object has five methods that are needed for running the foreach
loop. Note that your Iterator class does not have to be a class that is accessible
from PHP, and does not have to be derived from Php::Base. It is an internal class
that is used by foreach loops, but that does not (have to) exist in PHP user space.

```cpp
#include <phpcpp.h>

/**
 *  A sample iterator class that can be used to iterate
 *  over a map of strings
 */
class MapIterator : public Php::Iterator
{
private:
    /**
     *  The map that is being iterated over
     *  This is a reference to the actual map
     *  @var    std::map<std::string,std::string>
     */
    const std::map<std::string,std::string> &_map;

    /**
     *  The actual C++ iterator
     *  @var    std::map<std::string,std::string>l;::const_iterator;
     */
    std::map<std::string,std::string>::const_iterator _iter;

public:
    /**
     *  Constructor
     *  @param  object      The object that is being iterated over
     *  @param  map         The internal C++ map that is being iterated over
     */
    MapIterator(Map *object, const std::map<std::string,std::string> &map) :
        Php::Iterator(object), _map(map), _iter(map.begin()) {}

    /**
     *  Destructor
     */
    virtual ~MapIterator() {}

    /**
     *  Is the iterator on a valid position
     *  @return bool
     */
    virtual bool valid() override
    {
        return _iter != _map.end();
    }

    /**
     *  The value at the current position
     *  @return Value
     */
    virtual Php::Value current() override
    {
        return _iter->second;
    }

    /**
     *  The key at the current position
     *  @return Value
     */
    virtual Php::Value key() override
    {
        return _iter->first;
    }

    /**
     *  Move to the next position
     */
    virtual void next() override
    {
        _iter++;
    }

    /**
     *  Rewind the iterator to the front position
     */
    virtual void rewind() override
    {
        _iter = _map.begin();
    }
};

/**
 *  A sample Map class, that can be used to map string-to-strings
 */
class Map :
    public Php::Base,
    public Php::Countable,
    public Php::ArrayAccess,
    public Php::Traversable
{
private:
    /**
     *  Internally, a C++ map is used
     *  @var    std::map<std::string,std::string>
     */
    std::map<std::string,std::string> _map;

public:
    /**
     *  C++ constructor and C++ destructpr
     */
    Map() {}
    virtual ~Map() {}

    /**
     *  Method from the Php::Countable interface that
     *  returns the number of elements in the map
     *  @return long
     */
    virtual long count() override
    {
        return _map.size();
    }

    /**
     *  Method from the Php::ArrayAccess interface that is
     *  called to check if a certain key exists in the map
     *  @param  key
     *  @return bool
     */
    virtual bool offsetExists(const Php::Value &key) override
    {
        return _map.find(key) != _map.end();
    }

    /**
     *  Set a member
     *  @param  key
     *  @param  value
     */
    virtual void offsetSet(const Php::Value &key, const Php::Value &value) override
    {
        _map[key] = value.stringValue();
    }

    /**
     *  Retrieve a member
     *  @param  key
     *  @return value
     */
    virtual Php::Value offsetGet(const Php::Value &key) override
    {
        return _map[key];
    }

    /**
     *  Remove a member
     *  @param key
     */
    virtual void offsetUnset(const Php::Value &key) override
    {
        _map.erase(key);
    }

    /**
     *  Get the iterator
     *  @return Php::Iterator
     */
    virtual Php::Iterator *getIterator() override
    {
        // construct a new map iterator on the heap
        // the (PHP-CPP library will delete it when ready)
        return new MapIterator(this, _map);
    }
};

/**
 *  Switch to C context to ensure that the get_module() function
 *  is callable by C programs (which the Zend engine is)
 */
extern "C" {
    /**
     *  Startup function that is called by the Zend engine
     *  to retrieve all information about the extension
     *  @return void*
     */
    PHPCPP_EXPORT void *get_module() {

        // extension object
        static Php::Extension myExtension("my_extension", "1.0");

        // description of the class so that PHP knows
        // which methods are accessible
        Php::Class<Map> map("Map");

        // add the class to the extension
        myExtension.add(std::move(map));

        // return the extension
        return myExtension;
    }
}
```

The above example further extends the Map class. It now implements Php::Countable,
Php::ArrayAccess and Php::Traversable. This means that Map objects can now also
be used inside foreach loops to iterate over the properties.

For this to work, we had to add the Php::Traversable class as base class to
the Map class, and implement the getIterator() method. This method returns
a new MapIterator class, which is allocated on the heap. Don't worry about memory
management: the PHP-CPP library will destruct your iterator the moment the foreach
loop is finished.

The MapIterator class is derived from the Php::Iterator class, and implements
the five methods that are needed for running foreach loops (current(), key(),
next(), rewind() and valid()). Note that the base Php::Iterator class expects
that the object over which it iterates is passed to the constructor. This is
required so that the iterator object can ensure that this iterated object stays
in scope for as long as the iterator exists.

Our MapIterator implementation internally is just a small wrapper around a C++
iterator class. It is of course up to you to create more complex iterators when
needed.

## The Serializable interface

By implementing the interface "Php::Serializable" you can install custom
serialize and unserialize handlers for a class. The built-in PHP serialize()
function - you probably already know - is a function that can turn arrays
or objects (and even nested data structures full of of arrays and objects) into
simple strings. The unserialize() method does exactly the opposite, and turns
such a string back into the original data structure.

The default serialize implementation of a class takes all publicly visible
properties of an object, and concatenates them into a string. But because your
class has a native implementation, and probably no public properties, you may
want to install a custom serialize handler. In this handler you can then store
the native object members.

```cpp
#include <phpcpp.h>

/**
 *  Counter class that can be used for counting
 */
class Counter : public Php::Base, public Php::Serializable
{
private:
    /**
     *  The initial value
     *  @var    int
     */
    int _value = 0;

public:
    /**
     *  C++ constructor and destructor
     */
    Counter() {}
    virtual ~Counter() {}

    /**
     *  Update methods to increment or decrement the counter
     *  Both methods return the NEW value of the counter
     *  @return int
     */
    Php::Value increment() { return ++_value; }
    Php::Value decrement() { return --_value; }

    /**
     *  Method to retrieve the current counter value
     *  @return int
     */
    Php::Value value() const { return _value; }

    /**
     *  Serialize the object into a string
     *  @return std::string
     */
    virtual std::string serialize() override
    {
        return std::to_string(_value);
    }

    /**
     *  Unserialize the object from a string
     *  @param  buffer
     *  @param  size
     */
    virtual void unserialize(const char *buffer, size_t size) override
    {
        _value = ::atoi(buffer);
    }
};

/**
 *  Switch to C context to ensure that the get_module() function
 *  is callable by C programs (which the Zend engine is)
 */
extern "C" {
    /**
     *  Startup function that is called by the Zend engine
     *  to retrieve all information about the extension
     *  @return void*
     */
    PHPCPP_EXPORT void *get_module() {
        // create static instance of the extension object
        static Php::Extension myExtension("my_extension", "1.0");

        // description of the class so that PHP knows which methods are accessible
        Php::Class<Counter> counter("Counter");
        counter.method("increment", &Counter::increment);
        counter.method("decrement", &Counter::decrement);
        counter.method("value", &Counter::value);

        // add the class to the extension
        myExtension.add(std::move(counter));

        // return the extension
        return myExtension;
    }
}
```

The above example takes the Counter example that you've seen before, and turns
it into a serializable object. The Php::Serializable has two pure virtual methods
that should be added to your class. The serialize() method is called to turn
the object into a string, and the unserialize() method is called on an
_uninitialized object_ to revive it from a serialized string. Note that if
an object is being revived using unserialize(), the __construct() method will
not be called!

```php
<?php
// create an empty counter and increment it a few times
$counter = new Counter();
$counter->increment();
$counter->increment();

// turn the counter into a storable string
$serializedCounter = serialize($counter);

// revive the counter back into an object
$revivedCounter = unserialize($serializedCounter);

// show the counter value
echo($revivedCounter->value()."\n");
?>
```
Does anyone know what the output is? It's 2.
