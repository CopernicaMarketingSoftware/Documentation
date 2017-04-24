# Feedback loops for bounces

The Marketing Suite normally modifies the envelope address of all mails that flow
through it to track bounces and other messages that are sent back. All
bounce messages are therefore sent back to the Marketing Suite. You can set 
up a "bounce" feedback loop to be notified about these bounces too.
If you are only interested in failed deliveries then you can also use [feedback loops for failures](feedback-failures).


## Type of messages

The bounce feedback loop is used for literally _all_ messages that are 
sent back to the envelope address. This includes the regular
delivery status notifications, or error messages 
from servers that do not respect the official format for bounce messages. 
All these type of messages are sent back to the Marketing Suite,
and if you set up a feedback loop, are also delivered to you.

## Variables

The bounce feedback loop is sent over HTTP POST, and the following
variables are submitted:

<table>
    <tr>
        <td>id</td>
        <td>original message id to which the bounce is associated</td>
    </tr>
    <tr>
        <td>recipient</td>
        <td>email address to which the original mail was sent</td>
    </tr>
    <tr>
        <td>mailfrom</td>
        <td>"MAIL FROM" address that was used for delivering the incoming bounce</td>
    </tr>
    <tr>
        <td>rcptto</td>
        <td>"RCPT TO" address that was used for delivering the incoming bounce</td>
    </tr>
    <tr>
        <td>mime</td>
        <td>the MIME data that was sent (this is the actual received bounce message)</td>
    </tr>
    <tr>
        <td>tags</td>
        <td>the tags that you associated with the mail</td>
    </tr>
</table>

The "id", "recipient" and "tags" variables allow you to link the incoming bounce to the original outgoing message that was sent.
The "mailfrom", "rcptto" and "data" fields hold the message that was received by the Marketing Suite.

## More information
 
* [Feedback loops](./feedback-loops)
