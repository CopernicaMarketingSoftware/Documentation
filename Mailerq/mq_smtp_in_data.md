# Function mq_smtp_in_data

Function that can be implemented by a plugin and that is called by MailerQ every time a MIME message is received over a SMTP connection

```
bool mq_smtp_in_data(MQ_Context *context, MQ_SmtpConnection *connection, const char *mime, size_t size);

```

If your plugin returns true, MailerQ hands over control to your plugin, and you should also hand control back. For more information on how MailerQ plugins can interact with the event loop, and how control is passed to and from plugins, see [the article about the MailerQ event loop](/documentation/eventloop).