# Function mq_smtp_in_connect

When MailerQ receives an incoming SMTP connection, it will accept that connection, and iterate over all loaded plugins, and call the [mq_smtp_in_connect()](/documentation/mq_smtp_in_connect) function in each of these plugins.

You can implement this function in your plugin if you want to run certain code right after an incoming TCP connection comes in on the SMTP port of MailerQ. Your function should return true if you want your plugin to take over control from MailerQ, or false if control should stay with MailerQ.

```
bool mq_smtp_in_connect(MQ_Context *context, MQ_SmtpConnection *connection);

```

The function takes two parameters:

*   A [MQ_Context](/documentation/mq_context) structure with information about the event loop
*   A [MQ_SmtpConnection](/documentation/mq_smtpconnection) structure with information about the connection

If your plugin returns true, MailerQ hands over control to your plugin, and you should also hand control back. For more information on how MailerQ plugins can interact with the event loop, and how control is passed to and from plugins, see [the article about the MailerQ event loop](/documentation/eventloop).