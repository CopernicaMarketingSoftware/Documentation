# Inheritance</h1>

Both PHP and C++ are object oriented programming languages that support
class inheritance. There are some differences: C++ supports multiple 
inheritance, while a PHP class can only have a single base class.
To make up for not having multiple inheritance, PHP supports interfaces
and traits.

The PHP-CPP library also allows you to define PHP interfaces and to create 
hierarchies of PHP classes and PHP interfaces.

## Defining interfaces

In case you want your extension to *define* an interface, so that the
interface can be implemented from PHP user space scripts, you can do that
almost in a similar way to how you would define a class. The only 
difference is that you do not use `Php::Class<YourClass>`, but a 
Php::Interface instance.


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
        
        // description of the interface so that PHP knows which methods 
        // are defined by it
        Php::Interface interface("MyInterface");
        
        // define an interface method
        interface.method("myMethod", { 
            Php::ByVal("value", Php::Type::String, true) 
        });
        
        // register other methods
        ...

        // add the interface to the extension
        // (or move it into the extension, which is faster)
        myExtension.add(std::move(interface));
        
        // return the extension
        return myExtension;
    }
}
```

## Deriving and implementing

The PHP-CPP library tries to make working with PHP and C++ as transparent
as possible. C++ functions can be called from PHP userspace scripts,
and C++ classes can be made accessible from PHP. However, in the end PHP
and C++ are still different languages, and because C++ does not have the 
same reflection features as PHP, you will have to explicit tell the PHP
engine which base classes and interfaces the class implements.


The `Php::Class<YourClass>` object has a method 'extends()' and a 
method 'implements()' that can be used for specifying the base classes
and implemented interfaces. You need to pass in a class or interface that
you configured before. Let's look at an example.


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
        
        // description of the interface so that PHP knows which methods 
        // are defined by it
        Php::Interface myInterface("MyInterface");
        
        // define an interface method
        myInterface.method("myMethod", { 
            Php::ByVal("value", Php::Type::String, true) 
        });
        
        // register our own class
        Php::Class<MyClass> myClass("MyClass");
        
        // from PHP user space scripts, it must look like the myClass implements
        // the MyInterface interface
        myClass.implements(myInterface);
        
        // the interface requires that the myMethod method is implemented
        myClass.method("myMethod", &MyClass::myMethod, {
            Php::ByVal("value", Php::Type::String, true) 
        });
        
        // create a third class
        Php::Class<DerivedClass> derivedClass("DerivedClass");
        
        // in PHP scripts, it should look like DerivedClass has "MyClass" 
        // as its base
        derivedClass.extends(myClass);
        
        // add the interface and the classes to the extension
        myExtension.add(myInterface);
        myExtension.add(myClass);
        myExtension.add(derivedClass);
        
        // return the extension
        return myExtension;
    }
}
```

Be aware that the PHP class hierarchy that you define inside the get_module()
function does not have to match the C++ class hierarchy. Your C++ class 
"DerivedClass" does not at all have to have "MyClass" as its base, even
although in PHP scripts it would look like it has. For code maintainability
is it of course better to make the PHP signature more or less similar to the
C++ implementation.
