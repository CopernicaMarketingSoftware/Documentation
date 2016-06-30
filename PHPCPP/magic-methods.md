# Magic methods

Every PHP class has "magic methods". You may already know these methods
from writing PHP code: the methods start with two underscores and have
names like `__set()`,` __isset()`, `__call()`, etcetera.

The PHP-CPP library also has support for these magic methods. Using some
C++ compiler tricks, the C++ compiler detects whether the methods exist
in your class, and if they do, they will be compiled into your extension
and called when they are accessed from PHP.

## Compile time detection

Although you may have expected that the magic methods are virtual methods in
the Php::Base class that can be overridden, they are not. The methods are
detected by the C++ compiler at compile time - and are very normal methods
that just happen to have a certain name.

Because of the compile time detection, the signature of the methods is 
somewhat flexible. The return values of many magic methods are assigned to 
Php::Value objects, which means that as long as you make sure
that your magic method returns a type that is assignable to a Php::Value,
you can use it in your class. Your `__toString()` method may thus return a
char*, an std::string, Php::Value (and even an integer!), because all these
types can be assigned to a Php::Value.

The nice thing about magic methods implemented with PHP-CPP is that they
do not become visible from PHP user space. In other words, when you define 
a function like `__set()` or `__unset()` in your C++ class, these functions
can not be called explicitly from PHP scripts - but they do get called
when a property is accessed.

## Constructors

Normally, magic methods do not have 
to be registered to make them work. When you add a magic method like 
`__toString()` or `__get()` to your class, it will automatically be 
called when an object is casted to a string or a property is accessed. There
is no need to enable the magic method explicitly in the `get_module()` startup
function.

The only exception to this rule is the `__construct()` method. This method 
does have to be explicitly registered. There are a number of reasons for this.
For a start, the `__construct()` method does not have a fixed signature, and
by explicitly adding it to the extension, you can also specify what
parameters it accepts, and whether the `__construct()` method should be public,
private or protected (if you want to create classes that can not be 
instantiated from PHP).

The other reason why you have to explicitly register the `__construct()` method,
is that, unlike other magic methods, the `__construct` method _must_ 
be visible from PHP. Inside constructors of derived classes, it often is 
necessary to make a call to `parent::__construct()`. By registering the 
`__construct()` method in the `get_module()` function you make the function
visible from PHP.

We have a special article about [constructors and destructors](constructors-and-destructors) with multiple examples how to register 
the `__construct()` method.

## Clone and destruct

The magic `__clone()` method is very similar to the `__construct()` method. It
also is a method that is called directly _after_ an object is constructed.
The difference is that `__clone()` is called after an object is _copy 
constructed_ (or _cloned_ if you prefer the PHP idiom), while 
`__construct()` is called right after the normal constructor.

The magic `__destruct()` method gets called right before the object gets 
destructed (and right before the C++ destructor runs).

The `__clone()` and `__destruct()` methods are regular magic methods (unlike 
__construct()) and you therefore do not have to register them to make them 
active. If you add one of these two methods to your class, you will not have
to make any changes to the `get_module()` startup function. The PHP-CPP library 
calls them automatically if they are available.

In normal circumstances you probably have no need for these methods.
The C++ copy constructor and the C++ destructor can be used too. The only
difference is that the magic methods are called on objects that are in a
fully initialized state, while the C++ copy constructor and C++ destructor
work on objects that are _being initialized_, or that are 
_being destructed_.

The article about mentioned above about [constructors and destructors](constructors-and-destructors) has more details and examples.

## Pseudo properties

With the methods `__get()`, `__set()`, `__unset()` and `__isset()` you can define 
pseudo properties. It allows you to, for example, create read-only properties,
or properties that are checked for validity when they are set.

The magic methods work exactly the same as their counterparts in PHP scripts 
do, so you can easily port PHP code that uses these properties to C++.

```cpp
#include <phpcpp.h>

/**
 *  A sample class, that has some pseudo properties that map to native types
 */
class User : public Php::Base
{
private:
    /**
     *  Name of the user
     *  @var    std::string
     */
    std::string _name;
    
    /**
     *  Email address of the user
     *  @var    std::string
     */
    std::string _email;

public:
    /**
     *  C++ constructor and C++ destructpr
     */
    User() = default;
    virtual ~User() = default;

    /**
     *  Get access to a property
     *  @param  name        Name of the property
     *  @return Value       Property value
     */
    Php::Value __get(const Php::Value &name)
    {
        // check if the property name is supported
        if (name == "name") return _name;
        if (name == "email") return _email;
        
        // property not supported, fall back on default
        return Php::Base::__get(name);
    }
    
    /**
     *  Overwrite a property
     *  @param  name        Name of the property
     *  @param  value       New property value
     */
    void __set(const Php::Value &name, const Php::Value &value) 
    {
        // check the property name
        if (name == "name") 
        {
            // store member
            _name = value.stringValue();
        }
        
        // we check emails for validity
        else if (name == "email")
        {
            // store the email in a string
            std::string email = value;
            
            // must have a '@' character in it
            if (email.find('@') == std::string::npos) 
            {
                // email address is invalid, throw exception
                throw Php::Exception("Invalid email address");
            }
            
            // store the member
            _email = email;
        }
        
        // other properties fall back to default
        else
        {
            // call default
            Php::Base::__set(name, value);
        }
    }
    
    /**
     *  Check if a property is set
     *  @param  name        Name of the property
     *  @return bool
     */
    bool __isset(const Php::Value &name) 
    {
        // true for name and email address
        if (name == "name" || name == "email") return true;
        
        // fallback to default
        return Php::Base::__isset(name);
    }
    
    /**
     *  Remove a property
     *  @param  name        Name of the property to remove
     */
    void __unset(const Php::Value &name)
    {
        // name and email can not be unset
        if (name == "name" || name == "email") 
        {
            // warn the user with an exception that this is impossible
            throw Php::Exception("Name and email address can not be removed");
        }
        
        // fallback to default
        Php::Base::__unset(name);
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
        Php::Class<User> user("User");
        
        // add the class to the extension
        myExtension.add(std::move(user));
        
        // return the extension
        return myExtension;
    }
}
```

