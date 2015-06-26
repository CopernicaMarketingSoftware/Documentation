# Plugins and MailerQ event loops

Everything in MailerQ has a non-blocking nature. Things like network communications, database queries and timeouts have been implemented in a non-blocking fashion. This means that MailerQ does not block while it is waiting for an answer from a remote server or from a database, but that it continues with other tasks for as long as no answer is available.

In order to get most out of MailerQ and your plugin, all your plugin functions should be implemented in the same way, and should also respect this non-blocking nature. For example, if your plugin needs to download something, you should not make a blocking network call, because this will block the entire MailerQ process (or to be more precise: an entire MailerQ worker thread). You should be using the supplied MailerQ event loop instead.

Another thing to carefully consider is how many times your implemented function will run during the application lifetime, especially with regard to speed of your plugin. When you create the plugin, simply keep in mind that your implemented function will be called for _every_ message, provided MailerQ arrives at your plugin. Although you may not take responsibility for every one of these messages, keep in mind for how many of them your plugin applies and account for that while creating your plugin, otherwise MailerQ may bottleneck on your slow plugin.

## Handing over control to plugins

Every time MailerQ is processing or delivering messages, your plugin may be called at certain points in this process. When MailerQ arrives at such a point, the loaded plugins are checked in alphabetical order to see if a certain function exists in the plugin shared object file. Only if the function is implemented, it will be called by MailerQ to hand over control to the plugin. For example, if three plugins 'A', 'B', and 'C' are loaded and MailerQ is at the `DATA` state during a SMTP handshake, MailerQ will check all these three plugins to see if they have implemented the [mq_smtp_out_data()](copernica-docs:Mailerq/mq_smtp_out_data) function. For every plugin that has implemented the function, it will call that function. Plugins that have not implemented the function are skipped.

The plugin function that is called by MailerQ should return a boolean value. When your plugin returns 'false', it means that your plugin does not take over control from MailerQ, and MailerQ can proceed with calling the next plugin, or if there are no other plugins, proceed with delivering the message. However, if your plugin returns 'true', MailerQ will stop processing the message, and will continue doing other tasks. Your plugin now is in control, and will stay so until you hand the control back to MailerQ.

MailerQ passes a number of parameters to a plugin function. One of these parameters is a pointer to a [MQ_Context](copernica-docs:Mailerq/mq_context). This [MQ_Context](copernica-docs:Mailerq/mq_context) pointer gives you access to the MailerQ event loop, and allows you register file descriptors and set timers. If your plugin wants to do a blocking network call, it can do this in a non-blocking fashion instead, and register the socket and a callback function. Your callback will be called as soon as the filedescriptor becomes active.

## Giving control back to MailerQ

When your plugin is ready with its task - it has for example downloaded the appropriate resources, and modified or filtered the message that is going to be delivered - it _must_ give control back to MailerQ. It can do this in three possible ways, with one of the following methods:

| Function name                               | Description                                 |
|---------------------------------------------|---------------------------------------------|
| [MQ_Continue()](copernica-docs:Mailerq/mq_continue) | Tell MailerQ to call the next plugin        |
| [MQ_Complete()](copernica-docs:Mailerq/mq_complete) | Tell MailerQ to skip all further plugins    |
| [MQ_Retry()](copernica-docs:Mailerq/mq_retry)       | Tell MailerQ to restart calling all plugins |


After your plugin has done its work, it can tell MailerQ that it is ready and that the next plugin can be called (this is what normal plugins do), or it can instruct MailerQ to skip all the other plugins and continue with the normal work, or that MailerQ should start all over again with calling the plugins.

Be aware that you really _must_ call one of these functions to give back the control to MailerQ. If your plugin fails to return control, the message will not be picked up again by MailerQ for further processing, but will stay in memory. This will eventually lead to MailerQ running out of resources.

With the first of the listed functions, [MQ_Continue()](copernica-docs:Mailerq/mq_continue), your plugin instructs MailerQ to advance in the list of plugins, and to call the next plugin. Naturally, all next plugins have the same options as this plugin, and the subsequent plugins will work with the message as adapted by the current plugin. If no other plugins exist, MailerQ will move on to the next step in the process.

When the [MQ_Complete()](copernica-docs:Mailerq/mq_complete) function is called, MailerQ advances to the next step in the process. This means that any plugins in the list after the plugin will be skipped and MailerQ moves on without calling these plugins.

Lastly, your plugin can call [MQ_Retry()](copernica-docs:Mailerq/mq_retry) to instruct MailerQ to restart its plugin choosing process in the current step, effectively restarting the step from the first plugin. Beware though, since MailerQ will restart from the beginning of the list, all plugins prior to the current one will run _again_, possibly causing the altered message to be processed again.

> **Warning:** You should take extra care when returning control of the message to MailerQ with the retry function, because it is possible to inadvertently create a loop. For most plugins, [MQ_Continue()](copernica-docs:Mailerq/mq_continue) is the best function to give back control to MailerQ.