# Exporting native functions

A PHP extension can of course only be useful if you can make functions and/or 
classes that can be called from PHP scripts. For functions this is 
astonishingly simple. As long as you have a native C++ function that has 
one of the following four signatures, you can call it almost directly from PHP:

```cpp
void example1();
void example2(Php::Parameters &params);
Php::Value example3();
Php::Value example4(Php::Parameters &params);
```
The function signatures show you two important PHP-CPP classes, the
Php::Value class and the Php::Parameters class. The Php::Value class is a
powerful class that does the same as a regular PHP $variable: it can hold
almost any value (integers, floating pointer numbers, strings, but also
regular and associative arrays and objects). The Php::Parameters class
can be best compared with an array or a vector holding all the parameters
that were passed to your function. We will come back to both classes in
much more detail later on.

To make a function callable from PHP, you must *add* the function
to your extension object, and assign a name to it. This is the
name by which the function becomes callable from within your PHP scripts.

```cpp
#include <phpcpp.h>
#include <iostream>

void myFunction()
{
    Php::out << "example output" << std::endl;
}

extern "C" {
    PHPCPP_EXPORT void *get_module() {
        static Php::Extension extension("my_extension", "1.0");
        extension.add("myFunction", myFunction);
        return extension;
    }
}
```
It is not difficult to imagine what the above code does. If you deploy
this extension, you can create PHP scripts in which you can call myFunction(),
that will print "example output" to stdout.

As we've said before, there are four types of functions that can be used. In
this first example we showed the most simple one: a function that does not
take any parameters, and that returns nothing. What if you
want to return a value from your function?

```cpp
#include <phpcpp.h>
#include <stdlib.h>

Php::Value myFunction()
{
    if (rand() % 2 == 0)
    {
        return "string";
    }
    else
    {
        return 123;
    }
}

extern "C" {
    PHPCPP_EXPORT void *get_module() {
        static Php::Extension extension("my_extension", "1.0");
        extension.add("myFunction", myFunction);
        return extension;
    }
}
```
Is that cool or not? In PHP it is perfectly legal to make functions that
sometimes return a number, and sometimes return a string. This can not be
done in C++, because a function must always return the same type of variable.
But because the Php::Value class can be used to represent both numeric
variables as well as strings (and arrays, and objects, but more on that 
later) - we can now also create native C++ functions that sometimes return
a string and sometimes a numeric value. You can test the function with a 
simple PHP script.

```php
<?php
    for ($i=0; $i<10; $i++) echo(myFunction()."\n");
?>
```

The possible output of this script could for example be:

```
123
123
string
123
123
string
string
string
string
```
We've mentioned that there are four types of native functions that can be
added to the extension object. We've showed you two examples, but none of
these example functions accepted any parameters. Let's therefore round up with a 
final example, one that accepts parameters and also returns a result. 
The following function takes a variable number of parameters, 
and sums up the integer value of all the parameters:

```cpp
#include <phpcpp.h>

Php::Value sum_everything(Php::Parameters &parameters)
{
    int result = 0;
    for (auto &param : parameters) result += param;
    return result;
}

extern "C" {
    PHPCPP_EXPORT void *get_module() {
        static Php::Extension extension("my_extension", "1.0");
        extension.add("sum_everything", sum_everything);
        return extension;
    }
}
```
It looks so simple, doesn't it? 
The Php::Parameters class is in reality nothing less than a std::vector 
filled with Php::Value objects - and you can thus iterate over it. 
We use the new C++11 way of doing this, and we use the new-for-C++11 
"auto" keyword to ask the compiler to find out what type of variables are 
stored in the parameters vector (it are Php::Value objects, of course).

And you can again see how powerful the Php::Value class is. 
It can be used on the right hand side of a += operator to be added to 
an integer value, and the final integer result variable is automatically 
converted back into a Php::Value object when the function returns - just as if 
you are working with regular PHP $variables. But remember, this is C++ code and 
therefore much, much faster!

The sum_everything() function that we just made is now accessible from your
PHP script. Let's run a test.

```php
<?php
    echo(sum_everything(10,"100",20)."\n");
?>
```

The output of the above script is, of course, 130. The "100" string variable
that is passed to the function is automatically converted into an integer,
which is exactly the same behavior of a PHP script.

All parameter-accepting functions can be called with a variable number of
parameters. It is therefore valid to call them from PHP with zero, one, two 
or even ten thousand parameters. It is up to you, the extension programmer, to check 
this, and to check whether the parameters that are passed to your
function are of the right type.

In most situations however, you want
your functions to be called with a fixed number of parameters, or with
parameters of a certain type. To achieve that, you will have to specify
the parameter types when you add your function to the extension object.
More on that in the [next section](parameters).
