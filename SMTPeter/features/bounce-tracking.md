# Bounce tracking

When you send out email, you normally also have to take care of failed deliveres
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
mail server. If the message cannot be delivered, which can happen for various reasons
such as a full mailbox or an incorrect email address, what happens next depends on whether
or not you have bounce tracking enabled.

### Bounce tracking disabled

When sending a message through SMTPeter without bounce tracking enabled any bounce messages
will automatically be sent to the email address specified as the envelope address of your
email, if one was set. If omitted, it defaults to noreply@smtpeter.com which will simply
ignore any and all bounce messages sent to it.

When you are sending your mail to us through SMTP it is not possible to omit the envelope
address of course - one must go through the 'MAIL FROM' command. It is of course possible
to specify 'noreply@smtpeter.com' yourself and we will happily ignore any bounces for you.

If have bounce tracking disabled, your bounces will not be tracked by SMTPeter
and will not show up in the statistics of your SMTPeter dashboard.

```
MAIL FROM:<info@example.com>
RCPT TO:<recipient@example.com>
DATA
From: <info@example.com>
To: <recipient@example.com>
This is example content.
.
```

In the above example bounce messages - if any - will be sent to info@example.com. SMTPeter
will not do any logging of these bounces and they will therefore not show up in any of the
statistics.

### Bounce tracking enabled

When sending an email through SMTPeter using SMTP with bounce tracking enabled, SMTPeter will
override the envelope address. It does not matter in the slightest what envelope address (if any)
you specify in this case, because it will simply be ignored. What happens next is up to your
bounce management settings in your [SMTPeter dashboard](copernica-docs:SMTPeter/dashboard/bounce-management).

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
mail server. If the message cannot be delivered, which can happen for various reasons
such as a full mailbox or an incorrect email address, what happens next depends on whether
or not you have bounce tracking enabled.

### Bounce tracking disabled

If you send email through SMTPeter using the REST API and the email cannot be delivered, SMTPeter will not
return a bounce message. The HTTP connection is already closed the moment SMTPeter tries to deliver your message
and the details are no longer available.

Whilst SMTPeter won't sent bounce message when bounce tracking is not enabled, the receiving mail servers
will still send their bounce messages to the address specified in your "envelope" property, if set.
In the following example bounce messages from the receiving servers will be sent to "info@example.com".

```json
{
    "envelope":     "info@example.com",
    "recipient":    "recipient@example.com",
    "from":         "info@example.com",
    "to":           "recipient@example.com",
    "html":         "This is example content."
}
```

Note that if you do not wish to receive these bounce messages, simply omit the envelope address, or
set it to 'noreply@smtpeter.com'

### Bounce tracking enabled

When sending an email through SMTPeter using the REST API and with bounce tracking enabled, SMTPeter
will rewrite the envelope address so that it receives and processes bounces itself. Any envelope address
- if specified - will simply be ignored.

```json
{
    "recipient":    "recipient@example.com",
    "from":         "info@example.com",
    "to":           "recipient@example.com",
    "html":         "This is example content."
}
```

What SMTPeter does with the bounce message depends on your bounce management settings. You
can set up your bounce management in your [SMTPeter dashboard](copernica-docs:SMTPeter/dashboard/bounce-management).

If you choose to set up a forward address, SMTPeter will forward all bounces after they have been
processed. You can then process the bounces further in your own application. Do note that if you
send email to a lot of recipients at the same time this could fill up the mail box of this address
quite quickly.

It is also possible to forward the bounce message to a 'webhook'. You can specify the
callback url for the webhook in the SMTPeter dashboard. SMTPeter will send the bounce report to
the callback url as a POST request. The bounce message will be sent as a JSON document.
