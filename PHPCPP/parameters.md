#Specifying function parameters

PHP has a mechanism to enforce the types of function parameters, and to accept
parameters either by reference or by value. In the [earlier examples](functions), we had not yet used that mechanism, and we left it to 
the function implementations to inspect the 'Php::Parameters' object (which
is a std::vector of Php::Value objects), and to check whether the number of 
parameters is correct, and of the right type.

However, the 'Extension::add()' method takes a third optional parameter that
you can use to specify the number of parameters that are supported, if
the parameters are passed by reference or by value, and what the type of
the parameters is:

```cpp
#include <phpcpp.h?

void example(Php::Parameters &params)
{
}

extern "C" {
    PHPCPP_EXPORT void *get_module() {
        static Php::Extension myExtension("my_extension", "1.0");
        myExtension.add("example", example, {
            Php::ByVal("a", Php::Type::Numeric),
            Php::ByVal("b", "ExampleClass"),
            Php::ByVal("c", "OtherClass")
        });
        return myExtension;
    }
}
```
Above you see that we pass in additional information when we register the
"example" function. We tell the PHP engine that our function accepts three parameters:
the first parameter must be numeric, while the other ones are 
instances of type "ExampleClass" and "OtherClass". In the end, your native C++ 
"example" function will still be called with a Php::Parameters instance, but 
the moment it gets called, you can be sure that the Php::Parameters object 
will be filled with three members, and that two of them are objects of the 
appropriate type.

##Can you really enforce scalar parameters?
You may be surprised to see that we specified the first parameter to be of
type Numeric. After all, in PHP there is no offical way to enforce the type of a 
scalar parameter. When you write a function in PHP, it is possible to enforce 
that the function receives an object or an array, but not that you want to receive 
a string or an integer.

