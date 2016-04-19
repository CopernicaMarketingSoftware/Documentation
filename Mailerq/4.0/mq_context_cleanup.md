# Function mq_context_cleanup

This function is called by MailerQ right before a worker thread is stopped and destroyed. You can for example use it to deallocate
memory that you had earlier allocated.

This function can be implemented _by the plugin_ and is called by MailerQ when a worker thread is about to stop. It is not possible
to take control by returning boolean true here, but since this function is called during cleanup it is acceptable to block here.

````c
#include <mailerq.h>

/**
 *  This function is called by MailerQ for every worker thread
 *  that comes to an end
 */
MQ_EXPORT void mq_context_cleanup(MQ_Context *context) {
    // get the mysql connection resource that we stored in the context
    MYSQL *connection = (MYSQL *)[MQ_ContextData](mq_contextdata)(context);

    // close the connection
    mysql_close(connection);

    // TODO: add other useful cleanup stuff
}
````
