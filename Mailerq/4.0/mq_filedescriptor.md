# Function MQ_SmtpFileDescriptor

Get access to the socket filedescriptor that represents the underlying TCP connection of the SMTP connection.

> **Watch out!** The socket is completely managed by MailerQ, and it is in general not a good idea to use the filedescriptor for sending or receiving data, or to close it. Your plugin should only use the filedescriptor to retrieve information about the connection, for example to retrieve the local or remote IP addresses of the connection using regular C functions [getsockname()](http://linux.die.net/man/2/getsockname) or [getpeername()](http://linux.die.net/man/2/getpeername).

```c
/**
 *  Retrieve file descriptor that is used for the SMTP connection
 *  @param  connection  the connection in which the data was stored
 *  @return int
 */
int MQ_SmtpFileDescriptor(MQ_SmtpConnection *connection);

```