# Classes and objects

Serious business now. C++ and PHP are both object oriented programming 
languages, in which you can create classes and objects. The PHP-CPP library
gives you the tools to combine these two and make native C++ classes 
accessible from PHP.

Sadly (but also logically if you think about it) not every thinkable C++ class can be directly 
exported to PHP. It takes a little more work (although not so much). For a
start, you must make sure that your class is derived from Php::Base, and 
secondly, when you add your class to the extension object, you must also specify all methods that you want to make accessible from PHP.

```cpp
#include <phpcpp.h>

/**
 *  Counter class that can be used for counting
 */
class Counter : public Php::Base
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
    Counter() = default;
    virtual ~Counter() = default;
    
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
        counter.method<&Counter::increment> ("increment");
        counter.method<&Counter::decrement> ("decrement");
        counter.method<&Counter::value>     ("value");
        
        // add the class to the extension
        myExtension.add(std::move(counter));
        
        // return the extension
        return myExtension;
    }
}
```

Let's talk about programming conventions first - we always use capitals for 
the first letter of a classname, and member variables always start with
an underscore. Every class always has a destructor, and it always is virtual.
That's just a convention - our convention - and you do not 
have to follow that.

On topic. The example shows a very simple Counter class with three methods:
increment(), decrement() and value(). The two update methods return the value 
of the counter after the operation, the value() method returns the current value.

If you want to make a class method accessible from PHP, you must
ensure that it matches one of the supported signatures. These are essentially
the same signatures as [exportable plain functions](functions)
can have, but with versions for const and non-const methods.

```cpp
// signatures of supported regular methods
void        YourClass::example1();
void        YourClass::example2(Php::Parameters &params);
Php::Value  YourClass::example3();
Php::Value  YourClass::example4(Php::Parameters &params);
void        YourClass::example5() const;
void        YourClass::example6(Php::Parameters &params) const;
Php::Value  YourClass::example7() const;
Php::Value  YourClass::example8(Php::Parameters &params) const;
```

Methods work exactly the same as [regular functions](functions), with the 
difference that in a method you have (of course) access to the member
variables of the object.

To make the class accessible from PHP, you must add it to the extension
object inside the get_module() function. The Php::Class template class should be 
be used for that. The template parameter should be your 
implementation class, so that the Php::Class object internally knows which 
class to instantiate the moment the "new" operator is used inside a PHP script.

The Php::Class constructor needs a string parameter, with the name of 
the class in PHP. The method Php::Class::method() can then be used, as you can
see in the example above, to register methods that you want to make accessible 
from PHP. Did you see that in the example we used the C++11 std::move() function 
to add the class to the extension? This will actually <i>move</i> the class
object into the extension, which is a more efficient operation than copying.

## Method parameters

Methods are just like functions, and just how you use the
Php::ByVal and the Php::ByRef classes to [specify the parameters of a function](parameters),
you can specify method parameters too.

```cpp
#include <phpcpp.h>

/**
 *  Counter class that can be used for counting
 */
class Counter : public Php::Base
{
private:
    /**
     *  The internal value
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
     *  Increment operation
     *  This method gets one optional parameter holding the change
     *  @param  int     Optional increment value
     *  @return int     New value
     */
    Php::Value increment(Php::Parameters &params) 
    { 
        return _value += params.empty() ? 1 : (int)params[0];
    }

    /**
     *  Decrement operation
     *  This method gets one optional parameter holding the change
     *  @param  int     Optional decrement value
     *  @return int     New value
     */
    Php::Value decrement(Php::Parameters &params) 
    { 
        return _value -= params.empty() ? 1 : (int)params[0]; 
    }
    
    /**
     *  Method to retrieve the current value
     *  @return int
     */
    Php::Value value() const 
    { 
        return _value; 
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
        
        // register the increment method, and specify its parameters
        counter.method<&Counter::increment>("increment", { 
            Php::ByVal("change", Php::Type::Numeric, false) 
        });
        
        // register the decrement, and specify its parameters
        counter.method<&Counter::decrement>("decrement", { 
            Php::ByVal("change", Php::Type::Numeric, false) 
        });
        
        // register the value method
        counter.method<&Counter::value>("value", {});
        
        // add the class to the extension
        myExtension.add(std::move(counter));
        
        // return the extension
        return myExtension;
    }
}
```
In the code above we have modified our first example. The increment and
decrement method now get an optional 'change' parameter, which is a numeric
value that holds the change that should be applied to the counter. Note that
this parameter is optional - so inside the method implementation we 
check if the number of parameters is bigger than zero to prevent nasty 
segmentation faults.

```php
<?php
$counter = new Counter();
$counter->increment(5);
$counter->increment();
$counter->decrement(3);
echo($counter->value()."\n");
?>
```

The code above shows a PHP script that uses the native Counter class.
The output of above script is (as you had of course expected) 3.

In the example code we have not shown how to use the Php::ByRef class, but
that works exaclty the same [as for functions](functions), so we 
thought that an example was not really necessary (and we're not a big fan
of parameters-by-reference either).

## Static methods

Static methods are supported too. A static method is a method that does
not have access to a 'this' pointer. In C++, such static methods
are therefore identical to regular functions, that also do not have access 
to a 'this' pointer. The only difference between static C++ methods and 
regular C++ functions is at compile time: the compiler allows static 
methods to access private data. The signature of a static method is however
completely identical to the signature of a regular function.

PHP-CPP allows you to register static methods. But because of the fact that
the signature of a static method is identical to the signature of a regular 
function, the method that you register does not even have to be a method of 
the same class. Regular functions and static methods of other classes
have exactly the same signature and can be registered too! From a software 
architectural standpoint, it is better to use only static methods of the 
same class, but C++ allows you to do much more.

