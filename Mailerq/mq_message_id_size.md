# Function mq_message_id_size

If you opt to include this function, as well as the [mq_message_id()](copernica-docs:Mailerq/mq_message_id) function, your plugin will be called when MailerQ initializes, to retrieve the number of to reserve for each message id. This can be useful if you wish to generate message ids exceeding 32 bytes in length (the default buffer size).

Note that this function will be only called once, not once per thread, since the message id size is the same for each thread. It will only be called if the [mq_message_id()](copernica-docs:Mailerq/mq_message_id) function also exists within the same plugin.

```c
/**
 *  Retrieve the number of characters to reserve for a message id
 *
 *  @return size_t      The number of bytes to reserve for message ids
 */
MQ_EXPORT size_t mq_message_id_size() {

    // we use longer message ids
    return 64;
}

```
