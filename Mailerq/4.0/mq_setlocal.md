# Function MQ_SetLocal

Incoming messages are published to either the local message queue, or 
to the regular inbox queue. In a normal setup, this is normally used
to decide whether the email is going to be delivered to a local address,
or that it is going to be relayed.

If you write a plugin that intercepts incoming messages, you can update
the "local" property by calling this method. If you set it to true,
the message is going to be processed as a local email and will
be published to the local message queue.

````c
/**
 *  Update the local setting
 *
 *  @param  message     the message to change
 *  @param  local       new setting
 */
void MQ_SetLocal(MQ_Message *message, bool local);
````

This function is only meaningful for incoming messages. You can call it
on outgoing message too, but that will not change the behavior of MailerQ.
This function is therefore only used in plugins that implement the 
[mq_smtp_in_message()](mq_smtp_in_message) function.
