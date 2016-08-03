# Structure MQ_Address

Envelope and recipient addresses are wrapped in MQ_Address structures.
You can get a reference to this structure by calling the
[MQ_envelope()](mq_envelope) or [MQ_recipient()](mq_recipient) function
on a [MQ_Message](mq_message) structure, or by implementing the
[mq_smtp_in_mailfrom()](mq_smtp_in_mailfrom) or [mq_smtp_in_rcptto()](mq_smtp_in_rcptto)
functions.

## Available functions

Once you have access to a MQ_Address struct, you can call the following
functions on it to get access to the underlying address, and to other
address properties.

| Callable function            | Description                                  |
|------------------------------|----------------------------------------------|
| [MQ_email()](mq_email)       | Access to the underlying email address       |
| [MQ_local()](mq_local)       | Check whether a recipient address is "local" |
| [MQ_setLocal()](mq_setlocal) | Mark a recipient as "local"                  |


