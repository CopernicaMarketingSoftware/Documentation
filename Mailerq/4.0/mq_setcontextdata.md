# Function MQ_SetContextData

This function can be called to store data which can then be retrieved later using the [MQ_ContextData()](copernica-docs:Mailerq/mq_contextdata) function. The data is segmented per plugin, so data stored will not overwrite data stored by other plugins, or in different contexts.

````c
/**
 *  Store data in the context
 *
 *  @param  context the context to store the data in
 *  @param  value   the data to store
 */
void MQ_SetContextData(MQ_Context *context, void *value);
````