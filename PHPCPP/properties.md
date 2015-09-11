# Class properties

When you define a class completely in PHP, you can add properties (member variables)
to it. When you add member variables to a native C++ class however, you better
use regular native member variables for that, instead of PHP variables. Native
variables have an immensely better performance than PHP variables, and it would
be insane to store integers or strings in Php::Value objects if you can store
them in int's and std::string objects as well.

## Normal member variables

It is difficult to imagine that someone in the world would like to create
a native class, with regular non-typed public PHP properties on it. However,
if you insist, you can use the PHP-CPP library for this. Let's take an example
class in PHP, and see what it would look like in C++.

```php
<?php
/**
 *  PHP example class
 */
class Example
{
    /**
     *  Define a public property
     */
    public $property1;

    /**
     *  Constructor
     */
    public function __construct()
    {
        // initialize the property
        $this->property1 = "xyz";
    }

    /**
     *  Example method
     */
    public function method()
    {
        // do something with the public property (like changing it)
        $this->property = "abc";
    }
}

// create an instance
$example = new Example();

// overwrite the public property
$example->property1 = "new value";

?>
```

The above example creates a class with one public property. This property can be
accessed by the Example class, and because it is public also by everyone else,
as is shown in the example. If you like such classes, you can write something
similar with PHP-CPP.

```cpp
#include <phpcpp.h>

/**
 *  C++ Example class
 */
class Example : public Php::Base
{
public:
    /**
     *  c++ constructor
     */
    Example() {}

    /**
     *  c++ destructor
     */
    virtual ~Example() {}

    /**
     *  php "constructor"
     *  @param  params
     */
    void __construct()
    {
        // get self reference as Php::Value object
        Php::Value self(this);

        // initialize a public property
        self["property1"] = "xyz";
    }

    /**
     *  Example method
     */
    void method()
    {
        // get self reference as Php::Value object
        Php::Value self(this);

        // overwrite the property
        self["property1"] = "abc";
    }
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
        // create static extension object
        static Php::Extension myExtension("my_extension", "1.0");

        // description of the class so that PHP knows which methods are accessible
        Php::Class<Example> example("Example");

        // register the methods
        example.method("__construct", &Example::__construct);
        example.method("method", &Example::method);

        // the Example class has one public property
        example.property("property1", "xyz", Php::Public);

        // add the class to the extension
        myExtension.add(std::move(example));

        // return the extension
        return myExtension;
    }
}
```

The example code shows how you initialize the properties inside the `get_module()`
function.

Instead of public properties, you can also define private or protected properties,
but even that is probably not what you want, as storing data in native C++ variables
is much faster.

## Static properties and class constants

Static properties and class class constants can be defined in a similar way
as properties. The only difference is that you have to pass in either the flag
'Php::Static' or 'Php::Const' instead of one of the Php::Public, Php::Private
or Php::Protected access modifiers.

```cpp
    #include <phpcpp.h>

    // @todo you class definition

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
            // create static extension object
            static Php::Extension myExtension("my_extension", "1.0");

            // description of the class so that PHP knows which methods are accessible
            Php::Class<Example> example("Example");

            // the Example class has a class constant
            example.property("MY_CONSTANT", "some value", Php::Const);

            // and a public static propertie
            example.property("my_property", "initial value", Php::Public | Php::Static);

            // add the class to the extension
            myExtension.add(std::move(example));

            // return the extension
            return myExtension;
        }
    }
```

The class constant can be accessed from PHP scripts using `Example::MY_CONSTANT`,
and the static properties with `Example::$my_property`.

Besides using the property() method, you can also create class constants using
the constant() method, or using the Php::Constant class. More information about
this can be found in our [article about constants](copernica-docs:PHPCPP/constants).

## Smart properties

With the [magic methods __get() and __set()](copernica-docs:PHPCPP/magic-methods)
you can make more advanced properties that are directly mapped to C++ variables,
and that allow you to perform additional checks when a property is overwritten,
so that an object always remains in a valid state.

On top of that, with the PHP-CPP library you can also assign getter and setter
methods to properties. Every time a property is accessed, your getter or setter
method is automatically called.

```cpp
#include <phpcpp.h>

/**
 *  C++ Example class
 */
class Example : public Php::Base
{
private:
    /**
     *  Example property
     *  @var    int
     */
    int _value = 0;

public:
    /**
     *  c++ constructor
     */
    Example() {}

    /**
     *  c++ destructor
     */
    virtual ~Example() {}

    /**
     *  Method to get access to the property
     *  @return Php::Value
     */
    Php::Value getValue() const
    {
        return _value;
    }

    /**
     *  Method to overwrite the property
     *  @param  value
     */
    void setValue(const Php::Value &value)
    {
        // overwrite property
        _value = value;

        // sanity check: the value should never exceed 100
        if (_value > 100) _value = 100;
    }

    /**
     *  Method to retrieve the double property value
     *  @return Php::Value
     */
    Php::Value getDouble() const
    {
        return _value * 2;
    }
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
        // create static extension object
        static Php::Extension myExtension("my_extension", "1.0");

        // description of the class so that PHP knows which methods are accessible
        Php::Class<Example> example("Example");

        // register the "value" property, with the methods to get and set it
        example.property("value", &Example::getValue, &Example::setValue);

        // register a read-only "double" property, with a method to get it
        example.property("double", &Example::getDouble);

        // add the class to the extension
        myExtension.add(std::move(example));

        // return the extension
        return myExtension;
    }
}
```

The following PHP script uses this. It created an example object, sets the value
property to 500 (which is not allowed, values higher than 100 are rounded to 100),
and then it reads out the double value.

```php
<?php
// create object
$object = new Example();

// set the value
$object->value = 500;

// show the double value
echo($object->double."\n");

// update the double value
// (this will trigger an error, this is a read-only property)
$object->double = 300;
?>
```
