# Function MQ_SmtpData

Retrieve the plugin managed data pointer stored for this connection. If you've made a call to [MQ_SetSmtpData](mq_setsmtpdata) to associate data with a SMTP connection, you can use this function to get back that data pointer.

The data pointer is completely ignored by MailerQ. This API function is only provided to give plugins the possibility to associate data with a connection.

The data pointer is segmented per plugin, so this function will not return data stored by other plugins. If no data was stored earlier, NULL will be returned.

```c
/**
 *  Retrieve userdata stored using MQ_SetSmtpData
 *  @param  connection  the connection in which the data was stored
 *  @return void*
 */
void *MQ_SmtpData(MQ_Connection *connection);

```

Be aware that if you store data in the connection that you had allocated yourself, it is also your responsibility to deallocate that data before the connection is closed.