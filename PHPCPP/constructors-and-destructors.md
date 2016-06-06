# Constructors

There is a small but very important difference between constructors and 
destructors in C++, and the `__construct()` and `__destruct()` methods in PHP.

A C++ constructor is called on an object that is _being_ initialized, but that is _not_ in an initialized state _yet_. You can experience this by calling a virtual method from the constructor. Even when this virtual method was overridden in a derived class, this will always execute the method of the class itselves, and not the overridden implementation. The reason for this is that during the call to the C++ constructor the object is not yet fully initialized, and the object is not yet aware of it's position in the class hierarchy. The call to the virtual method can thus not be passed on to the derived object.

In PHP however, the `__construct()` method has a different behavior. When
it gets called, the object is already initialized and it is perfectly 
legal to make calls to even abstract methods that are implemented in derived 
classes. The following PHP script is completely valid - but it is impossible
to do a similar thing in C++.

```php
<?php

    // base class in PHP, in which the an abstract method is called
    abstract class BASE 
    {
        // constructor
        public function __construct() 
        {
            // call abstract method
            $this->doSomething();
        }
        
        // abstract method to be implemented by derived classes
        public abstract function doSomething();
    }

    // the derived class
    class DERIVED extends BASE 
    {
        // implement the abstract method
        public function doSomething() 
        {
            echo("doSomething()\n");
        }
    }

    // create an instance of the derived class
    $d = new DERIVED();
?>    
```
This script outputs 'doSomething()'. The reason for this is that  `__construct()` 
is not a constructor at all, but a very normal method that just happens to 
be the first method that is called, and that is called automatically _after_
the object is constructed.

This difference is important for you as a C++ programmer, because you should
never confuse your C++ constructor with the PHP `__construct()` method. In the C++
constructor the object is being constructed and not all data is yet available. 
Virtual methods can not be called, and the object also does not yet exist in
PHP user space.

After the constructor is finished, the PHP engine takes over control and creates 
the PHP object, and the PHP-CPP library then links that PHP object to your C++ 
object. Only after both the PHP object and the C++ object are fully constructed, 
the `__construct()` method is called - just like a normal method. It is therefore 
not uncommon to have both a C++ constructor and a `__construct()` method in your 
class. The C++ constructor to initialize the member variables, and `__construct()` 
to activate the object.

```cpp
#include <phpcpp.h>

/**
 *  Simple counter class
 */
class Counter : public Php::Base
{
private:
    /**
     *  Internal value
     *  @var int
     */
    int _value = 0;

public:
    /**
     *  c++ constructor
     */
    Counter() = default;
    
    /**
     *  c++ destructor
     */
    virtual ~Counter() = default;
    
    /**
     *  php "constructor"
     *  @param  params
     */
    void __construct(Php::Parameters &params)
    {
        // copy first parameter (if available)
        if (!params.empty()) _value = params[0];
    }

    /**
     *  functions to increment and decrement
     */
    Php::Value increment() { return ++_value; }
    Php::Value decrement() { return --_value; }
    Php::Value value() const { return _value; }
};

/**
 *  Switch to C context so that the get_module() function can be
 *  called by C programs (which the Zend engine is)
 */
extern "C" {
    /**
     *  Startup function for the extension
     *  @return void*
     */
    PHPCPP_EXPORT void *get_module() {
        static Php::Extension myExtension("my_extension", "1.0");
        
        // description of the class so that PHP knows which methods are accessible
        Php::Class<Counter> counter("Counter");
        counter.method<&Counter::__construct>("__construct");
        counter.method<&Counter::increment>("increment");
        counter.method<&Counter::decrement>("decrement");
        counter.method<&Counter::value>("value");
        
        // add the class to the extension
        myExtension.add(std::move(counter));
        
        // return the extension
        return myExtension;
    }
}
```
The code above shows that `__construct()` is registered as if it was 
a regular method - and that's what it is. The example that we've 
used before (the one with the Counter class) is now extended so that it 
is possible to give it an initial value to the counter by passing a 
value to the "constructor".

```php
<?php
    $counter = new Counter(10);
    $counter->increment();
    echo($counter->value()."\n");
?>
```

Because the `__construct()` method is seen as a regular method, you can also 
specify its parameters, and whether the method is public, private or protected.
The `__construct()` is also directly callable from PHP user space, so that
derived methods can explicitly call `parent::__construct()`.

## Private constructors

Just like any other method, the `__construct()` method can also be
marked as being private or protected. If you do this, you will make it
impossible to create instances of your class from PHP scripts. It is 
important to realize that the C++ constructor and C++ destructor still get 
called in such situations, because it is the` __construct()` call that is 
going to fail - and not the actual object construction.


Yes indeed: if you make the `__construct()` method private, and inside a PHP
script a "new Counter()" call is executed, the PHP-CPP library will first
instantiate a new instance of your class, then report an error because the
`__construct()` method is private, and then immediately destruct the object
(and call the C++ destructor).

```cpp
#include <phpcpp.h>

/**
 *  Switch to C context so that the get_module() function can be
 *  called by C programs (which the Zend engine is)
 */
extern "C" {
    /**
     *  Start point of the extension
     *  @return void*
     */
    PHPCPP_EXPORT void *get_module() {
        static Php::Extension myExtension("my_extension", "1.0");
        
        // description of the class so that PHP knows which methods are accessible
        Php::Class<Counter> counter("Counter");
        
        // add a private __construct method to the class, so that objects can 
        // not be constructed from PHP scripts. Be aware that the C++ constructer 
        // does get called - it will be the call to the first __construct() 
        // function that will fail, and not the actual object construction.
        counter.method<&Counter::__construct>("__construct", Php::Private);
        
        ...
    }
}
```

