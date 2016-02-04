# Function MQ_SmtpAuthenticated

Returns whether the connection is considered authenticated. If this is the first plugin checking a connection (or if there is only one plugin) this function will initially always return false. If a previous plugin has already set the connection to be authenticated using [MQ_SetSmtpAuthenticated()](mq_setsmtpauthenticated) this function will return the last value set with this function.

````c
/**
 *  Get whether the connection is considered authenticated
 *
 *  @param  connection  the connection that we want to know the status of
 *  @return bool
 */
bool MQ_SmtpAuthenticated(MQ_SmtpConnection *connection);
````