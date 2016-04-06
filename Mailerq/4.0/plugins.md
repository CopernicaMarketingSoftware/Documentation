# MailerQ plugin development

If the default behavior of MailerQ is not up to your standards, you can extend 
MailerQ with your own plugins. MailerQ allows you to develop plugins to add
features or functionality to MailerQ. A plugin is a shared 
object file (like "example.so"), and normally developed in C or C++. The plugins 
are loaded by MailerQ when the application starts. Every plugin can implement a 
number of functions that are called by MailerQ to hand control over to the plugin.


## How are plugins loaded?

In the global [configuration file](configuration), 
you can set a "plugin-directory" variable. This variable should hold the name of 
the directory where MailerQ can find your plugins. The plugins are loaded in 
alphabetical order. If multiple plugins are loaded, MailerQ will make the calls 
to the plugins in this same alphabetical order. If the order in which your 
plugins are called matters, you can prefix your plugin name with a number, 
like "10-example.so" and "20-anotherexample.so". By doing this, you ensure that 
the "example" plugin will always be called before the "anotherexample" plugin.

MailerQ makes the calls to your plugin using the C calling convention. As a 
result, it is best and easiest to use C or C++ for developing your plugin. When 
developing in C++, be sure to `extern "C" {}` the function which will be called 
by MailerQ, to prohibit the compiler from function name mangling.

## Performance and event loops

Plugins are called often -- possibly multiple times for every message. You 
should be aware of this and write your plugins with care. Blocking IO calls are 
for example absolutely a no-go as they will massively bring down MailerQ's 
performance.

To find out how MailerQ hands over control to your plugin, how your plugin can 
then interact with MailerQ's event loop, and finally give back control to 
MailerQ, please read our [event loop article](eventloop).


## A minimalistic plugin

The "mq_version()" function is currently the only function 
that your plugin is _required_ to implement. All other callbacks are optional. 
A very basic plugin (one that does nothing) would look like this:

```cpp
#include <mailerq.h>

/**
 *  Function called by MailerQ to find out if the plugin is compatible
 *  with the MailerQ executable
 *
 *  @return int     API version number for which the plugin is compiled
 */
MQ_EXPORT int mq_version() {
    return MQ_API_VERSION;
}

/**
 *  Function that is called by MailerQ to initialize the plugin. This
 *  function is called right after the plugin is loaded.
 *
 *  This is an optional function, you do not have to implement it. MailerQ
 *  only calls it if it exists.
 */
MQ_EXPORT void mq_initialize() {
    // @todo add your own initialization code
}

/**
 *  Function that is called right before MailerQ stops running.
 *
 *  This is an optional function, you do not have to implement it. MailerQ
 *  only calls it if it exists.
 */
MQ_EXPORT void mq_cleanup() {
    // @todo add your own cleanup code
}
```

The "MQ_EXPORT" directive is a C `#define` that is turned by the preprocessor in 
a statement to ensure that the symbol is correctly exported. If you compile your 
extension with gcc, it is for example turned into 
`__attribute__ ((visibility("default")))`.

When compiling your extension, we recommend using hidden visibility for all 
functions not to be made available externally (all functions that MailerQ won't 
call). Doing this gives the compiler much more freedom to inline functions 
(which it cannot do if a function is to be made available externally) and helps 
keep the DSO small.

## Do you find the API too limited?

If you have the idea that vital functionality is missing in the plugin API,
or if you need other callbacks you can always get in context with us. We can 
accomodate your needs, extend the API and implement your request!
