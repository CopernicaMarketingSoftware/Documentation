# Working with variables

Variables in PHP are non-typed. A variable can thus hold any possible type:
an integer, string, a floating point number, and even an object or an array.
C++ on the other hand is a typed language. In C++ an integer variable always has
a numeric value, and a string variable always hold a string value.

When you mix native code and PHP code, you will need to convert the non-typed
PHP variables into native variables, and the other way round: convert native
variables back into non-typed PHP variables. The PHP-CPP library offers
the Php::Value class that makes this a very simple task.

## Zval's

But we start with sharing one of our frustrations. If you have ever spent time
on writing PHP extensions in plain C, or if you've ever read something about
the internals of PHP, you must have heard about zval's. A zval is a C structure
in which PHP variables are stored. Internally, this zval keeps a refcount,
a union with the possible types and a number of other members too. Every time
that you access such a zval, make a copy of it, or write to it, you must break
your head to correctly update the refcount, and/or split the zval into different
zvals, explicitly call copy constructors, allocate or free memory (using special
memory allocation routines), or choose not to do this and leave the zval alone.

This all is crazy difficult and a big source for mistakes and all sorts of bugs.

And to make things even worse, there are literally hundreds of different
undocumented (!) macro's and functions in the Zend engine that can manipulate
these zval variables. There are special macro's that work on zval's, macro's for
pointers-to-zval's, macro's for pointer-to-pointer-to-zval's and even macro's
that deal with pointer-to-pointer-to-pointer-to-zval's.

Every single PHP module, every PHP extension, and every built-in PHP function
is busy manipulating these zval structures. It is a big surprise that nobody ever
took the time to wrap such a zval in a simple C++ class that does all this
administration for you. C++ is such a nice language with constructors, destructors,
casting operators and operator overloading that can encapsulate all this
complicated zval handling.

And that is exactly what we did with PHP-CPP. We have introduced the Php::Value
object with a very simple interface, that takes away all the problems of zval
handling. Internally, the Php::Value object is a wrapper around a zval variable,
but it completely hides the complexity of zval handling.

So, everything that you always wanted to ask about the internals of PHP, but were
afraid to ask: just forget about it. Sit back and relax, and take a look how
simple life is with PHP-CPP.

## Scalar variables

The Php::Value object can be used to store scalar variables. Scalar variables
are variables like integers, doubles, strings, booleans and null values.
To create such a scalar variable, just assign it to a Php::Value object.

```cpp
Php::Value value1 = 1234;
Php::Value value2 = "this is a string";
Php::Value value3 = std::string("another string");
Php::Value value4 = nullptr;
Php::Value value5 = 123.45;
Php::Value value6 = true;
```

The Php::Value class has casting operators to cast the object to almost every
thinkable native type. When you have access to a Php::Value object, but want
to store it in a (much faster) native variable, you can simply assign it.

```cpp
void myFunction(const Php::Value &value)
{
    int value1 = value;
    std::string value2 = value;
    double value3 = value;
    bool value4 = value;
}
```

If the `Php::Value` object holds an object, and you cast it to a string,
the `__toString()` method of the object gets called, exactly what would happen
if you had casted the variable to a string in a PHP script.

Many different operators are overloaded too so that you can use a Php::Value
object directly in arithmetric operations, compare it with other variables,
or send it to an output stream.

```cpp
void myFunction(Php::Value &value)
{
    value += 10;
    Php::out << value << std::endl;
    if (value == "some string")
    {

    }

    int result = value - 8;
}
```

The Php::Value object has implicit constructors for most types. This means that
every function that accepts a Php::Value as parameter can also be called with
a native type, and in functions that should return a Php::Value you can simply
specify a scalar return value - which will automatically be converted into
a Php::Value object by the compiler.

```php
Php::Value myFunction(const Php::Value &value)
{
    if (value == 12)
    {
        return "abc";
    }
    else if (value > 100)
    {
        return myFunction(12);
    }

    return nullptr;
}
```

As you can see in the examples, you can do almost anything with Php::Value objects.
Internally it does all the zval manipulation, and sometimes that can become
complicated, but for you, the extension programmer, there is nothing to worry about.

## Strings

