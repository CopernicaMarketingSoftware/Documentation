# Function MQ_Retry

MailerQ has a non-blocking nature, and uses callbacks to [pass control to a plugin](copernica-docs:Mailerq/eventloop). 
It is then up to the plugin to interact with the event loop, and pass control back to MailerQ when it is 
ready with its task. Passing back control can be done in three different ways:

*   Tell MailerQ to run the next plugin (the normal way of returning control)
*   Tell MailerQ to skip all other plugins
*   Tell MailerQ to call the first plugin again

The [MQ_Retry()](copernica-docs:Mailerq/mq_retry) implements the third behavior, and is probably the most peculiar way of handing back control to MailerQ. If you call it, MailerQ will start all over, and will call all plugins again.

This is a very odd way of handing back control, and you normally should not use it, because you run the risk of ending up in an infinite loop. It could however be useful if your plugin makes a change to a received message, and you want to run all plugins again so that they can all respond to the modified message.

````c
/**
 *  Finish plugin processing
 *
 *  @param  context the context that may move on to the next plugin
 */
void MQ_Retry(MQ_Context *context);
````

See also [MQ_Continue()](copernica-docs:Mailerq/mq_continue) and [MQ_Complete()](copernica-docs:Mailerq/mq_complete) for the other (and probably more useful) ways of handing back control.