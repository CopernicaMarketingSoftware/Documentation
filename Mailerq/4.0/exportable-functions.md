# Exportable functions

After your plugin is loaded, MailerQ starts making calls to it. To do this, 
MailerQ simply tries to locate specific functions in the plugin shared object 
file, and if it finds one or more of these functions, it will make calls to them 
every time a certain event occurs. There is one function that is required, 
[mq_version()](mq_version), but all others are optional. 
You only have to implement the optional functions if you want your plugin to 
override the default MailerQ behavior.

| Function name                                           | Description                                                                          |
|---------------------------------------------------------|--------------------------------------------------------------------------------------|
| [mq_version()](mq_version)       | Returns API version number to ensure that MailerQ and plugin are compatible          |
| [mq_initialize()](mq_initialize) | Called right after the plugin is activated, allows plugin to run initialization code |
| [mq_cleanup()](mq_cleanup)       | Called right before MailerQ closes, allows plugin to run cleanup code                |

Before we continue, a single paragraph about the function naming convention of 
the MailerQ API. There are two type of functions: The first type of functions 
are the functions that your plugin can implement, and that are called by 
MailerQ when certain events occur -- these are functions like the ones listed in 
the table above. For these type of functions we use all lowercase characters. 
The other type of functions are functions that are offered by the MailerQ API, 
and that can be called _by your plugin_. These functions all have the uppercase 
`MQ_` prefix, and use CamelCase notation. The declarations of this second group 
of functions can be found in the `<mailerq.h>` header file.

## Multi-threading functions

MailerQ is a multi-threading application, with multiple worker threads that are 
all busy sending and receiving emails. If you write a plugin, it is important to 
realize this, because you cannot always safely access the same global data from 
your plugin functions. Locking might be necessary if you access global data from 
these multiple threads, and it could be useful to user per-thread data.

For every worker thread, MailerQ creates a [MQ_Context](mq_context) 
structure that is passed to most of the plugin callback functions. For every 
worker thread that is created, and for every worker thread that is stopped, 
MailerQ calls the [mq_context_initialize()](mq_context_initialize) 
and [mq_context_cleanup()](mq_context_cleanup) functions 
(but of course only if these functions exist in your plugin). You can implement 
these functions to run your own per-thread initialization or cleanup code.

| Function name                                                           | Description                                                                                       |
|-------------------------------------------------------------------------|---------------------------------------------------------------------------------------------------|
| [mq_context_initialize()](mq_context_initialize) | Called after a worker thread is started, allows plugin to run thread specific initialization code |
| [mq_context_cleanup()](mq_context_cleanup)       | Called right before a worker thread is stopped, allows plugin to run thread specific cleanup code |

## Plugins for incoming emails

If you want your plugin to interact with incoming SMTP traffic, you can 
implement one or more of the functions from the following table. When MailerQ 
loads your plugin, it tries to locate any of the following functions, and when 
it can find one or more of these functions, it will make calls to them every 
time the relevant event occurs. All functions are optional, you only have to 
write the ones that you need.

| Function name                                                               | Description                                                                    |
|-----------------------------------------------------------------------------|--------------------------------------------------------------------------------|
| [mq_smtp_in_connect()](mq_smtp_in_connect)           | Called after an incoming TCP connection is established                         |
| [mq_smtp_in_secure()](mq_smtp_in_secure)             | Called after an incoming TCP connection is turned into a secure connection     |
| [mq_smtp_in_authenticate()](mq_smtp_in_authenticate) | Called after someone sends login credentials over an incoming SMTP connection  |
| [mq_smtp_in_mailfrom()](mq_smtp_in_mailfrom)         | Called after the `MAIL FROM` instruction was received                          |
| [mq_smtp_in_rcptto()](mq_smtp_in_rcptto)             | Called after the `RCPT TO` instruction was received                            |
| [mq_smtp_in_data()](mq_smtp_in_data)                 | Called after MIME data was received over the incoming connection               |
| [mq_smtp_in_message()](mq_smtp_in_message)           | Called after the entire message was received and is turned into a JSON message |
| [mq_smtp_in_close()](mq_smtp_in_close)               | Called after an incoming SMTP connection is closed                             |

## Plugins for outgoing emails

If you want your plugin to interact with outgoing SMTP traffic, you can add one 
or more of the functions from the following table to your plugin. MailerQ will 
call them every time a message is being sent.

| Function name                                                 | Description                                             |
|---------------------------------------------------------------|---------------------------------------------------------|
| [mq_smtp_out_data()](mq_smtp_out_data) | Called by MailerQ when the connection enters data state |
