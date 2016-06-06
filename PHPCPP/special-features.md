# Special features

One of the questions we had to ask ourselves when we developed the PHP-CPP
library was whether we should follow PHP conventions or follow C++ conventions
for many of the library features.

In PHP scripts you can use [magic methods](magic-methods)
and [magic interfaces](magic-interfaces) to add special
behavior to classes. With C++ classes you can achieve the same, but by using
technologies like operator overloading, implicit constructors and casting
operators. The PHP `__invoke()` method for example, is more or less identical to
operator () in C++. The question that we asked ourselves was whether we should
automatically pass the `__invoke` PHP method to a C++ operator() call - or use
the same `__invoke()` method name in C++ too?

We have decided to follow the PHP conventions, and use magic methods and magic
interfaces in C++ as well - although we must admit that having methods that start
with two underscores does not make the code look very pretty. But by using magic
methods the switch from PHP to C++ is kept simpler for starting C++ programmers.
And on top of that, not all magic methods and interfaces could have been
implemented with core C++ features (like operator overloading), so we had to use
_some_ magic methods and/or interfaces anyway. That's why we decided that because
we had to use _some_ magic methods in C++, we could just as well follow PHP
completely and support _all_ magic PHP methods in C++ too.

Besides the magic methods and interfaces that are available in PHP user space,
the Zend engine has additional features that are not exposed to PHP user space
scripts. Features that are only accessible for extension programmers. The PHP-CPP
library also supports these special features. This means that if you use PHP-CPP
for writing functions and classes, you can achieve things that can not be
achieved by writing pure PHP code.

## Extra casting functions

Internally, the Zend engine has special casting routines to cast objects to integers,
to booleans and to floating point values. For one reason or another, a PHP script
can only implement the __toString() method, while all other casting operations
are kept away from it. The PHP-CPP library solves this limitation, and allows
one to implement the other casting functions as well.

One of the design goals of the PHP-CPP library is to stay as close to PHP
as possible. For that reason the casting functions have been given names that
match the `__toString()` `method: __toInteger()`, `__toFloat()`, and `__toBool()`.

```cpp
#include <phpcpp.h>

/**
 *  A sample class, with methods to cast objects to scalars
 */
class MyClass : public Php::Base
{
public:
    /**
     *  C++ constructor and C++ destructpr
     */
    MyClass() = default;
    virtual ~MyClass() = default;

    /**
     *  Cast to a string
     *
     *  Note that now we use const char* as return value, and not Php::Value.
     *  The __toString function is detected at compile time, and it does
     *  not have a fixed signature. You can return any value that can be picked
     *  up by a Php::Value object.
     *
     *  @return const char *
     */
    const char *__toString()
    {
        return "abcd";
    }

    /**
     *  Cast to a integer
     *  @return long
     */
    long __toInteger()
    {
        return 1234;
    }

    /**
     *  Cast to a floating point number
     *  @return double
     */
    double __toFloat()
    {
        return 88.88;
    }

    /**
     *  Cast to a boolean
     *  @return bool
     */
    bool __toBool()
    {
        return true;
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
        Php::Class<MyClass> myClass("MyClass");

        // add the class to the extension
        myExtension.add(std::move(myClass));

        // return the extension
        return myExtension;
    }
}
```
The casting methods are automatically called when an object is casted to a scalar
type, or when it is used in a scalar context. The following example demonstrates this.

```php
<?php
// initialize an object
$object = new MyClass();

// cast it
echo((string)$object."\n");
echo((int)$object."\n");
echo((bool)$object."\n");
echo((float)$object."\n");

?>
```
## Comparing objects

If you compare two objects in PHP with comparison operators like <, ==, !=, >
(and the obvious others), the Zend engine runs an object comparison function.
The PHP-CPP library intercepts this method, and passes the comparison method to
the `__compare` method of your class. In other words, if you want to install
a custom comparison operator, you can do so by implementing `__compare()`.

```cpp
#include <phpcpp.h>
/**
 *  A sample class, that shows how objects can be compared
 */
class MyClass : public Php::Base
{
private:
    /**
     *  Internal value of the class
     *  @var    int
     */
    int _value;

public:
    /**
     *  C++ constructor
     */
    MyClass()
    {
        // start with random value
        _value = rand();
    }

    /**
     *  C++ destructor
     */
    virtual ~MyClass() = default;

    /**
     *  Cast the object to a string
     *  @return std::string
     */
    std::string __toString()
    {
        return std::to_string(_value);
    }

    /**
     *  Compare with a different object
     *  @param  that
     *  @return int
     */
    int __compare(const MyClass &that) const
    {
        return _value - that._value;
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
        Php::Class<MyClass> myClass("MyClass");

        // add the class to the extension
        myExtension.add(std::move(myClass));

        // return the extension
        return myExtension;
    }
}
```
The comparison function is automatically called when you try to compare objects
in PHP scripts. It should return 0 when the two objects are identical, a value
less than zero when the 'this' object is smaller, and higher than zero when
'this' is bigger.

```php
<?php
// initialize a couple of objects
$object1 = new MyClass();
$object2 = new MyClass();
$object3 = new MyClass();

// compare the objects
if ($object1 < $object2)
{
    echo("$object1 is smaller than $object2\n");
}
else
{
    echo("$object1 is bigger than $object2\n");
}

if ($object1 == $object3)
{
    echo("$object1 is equal to $object3\n");
}
else
{
    echo("$object1 is not equal to $object3\n");
}
?>
```
The above PHP script could produce the following output:

```
// output
1699622247 is bigger than 151717746
1699622247 is not equal to 627198306
```
