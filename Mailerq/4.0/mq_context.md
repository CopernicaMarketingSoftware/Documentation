# Structure MQ_Context

This structure is provided for every asynchronous function a plugin can implement. It can be used to get access
to the event loop as well as indicating to MailerQ when the plugin is done.

## Functions that your plugin can export

MailerQ is a multi-threading application, with multiple working threads that are all sending and receiving
messages at the same time. For every single worker thread, a seperate context object is created. If you want
to be notified when a new context is created, or when a context is destroyed, you can define the following functions in your plugin:

| Implementable function                                          | Description                                         |
|-----------------------------------------------------------------|-----------------------------------------------------|
| [mq_context_initialize()](mq_context_initialize) | Called by MailerQ when a worker thread is created   |
| [mq_context_cleanup()](mq_context_cleanup)       | Called by MailerQ when a worker thread is destroyed |

Both of the listed functions are optional. It is not necessary for your plugin to export them, but you can for example use these functions to initialize plugin specific data, and to deallocate that data when the worker thread exits.

## Associating data with a context

Your plugin may store a pointer to plugin specific data in a context. This is a pointer that is completely ignored by MailerQ, but that might be useful for your plugin. If you allocate data for this, it is also your responsibility to deallocate the data when the context is destroyed.

| Callable function                                       | Description                                       |
|---------------------------------------------------------|---------------------------------------------------|
| [MQ_ContextData()](mq_contextdata)       | Retrieve the plugin managed data from the context |
| [MQ_SetContextData()](mq_setcontextdata) | Assign plugin managed data to the context         |

The plugin data is _not_ shared between plugins. Every plugin can therefore associate its own data with a context, and you do not have to worry about other plugins that overwrite your data.

## Controlling the event loop

The main feature that a MQ_Context offers, is access to the event loop. There are a number of functions available that you can use for registering file descriptors and timeouts with the event loop. Internally, MailerQ uses a libev event loop, and you can also get access to this loop pointer.

| Callable function                               | Description                                 |
|-------------------------------------------------|---------------------------------------------|
| [MQ_ev()](mq_ev)                 | Access to the underlying libev instance     |
| [MQ_IOWatch()](mq_iowatch)       | Watch a filedescriptor for activity         |
| [MQ_IOUnwatch()](mq_iounwatch)   | Stop watching a filedescriptor for activity |
| [MQ_TimerStart()](mq_timerstart) | Start a timer                               |
| [MQ_TimerStop()](mq_timerstop)   | Stop a timer                                |
| [MQ_TimerReset()](mq_timerreset) | Reset a timer to a new timeout              |