## Cloning objects

If your class has a copy constructor, it automatically becomes clonable. If
you do not want that your class can be cloned by PHP scripts, you can do
two things: you can either remove the copy constructor from your class, or
you can register a private `__clone()` method, just like we registered a 
private `__construct()` method before.

```cpp
#include <phpcpp.h>

/**
 *  Simple counter class
 */
class Counter : public Php::Base
{
private:
    /**
     *  Internal value
     *  @var int
     */
    int _value = 0;

public:
    /**
     *  c++ constructor
     */
    Counter() = default;
    
    /**
     *  Remove the copy constructor
     *  
     *  By removing the copy constructor, the PHP clone operator will
     *  automatically be deactivated. PHP will trigger an error if 
     *  an object is attempted to be cloned.
     *  
     *  @param  counter
     */
    Counter(const Counter &counter) = delete;
    
    /**
     *  c++ destructor
     */
    virtual ~Counter() = default;
    
    /**
     *  php "constructor"
     *  @param  params
     */
    void __construct(Php::Parameters &params)
    {
        // copy first parameter (if available)
        if (!params.empty()) _value = params[0];
    }

    /**
     *  functions to increment and decrement
     */
    Php::Value increment() { return ++_value; }
    Php::Value decrement() { return --_value; }
    Php::Value value() const { return _value; }
};

/**
 *  Switch to C context so that the get_module() function can be
 *  called by C programs (which the Zend engine is)
 */
extern "C" {
    /**
     *  Startup function for the extension
     *  @return void*
     */
    PHPCPP_EXPORT void *get_module() {
        static Php::Extension myExtension("my_extension", "1.0");
        
        // description of the class so that PHP knows which methods are accessible
        Php::Class<Counter> counter("Counter");
        counter.method<&Counter::__construct>("__construct");
        counter.method<&Counter::increment>("increment");
        counter.method<&Counter::decrement>("decrement");
        counter.method<&Counter::value>("value");
        
        // alternative way to make an object unclonable
        counter.method("__clone", Php::Private);
        
        // add the class to the extension
        myExtension.add(std::move(counter));
        
        // return the extension
        return myExtension;
    }
}
```
In the above example we have shown both ways to make object unclonable. 
Using only one of them is already sufficient.    

## Constructing objects

The Php::Value class can be used as a regular PHP $variable, and you can therefore
also use it for storing object instances. But how do you create brand
new objects? For this we have the Php::Object class - which is simply an
overridden Php::Value class with alternative constructors, and some additional 
checks to prevent that you will ever use a Php::Object object to store values
other than objects.

```cpp
// new variable holding the string "Counter"
Php::Value counter0("Counter");

// new variable holding a newly created object of type "Counter",
// the __construct() gets called without parameters
Php::Object counter1("Counter");

// new variable holding a newly created object, and 
// the __construct() is being called with value 10
Php::Object counter2("Counter", 10);

// new built-in DateTime object, constructed with "now"
Php::Object time("DateTime", "now");

// valid, a Php::Object is an extended Php::Value, and 
// can thus be assigned to a base Php::Value object
Php::Value copy1 = counter1;

// invalid statement, a Php::Object can only be used for storing objects
Php::Object copy2 = counter0;
```

The constructor of a Php::Object takes the name of a class, and an optional
list of parameters that will be passed to the `__construct()` function. You 
can use names from built-in PHP classes and other extensions (like DateTime), 
classes from your extension (like Counter), and even classes from PHP user 
space.

The Php::Object class can also be used if you want to construct an instance
of your own C++ class without calling the `__construct()` function. This can 
for example be useful when the `__construct()` method is private, or when you
want to bypass a call to your own `__construct()` method.

```cpp
#include <phpcpp.h>

// actual class implementation
class Counter : public Php::Base
{
private:
    int _value = 0;

public:
    // c++ constructor
    Counter(int value) : _value(value) {}
    
    // c++ destructor
    virtual ~Counter() = default;
    
    // php "constructor"
    void __construct() {}

    // functions to increment and decrement
    Php::Value value() const { return _value; }
};

// function to create a new timer
Php::Value createTimer()
{
    return Php::Object("Counter", new Counter(100));
}

extern "C" {
    PHPCPP_EXPORT void *get_module() {
        static Php::Extension myExtension("my_extension", "1.0");
        
        // description of the class so that PHP knows which methods are accessible,
        // the __construct method is private because PHP scripts are not allowed
        // to create Counter instances
        Php::Class<Counter> counter("Counter");
        counter.method<&Counter::__construct>("__construct", Php::Private);
        counter.method<&Counter::value>("value");
        
        // add the class to the extension
        myExtension.add(std::move(counter));
        
        // add the factory function to create a timer to the extension
        myExtension.add("createTimer", createTimer);
        
        // return the extension
        return myExtension;
    }
}
```

In the code above we made the `__construct()` function of the Counter class
private. This makes it impossible to create instances of this class - both
from PHP user scripts, and via calls to `Php::Object("Counter")` - because
constructing objects in these ways will eventually result in a forbidden 
`__construct()` call.

The Php::Object does have an alternative syntax that takes a pointer 
to a C++ class (allocated on the heap, with operator new!) and that turns 
this pointer into a PHP variable without calling the 
`__construct()` method. Notice that you must also specify the classname, 
because C++ classes do not hold any information about themselves (like their 
name), while in PHP such information is required to handle reflection and 
functions like `get_class()`.
