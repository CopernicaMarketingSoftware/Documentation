# Function MQ_secure

Returns whether the connection is secure or not. A connection is secure if it 
has passed the "STARTTLS" state, and all traffic over it is encrypted.

```c
/**
 *  Get whether the connection is secure or not
 *
 *  @param  connection  the connection that we want to know the status of
 *  @return bool
 */
bool MQ_secure(MQ_Connection *connection);

```
