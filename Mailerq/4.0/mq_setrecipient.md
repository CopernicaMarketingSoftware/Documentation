# Function MQ_SetRecipient

If you want to change the recipient address that is associated with a
[MQ_Message](copernica-docs:Mailerq/mq_message), you can use this function. This function allows you to store a new recipient address in a message.

````c
/**
 *  Update the recipient address
 *
 *  @param  message     the message to set the recipient address in
 *  @param  recipient   actual recipient address
 *  @param  size        length of the recipient string
 */
void MQ_SetRecipient(MQ_Message *message, const char *recipient, size_t size);
````

This function has a different behavior if you call it on a message _that is being received_ and on a message _that is being sent_. If you call it on a message that is being received, for example inside your [mq_smtp_in_message()](copernica-docs:Mailerq/mq_smtp_in_message) function, it is simply an alias for setting the "recipient" property in the JSON. Changing the recipient address by calling this function, will also change the JSON that is going to be published to RabbitMQ.

For outgoing messages however, changing the recipient with this function will not modify the JSON data. If your plugin calls this function before the "RCPT TO" instruction is sent, the newly set recipient address is going to be used in the SMTP protocol, but when the message is published back to RabbitMQ (for example to the result queue, or back to the outbox queue for a retry) it will still have the original recipient address in the JSON. If you also want to modify the recipient address in the JSON data, you should use the [MQ_Json()](copernica-docs:Mailerq/mq_json) function as well.