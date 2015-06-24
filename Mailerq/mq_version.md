# Callback mq_version()

When you write your own MailerQ plugin, you must implement the mq_version() function. This function is called by MailerQ to find out if your plugin is compatible with the MailerQ binary.

Normally, this function can be very simple and just has to return the MQ_API_VERSION value. This is an integer value that increments with every new version of MailerQ.

```

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

```

If the returned version number is not valid, MailerQ will report an error message and quit. If the function number is valid, MailerQ will continue to run, and will call your [mq_initialize()](/documentation/mq_initialize) function.