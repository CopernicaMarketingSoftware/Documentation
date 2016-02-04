# Function MQ_Envelope

If you want to retrieve the envelope from a [MQ_Message](mq_message), you can use this function for it. It returns a NULL terminated string, or simply NULL if no envelope has been set.

````c
/**
 *  Retrieve the envelope address
 *
 *  @param  message the message to retrieve the envelope address from
 *  @return         the recipient
 */
const char *MQ_Envelope(MQ_Message *message);
````

This function has a different behavior if you call it on a message _that is being received_ and on a message _that is being sent_. If you call it on a message that is being received, for example inside your [mq_smtp_in_message()](mq_smtp_in_message) function, it is simply an alias for retrieving the "envelope" property from the JSON.

For outgoing messages however, the envelope set in the JSON and the envelope that is returned by this function may be different. This function returns the envelope that is actually being used in the SMTP protocol for the "MAIL FROM" instruction, and could be different than the one that was originally loaded from RabbitMQ (for example, when a plugin modified the envelope in the mean time).

For more info, see the documentation about [MQ_SetEnvelope](mq_setenvelope).