The above example shows how you can create a User class that seems to have a
name and email property, but that does not allow you to assign an email
address without a '@' character in it, and that does not allow you to
remove the properties.

```php
<?php
// initialize user and set its name and email address
$user = new User();
$user->name = "John Doe";
$user->email = "john.doe@example.com";

// show the email address
echo($user->email."\n");

// remove the email address (this will cause an exception)
unset($user->email);
?>
```

## Magic methods `__call()`, `__callStatic()` and `__invoke()`

C++ methods need to be registered explicitly in your extension `get_module()` 
startup function to be accessible from PHP user space. However, when you override the `__call()` 
method, you can accept all calls - even calls to methods that do not exist. 
When someone makes a call from user space to something that looks like a method, 
it will be passed to this `__call()` method. In a script you can thus use
`$object->something()`, `$object->whatever()` or `$object->anything()` - it does not 
matter what the name of the method is, all these calls are passed on to the 
`__call()` method in the C++ class.

The `__callStatic()` method is similar to the `__call()` method, but works for
static methods. A static call to `YourClass::someMethod()` can be automatically
passed on to the `__callStatic()` method of your C++ class.

Next to the magic `__call()` and `__callStatic` functions, the PHP-CPP library also 
supports the `__invoke()` method. This is a method that gets called when an object 
instance is used _as if_ it was a function. This can be compared with overloading
the operator () in a C++ class. By implementing the `__invoke()` method, scripts
from PHP user space can create an object, and then use it as a function.

```cpp
#include <phpcpp.h>

/**
 *  A sample class, that accepts all thinkable method calls
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
     *  Regular method
     *  @param  params      Parameters that were passed to the method
     *  @return Value       The return value
     */
    Php::Value regular(Php::Parameters &params)
    {
        return "this is a regular method";
    }

    /**
     *  Overriden __call() method to accept all method calls
     *  @param  name        Name of the method that is called
     *  @param  params      Parameters that were passed to the method
     *  @return Value       The return value
     */
    Php::Value __call(const char *name, Php::Parameters &params)
    {
        // the return value
        std::string retval = std::string("__call ") + name;
        
        // loop through the parameters
        for (auto &param : params)
        {
            // append parameter string value to return value
            retval += " " + param.stringValue();
        }
        
        // done
        return retval;
    }

    /**
     *  Overriden __callStatic() method to accept all static method calls
     *  @param  name        Name of the method that is called
     *  @param  params      Parameters that were passed to the method
     *  @return Value       The return value
     */
    static Php::Value __callStatic(const char *name, Php::Parameters &params)
    {
        // the return value
        std::string retval = std::string("__callStatic ") + name;
        
        // loop through the parameters
        for (auto &param : params)
        {
            // append parameter string value to return value
            retval += " " + param.stringValue();
        }
        
        // done
        return retval;
    }

    /**
     *  Overridden __invoke() method so that objects can be called directly
     *  @param  params      Parameters that were passed to the method
     *  @return Value       The return value
     */
    Php::Value __invoke(Php::Parameters &params)
    {
        // the return value
        std::string retval = "invoke";

        // loop through the parameters
        for (auto &param : params)
        {
            // append parameter string value to return value
            retval += " " + param.stringValue();
        }
        
        // done
        return retval;
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
        
        // register the regular method
        myClass.method<&MyClass::regular>("regular");
        
        // add the class to the extension
        myExtension.add(std::move(myClass));
        
        // return the extension
        return myExtension;
    }
}
```

```php
<?php
// initialize an object
$object = new MyClass();

// call a regular method
echo($object->regular()."\n");

// call some pseudo-methods
echo($object->something()."\n");
echo($object->myMethod(1,2,3,4)."\n");
echo($object->whatever("a","b")."\n");

// call some pseudo-methods in a static context
echo(MyClass::something()."\n");
echo(MyClass::myMethod(5,6,7)."\n");
echo(MyClass::whatever("x","y")."\n");

// call the object as if it was a function
echo($object("parameter","passed","to","invoke")."\n");
?>
```
The above PHP script calls some method on this class. And will generate
the following output:

```
regular
__call something
__call myMethod 1 2 3 4
__call whatever a b
__callStatic something
__callStatic myMethod 5 6 7
__callStatic whatever x y
invoke parameter passed to invoke
```

## Casting to a string

In PHP you can add a `__toString()` method to a class. This method is automatically
called when an object is casted to a string, or when an object is used in a string
context. PHP-CPP supports this `__toString()` method too.

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
     *  @return Value
     */
    Php::Value __toString()
    {
        return "abcd";
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

Next to the magic methods described here, and that you probably already know 
from writing PHP scripts, the PHP-CPP library also introduces a number of
additional magic methods. These include extra casting methods, and a method
to compare objects.

You can read more about these additional features in the [next section](special-features).

