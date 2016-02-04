# Function mq_smtp_in_authenticate

After a user has sent its login credentials over a SMTP connection, MailerQ will notify all the plugins about this, and call the [mq_smtp_in_authenticate()](mq_smtp_in_authenticate) function in each of the plugins (only if the function exists, of course).

Most plugins implement this function to add their own login administration system to MailerQ. If authentication succeeds, you can call [MQ_SetSmtpAuthenticated()](mq_setsmtpauthenticated) to mark the connection as being an authenticated connection.

This function should return false if MailerQ can stay in control, or true if the plugin takes over control (for example because it starts a non-blocking database lookup). If the plugin takes over control, it should of course give back control to MailerQ when the credentials lookup has been completed.

```
bool mq_smtp_in_authenticate(MQ_Context *context, MQ_SmtpConnection *connection, const char *login, size_t loginsize, const char *passwd, size_t passwdsize);

```

If your plugin returns true, MailerQ hands over control to your plugin, and you should also hand control back. For more information on how MailerQ plugins can interact with the event loop, and how control is passed to and from plugins, see [the article about the MailerQ event loop](eventloop).