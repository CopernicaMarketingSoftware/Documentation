# Function MQ_Recipient

If you want to retrieve the recipient from a [MQ_Message](mq_message), you can use this function for it.
It returns a NULL terminated string, or simply NULL if no recipient has been set.

````c
/**
 *  Retrieve the recipient
 *
 *  @param  message the message to retrieve the recipient from
 *  @return         the recipient
 */
const char *MQ_Recipient(MQ_Message *message);
````

This function has a different behavior if you call it on a message _that is being received_ and on a message _that is being sent_. If you call it on a message that is being received, for example inside your [mq_smtp_in_message()](mq_smtp_in_message) function, it is simply an alias for retrieving the "recipient" property from the JSON.

For outgoing messages however, the recipient set in the JSON and the recipient that is returned by this function may be different. This function returns the recipient that is actually being used in the SMTP protocol for the "RCPT TO" instruction, and could be different than the one that was originally loaded from RabbitMQ (for example, when a plugin modified the recipient in the mean time).

For more info, see the documentation about [MQ_SetRecipient](mq_setrecipient).