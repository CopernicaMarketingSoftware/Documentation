# Exceptions

PHP and C++ both support exceptions, and with the PHP-CPP library exception
handling between these two languages is completely transparent. Exceptions that
you throw in C++ are automatically passed on to the PHP script, and exceptions
thrown by PHP scripts can be caught by your C++ code as if it was a plain
C++ exception.

Let's start with a simple C++ function that throws an exception.

```cpp
#include <phpcpp.h>

/**
 *  Simple function that takes two numeric parameters,
 *  and that divides them. Division by zero is of course
 *  not permitted - it will throw an exception then
 */
Php::Value myDiv(Php::Parameters &params)
{
    // division by zero is not permitted, throw an exception when this happens
    if (params[1] == 0) throw Php::Exception("Division by zero");

    // divide the two parameters
    return params[0] / params[1];
}

extern "C" {
    PHPCPP_EXPORT void *get_module() {
        static Php::Extension extension("my_extension", "1.0");
        extension.add<myDiv>("myDiv", {
            Php::ByVal("a", Php::Type::Numeric, true),
            Php::ByVal("b", Php::Type::Numeric, true)
        });
        return extension;
    }
}
```

And once again you see a very simple extension. In this extension a "myDiv"
function is created that divides two numbers. But division by zero is of course
not allowed, so when an attempt is made to divide by zero, an exception is thrown.
The following PHP script uses this:

```php
<?php
    try
    {
        echo(myDiv(10,2)."\n");
        echo(myDiv(8,4)."\n");
        echo(myDiv(5,0)."\n");
        echo(myDiv(100,10)."\n");
    }
    catch (Exception $exception)
    {
        echo("exception caught\n");
    }
?>
```
The output of this script is as follows:

```
5
2
exception caught
```

The example shows how amazingly simple it is to throw exceptions from your
C++ code, and to catch them in your PHP script. The PHP-CPP library will
internally catch your C++ exception and convert it into a PHP exception,
but this all happens under the hood. For you, the extension programmer,
it is as if you're not even working in two different languages, and you can
simply throw a Php::Exception object as if it was a regular PHP exception.

## Catching exceptions in C++

And this works the other way around too. If your extension calls a PHP function,
and that PHP function happens to throw an exception, you can catch it just
as if it was a normal C++ exception.

```cpp
#include <phpcpp.h>

Php::Value callMe(Php::Parameters &params)
{
    // prevent that exceptions bubble up
    try
    {
        // call the function that was supplied by the user
        return params[0]();
    }
    catch (Php::Exception &exception)
    {
        return "Exception caught!\n";
    }
}

extern "C" {
    PHPCPP_EXPORT void *get_module() {
        static Php::Extension extension("my_extension", "1.0");
        extension.add<callMe>("callMe", {
            Php::ByVal("callback", Php::Type::Callable, true)
        });
        return extension;
    }
}
```

This code calls for explanation. As we've mentioned before, a Php::Value object
can be used just like a normal PHP $variable is used, and you can thus store
integers, strings, objects, arrays, et cetera in it. But this also means that
you can use it to store functions - because PHP variables can be used to store
functions too! And that's exactly what we're doing here.

The callMe() function from this example extension receives one single parameter:
a callback function that it will immediately call, and from which the return
value is also returned by the callMe() function. If this callback somehow throws
an exception, it will be caught by the callMe() function, and an alternative
string will be returned instead ("Exception caught!").

```php
<?php

// call "callMe" for the first time, and supply a function that returns "first call"
$output = callMe(function() {
    return "First call";
});

// show output (this will be "First call")
echo("$output\n");

// call "callMe" for the second time, but throw an exception this time
$output = callMe(function() {
    throw new Exception("Sorry...\n");
    return "Second call\n";
});

// show output (this will be "Exception caught")
echo("$output\n");

?>
```

This PHP script uses our extension and calls the callMe() function two times in
a row. First with a normal function that returns a string, but then with
a function that throws an exception - which will be caught by the extension.
The output is as you would expect.

```
First call
Exception caught!
```
