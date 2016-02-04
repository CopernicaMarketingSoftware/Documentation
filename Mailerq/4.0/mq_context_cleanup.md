# Function mq_context_cleanup

This function is called by MailerQ right before a worker thread is stopped and destroyed. You can for example use it to deallocate memory that you had earlier allocated.

This function can be implemented _by the plugin_ and is called by MailerQ when a worker thread is about to stop. If the function returns true, MailerQ hands over control to your plugin, and your plugin must call one of the functions [MQ_Continue()](mq_continue), [MQ_Complete()](mq_complete) or [MQ_Retry()](mq_retry) when it is ready to hand back control to MailerQ. Only _after_ all plugins have given back control to MailerQ, the worker thread will really be stopped.

For more information on how MailerQ plugins can interact with the event loop, and how control is passed to and from plugins, see [the article about the MailerQ event loop](eventloop).

````c
#include <mailerq.h>

/**
 *  This function is called by MailerQ for every worker thread
 *  that comes to an end
 */
MQ_EXPORT bool mq_context_cleanup(MQ_Context *context) {
    // get the mysql connection resource that we stored in the context
    MYSQL *connection = (MYSQL *)MQ_ContextData(context);

    // close the connection
    mysql_close(connection);

    // TODO: add other useful cleanup stuff

    // return false, MailerQ can stay in control
    return false;
}
````

Remember that if you return true, MailerQ hands over control to your plugin, and your plugin must call one of the functions [MQ_Continue()](mq_continue), [MQ_Complete()](mq_complete) or [MQ_Retry()](mq_retry) when it is ready to hand back control to MailerQ.