Strings can be easily stored in `Php::Value` objects. It is so easy to assign
a string to a `Php::Value`, or to cast a `Php::Value` into a string, that any
explanation hardly is necessary. Normally, the assignment operators and casting
operators are sufficient. When performance is an issue however, you may consider
to get direct access to the internal buffer inside the Php::Value object.

When a `Php::Value` is casted to a `std::string`, the entire string contents are
copied from the `Php::Value` object to the std::string object. If you do not want
to make such a full copy, you can cast the value to a const char `*` instead.
This gives you direct access to the buffer inside the Php::Value object.
The size of the string can be retrieved with the size() method. But you must
realize that once the Php::Value gets out of scope, the pointer to the buffer
is no longer guaranteed to be valid.

```cpp
/**
 *  Example function
 *  @param  params
 */
void myFunction(Parameters &params)
{
    // store the first parameter in a std::string (the entire string
    // buffer is copied from the Php::Value object to the std::string)
    std::string var1 = params[0];

    // it also is possible to cast the object into a const char *. This works
    // too, but the buffer is only valid for as long as the Php::Value object
    // stays in scope
    const char *var2 = params[0];
    size_t var2size = params[0].size();
}
```

It also is possible to directly write to the internal Php::Value buffer. When
you assign a string to a Php::Value object, the entire string buffer is copied
too. It does not matter if the string that you assign is a std::string or a char*:
a copy is always made. For small things, this hardly is an issue and it would make
your code much less readable if you did it differently. But if you have to copy
many bytes, you can better get direct access to the buffer.

```cpp
/**
 *  Example function to read bytes from a filedescriptor, and
 *  return it as a Php::Value object
 *
 *  @param  fd          Filedescriptor
 *  @return Php::Value
 */
Php::Value readExample1(int fd)
{
    // buffer to read the bytes in
    char buffer[4096];

    // read the buffer
    ssize_t bytes = read(fd, buffer, 4096);
    if (bytes < 0) bytes = 0;

    // convert the buffer to a Php::Value object and return it
    return Php::Value(buffer, bytes);
}

/**
 *  Another example function, that does the same as the previous
 *  function, but now it reads the bytes directly into a Php::Value
 *  buffer, and does not use an intermediate buffer.
 *
 *  @param  fd          Filedescriptor
 *  @param  Php::Value
 */
Php::Value readExample2(int fd)
{
    // result variable
    Php::Value result;

    // resize the buffer to 4096 bytes, the reserve() method resizes
    // the internal buffer to the appropriate size, and returns a pointer
    // to the buffer
    char *buffer = result.reserve(4096);

    // read in the bytes directly into the just allocated buffer
    ssize_t bytes = read(fd, buffer, 4096);
    if (bytes < 0) bytes = 0;

    // resize the buffer to the actual number of bytes in it (this
    // is necessary, otherwise the PHP strlen() returns 4096 even
    // when less bytes were available
    result.reserve(bytes);

    // return the result
    return result;
}
```

The first example function is easier to read. The read() system call is used to
fill a local buffer with bytes. This local buffer is then converted to
a `Php::Value` object and returned.

The second example function is more efficient, because the read() system call
now immediately reads the bytes into the buffer of the Php::Value object, and
not into a temporary buffer. As a programmer, you must choose between one of
these algorithms depending on your needs: easy code or more efficient code.

## Arrays

PHP supports two array types: regular arrays (indexed by numbers) and associative
arrays (indexed by strings). The Php::Value object supports arrays too. By using
array access operators (square brackets) to assign values to a Php::Value object,
you automatically turn it into an array.

```cpp
// create a regular array
Php::Value array;
array[0] = "apple";
array[1] = "banana";
array[2] = "tomato";

// an initializer list can be used to create a filled array
Php::Value filled({ "a", "b", "c", "d"});

// you can cast an array to a vector, template parameter can be
// any type that a Value object is compatible with (string, int, etc)
std::vector<std::string> fruit = array;

// create an associative array
Php::Value assoc;
assoc["apple"] = "green";
assoc["banana"] = "yellow";
assoc["tomato"] = "green";

// the variables in an array do not all have to be of the same type
Php::Value assoc2;
assoc2["x"] = "info@example.com";
assoc2["y"] = nullptr;
assoc2["z"] = 123;

// nested arrays are possible too
Php::Value assoc2;
assoc2["x"] = "info@example.com";
assoc2["y"] = nullptr;
assoc2["z"][0] = "a";
assoc2["z"][1] = "b";
assoc2["z"][2] = "c";

// assoc arrays can be cast to a map, indexed by string
std::map<std::string,std::string> map = assoc2;
```

