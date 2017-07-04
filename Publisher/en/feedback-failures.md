# Feedback loops: failures

If you want to receive notifications about failed deliveries,
you can set up a failures feedback loop. You will receive notifications
for both synchronous failures (failures during the SMTP handshake)
as well as asynchronous failures (messages that were initially accepted,
but for which we received a failure report later on). The failures are 
reported to your server with a HTTP(S) POST call. 

## Synchronous vs. asynchronous

The SMTP protocol allows receiving servers to either accept or reject a 
message. When a message is rejected this is called a failure and Copernica 
sends you a notification if a feedback loop has been set up. However, it 
is possible that an email is accepted by the server, but could eventually 
not be delivered. These are called asynchronous errors, while the first 
type are called synchronous errors. Both are reported by the feedback loop.

Mail servers often use the official Delivery Status Notification (DNS) 
standard for sending back bounce messages, which allows Copernica to 
automatically recognize and log them. However, there are exceptions 
that use their own format. Copernica tries to recognize as many as possible 
of these unofficial formats, but might not recognize every asynchronous 
bounce written in a different format. If you want to receive all bounces 
you can set up a [feedback loop for bounces](feedback-bounces).

## Variables

With each POST call the variables in the table below are sent over. The 
POST data is sent with the application/x-www-form-urlencoded content type.

Associative arrays such as "parameters" and "fields" are sent per key-value pair,
e.g. *parameters[key]=value*.
Arrays such as "interests" are sent per item, e.g. *interests[]=xyz*.

| Variable     | Description                                                                               |
|--------------|-------------------------------------------------------------------------------------------|
| id           | unique id of the message for which this is a failure report                               |
| recipient    | email address for which this is a failure                                                 |
| state        | state in the smtp protocol where the failure occurred ("bounce" for asynchronous bounces) |
| code         | optional smtp error code                                                                  |
| extended     | optional extended smtp status code                                                        |
| description  | optional description of the error                                                         |
| tags         | the tags that you associated with the mail                                                |

The "id", "recipient" and "tags" variables allow you to link the failure to
the data in your system.

## More information

* [Feedback loops](./feedback-loops)
