# Webhooks: failures

If you want to receive notifications about failed deliveries,
you can set up a failures Webhook. You will receive notifications
for both synchronous failures (failures during the SMTP handshake)
as well as asynchronous failures (messages that were initially accepted,
but for which we received a failure report later on). The failures are 
reported to your server with a HTTP(S) POST call.

If you are interested in all messages that are sent back to the envelope 
address you can also set up a [Webhook for bounces](webhook-failures).

## Synchronous vs. asynchronous

The SMTP protocol allows receiving servers to either accept or reject a 
message. When a message is rejected this is called a failure and Copernica 
sends you a notification if a Webhook has been set up. However, it 
is possible that an email is accepted by the server, but could eventually 
not be delivered. These are called asynchronous errors, while the first 
type are called synchronous errors. Both are reported by the Webhook.

Mail servers often use the official Delivery Status Notification (DNS) 
standard for sending back bounce messages, which allows Copernica to 
automatically recognize and log them. However, there are exceptions 
that use their own format. Copernica tries to recognize as many as possible 
of these unofficial formats, but might not recognize every asynchronous 
bounce written in a different format. If you want to receive all bounces 
you can set up a [Webhook for bounces](webhook-bounces).

## Variables

With each POST call the variables in the table below are sent over. The 
POST data is sent with the application/x-www-form-urlencoded content type.

Associative arrays such as "parameters" and "fields" are sent per key-value pair,
e.g. *parameters[key]=value*.
Arrays such as "interests" are sent per item, e.g. *interests[]=xyz*.

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

The 'id", 'recipient' and 'tags' variables allow you to link the click to the '
originally sent email message.

## More information

* [Webhooks](./webhooks)