Reading from arrays is just as simple. You can use the array access operators
(square brackets) for this too.

```cpp
Php::Value array;
array["x"] = 10;
array["y"] = 20;

Php::out << array["x"] << std::endl;
Php::out << array["y"] << std::endl;
```

There also is a special Php::Array class. This is an extended Php::Value class
that, when constructed, immediately starts as empty array (unlike Php::Value
objects that by default construct to NULL values).

```cpp
// create empty array
Php::Array array1;

// Php::Value is the base class, so you can assign Php::Array objects
Php::Value array2 = array1;

// impossible, a Php::Array must always be an array
array1 = 100;
```

## Objects

Just like the Php::Array class that is an extended Php::Value that initializes
to an empty array, there also is a Php::Object class that becomes an object when
constructed. By default this is an instance of stdClass - PHP's most simple class.

```cpp
// create empty object of type stdClass
Php::Object object;

// Php::Value is the base class, so you can assign Php::Object objects
Php::Value value = object;

// impossible, a Php::Object must always be an object
object = "test";

// object properties can be accessed with square brackets
object["property1"] = "value1";
object["property2"] = "value2";

// to create an object of a different type, pass in the class name
// to the constructor with optional constructor parameters
object = Php::Object("DateTime", "now");

// methods can be called with the call() method
Php::out << object.call("format", "Y-m-d H:i:s") << std::endl;

// all these methods can be called on a Php::Value object too
Php::Value value = Php::Object("DateTime", "now");
Php::out << value.call("format", "Y-m-d H:i:s") << std::endl;
```

When you have created your own class with the PHP-CPP library, you can use the
same Php::Object class to make instances of it. Because PHP and C++ are different
languages, there is a difference between object instances that you should return
from your functions (Php::Value or Php::Object instances), and the variables that
you use internally in your C++ code (regular C++ pointers). The PHP-CPP allows
you to easily convert these two types.

```cpp
#include <phpcpp.h>

class MyClass : public Php::Base
{
    /**
     *  First factory method
     *  @return Php::Value      object holding a new MyClass instance
     */
    static Php::Value factory1()
    {
        // use the Php::Object class to create an instance (this will
        // result in __construct() being called)
        return Php::Object("MyClass");
    }

    /**
     *  Alternative factory method
     *  @return Php::Value
     */
    static Php::Value factory2()
    {
        // create an instance ourselves
        MyClass *object = new MyClass();

        // the object now only exists as C++ object, to ensure that it is also
        // registered as an object in PHP user space, we wrap it in a
        // Php::Object class (which is an extended Php::Value class). Because
        // PHP supports reflection it is necessary to also pass in the class
        // name. The __construct() method will _not_ be called - because the
        // C++ object is already instantiated.
        return Php::Object("MyClass", object);
    }

    /**
     *  Method that returns 'this' to allow chaining ($x->chain()->chain()).
     *  @return Php::Value
     */
    Php::Value chain()
    {
        // the Php::Value has an implicit constructor for Php::Base pointers.
        // This means that you can safely return 'this' from a method, which
        // will automatically be converted into a valid Php::Value object. This
        // works only for pointers to objects that already exist in PHP user
        // space.
        return this;
    }

    /**
     *  Method that gets a MyClass instance as parameter
     *  @param  params      vector holding all parameters
     */
    void process(Php::Parameters &params)
    {
        // store the first parameter in a Php::Value object
        Php::Value value = params[0];

        // if you know for sure that the 'value' variable holds a (wrapped)
        // instance of a MyClass object, you can convert the value back into
        // a pointer to the original C++ object by calling the 'implementation'
        // method.
        //
        // Note that this only works for value objects that hold instances of
        // C++ classes defined by your extension! Calling the 'implementation()'
        // method on a non-object, on an object of a user space class, or of
        // a core PHP class or a class from a different extension will probably
        // result in a crash!
        MyClass *object = (MyClass *)value.implementation();
    }
};
```

## Iterating

