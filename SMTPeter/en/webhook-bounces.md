# Webhooks for bounces

SMTPeter normally modifies the envelope address of all mails that flow
through it to track bounces and other messages that are sent back. All
bounce messages are therefore sent back to SMTPeter. You can however set 
up a 'bounce' Webhook to be notified about these bounces too.

## Type of messages

The bounce Webhook is used for literally **all** messages that are 
sent back to the envelope address. This includes the regular
delivery status notifications, but also out-of-office replies, vacation
mails, or error messages from servers that do not respect the official
format for bounce messages. All these type of messages are sent back to
SMTPeter and with a Webhook you can also receive these messages in real-time.

## Bounces vs Delivery Status Notifications

SMTPeter sends out messages using the SMTP protocol. This protocol allows
remote servers to either accept a message or to refuse it. Refused mails
are written to the failure logfile and are sent to the failure Webhooks (see diagram 1). 

**Diagram 1**
<img style="float: center; max-width: 60%; max-height: 60%; margin-bottom: 20px;" src="Images/smtpeter-diagram-send-email.svg">

However, even when a message is initially accepted (and thus not 
considered a failure), it still is possible for the other server
to send back a bounce email later on in which we're told that the message
is rejected after all. These bounce messages are Delivery Status Notifications
and have a special format. SMTPeter recognizes these bounces, and adds
these errors to the log file too, and calls your 
[failure Webhook](webhook-failures) (see diagram 2).

**Diagram 2**
<img style="float: center; max-width: 60%; max-height: 60%; margin-bottom: 20px;" src="Images/smtpeter-diagram-bounce.svg">

Besides these standardized Delivery Status Notifications, there 
are many more messages that are sent back to the envelope address. These 
are for example out-of-office mails or vacation mails, but also error 
messages (like "mailbox full" or "email address does not exist") from
servers that do not respect the official Delivery Status Notification
format. These messages are also picked up by SMTPeter.

Because such messages do not follow the official standard for
Delivery Status Notifications, they can not be recognized by SMTPeter and
are not written to the error log file or are sent to failure Webhooks.
Such incoming bounces are only written to the bounce log file, and are 
sent to the bounce Webhooks. The bounce Webhook thus receives
two sort of messages: official Delivery Status Notifications, *and*
bounces and out-of-office replies that could not be recognized.

## Variables

The bounce Webhook is sent over HTTP POST and the following
variables are submitted:

| Variable  | Description                                                              |  
|-----------|--------------------------------------------------------------------------|
| id        | Original message ID with which the bounce is associated                  |
| type      | Type of action that triggered the Webhook ('bounce')                     |
| timestamp | Timestamp for the bounce (in YYYY-MM-DD HH:MM:SS format)                 |
| time      | Unix time for the bounce                                                 |
| recipient | Email address to which the original mail was sent                        |
| envelope  | Envelope address to send the bounce to                                   |
| mime      | The MIME data that was sent (the message itself)                         |
| tags      | The tags that you associated with the mail                               |

The 'id' and 'recipient' and 'tags' variables allow you to link the incoming bounce
to the original outgoing message that was sent.

## More information

* [Webhooks](./webhooks)
