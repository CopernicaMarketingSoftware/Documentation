# REST API method: send

To send email using the REST API you use the `send` method. This method
can be called by using the following URL

```text
https://www.smtpeter.com/v1/send?access_token=YOUR_API_TOKEN
```

The method is only available as POST call, and your body data should 
contain one or more of the following variables:

* [envelope](copernica-docs:SMTPeter/rest/send#envelope)
* [recipient(s)](copernica-docs:SMTPeter/rest/send#recipient-or-recipients)
* [mime](copernica-docs:SMTPeter/rest/send#mime)
* [subject](copernica-docs:SMTPeter/rest/send#subject)
* [from](copernica-docs:SMTPeter/rest/send#from)
* [to](copernica-docs:SMTPeter/rest/send#to)
* [cc](copernica-docs:SMTPeter/rest/send#cc)
* [text](copernica-docs:SMTPeter/rest/send#text)
* [html](copernica-docs:SMTPeter/rest/send#html)
* [inlinizenecss](copernica-docs:SMTPeter/rest/send#inlinizecss)
* [dsn](copernica-docs:SMTPeter/rest/send#dsn)
* [bouncetracking](copernica-docs:SMTPeter/rest/send#bouncetracking)
* [clicktracking](copernica-docs:SMTPeter/rest/send#clicktracking)
* [openstracking](copernica-docs:SMTPeter/rest/send#openstracking)

## Sending MIME data

The "send" method can both be used to send fully formatted MIME messages,
or to send many different fields so that SMTPeter can generate the MIME
message for you. If you create the MIME message yourself, you need to
provide the following two fields at least:

* recipient(s)
* mime

The "recipient"/ "recipients" should hold the email address(es) of the actual recipient, and
"mime" the full MIME encoded message. The following additional fields may 
also be included:

* envelope


## Sending non-MIME data

If the "mime" field is not included in the call to the REST API, SMTPeter
will generate an email based on the settings of the variables:

* subject
* from
* to
* cc
* text
* html


## recipient or recipients

This variable controls where the email is delivered and is mandatory in all
send calls. The variable should be set to an email address and this address
should be **pure**. Pure means that it should just contain the email
address without the name of the recipient or angle brackets ('<' and '>')
(i.e. it should state `richard@copernica.com` and not `"Richard" <richard@copernica.com>`).

If you want to send the same email to multiple email addresses you can do so by
setting the "recipients" variable instead of the "recipient". The "recipients" variable should 
be an array of email addresses.

```json
{
    "recipients": [
        "one@example.com",
        "two@example.com, three@example.com",
        "..."
    ]
}
```

## envelope

The "envelope" variable determines where delivery status notifications will
be send to. This variable can contain only one email address and this address
should be **pure**. Pure means that it should just contain the email
address without the name of the recipient or angle brackets ('<' and '>')
(i.e. it should state `richard@copernica.com` and not `"Richard" <richard@copernica.com>`).
Note that you can specify in what cases you would like to receive a delivery
status notification and what that notification should contain via the `dsn`
variable. You can also let SMTPeter take care of it by setting variable
"bouncetracking".


## mime

Via this variable you can add your full MIME encoded message as a string.
You can also let SMTPeter generate the MIME message for you be setting,
"subject", "from", "to", "cc", "text", and "html" separately.


## subject

With this variable you can set the subject of your email via a string if
you do not provide a MIME message.


## from

The "from" variable has to contain a **single** email address, just like the
variable "envelope". However, the notation here is more flexible than in
"envelope". The "from" variable may contain a name in front of the address
as well as angle brackets ('<' and '>'). Note that the address set in "from"
is only used for creating the MIME message and does not affect the destination
of delivery status notifications.

## to

The "to" variable can contain one ore more email addresses. These addresses may contain
a name in front of the address as well as angle brackets ('<' and '>').
You can set multiple email addresses by using an array, a comma separated list,
or a combination of both.
Example:

```json
{
  "to": [
    "one@example.com",
    "two@example.com",
    " \"Number three\" <three@example.com>, info@example.com"
  ]
}
```

Note that "to" does not affect the "recipient" variable. It is only used to
create the MIME message.

## cc

The "cc" variable behaves similar to the "to" variable. It can contain one
or more email addresses with names in front and angle brackets. Multiple
addresses can be set via an array, a comma separated list, or a combination.
The "cc" variable does not affect the "recipient" variable


## text

With "text" you can set the text version of your email.


## html

With "html" you can set the HTML version of the email.


## inlinizecss

By setting this variable to true you enable the feature that your stylesheet will
be inlinize.

The stylesheet (CSS) of your email is normally placed in the header of your HTML document.
However, some web based email clients strip out these HTML headers, and get rid of the
complete stylesheet of your email. To avoid this, SMTPeter can automatically inlinize
all CSS code. If you use this feature, the CSS stylesheet that was originally placed on
top of your HTML document, is transformed by SMTPeter into many different "style" attributes
for the individual tags. Even when the header gets removed by a web based email client,
your email message will still be displayed correctly.


## dsn

With the "dsn" variable you can set when and what delivery notification
messages you want to receive. These notification messages will be send
to the email address you have specified in the "envelope" variable. Make
sure that you have specified this, otherwise all notification will fail
silently. 

The "dsn" variable accepts a JSON object with two fields:
```json
{
    "notify": ,         either "NEVER" or one or more of "FAILURE", "SUCCESS" and "DELAY", comma-separated
    "ret":              Either "FULL" to receive the full message back or "HDRS" to receive just the headers
}
```
With the "notify" field you can specify when you want to get an email notification.
You can set it either to "NEVER" or to one or more of "FAILURE", "SUCCESS" and "DELAY"
and these a comma separated. If you set it to "NEVER" you never will get
a notification email. If you specify "FAILURE", you well get a notification
when SMTPeter fails to deliver your email to the receiving mail server.
This can happen for various reasons such as a full mailbox of the receiver
or an incorrect email address. When you specify "SUCCES" you well get a
notification when the email was successfully delivered. When you specify
"DELAY" you will get a notification when the delivery of your email takes
longer than expected. This may be caused by an unresponsive email server.
Most of the time you are only interested in failure notifications. Based on
these failures you can cleanup your email list.

With the "ret" field you can specify what message you want to receive in
your notification. You can specify "FULL" if you want tot receive the full
message back or "HDRS" if you just want to receive the headers.

Do note that if you send email to a lot of recipients at the same time 
this could fill up the mail box that you have specified in "envelope" quite
quickly.

If you do not want to track failure notifications yourself, you can let SMTPeter
handle this by setting the variable "bouncetracking" to true. The discussion
about this setting is given in the next section.


## bouncetracking

Bouncetracking is enabled by default. 
When "bouncetracking" is set to true, SMTPeter will track bounced emails for
you. An email bounces when SMTPeter fails to deliver the message to the
receiving mail server. This can happen for various reasons such as a full
mailbox or an incorrect email address. What SMTPeter does with the bounce
message depends on your bounce management settings. You can set up your
bounce management in your [SMTPeter dashboard](copernica-docs:SMTPeter/dashboard/bounce-management).

If you choose to set up a forward address, SMTPeter will forward all bounces after they have been
processed. You can then process the bounces further in your own application. Do note that if you
send email to a lot of recipients at the same time this could fill up the mail box of this address
quite quickly.

It is also possible to forward the bounce message to a 'webhook'. You can specify the
callback url for the webhook in the SMTPeter dashboard. SMTPeter will send the bounce report to
the callback url as a POST request. The bounce message will be sent as a JSON document.

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

## clicktracking

When variable "clicktracking" is set to true all links in an email are
rewritten so that they are first sent through SMTPeter before being
redirected to the original URI.

All these redirections are logged so statistics of all these clicks can
then be seen. We log the time of the click, as well as the link the user
clicked on and the position of the link within the email. This means it
is possible to add the same link to the email in multiple places to see
which one receives more clicks.

When rewriting the links to detect the clicks, we do our best to make the
rewritten link look as much as the original. We leave the path intact, and
only add a small identifier to the end. We also change the domain to one
that leads to us. This domain is clicks.smtpeter.com by default, which
likely does not ring a bell for many of your customers.

For this reason we have made it possible to configure the exact domain that
is used for click tracking. Say you have a domain called 'example.com' you
could set up 'clicks.example.com' as the click domain to use. The following
URI could then be rewritten as follows:

http://www.example.com/path-of-the-uri

Becomes:

http://clicks.example.com/path-of-the-uri-QogGwQIAgQQAg

[Set up your click domain](https://www.smtpeter.com/app/#/admin/click-tracking "Set up your click domain").


## openstracking

This starts by detecting if your sent message
is opened or not. SMTPeter's open tracking functionality can be used for this.
If you enable open tracking, SMTPeter tracks all opens of your email and
shows the statistics in the statistics overview of your SMTPeter dashboard.
