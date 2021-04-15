# Function mq_smtp_in_secure

When an incoming SMTP connection is turned into a secure SMTP connection, MailerQ will call the [mq_smtp_in_secure()](mq_smtp_in_secure) function in the plugins. This function is called _after_ the connection is secured, so you can be sure that the passed in connection object is guaranteed to be secure.

Your function should return true if you want your plugin to take over control from MailerQ, or false if control should stay with MailerQ.

```
bool mq_smtp_in_secure(MQ_Context *context, MQ_Connection *connection);

```

If your plugin returns true, MailerQ hands over control to your plugin, and you should also hand control back. For more information on how MailerQ plugins can interact with the event loop, and how control is passed to and from plugins, see [the article about the MailerQ event loop](eventloop).