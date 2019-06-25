# Function MQ_authenticated

Returns whether the connection is considered authenticated. A connection
is authenticated if the user has sent a valid username and password, or
when a plugin has explicitly marked it as authenticated using the
[MQ_setAuthenticated()](mq_setauthenticated) function.

````c
/**
 *  Get whether the connection is considered authenticated
 *  @param  connection  the connection that we want to know the status of
 *  @return bool
 */
bool MQ_authenticated(MQ_Connection *connection);
````
