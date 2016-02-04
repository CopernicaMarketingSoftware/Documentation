# Function mq_smtp_in_rcptto

Function that can be added to a plugin that is called every time a "RCPT TO" instruction is received by MailerQ.

```
bool mq_smtp_in_rcptto(MQ_Context *context, MQ_SmtpConnection *connection, const char *rcptto, size_t size);

```

If your plugin returns true, MailerQ hands over control to your plugin, and you should also hand control back. For more information on how MailerQ plugins can interact with the event loop, and how control is passed to and from plugins, see [the article about the MailerQ event loop](copernica-docs:Mailerq/eventloop).