# Feedback loops for bounces

SMTPeter normally modifies the envelope address of all mails that flow
through it to track bounces and other messages that are sent back. All
bounce messages are therefore sent back to SMTPeter. You can however set 
up a "bounce" feedback loop to be notified about these bounces too.


## Type of messages

The bounce feedback loop is used for literally _all_ messages that are 
sent back to the envelope address. This includes the regular
delivery status notifications, but also out-of-office replies, vacation
mails, or error messages from servers that do not respect the official
format for bounce messages. All these type of messages are sent back to
SMTPeter, and if you set up a feedback loop, are also delivered to you.


## Bounces vs Delivery Status Notifications

SMTPeter sends out messages using the SMTP protocol. This protocol allows
remote servers to either accept a message, or to refuse it. Refused mails
are written to the failure logfile, and are sent to the failure feedback
loops (see diagram 1). However, even when a message is initially accepted (and thus not 
considered a failure), it still is possible for the other server
to send back a bounce email later on in which we're told that the message
is rejected after all. These bounce messages are Delivery Status Notifications
and have a special format. SMTPeter recognizes these bounces, and adds
these errors to the log file too, and calls your 
[failure feedback loop](feedback-failures) (see diagram 2).

[Diagram 1](Images/smtpeter-diagram-send-email.svg "Sending email")
[Diagram 2](Images/smtpeter-diagram-bounce.svg "Bounces")

However, besides these standardized Delivery Status Notifications, there 
are many more messages that are sent back to the envelope address. These 
are for example out-of-office mails or vacation mails, but also error 
messages (like "mailbox full" or "email address does not exist") from
servers that do not respect the official Delivery Status Notification
format. These messages are also picked up by SMTPeter.

However, because such messages do not follow the official standard for
Delivery Status Notifications, they can not be recognized by SMTPeter and
are not written to the error log file or are sent to failure feedback loops.
Such incoming bounces are only written to the bounce log file, and are 
sent to the bounce feedback loops. The bounce feedback loop thus receives
two sort of messages: official Delivery Status Notifications, *and*
bounces and out-of-office replies that could not be recognized.


## Format

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
        <td>data</td>
        <td>The MIME data that was sent during, this is the actual received bounce message</td>
    </tr>
</table>

The "id" and "recipient" variables allow you to link the incoming bounce
to the original outgoing message that was sent. The "mailfrom", "rcptto"
and "data" fields hold the message that was received by SMTPeter.

