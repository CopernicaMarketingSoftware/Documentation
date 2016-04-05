# Function mq_smtp_in_close

Function that can be implemented by a plugin, and that is called by MailerQ when an incoming SMTP connection is closed. This is the perfect moment for a plugin to run cleanup code, for example to deallocate memory that is assigned to the connection with the [MQ_SetSmtpData()](mq_setsmtpdata) function.

```
bool mq_smtp_in_close(MQ_Context *context, MQ_Connection *connection);

```

If your plugin returns true, MailerQ hands over control to your plugin, and you should also hand control back. For more information on how MailerQ plugins can interact with the event loop, and how control is passed to and from plugins, see [the article about the MailerQ event loop](eventloop).