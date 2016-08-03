# Function mq_smtp_out_data()

If your plugin contains this function, it will be called as soon as the SMTP connection enters the data state, giving you the chance to manipulate the message body before it is sent.

Normally, the full MIME messages that are going to be sent by MailerQ are stored in the JSON objects that are loaded from RabbitMQ. When a SMTP connection has been set up, the MIME is extracted from the JSON and sent over the SMTP connection.

But you may write a plugin that does this in a different way. If you want to write a plugin to generate the MIME in a different fashion, you can do so by implementing the mq_smtp_out_data() function. This function is called by MailerQ after the SMTP connection has been set up, to load the actual MIME message.

This method is designed to run asynchronously. You should not execute any blocking calls from within this function, if you do you will disturb other active connections resulting in timeouts.

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
MQ_EXPORT bool mq_smtp_out_data(MQ_Context *context, MQ_Connection *connection, MQ_Message *message) {
    // in most cases, plugins implementing this function will alter the
    // message contents before it is sent. for this, you can use the
    // MQ_SetMime() function. other message properties can of
    // course also be updated, but at this stage in the sending process
    // it most likely won't matter (we have already connected to the
    // SMTP server and have given it the email address to which we want
    // to send a message, so this cannot be changed).

    // if we return true here, MailerQ will stop processing this message
    // until either the MQ_Complete, MQ_Continue or MQ_Retry function is
    // called. if none of the functions is called, MailerQ will wait for the
    // remote server to close the connection and mark it as an error.
    return true;
}

```

If your plugin returns true, MailerQ hands over control to your plugin, and you should also hand control back. For more information on how MailerQ plugins can interact with the event loop, and how control is passed to and from plugins, see [the article about the MailerQ event loop](eventloop).