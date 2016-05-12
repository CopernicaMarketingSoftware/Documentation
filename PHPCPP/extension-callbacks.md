# Extension callbacks

As we [explained before](loading-extension), the get_module()
function is called when your extension is started. It returns a memory address
where the Zend engine can find all relevant information about your extension.

After this get_module() call, your extension is loaded and will be used to handle
_multiple_ pageviews. This is an important difference between standard PHP scripts
and native extensions, because standard PHP scripts handle only a single page view.
But extensions serve multiple page views after each other.

This difference is especially important if you use global C++ variables. Such
global variables are initialized when the extension is loaded - and not at
the beginning of each pageview. Changes that you make to global variables keep
their value, and subsequent requests will therefore see the updated values.

This, by the way, only happens to _native_ variables. Global PHP variables,
stored in the Php::GLOBALS object, are re-initialized at the beginning of each
request. You do not have to worry about changes that you make to global PHP variables:
at the beginning of the next request, the Php::GLOBALS object is fresh and new,
and the changes that you made during the previous request are no longer visible.

Back to the global C++ variables. If you want to reset a global variable at
the beginning of a new request, you can register a special callback function that
gets called in front of each request.

```cpp
#include <phpcpp.h>

/**
 *  Global variable that stores the number of times
 *  the function updateCounters() has been called in total
 *  @var    int
 */
int invokeTotalCount = 0;

/**
 *  Global variable that keeps track how many times the
 *  function updateCounters() was called during the
 *  current request
 *  @var    int
 */
int invokeDuringRequestCount = 0;

/**
 *  Native function that is callable from PHP
 *
 *  This function updates a number of global variables that count
 *  the number of times a function was called
 */
void updateCounters()
{
    // increment global counters
    invokeTotalCount++;
    invokeDuringRequestCount++;
}

/**
 *  Switch to C context, because the Zend engine expects get get_module()
 *  to have a C style function signature
 */
extern "C" {
    /**
     *  Startup function that is automatically called by the Zend engine
     *  when PHP starts, and that should return the extension details
     *  @return void*
     */
    PHPCPP_EXPORT void *get_module()
    {
        // the extension object
        static Php::Extension extension("my_extension", "1.0");

        // install a callback that is called at the beginning
        // of each request
        extension.onRequest([]() {

            // re-initialize the counter
            invokeDuringRequestCount = 0;
        });

        // add the updateCounter method to the extension
        extension.add("updateCounters", updateCounters);

        // return the extension details
        return extension;
    }
}
```

The `Php::Extension` class has a method `onRequest()` that is used in the above
example to register a callback function. This callback is called right before
every pageview/request. And as you can see, it is permitted to use C++ lambda
functions.

The `onRequest()` is not the only method in the Php::Extension object to register
a callback. There are in fact four different on`*()` methods that you can use.

*   void onStartup(const std::function<void()> &callback);
*   void onRequest(const std::function<void()> &callback);
*   void onIdle(const std::function<void()> &callback);
*   void onShutdown(const std::function<void()> &callback);

The startup callback is called when the Zend engine has loaded your extension and
all functions and classes in it were registered. If you want to initialize
additional variables in your extension before the functions are going to get called,
you can use the `onStartup()` function and register a callback to run this
initialization code.

After the Zend engine is initialized, it is ready to process requests. In the
example above we used the `onRequest()` method to register a callback that is
called in front of each request. Next to that, you can also install a callback
that gets called _after_ each request, when the Zend engine moves to an idle state
 - waiting for the next request. This can be accomplished with the `onIdle()`
 method in the Php::Extension object.

The fourth callback that you can register is a callback that gets called right
before PHP shuts down. If there is anything to clean up, you can install such
a callback and run the cleanup code from it.

## Forked engines (like Apache)

If you run PHP on a pre-fork web server (like Apache), your extension is loaded
and initialized _before_ the various worker processes are forked off. The consequence
of this is that the `get_module()` function and your optional `onStartup()`
callback function are called by the parent process, and all other callbacks and
the actual page handling by the child processes. A call to `getpid()` (or other
functions to retrieve information about the current process) will therefore return
something else inside the onStartup callback, as it does in any of the other
extension functions.

You may have to be careful because of this. It is better not to do things in
the startup functions that may not work when the process is forked into different
child processes (like opening file descriptors). Something else to keep in mind
is that the startup function is only called by the parent processes when Apache
starts up (or reloaded, see later), while the shutdown function is called by
_every_ child process that gracefully exits. The onShutdown is thus not only
called when the Apache process is stopped, but also when one of the worker
processes exits because it no longer is needed, or because it is replaced by
a fresh and new worker.

The `get_module()` function - as you've seen countles times before - is called
when your extension is initially loaded. But not only then. When apache is reloaded
(for example by giving the command line instruction "apachectl reload"), your
`get_module()` gets called for a second time, and the callback that you registered
with `Extension::onStartup()` is called again too. This is normally not a problem,
because the static extension object is in a locked state after the first `get_module()`
call, and the functions and classes that you try to add to the extension object in
the second invocation of `get_module()` are simply ignored.

## Watch out for multi-threading

If your extension runs on a multi-threaded PHP installation, you need to take
extra care. Most PHP installations (Apache, CLI scripts, etc) serve one request
at a time, sequentially. There are however PHP installations that use
multi-threading and that can serve multiple requests in parallel. If your extension
runs on such an environment, you should be aware that your global (and static!)
variables can also be accessed by multiple threads at the same time. It is your
own responsibility to use technologies like `std::mutex` or `std::atomic`
to prevent race conditions and conflicts.

If your extension is compiled for a multi-threaded environment, the PHP-CPP header
files defines the macro ZTS. You can use this macro to check if you do have to
create special code to deal with threads.

```cpp
#include <phpcpp.h>

/**
 *  Global variable that store the number of times
 *  the function updateCounters() has been called in total
 *  @var    int
 */
int invokeTotalCount = 0;

#ifdef ZTS

/**
 *  Mutex so that the 'invokeTotalCount' variable is only accessed
 *  by one process at a time
 *  @var    std::mutex
 */
std::mutex invokeTotalMutex;

#endif

/**
 *  Native function that is callable from PHP
 *
 *  This function updates a number of global variables that count
 *  the number of times a function was called
 */
void updateCounters()
{
#ifdef ZTS

    // lock the mutex
    std::unique_lock<std::mutex> lock(invokeTotalMutex);

#endif

    // increment counters
    invokeTotalCount++;
}
```

Another important thing to realize is that PHP also does this locking internally.
If you call a PHP function from you C++ code (like `Php::Value("myFunction")()`),
or when you access a PHP variable in the Php::GLOBALS array (or one of the other
super-globals), PHP has to lock something to ensure that no other thread is
accessing the same information at the same time. These operations can be expensive.

Good rules of thumb for writing native extensions with PHP-CPP therefore are:

*   Do not use global variables
*   Only call other _native_ functions, and don't call back into PHP

These rules are not as limiting as they appear. The use of global variables is
not considered excellent software design, so you were probably not even using
them, and the reason why you are writing a native extension in the first place
is because you wanted to get away from PHP. Calling (slow) PHP functions from
your extension should be prevented anyway.