```cpp
#include <phpcpp.h>

/**
 *  Regular function
 *
 *  Because a regular function does not have a 'this' pointer,
 *  it has the same signature as static methods
 *
 *  @param  params      Parameters passed to the function
 */
void regularFunction(Php::Parameters &params)
{
    // @todo add implementation
}

/**
 *  A very simple class that will <b>not</b> be exported to PHP
 */
class PrivateClass
{
public:
    /**
     *  C++ constructor and destructor
     */
    PrivateClass() = default;
    virtual ~PrivateClass() = default;

    /** 
     *  Static method
     *
     *  A static method also has no 'this' pointer and has
     *  therefore a signature identical to regular functions
     *
     *  @param  params      Parameters passed to the method
     */
    static void staticMethod(Php::Parameters &params)
    {
        // @todo add implementation
    }
};

/**
 *  A very simple class that will be exported to PHP
 */
class PublicClass : public Php::Base
{
public:
    /**
     *  C++ constructor and destructor
     */
    PublicClass() = default;
    virtual ~PublicClass() = default;

    /** 
     *  Another static method
     *
     *  This static has exactly the same signature as the
     *  regular function and static method that were mentioned
     *  before
     *
     *  @param  params      Parameters passed to the method
     */
    static void staticMethod(Php::Parameters &params)
    {
        // @todo add implementation
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
        Php::Class<PublicClass> myClass("MyClass");
        
        // register the PublicClass::staticMethod to be a
        // static method callable from PHP
        myClass.method<&PublicClass::staticMethod>("static1");
        
        // regular functions have the same signatures as 
        // static methods. So nothing forbids you to register
        // a normal function as static method too
        myClass.method<regularFunction>("static2");
        
        // and even static methods from completely different
        // classes have the same function signature and can
        // thus be registered
        myClass.method<&PrivateClass::staticMethod>("static3");
        
        // add the class to the extension
        myExtension.add(std::move(myClass));
        
        // In fact, because a static method has the same signature
        // as a regular function, you can also register static
        // C++ methods as regular global PHP functions
        myExtension.add("myFunction", &PrivateClass::staticMethod);
        
        // return the extension
        return myExtension;
    }
}
```

It is questionable how useful this all is. It is probably advisable to keep 
your code clean, simple and maintainable, and only register static PHP methods 
that are also in C++ static methods of the same class. But C++ does not forbid
you to do it completely different. Let's round up with an example how to 
call the static methods

```cpp
<?php
// this will call PublicClass::staticMethod()
MyClass::static1();

// this will call PrivateClass::staticMethod()
MyClass::static2();

// this will call regularFunction()
MyClass::static3();

// this will also call PrivateClass::staticMethod()
myFunction();
?>
```

## Access modifiers

In PHP (and in C++ too) you can mark methods as public, private or protected.
To achieve this for your native class too, you should pass in an additional 
flags parameter when you add the method to the Php::Class object. Imagine that
you want to make the increment and decrement methods in the previous example
protected, then you can simply add a flag:

```cpp
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
        
        // register the increment method, and specify its parameters
        counter.method<&Counter::increment>("increment", Php::Protected, { 
            Php::ByVal("change", Php::Type::Numeric, false) 
        });
        
        // register the decrement, and specify its parameters
        counter.method<&Counter::decrement>("decrement", Php::Protected, { 
            Php::ByVal("change", Php::Type::Numeric, false) 
        });
        
        // register the value method
        counter.method<&Counter::value>("value", Php::Public | Php::Final);
        
        // add the class to the extension
        myExtension.add(std::move(counter));
        
        // return the extension
        return myExtension;
    }
}
```

By default, every method (and every property too, but we deal with that later) 
is public. You can pass in an additional Php::Protected or Php::Private flag
if you want to mark a method as either protected or private. The flag
parameter can be bitwise-or'ed with Php::Abstract or Php::Final if you also 
want to mark your method as either abstract or final. We did this with
the value() method, so that it becomes impossible to override this method in a
derived class.

Remember that the exported methods in your C++ class must always be public - even
when you've marked them as private or protected in PHP. This makes sense,
because after all, your methods are called by the PHP-CPP library, and if you make
them private, they become invisible to the library.

## Abstract and final

In the previous section we showed how to use the Php::Final and Php::Abstract
flags to create a final or abstract method. If you want to make your entire
class abstract or final, you can do so by passing that flag to the Php::Class
constructor.

```cpp
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
        Php::Class<Counter> counter("Counter", Php::Final);
        
        // register methods
        ...
        
        // return the extension
        return myExtension;
    }
}
```

Like we explained before, when you want to register an abstract method, you 
should pass in a Php::Abstract flag to the call to Php::Class::method(). 
However, it may seem strange that this method also requires that you pass 
in the address of a real C++ method. Abstract methods do normally not have 
an implementation, so what do you need to supply a pointer to a method?
Luckily, there also is a different way for registering abstract methods.

```cpp
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
        
        // register an abstract method
        // no need to pass in a pointer to the method or to pass in a flag: 
        // thet method automatically becomes abstract if no address of a C++
        // method is supplied
        counter.method("myAbstractMethod", { 
            Php::ByVal("value", Php::Type::String, true) 
        });
        
        // register other methods
        ...
        
        // add the counter to the extension
        // (or move it into the extension, which is faster)
        myExtension.add(std::move(counter));
        
        // return the extension
        return myExtension;
    }
}
```
To register abstract methods, you can simply use an alternative form of the 
Counter::method() method that does not take a pointer to a C++ method.

There is much more to say about classes and objects, in the next section
we'll explain [constructors and destructors](constructors-and-destructors).


