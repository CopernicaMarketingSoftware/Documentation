# Callback mq_initialize()

The mq_initialize() function is an optional function that you could implement in a plugin. When MailerQ starts and has loaded all the plugins, it will check every plugin to find out if this mq_initialize() function is available, and if it is, it will call it.

You can use this function to run your own initialization code.
````c
#include <mailerq.h>

/**
 *  Initialize the plugin
 */
MQ_EXPORT void mq_initialize() {
    // @todo add your initialization code
}
````

The counterpart of the mq_initialize() function is the [mq_cleanup()](copernica-docs:Mailerq/mq_cleanup) function.