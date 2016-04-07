# Bounce tracking

When you send out email, you normally also have to take care of failed deliveries
and bounce messages that are sent back to the email's envelope address. However,
if you do not want to set up an infrastructure to take care of bounces yourself,
you can let SMTPeter do this for you.

SMTPeter can process all bounces and present the results in a clear overview. It
can also automatically send them to you using SMTP or webhooks. You can also use
our API to download bounces at periodic intervals.

There are multiple ways SMTPeter's bounce processing works depending on which API
you use and whether you have bounce tracking enabled or disabled.


## SMTP API

The SMTP protocol is the standard protocol mail servers use to communicate with each
other. When you correctly send a message to SMTPeter using the SMTP API, SMTPeter will
always receive the message. It then attempts to deliver the message to the receiving
mail server. If the message cannot be delivered, which can happen for various reasons -
such as a full mailbox or an incorrect email address - what happens next depends on whether
or not you have bounce tracking enabled.

### Bounce tracking disabled

When sending a message through SMTPeter without bounce tracking enabled any bounce messages
will - by default - automatically be sent to the email address specified as the envelope
address of your email.

If you are - for some reason - uninterested in receiving bounce messages, you can let us
know using the DSN extension. DSN is short for Delivery Status Notification which are -
among other things - simply bounce messages.

With DSN the following options can be configured:

- What to return in case of a notification (full message or just the headers)
- When to send a notification (only in case of failure, when the message is delayed, on success or never)

In the following example disable status notifications complete. In this case it
makes no sense to specify whether to return headers or full messages since we
won't receive any notifications in either case.

```
MAIL FROM:<info@example.com>
RCPT TO:<recipient@example.com> NOTIFY=NEVER
DATA
From: <info@example.com>
To: <recipient@example.com>
This is example content.
.
```

As you can see in the example, the 'NOTIFY=NEVER' we have added to the RCPT TO instruction
disables DSN completely. Valid options for the NOTIFY directive are:

- NEVER
- FAILURE
- DELAY
- SUCCESS

'NEVER' obviously disables any notifications from being sent. If this is used, it must be the
only option. The other options may be combined, separated by a comma (and without any spaces
in between!).

'FAILURE' also speaks for itself, if used, a notification will be sent when the message could
not be delivered to the final recipient. A reason for the failure is usually provided in the
notification.

'DELAY' will request a notification when the message is delayed for an unspecified amount of
time. This can happen e.g. when a users mailbox is full. The mail server will then try to
delivery the message periodically in the hope that the user has removed some messages. It will
send a notification about this.

'SUCCESS' will send a notification to confirm the message was successfully delivered to the user.
Using this option is not recommended since it could result in a _lot_ of notifications (if the
addresses you are sending to are correct almost one per message sent).

In all cases except 'NEVER', you might want to specify what should be added to the status notification.
The following options are available:

- HDRS will add only the headers from the original message (default)
- FULL will add the complete message as an attachment

To receive a notification when the message failed to deliver or is delayed, including a copy of
the original message the following option can be used:


```
MAIL FROM:<info@example.com> RET=FULL
RCPT TO:<recipient@example.com> NOTIFY=DELAY,FAILURE
DATA
From: <info@example.com>
To: <recipient@example.com>
This is example content.
.
```

If you have bounce tracking disabled, your bounces will not be tracked by SMTPeter
and will not show up in the statistics of your SMTPeter dashboard.

In the above example bounce messages - if any - will be sent to info@example.com. SMTPeter
will not do any logging of these bounces and they will therefore not show up in any of the
statistics.

### Bounce tracking enabled

When sending an email through SMTPeter using SMTP with bounce tracking enabled, SMTPeter will
override the envelope address and DSN options. It does not matter in the slightest what envelope
address or DSN options you specify in this case, because it will simply be ignored. What happens
next is up to your bounce management settings in your [SMTPeter dashboard](dashboard/bounce-management).

If you choose to set up a forward address, SMTPeter will forward all bounces after they have been
processed. You can then process the bounces further in your own application. Do note that if you
send email to a lot of recipients at the same time this could fill up the mail box of this address
quite quickly.

It is also possible to forward the bounce message to a 'webhook'. You can specify the
callback url for the webhook in the SMTPeter dashboard. SMTPeter will send the bounce report to
the callback url as a POST request. The bounce message will be sent as a JSON document.
<!--
Example of a bounce message to callback url

-->

Go to your [bounce management dashboard](https://www.smtpeter.com//app/#/admin/bounce-management "Bounce Management Dasbhoard")
and set up your bounce management.


## REST API

The REST API communicates using the HTTPS protocol, the protocol used by web browsers to communicate.
When you correctly send a message to SMTPeter using the REST API, SMTPeter will
always receive the message. It then attempts to deliver the message to the receiving
mail server. If the message cannot be delivered - which can happen for various reasons
such as a full mailbox or an incorrect email address - what happens next depends on whether
or not you have bounce tracking enabled.

### Bounce tracking disabled

If you send email through SMTPeter using the REST API and the email cannot be delivered, SMTPeter will - by default -
send a bounce message to the recipient address (if provided). Please note that the API will not indicate this, since
the HTTP connection is already closed the moment SMTPeter tries to deliver your message.

In the following example bounce messages from the receiving servers will be sent to "info@example.com".

```json
{
    "envelope":     "info@example.com",
    "recipient":    "recipient@example.com",
    "from":         "info@example.com",
    "to":           "recipient@example.com",
    "html":         "This is example content.",
    "dsn":          {
        "notify":       "FAILURE",
        "ret":          "HDRS"
}}
```

Note that if you do not wish to receive these bounce messages, simply set the "notify" property to "NEVER".

### Bounce tracking enabled

When sending an email through SMTPeter using the REST API and with bounce tracking enabled, SMTPeter
will rewrite the envelope address and DSN properties so that it receives and processes bounces itself.
Any envelope address - if specified - will simply be ignored.

```json
{
    "recipient":    "recipient@example.com",
    "from":         "info@example.com",
    "to":           "recipient@example.com",
    "html":         "This is example content."
}
```

What SMTPeter does with the bounce message depends on your bounce management settings. You
can set up your bounce management in your [SMTPeter dashboard](dashboard/bounce-management).

If you choose to set up a forward address, SMTPeter will forward all bounces after they have been
processed. You can then process the bounces further in your own application. Do note that if you
send email to a lot of recipients at the same time this could fill up the mail box of this address
quite quickly.

It is also possible to forward the bounce message to a 'webhook'. You can specify the
callback url for the webhook in the SMTPeter dashboard. SMTPeter will send the bounce report to
the callback url as a POST request. The bounce message will be sent as a JSON document.
