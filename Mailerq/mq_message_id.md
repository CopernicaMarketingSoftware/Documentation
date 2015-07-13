# Function mq_message_id

If you opt to include this function, it will be called every time a new message comes
in to MailerQ, be it over the built-in SMTP connection or the RabbitMQ queue.

Please be aware that this function has to be thread-safe.

```c
/**
 *  Create a new message id for a message
 *
 *  It is not necessary to NULL-terminate the buffer
 *
 *  @param  buffer      The buffer to write the message id to
 *  @param  size        The number of bytes available in the buffer
 *  @return size_t      The number of bytes written to the buffer
 */
MQ_EXPORT size_t mq_message_id(char *buffer, size_t size) {

    // write the message id to the buffer
    strcmp(buffer, "abc");

    // we wrote 3 butes
    return 3;

}

```