The `Php::Value` class implements the begin() and end() methods just like many
C++ STL containers. As a consequence, you can iterate over a Php::Value just like
you would iterate over a std::map class.

```cpp
/**
 *  Function that accepts an array as parameter
 *  @param  array
 */
void myFunction(const Php::Value &value)
{
    // assum the value variable holds an array or object, it then
    // is possible to iterate over the values or properties
    for (auto &iter : value)
    {
        // output key and value
        Php::out << iter.first << ": " << iter.second << std::endl;
    }
}
```

The iterated value is a `std::pair<Php::Value::Php::Value>`. You can access its
property 'first' to get the current key, and the property 'second' to get
the current value. This is identical to how you would iterate over a std::map.

You can iterate over all Php::Value objects that hold either an object or an array.
When you iterate over an array, the iterator simply iterates over all records in
the array.

For objects there are some things to consider. If the object that you iterate
over implements the Iterator or IteratorAggregate interface, the C++ iterator
uses these built-in interfaces and calls its methods to traverse the object.
For regular objects (the ones that do not implement Iterator or IteratorAggregate)
the iterator simply iterates over all the _public_ properties of the object.

An iterator can be used in two directions: both the operator ++ as well as
the operator -- are available. But be careful with using the -- operator: If
the Php::Value object holds an object that implements Iterator or IteratorAggregate,
reverse iterating does not work, because the internal iterator only has a next()
method, and there is no way for the PHP-CPP library to instruct the internal
iterator to move backwards.

Also be careful with the return value of the ++ postfix operator. Normally,
a postfix increment operation returns the original value _before_ the operation.
This is different when you iterate over objects that implement Iterator or
IteratorAggregate, because it is impossible for the PHP-CPP library to make
a copy of a PHP iterator. As a result, the ++ postfix operator (only when using
it on a Iterator or IteratorAggregate object) returns a brand new iterator that
is back at the front position of the object. But remember that in C++ and PHP
(and in many other programming languages) it is much wiser to use the ++ _prefix_
operator, as this does not require making a copy of the original object, so you
should not use the ++ postfix operator anyway!

## Functions

When a `Php::Value` object holds a _callable_, you can use the () operator to
call this function or method.

```cpp
// create a string with a function name
Php::Value date = "date";

// "date" is a built-in PHP function and thus can it be called
Php::out << date("Y-m-d H:i:s") << std::endl;

// create a date-time object
Php::Object now = Php::Object("DateTime","now");

// create an array with two members, the datetime object
// and the name of a method
Php::Array array();
array[0] = now;
array[1] = "format";

// an array with two members can be called too, the first
// member is seen as the object, and the second as the
// name of the method
Php::out << array("Y-m-d H:i:s") << std::endl;
```
## Global variables

To read or update global PHP variables, you can use the Php::GLOBALS variable.
This variable works more or less the same as the $GLOBALS variable in a PHP script.

```cpp
// set a global PHP variable
Php::GLOBALS["a"] = 12345;

// global variables can be of any type
Php::GLOBALS["b"] = Php::Array({1,2,3,4});

// nested calls are (of course) supported
Php::GLOBALS["b"][4] = 5;

// and global variables can also be read
Php::out << Php::GLOBALS["b"] << std::endl;
```

Next to the $GLOBALS variable, PHP allows you to access variables using the
$_GET, $_POST, $_COOKIE, $_FILES, $_SERVER, $_REQUEST and $_ENV variables. In
your C++ extension you can do something similar with the global variables
Php::GET, Php::POST, Php::COOKIE, Php::FILES, Php::SERVER, Php::REQUEST and
Php::ENV. These are global, read-only, objects with an overloaded operator[]
method. You can thus access them as if it were associative arrays.

```cpp
// retrieve the value of a request variable
int age = Php::REQUEST["name"];

// or retrieve the value of a server variable
std::string referer = Php::SERVER["HTTP_REFERER"];
```

## Be careful with global C++ variables

Unlike PHP scripts, that only handle single pageviews, an extension is used
to handle multiple pageviews after each other. This means that when you use
global C++ (!) variables in your extension, that these variables are not set
back to their initial value in between the pageviews. The Php::GLOBALS variable
however, is always re-initialized at the beginning of every new pageview.

You can read more about this in the article about
the [the extension callbacks](PHPCPP/extension-callbacks).
