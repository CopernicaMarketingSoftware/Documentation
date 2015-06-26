# Function MQ_SetSmtpData

Function to associate plugin data with a SMTP connection. This data void-pointer is completely ignored by MailerQ, but can be useful for plugins that want to preserve data between calls to the plugin callback functions.

The data pointer is segmented per plugin, so this function will not not overwrite data stored by other plugins.

If the data is allocated by yourself, you will also have to make sure that the data gets deallocated, for example by also implementing the [mq_smtp_in_close()](copernica-docs:Mailerq/mq_smtp_in_close) function, in which you deallocate the data after the connection is closed.

````c
/**
 *  Store userdata in the connection
 *
 *  @param  connection  the connection in which to store the data
 *  @param  void*       the data to store
 */
void MQ_SetSmtpData(MQ_SmtpConnection *connection, void *data);
````