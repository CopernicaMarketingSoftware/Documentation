# Webhooks for failures

If you want to receive real-time notifications about failed deliveries,
you can set up a failures Webhook. You will receive notifications
for both synchronous failures (failures during the SMTP handshake)
as well as asynchronous failures (messages that were initially accepted,
but for which we received a failure report later on).

If you are interested in all messages that are sent back to the envelope 
address you can also set up a [Webhooks for bounces](webhook-failures).

## Synchronous vs. asynchronous

The SMTP protocol allows receiving servers to either accept or reject a 
message. When a message is rejected, SMTPeter simply makes a call to the 
URL that you set up for the Webhook. However, when a message is 
accepted, it still is possible that the receiving server sends back a 
bounce email later on to report that the delivery failed after all. These 
asynchronous errors are also picked up by SMTPeter, and when they are 
recognized, are also passed to the failures Webhook.

Mail servers often use the official Delivery Status Notification standard 
for sending back bounce messages. This standardized format allows SMTPeter
to automatically recognize bounces, log them and report them via the
Webhooks. However, this standard has not been adopted by all
mail servers, and even a couple of big email senders still send back 
notifications in a format that they invented themselves. Although we do
our best to recognize all types of bounce messages and pass them on to
the Webhooks, it is not always possible to process such non-standardized
asynchronous bounces, and to pass them to Webhooks. You can also receive 
all bounces by setting up a [Webhook for bounces](webhook-bounces).

## Variables

SMTPeter uses HTTP POST calls to send the data to you. This can be done
over HTTP or over HTTPS. The following variables are used in the POST
calls:

| Variable     | Description                                                                               |
|--------------|-------------------------------------------------------------------------------------------|
| id           | Unique id of the message for which this is a failure report                               |
| type         | Type of action that triggered the Webhook ('failure')                                     |
| timestamp    | Timestamp for the failure (in YYYY-MM-DD HH:MM:SS format)                                 |
| time         | Unix time for the failure                                                                 |
| recipient    | Email address for which this is a failure                                                 |
| action       | Action that triggered the Webhook ('failure' or 'failed')                                 |
| state        | State in the SMTP protocol where the failure occurred ("bounce" for asynchronous bounces) |
| code         | Optional SMTP error code                                                                  |
| extended     | Optional extended SMTP status code                                                        |
| description  | Optional description of the error                                                         |
| tags         | The tags that you associated with the mail                                                |

The 'id' and 'recipient' and 'tags' variables allow you to link the incoming bounce
to the original outgoing message that was sent.

## More information

* [Webhooks](./webhooks)
* [Set up a Webhook](./webhook-setup)