```php
<?php
// example how you can enforce that a function can only be called with an object
function example1(MyClass $param)
{
    ...
}

// another example to enforce an array parameter
function example2(array $param)
{
    ...
}

// this is not (yet?) possible in PHP
function example3(int $param)
{
    ...
}

?>
```
The same is true for native functions. Although the core PHP engine and PHP-CPP
library both offer the possibility to specify that your function accepts parameters of type 
"Php::Type::Numeric" or of type "Php::Type::String", this setting is further 
completely ignored. Maybe this is going to change in the 
future (let's hope so), but for now it is only meaningful to specify the
parameter type for objects and arrays. We have however chosen to still offer 
this feature in PHP-CPP, because it is also offered by the core PHP engine, 
so that we are ready for future versions of PHP. But for now
the specification of the numeric parameter in our example is meaningless.

To come back to our example, the following functions calls can now be done
from PHP user space:

```php
<?php
// correct call, parameters are numeric and two objects of the right type
example(12, new ExampleClass(), new OtherClass());

// also valid, first parameter is not numeric but an array, but the 
// Zend engine does not check this even though it was specified
example(array(1,2,3), new ExampleClass(), new OtherClass());

// invalid, wrong number of parameters
example(12, new ExampleClass());

// invalid, wrong objects
example(12, new DateTime(), new DateTime());

// invalid, "x" and "z" are no objects
example("x", "y", "z");
?>

The PHP engine will trigger an error if your function is called with wrong
parameters, and will not make the actual call to the native function.

## The Php::ByVal class further explained

The Php::ByVal class that we showed can be constructed in two ways.
Let's look at the first constructor from the C++ header file:

```cpp
/**
 *  Constructor
 *  @param  name        Name of the parameter
 *  @param  type        Parameter type
 *  @param  required    Is this parameter required?
 */
ByVal(const char *name, Php::Type type, bool required = true);
```

The first parameter of the constructor should always be the  
parameter name. This is a little strange, because PHP does not support the
concept of 'named variables', like other languages do. Internally, this 
name is only used to generate an error messages when your function is 
called in the wrong way.


The Php::Type parameter is more interesting. The following types are
supported:

```
Php::Type::Null
Php::Type::Numeric
Php::Type::Float
Php::Type::Bool
Php::Type::Array
Php::Type::Object
Php::Type::String
Php::Type::Resource
Php::Type::Constant
Php::Type::ConstantArray
Php::Type::Callable
```
In practice, it only makes a difference if you specify Php::Type::Array or
Php::Type::Object as type, because all other types are not enforced by the 
underlying PHP engine.

The final parameter (do you remember that it was called 'required'?) can be 
used to set whether the parameter is optional or not.  If you set it
to true, PHP will trigger an error when your
function is called without this parameter. This setting only
works for the trailing parameters, as it is (of course) not 
possible to mark the first parameter as optional, and all subsequent 
parameters as required.

If you write a function that accepts an object as parameter, you can
use the second form of the Php::ByVal constructor:

```cpp
/**
 *  Constructor
 *  @param  name        Name of the parameter
 *  @param  classname   Name of the class
 *  @param  nullable    Can it be null?
 *  @param  required    Is this parameter required?
 */
ByVal(const char *name, const char *classname, bool nullable = false, bool required = true);
```

This alternative constructor also has a 'name' and 'required' parameter, but the
Php::Type parameter that was available before is now replaced by a 'classname'
and 'nullable' parameter. This constructor can be used for functions that 
accept an object of a specific type as parameter. For example, take a look 
at the following code in PHP:

```php
<?php
function example1(DateTime $time) { ... }
function example1(DateTime $time = null) { Php::Value time = params[0]; ... }
?php
```

This would be identical to the following code in C++:

```cpp
#include &lt;phpcpp.h&gt;

void example1(Php::Parameters &amp;params) { Php::Value time = params[0]; ... }
void example2(Php::Parameters &amp;params) { Php::Value time = params[0]; ... }

extern "C" {
    PHPCPP_EXPORT void *get_module() {
        static Php::Extension myExtension("my_extension", "1.0");
        myExtension.add("example1", example1, { Php::ByVal("time", "DateTime", false); });
        myExtension.add("example2", example2, { Php::ByVal("time", "DateTime", true); });
        return myExtension;
    }
}
```

## Parameters by reference

By the name of the Php::ByVal class you may have concluded that there
must also be a Php::ByRef class - and you could not have been more right than that. 
There is indeed a Php::ByRef class.
If you create a function that takes a parameter by reference (and that can
thus 'return' a value via a parameter) you can specify that too.

The Php::ByRef class has exactly the same signature as the Php::ByVal class,
and can be used in exactly the same way. The difference is that ByRef
also checks if someone tries to call your function with a literal instead
of a variable - which is not possible for variables by reference. If this
happens, an error is triggered and the function will not be called.
Let's show an example. The following extension creates a function that
swaps the contents of two variables.

```cpp
#include <phpcpp.h>

void swap(Php::Parameters &params) 
{
    Php::Value temp = params[0];
    params[0] = params[1];
    params[1] = temp;
}
    
extern "C" {
    PHPCPP_EXPORT void *get_module() {
        static Php::Extension myExtension("my_extension", "1.0");
        myExtension.add("swap", swap, { 
            Php::ByRef("a", Php::Type::Numeric),
            Php::ByRef("b", Php::Type::Numeric) 
        });
        return myExtension;
    }
}
```

And let's see how this function can now be called:

```php
<?php
// define two variables
$a = 1;
$b = 2;

// swap the variables
swap($a, $b);

// invalid, literals cannot be passed by reference
swap(10,20);
?>
```
## Summary

When you add your native functions to the extension object, you may supply
an optional third parameter with a list of Php::ByVal and Php::ByRef objects
with the names and types of the parameters that are accepted.
Internally, the PHP engine runs a check right before every 
function call to verify that the passed in parameters are compatible with 
the parameter specification that you gave, and will trigger an error if they 
are not.

Specifying parameters is optional. If you choose to leave this specification
out it is up to you to check *inside* the function if there are enough
parameters, and if the types are correct.

