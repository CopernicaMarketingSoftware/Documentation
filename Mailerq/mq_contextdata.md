# Function MQ_ContextData

This function can be called to retrieve user data set earlier with [MQ_SetContextData](/documentation/mq_setcontextdata).

Every plugin may associate data with a plugin. This data pointer is completely ignored by MailerQ, but allows plugins to store data between different callbacks for the same context. The data pointer is unique per plugin, so you do not have to worry that this function returns pointer to data that is set by a different plugin.

If no data was set earlier, this function returns NULL.

````c
/**
 *  Retrieve previously stored data.
 *
 *  @param  context the context to retrieve the data from
 *  @return void*
 */
void *MQ_ContextData(MQ_Context *context);
````