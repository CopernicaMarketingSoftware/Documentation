# Function MQ_SetMime

If you want to change the MIME data that is associated with a [MQ_Message](copernica-docs:Mailerq/mq_message), you can use this function. This function sets the MIME data.

````c
/**
 *  Update the MIME data
 *
 *  @param  message     the message to set the envelope address in
 *  @param  mime        actual mime string
 *  @param  size        length of the mime string
 */
void MQ_SetMime(MQ_Message *message, const char *mime, size_t size);
````

This function has a different behavior if you call it on a message _that is being received_ and on a message _that is being sent_. If you call it on a message that is being received, for example inside your [mq_smtp_in_message()](copernica-docs:Mailerq/mq_smtp_in_message) function, it is simply an alias for setting the "mime" property in the JSON. Changing the MIME by calling this function, will also change the JSON that is going to be published to RabbitMQ.

For outgoing messages however, changing the MIME data with this function will not modify the JSON data. If your plugin calls this function before the actual data is sent over the SMTP connection, the newly set data is going to be used. However, when the message is published back to RabbitMQ (for example to the result queue, or back to the outbox queue for a retry) it will still use the original JSON object. If you also want to set "mime" property in the JSON, you should use the [MQ_Json()](copernica-docs:Mailerq/mq_json) function as well.

This function is often used in plugins that implement the [mq_smtp_out_data()](copernica-docs:Mailerq/mq_smtp_out_data) function.