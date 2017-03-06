# Function MQ_setContextData

This function can be called to store data which can then be retrieved later 
using the [MQ_contextData()](mq_contextdata) function. The data is segmented 
per plugin, so data stored will not overwrite data stored by other plugins, 
or in different contexts.

````c
/**
 *  Store data in the context
 *
 *  @param  context the context to store the data in
 *  @param  value   the data to store
 */
void MQ_setContextData(MQ_Context *context, void *value);
````
