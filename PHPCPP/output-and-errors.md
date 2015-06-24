# Output and errors

You can use regular C++ streams for IO, with the regular << operator
and special functions like std::endl. It is however not a good idea to use 
the 'std::cout' and 'std::cerr' streams.

When PHP runs as a webserver module, stdout is redirected to the 
terminal *from which the webserver process was originally started*.
On production servers such a terminal is not active, so any output that
you send to stdout will be lost. Using std::cout in extensions that run in
a webserver module is thus a no-go. But even when PHP runs as a CLI script 
(and std::cout *does* work) you still should not write to stdout 
directly. Writing to stdout will bypass all output handlers that may have 
been set up by the PHP user space script.

The PHP-CPP library offers a Php::out stream that can be used instead. This
Php::out variable is an instance of the well known std::ostream class, and 
respects all the output buffering set up in PHP. It does essentially the same
as the echo() function in PHP scripts.

Php::out is a regular std::ostream object. This has as consequence that 
it uses an internal buffer that needs to be flushed. This flushing
occurs automatically when you add 'std::endl' to the output, or when you 
add 'std::flush' explicitly.

```cpp
/**
 *  Example function that shows how to generate output
 */
void example()
{
    // the C++ equivalent of the echo() function
    Php::out << "example output" << std::endl;
    
    // generate output without a newline, and ensure that it is flushed
    Php::out << "example output" << std::flush;

    // or call the flush() method
    Php::out << "example output";
    Php::out.flush();
    
    // just like all PHP functions, you can call the echo() function 
    // from C++ code as well
    Php::echo("Example output\n");
}   
```

## Errors, warnings and notices

When you want to trigger a PHP error (the C++ equivalent of the PHP 
trigger_error()) function, you can use one of the Php::error, Php::notice,
Php::warning and Php::deprecated streams. These are also instances of the
std::ostream class.

```cpp
/**
 *  Example function that shows how to generate output
 */
void example()
{
    // generate a PHP notice
    Php::notice << "this is a notice" << std::flush;
    
    // generate a PHP warning
    Php::warning << "this is a warning" << std::flush;

    // inform the user that a call to a deprecated function was made
    Php::deprecated << "this method is deprecated" << std::flush;
    
    // generate a fatal error
    Php::error << "fatal error" << std::flush;
    
    // this code will no longer be called
    Php::out << "regular output" << std::endl;
}   
```
In the above example you can see that we used std::flush and not std::endl.
The reason for this is that std::endl internally does two things: it 
appends a newline, and it flushes the buffer. For errors, notices and
warnings we don't need the newline, but we still have to flush the 
buffer to actually generate the output.

There is something very peculiar with the Php::error stream: when you flush
it, the PHP script ends with a fatal error *and your C++ algorithm
immediately exits!!* Under the hood, the PHP engine does a longjump to
a place deep inside the Zend engine. In the example function the 
'Php::out << "regular output"; statement is therefore never executed.

This all is very unusual, and (according to us) in conflict with the general
rules of decent software engineering. An output-generating function should 
not behave like throwing an exception. Code that looks like normal code,
should also behave like normal code, and not do unexpected things like 
leaping out of the current call stack. We therefore advise not to use 
Php::error - or use it with extreme care.
