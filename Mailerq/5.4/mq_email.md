# Function MQ_email

If you want to retrieve the full email address stored inside
the MQ_Address structure you can use this function.

The pointer that is returned should not be freed by the user.
MailerQ will automatically free it when it is done processing
the message.

````c
/**
 *  Retrieve the email address given an envelope structure
 *
 *  Be aware:   This function may return a nullptr in case no
 *              envelope address exists. This is most commonly
 *              seen in DSN messages.
 *
 *  @param  envelope    the envelope address
 *  @return const char *
 */
const char *MQ_email(MQ_Address *address);
```
