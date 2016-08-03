# Function MQ_Local

If you want to check whether a received incoming message was marked as a
local message for local delivery, you can cal this function. It returns 
boolean.

````c
/**
 *  Retrieve the local setting
 *
 *  @param  message the message to retrieve the setting from
 *  @return         the local setting
 */
bool MQ_Local(MQ_Message *message);
````

For more info, see the documentation about [MQ_SetLocal](mq_setlocal).

