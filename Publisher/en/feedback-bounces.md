# Feedback loops: bounces

The Marketing Suite normally modifies the envelope address of all mails that flow
through it to track bounces and other messages that are sent back. All
bounce messages are therefore sent back to the Marketing Suite. You can set 
up a "bounce" feedback loop to be notified about these bounces too with an 
HTTP(S) POST call.
If you are only interested in failed deliveries then you can also use [feedback loops for failures](feedback-failures).

## Type of messages

The bounce feedback loop is used for _all_ messages that are 
sent back to the envelope address. This includes the regular
delivery status notifications and error messages from servers that do 
not respect the official format for bounce messages. 
All these type of messages are sent back to Copernica and you can opt 
to have them delivered to you in real-time with a feedback loop.

## Variables

The bounce feedback loop is sent over HTTP POST, and the following
variables are submitted:

| Variable  | Description                                                              |  
|-----------|--------------------------------------------------------------------------|
| id        | original message id with which the bounce is associated                  |
| recipient | email address to which the original mail was sent                        |
| mailfrom  | "MAIL FROM" address that was used for delivering the incoming bounce     |
| rcptto    | "RCPT TO" address that was used for delivering the incoming bounce       |
| mime      | the MIME data that was sent (the message itself)                         |
| tags      | the tags that you associated with the mail                               |

The "id", "recipient" and "tags" variables are added to allow easy linking 
of the new data with your existing data. The "mailfrom", "rcptto" and 
"data" fields hold the message that was received by Copernica.

## More information
 
* [Feedback loops](./feedback-loops)
* [Types of bounces](./bounces)
