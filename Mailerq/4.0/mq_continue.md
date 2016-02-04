# Function MQ_Continue

MailerQ has a non-blocking nature, and uses callbacks to [pass control to a plugin](eventloop). It is then up to the plugin to interact with the event loop, and pass control back to MailerQ when it is ready with its task. Passing back control can be done in three different ways:

*   Tell MailerQ to run the next plugin (the normal way of returning control)
*   Tell MailerQ to skip all other plugins
*   Tell MailerQ to call the first plugin again

The [MQ_Continue()](mq_continue) function can be used for the first of the above options to hand control back to MailerQ. If you call [MQ_Continue()](mq_continue), MailerQ will call the next plugin in line, or continues with its original algorithm if no other plugins are available.

```c
/**
 *  Finish plugin processing
 *
 *  @param  context the context that may move on to the next plugin
 */
void MQ_Continue(MQ_Context *context);
```

See also [MQ_Complete()](mq_complete) and [MQ_Retry()](mq_retry) for the other ways of handing back control.