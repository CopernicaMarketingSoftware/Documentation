# Function mq_smtp_out_sent()

If your plugin contains this function, it is called right after a message
has been sent over an SMTP connection. The function is called _after_
the message was sent, but _before_ the message was accepted.

This function can be useful if you want to write a plugin that monitors
which messages were actually sent over the line.

This method is designed to run asynchronously. You should not execute any 
blocking calls from within this function, if you do you will disturb other 
active connections resulting in timeouts.

```c
#include <mailerq.h>

/**
 *  Load a MIME message
 *
 *  @param  context     Access to the context
 *  @param  connection  Access to the SMTP connection
 *  @param  message     Access to the JSON message
 *  @return boolean     Do we accept control from here?
 */
MQ_EXPORT bool mq_smtp_out_sent(MQ_Context *context, MQ_Connection *connection, MQ_Message *message) {

    // if we return true here, MailerQ will stop processing this message
    // until either the MQ_Complete, MQ_Continue or MQ_Retry function is
    // called. if none of the functions is called, MailerQ will wait for the
    // remote server to close the connection and mark it as an error.
    return true;
}

```

If your plugin returns true, MailerQ hands over control to your plugin, and 
you should also hand control back. For more information on how MailerQ plugins 
can interact with the event loop, and how control is passed to and from plugins, 
see [the article about the MailerQ event loop](eventloop).
