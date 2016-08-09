# Function MQ_SetEnvelope

If you want to change the envelope address that is associated with a
[MQ_Message](mq_message), you can use this function. This function allows you to store a new envelope address in a message.

````c
/**
 *  Update the envelope address
 *
 *  @param  message     the message to set the envelope address in
 *  @param  envelope    actual envelope address
 *  @param  size        length of the envelope string
 */
void MQ_SetEnvelope(MQ_Message *message, const char *envelope, size_t size);

This function has a different behavior if you call it on a message _that is being received_ and on a message _that is being sent_. If you call it on a message that is being received, for example inside your [mq_smtp_in_message()](mq_smtp_in_message) function, it is simply an alias for setting the "envelope" property in the JSON. Changing the envelope address by calling this function, will also change the JSON that is going to be published to RabbitMQ.

For outgoing messages however, changing the envelope with this function will not modify the JSON data. If your plugin calls this function before the "MAIL FROM" instruction is sent, the newly set envelope address is going to be used in the SMTP protocol, but when the message is published back to RabbitMQ (for example to the result queue, or back to the outbox queue for a retry) it will still have the original envelope address in the JSON. If you also want to modify the envelope address in the JSON data, you should use the [MQ_json()](mq_json) function as well.
