# Function mq_context_initialize

The mq_context_initialize() is an optional function that you can add to your plugin. It is called by MailerQ during startup for each worker thread that is created. This is useful if, for example, you want to set up a database connection per thread, or want to do other initialization.

This function can be implemented _by the plugin_ and is called by MailerQ when a worker thread starts. If it returns true, MailerQ hands over control to your plugin, and your plugin must call one of the functions [MQ_Continue()](mq_continue), [MQ_Complete()](mq_complete) or [MQ_Retry()](mq_retry) when it is ready to hand back control to MailerQ.

For more information on how MailerQ plugins can interact with the event loop, and how control is passed to and from plugins, see [the article about the MailerQ event loop](eventloop).

````c
#include <mailerq.h>

/**
 *  This function is called by MailerQ for every worker thread
 *  that is created
 */
MQ_EXPORT bool mq_context_initialize(MQ_Context *context) {
    // set up a connection to MySQL
    MYSQL *connection = mysql_init(NULL);

    // TODO: connect here and do other useful stuff

    // store the connection so it can be used in later callbacks
    MQ_SetContextData(context, connection);

    // return true, MailerQ can stay in control
    return false;
}
````

If you allocate memory in this function, you probably also have to add a [mq_context_cleanup](mq_context_cleanup) to your plugin.