# Function mq_context_initialize

The mq_context_initialize() is an optional function that you can add to your plugin. It is called by MailerQ during startup for
each worker thread that is created. This is useful if, for example, you want to set up a database connection per thread, or want
to do other initialization.

This function can be implemented _by the plugin_ and is called by MailerQ when a worker thread starts. This function cannot take
control by returning boolean true, but since this function is executed only during startup, it is acceptable to block here. MailerQ
will wait until _all_ contexts are initialized before continuing.

````c
#include <mailerq.h>

/**
 *  This function is called by MailerQ for every worker thread
 *  that is created
 */
MQ_EXPORT void mq_context_initialize([MQ_Context](mq_context) *context) {
    // set up a connection to MySQL
    MYSQL *connection = mysql_init(NULL);

    // TODO: connect here and do other useful stuff

    // store the connection so it can be used in later callbacks
    MQ_SetContextData(context, connection);
}
````

If you allocate memory in this function, you probably also have to add a [mq_context_cleanup](mq_context_cleanup) to your plugin.
