# Constants

In PHP scripts you can define constants - both global constants and class level constants. This can also be done with PHP-CPP. If you want to expose constants to user space PHP code, you can do that by adding the constants to the Php::Extension object inside the get_module() call.

```cpp
    #include <phpcpp.h>

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

            // add integer constants
            myExtension.add(Php::Constant("MY_CONSTANT_1", 1));
            myExtension.add(Php::Constant("MY_CONSTANT_2", 2));

            // floating point constants
            myExtension.add(Php::Constant("MY_CONSTANT_3", 3.1415927));
            myExtension.add(Php::Constant("MY_CONSTANT_4", 4.932843));

            // string constants
            myExtension.add(Php::Constant("MY_CONSTANT_5", "This is a constant value"));
            myExtension.add(Php::Constant("MY_CONSTANT_6", "Another constant value"));

            // null constants
            myExtension.add(Php::Constant("MY_CONSTANT_7", nullptr));

            // return the extension
            return myExtension;
        }
    }
```
It is all very straight forward. Using the constants in a PHP script is just as easy:

```php
    <?php
        echo(MY_CONSTANT_1."\n");
        echo(MY_CONSTANT_2."\n");
        echo(MY_CONSTANT_3."\n");
        echo(MY_CONSTANT_4."\n");
        echo(MY_CONSTANT_5."\n");
        echo(MY_CONSTANT_6."\n");
        echo(MY_CONSTANT_7."\n");
    ?>
```
PHP also supports the concept of class level constants. Internally, in the Zend engine, class level constants are implemented as regular class members, but instead of a "public" or "private" flag, a constant property is marked with a "constant" flag. PHP-CPP exposes this too. You can register class properties with a Php::Const flag.

Besides this, a Php::Class instance also has a "constant" method, and you can add instances of Php::Constant to the class. Semantically, all these three ways to create class level constants are identical.

```cpp
    /**
     *  The C++ class that we're going to expose
     *
     *  (For this example we use a completely empty class, as only examples
     *  are given on how to use constants)
     */
    class Dummy : public Php::Base
    {
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

            // create a class objects
            Php::Class<Dummy> dummy("Dummy");

            // there are many different ways to add constants, but semantically,
            // they're all the same
            dummy.property("MY_CONSTANT_1", 1, Php::Const);
            dummy.property("MY_CONSTANT_2", "abcd", Php::Const);
            dummy.constant("MY_CONSTANT_3", "xyz");
            dummy.constant("MY_CONSTANT_4", 3.1415);
            dummy.add(Php::Constant("MY_CONSTANT_5", "constant string"));
            dummy.add(Php::Constant("MY_CONSTANT_5", true));

            // add the class to the extension
            myExtension.add(std::move(dummy));

            // return the extension
            return myExtension;
        }
    }
```
## Runtime constants

If you want to find out the value of a user space constant at runtime from your C++ code, or when you want to find out if a constant is defined or not, you can simply use the Php::constant() or Php::defined() functions. To define constants at runtime, use Php::define():

```cpp
    /**
     *  Function that can be called from a PHP script
     */
    void example_function()
    {
        // check if a certain user space constant is defined
        if (Php::defined("USER_SPACE_CONSTANT"))
        {
            // retrieve the value of a constant
            Php::Value constant = Php::constant("ANOTHER_CONSTANT");

            // define other constants at runtime
            Php::define("DYNAMIC_CONSTANT", 12345);
        }
    }

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

            // add a function to the extension
            extension.add("example_function", example_function);

            // return the extension
            return myExtension;
        }
    }
```