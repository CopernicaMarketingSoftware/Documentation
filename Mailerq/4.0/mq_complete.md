# Function MQ_Complete

MailerQ has a non-blocking nature, and uses callbacks to [pass control to a plugin](copernica-docs:Mailerq/eventloop). It is then up to the plugin to interact with the event loop, and pass control back to MailerQ when it is ready with its task. Passing back control can be done in three different ways:

*   Tell MailerQ to run the next plugin (the normal way of returning control)
*   Tell MailerQ to skip all other plugins
*   Tell MailerQ to call the first plugin again

The [MQ_Continue()](copernica-docs:Mailerq/mq_complete) implements the second behavior. If you call it, MailerQ will skip all subsequent plugins and continues with its original algorithm.

````c
/**
 *  Finish plugin processing
 *
 *  @param  context the context that may move on to the next plugin
 */
void MQ_Continue(MQ_Context *context);
````

See also [MQ_Continue()](copernica-docs:Mailerq/mq_continue) and [MQ_Retry()](copernica-docs:Mailerq/mq_retry) for the other ways of handing back control.