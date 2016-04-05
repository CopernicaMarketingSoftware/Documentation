# Function MQ_SetSmtpAuthenticated

Set whether this connection should be considered authenticated. Note that if a previous plugin had already set this connection to be authenticated and you set it to be unauthenticated, the login will be rejected.

````c
/**
 *  Set whether the connection should be considered authenticated
 *
 *  @param  connection  the connection that authentication should be set for
 *  @param  bool        should the credentials be considered valid
 */
void MQ_SetSmtpAuthenticated(MQ_Connection *connection, bool authenticated);
````