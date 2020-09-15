# Callback mq_cleanup()

The `mq_cleanup()` function is an optional function that you could implement in a plugin. When MailerQ is about to shut down , it will check every plugin to find out if this `mq_cleanup()` function is available, and if it is, it will call it.

You can use this function to run your own cleanup code.

````c
#include <mailerq.h>

/**
 *  Clean up stuff
 */
MQ_EXPORT void mq_cleanup() {
    // @todo add your cleanup code
}
````