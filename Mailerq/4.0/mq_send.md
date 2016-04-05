# Function MQ_SmtpSend

Send raw data directly to the SMTP connection.

MailerQ takes care of its own output buffering, so you can be sure that all data is always delivered, unless the connection is suddenly closed by the peer.

**Watch out!** MailerQ normally takes care of performing all steps in the SMTP protocol. If you start sending data yourself, the SMTP connection may end up in an invalid state.

```c
/**
 *  Send data over a TCP connection
 *  @param  connection  the connection in which the data was stored
 *  @param  buffer      data to size
 *  @param  size        size of the buffer
 *  @return size_t      number of bytes sent
 */
size_t MQ_SmtpSend(MQ_Connection *connection, const void *buffer, size_t size);

```