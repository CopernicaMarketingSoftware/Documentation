# MailerQ plugin development

If the default behavior of MailerQ is not up to your standards, you can extend MailerQ with your own plugins. MailerQ allows you to develop such plugins, exactly to add such features or functionality to MailerQ. A plugin is a shared object file (like "example.so"), and normally developed in C or C++. The plugins are loaded by MailerQ when the application starts. Every plugin can implement a number of functions that are called by MailerQ to hand control over to the plugin.

> #### Watch out!
> The plugin documentation assumes you use MailerQ version **2.1** or higher. This is the latest version of MailerQ. If you use an earlier version, please refer to the <mailerq.h> header file to find out which functions are available.

## How are plugins loaded?

In the global [configuration file](configuration#Plugins), you can set a `plugin-directory` variable. This variable should hold the name of the directory where MailerQ can find your plugins. The plugins are loaded in alphabetical order. If multiple plugins are loaded, MailerQ will make the calls to the plugins in this same alphabetical order. If the order in which your plugins are called matters, you can prefix your plugin name with a number, like "10-example.so" and "20-anotherexample.so". By doing this, you ensure that the "example" plugin will always be called before the "anotherexample" plugin.

MailerQ makes the calls to your plugin using the C calling convention. As a result, it is best and easiest to use C or C++ for developing your plugin. When developing in C++, be sure to `extern "C" {}` the function which will be called by MailerQ, to prohibit the compiler from function name mangling.

## Performance and event loops

Plugins are called often - possible multiple times for every message. You should be aware of this and write your plugins with care. Blocking IO calls are for example absolutely a no-go as they will massively bring down MailerQ's performance.

To find out how MailerQ hands over control to your plugin, how your plugin can then interact with MailerQ's event loop and finally give back control to MailerQ, please read our **[event loop article](eventloop)**.

## Functions that your plugin can export

After your plugin is loaded, MailerQ starts making calls to it. To do this, MailerQ simply tries to locate specific functions in the plugin shared object file, and if it finds one or more of these functions, it will make calls to them every time a certain event occurs. There is one function that is required, [mq_version()](mq_version), but all others are optional. You only have to implement the optional functions if you want your plugin to override the default MailerQ behavior.

| Function name                                   | Description                                                                          |
|-------------------------------------------------|--------------------------------------------------------------------------------------|
| [mq_version()](mq_version)       | Returns API version number to ensure that MailerQ and plugin are compatible          |
| [mq_initialize()](mq_initialize) | Called right after the plugin is activated, allows plugin to run initialization code |
| [mq_cleanup()](mq_cleanup)       | Called right before MailerQ closes, allows plugin to run cleanup code                |


Before we continue, a single paragraph about the function naming convention of the MailerQ API. There are two type of functions: the first type of functions are the functions that your plugin can implement, and that are called by MailerQ when certain events occur - these are functions like the ones listed in the above table. For these type of functions we use all lowercase characters. The other type of functions are functions that are offered by the MailerQ API, and that can be called _by your plugin_. These functions all have the uppercase "MQ_" prefix, and use CamelCase notation. The declarations of these second group of functions can be found in the `<mailerq.h>` header file.

## Multi threading functions

MailerQ is a multi-threading application, with multiple worker threads that are all busy sending and receiving emails. If you write a plugin, it is important to realize this, because you cannot always safely access the same global data from your plugin functions. Locking might be necessary if you access global data from these multiple threads, and it could be useful to user per-thread data.

For every worker thread MailerQ creates a [MQ_Context](mq_context) structure that is passed to most of the plugin callback functions. For every worker thread that is created, and for every worker thread that is stopped, MailerQ calls the [mq_context_initialize()](mq_context_initialize) and [mq_context_cleanup()](mq_context_cleanup) functions (but of course only if these functions exist in your plugin). You can implement these functions to run your own per-thread initialization or cleanup code.

| Function name                                                   | Description                                                                                       |
|-----------------------------------------------------------------|---------------------------------------------------------------------------------------------------|
| [mq_context_initialize()](mq_context_initialize) | Called after a worker thread is started, allows plugin to run thread specific initialization code |
| [mq_context_cleanup()](mq_context_cleanup)       | Called right before a worker thread is stopped, allows plugin to run thread specific cleanup code |



## Plugins for incoming emails

If you want your plugin to interact with incoming SMTP traffic, you can implement one or more of the functions from the following table. When MailerQ loads your plugin, it tries to locate any of the following functions, and when it can find one or more of these functions, it will make calls to them every time the relevant event occurs. All functions are optional, you only have to write the ones that you need.

| Function name                                                       | Description                                                                    |
|---------------------------------------------------------------------|--------------------------------------------------------------------------------|
| [mq_smtp_in_connect()](mq_smtp_in_connect)           | Called after an incoming TCP connection is established                         |
| [mq_smtp_in_secure()](mq_smtp_in_secure)             | Called after an incoming TCP connection is turned into a secure connection     |
| [mq_smtp_in_authenticate()](mq_smtp_in_authenticate) | Called after someone sends login credentials over an incoming SMTP connection  |
| [mq_smtp_in_mailfrom()](mq_smtp_in_mailfrom)         | Called after the "MAIL FROM" instruction was received                          |
| [mq_smtp_in_rcptto()](mq_smtp_in_rcptto)             | Called after the "RCPT TO" instruction was received                            |
| [mq_smtp_in_data()](mq_smtp_in_data)                 | Called after MIME data was received over the incoming connection               |
| [mq_smtp_in_message()](mq_smtp_in_message)           | Called after the entire message was received and is turned into a JSON message |
| [mq_smtp_in_close()](mq_smtp_in_close)               | Called after an incoming SMTP connection is closed                             |

## Plugins for outgoing emails

If you want your plugin to interact with outgoing SMTP traffic, you can add one or more of the functions from the following table to your plugin. MailerQ will call them every time a message is being sent.

| Function name                                         | Description                                             |
|-------------------------------------------------------|---------------------------------------------------------|
| [mq_smtp_out_data()](mq_smtp_out_data) | Called by MailerQ when the connection enters data state |


## A minimalistic plugin

As you read above, the `mq_version()` function is currently the only function that your plugin is _required_ to implement. All other callbacks are optional. A very basic plugin (one that does nothing) would look like this:

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

The `MQ_EXPORT` directive is a C #define that is turned by the preprocessor in a statement to ensure that the symbol is correctly exported. If you compile your extension with gcc, it is for example turned into `__attribute__ ((visibility("default")))`.

When compiling your extension, we recommend using hidden visibility for all functions not to be made available externally (all functions that MailerQ won't call). Doing this gives the compiler much more freedom to inline functions (which it cannot do if a function is to be made available externally) and helps keep the DSO small.

## Do you find the API too limited?

Because our plugin interface was only recently added to MailerQ, if may feel that vital functionality is missing or that you need other callbacks to your plugin. In such a situation you can best send us a message, so that we can accomodate your needs and implement your request!
