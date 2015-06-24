# Structure MQ_SmtpConnection

The [MQ_SmtpConnection](/documentation/mq_smtpconnection) structure is passed to all callbacks dealing with SMTP connections. It allows your plugin to find out information about the connection, and to send data over the connection.

## Functions that your plugin can export

There is a whole list of functions that your plugin can export that deal with connections. For a complete list of functions check the [main plugins page](/documentation/plugins). A couple of functions are interesting because they are normally the first and last functions that MailerQ calls when a connection is created and a connection is closed. If your plugin needs to run per-connection initialization or cleanup code, it can do so by implementing these functions.

| Function name                                                                                        | Description                                                                                                                                                                                                                     |
|------------------------------------------------------------------------------------------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| [MQ_Envelope()](/documentation/mq_envelope)[mq_smtp_in_connect()](/documentation/mq_smtp_in_connect) | Called after an incoming TCP connection is established. This is the first time that the [MQ_SmtpConnection](/documentation/mq_smtpconnection) is passed to the plugin, and a good place for per-connection initialization code. |
| [mq_smtp_in_close()](/documentation/mq_smtp_in_close)                                                | Called after an incoming SMTP connection is closed. This is the last time that the [MQ_SmtpConnection](/documentation/mq_smtpconnection) is passed to the plugin. You can use this function for cleanup code.                   |

The above functions are only called for [MQ_SmtpConnection](/documentation/mq_smtpconnection) pointers that represent _incoming_ connections. The MailerQ API does not yet have such initialization and cleanup functions for outgoing SMTP connections.

## Access to connection properties

All members in the [MQ_SmtpConnection](/documentation/mq_smtpconnection) structure are private. To interact with the structure the following accessor functions have been created.

| Callable function                                                   | Description                                                   |
|---------------------------------------------------------------------|---------------------------------------------------------------|
| [MQ_SmtpFileDescriptor()](/documentation/mq_smtpfiledescriptor)     | Retrieve the filedescriptor linked to a connection            |
| [MQ_SmtpSend()](/documentation/mq_smtpsend)                         | Send data over a SMTP connection                              |
| [MQ_SmtpAuthenticated()](/documentation/mq_smtpauthenticated)       | Returns whether this is an authenticated connection           |
| [MQ_SetSmtpAuthenticated()](/documentation/mq_setsmtpauthenticated) | Mark a connection as an authenticated connection              |
| [MQ_SmtpSecure()](/documentation/mq_smtpsecure)                     | Returns whether this is a secure TLS connection               |
| [MQ_SmtpData()](/documentation/mq_smtpdata)                         | Retrieve the data that is associated with the SMTP connection |
| [MQ_SetSmtpData()](/documentation/mq_setsmtpdata)                   | Associated data with the SMTP connection                      |