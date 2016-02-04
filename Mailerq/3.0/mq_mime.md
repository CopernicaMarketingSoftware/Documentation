# Function MQ_Mime

If you want to retrieve the MIME data from a [MQ_Message](copernica-docs:Mailerq/mq_message), you can use this function. 
It returns a NULL terminated string, or simply NULL if no mime has been set.

````c
/**
 *  Retrieve the MIME data
 *
 *  @param  message the message to retrieve the mime from
 *  @return         the MIME data
 */
const char *MQ_Mime(MQ_Message *message);
````

This function has a different behavior if you call it on a message _that is being received_ and on a message _that is being sent_. If you call it on a message that is being received, for example inside your [mq_smtp_in_message()](copernica-docs:Mailerq/mq_smtp_in_message) function, it is simply an alias for retrieving the "mime" property from the JSON.

For outgoing messages however, the "mime" property set in the JSON and the data that is returned by this function may be different. In fact, very often the original JSON does not even hold any MIME data, and it is exactly the task of the plugin to _generate the MIME_ based on other properties in the MIME. Exactly for that reason, this function normally returns NULL if you call it from a plugin that intercepts outgoing messages - unless some other plugin has already set the data using the [MQ_SetMime()](copernica-docs:Mailerq/mq_setmime) function.

For more info, see the documentation about [MQ_SetMime](copernica-docs:Mailerq/mq_setmime).