# REST API method: send

```text
https://www.smtpeter.com/v1/send?access_token=YOUR_API_TOKEN
```

To send email using the REST API you use the "send" method. The method
is only accessible via HTTP POST, and the body should contain all data
of the mail, plus the features.

```text
POST /v1/send?access_token={YOUR_API_TOKEN} HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/json
Content-Length: 246

{
    "recipient":    "john@doe.com",
    "subject":      "This is the subject",
    "html":         "This is example content",
    "from":         "info@example.com",
    "to":           "john@doe.com"
}
```

The above example call demonstrates how to send an email to john@doe.com.
We've used a JSON example, but it is also possible to submit the mail
using normal url encoded HTTP POST data. In all subsequent examples on 
this page, we will just show the JSON code and omit the headers.


## Return value

After successfully posting your request SMTPeter sends back a result 
JSON object holding a unique identifier for each recipient to which
the mail will be delivered.

````json
{
    "id1" : "recipient1@example.com",
    "id2" : "recipient2@example.com"
}
````

The returned ids can be used to obtain information using other methods of the
REST API.


## Minimal properties

The following example shows the minimal properties to deliver an email: 
the recipient address that is going to be used in the "RCPT TO" part of 
the SMTP protocol, and the full MIME data. 

````json
{
    "recipient":    "john@doe.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n...."
}
````

To ease readability, we've removed the majority of the MIME code from the 
example. If you do not want to create the entire MIME message yourself, you 
can leave out the property "mime", and 
[use special MIME properties](smtp-mime) like "subject", "text" and "html"
so that SMTPeter can construct the mime data.

You only have to supply a recipient address, and no envelope. The envelope
will be filled in by SMTPeter to track the bounces. But if you want to 
receive the bounces yourself, you must also add an envelope address. Besides
the envelope address, you can even add a ["dsn" property](rest-dsn) to
specify the type of bounce messages you want to receive.


## Multiple recipients

To send a single message to multiple recipients, remove the "recipient"
propery, and replace it with a "recipients" property holding an array
of email addresses:

````json
{
    "recipients":   [ "john@doe.com", "someone@else.com" ],
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n...."
}
````

Only pure email addresses are supported. It is not permitted to use display 
names or to put the addresses inside angle brackets.





## inlinecss

By setting this variable to true you enable the feature that your stylesheet will
be inlined.

The stylesheet (CSS) of your email is normally placed in the header of your HTML document.
However, some web based email clients strip out these HTML headers, and get rid of the
complete stylesheet of your email. To avoid this, SMTPeter can automatically inline
all CSS code. If you use this feature, the CSS stylesheet that was originally placed on
top of your HTML document, is transformed by SMTPeter into many different "style" attributes
for the individual tags. Even when the header gets removed by a web based email client,
your email message will still be displayed correctly.


## dsn

With the "dsn" variable you can set when and what delivery notification
messages you want to receive. These notification messages will be sent
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
bounce management in your [SMTPeter dashboard](SMTPeter/dashboard/bounce-management).

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

http://clicks.example.com/QogGwQIAgQQAg-path-of-the-uri

[Set up your click domain](https://www.smtpeter.com/app/#/admin/click-tracking "Set up your click domain").


## preventscam

When "preventscam" is set to true, links with a label equal to the link will
not be tracked. In order to track links the have to be rewritten as discussed
above. If the label of the url is equal to the url and the url is rewritten,
the link may look like a scam. I.e., the link points to something else
than what it displays. This may look like a scam. With "preventscam"
you avoid this type of behavior.


## openstracking

This starts by detecting if your sent message
is opened or not. SMTPeter's open tracking functionality can be used for this.
If you enable open tracking, SMTPeter tracks all opens of your email and
shows the statistics in the statistics overview of your SMTPeter dashboard.


## tags

When sending a message, you can opt to include one or more tags. This can be
a string with a single tag - or an array or strings if you wish to send the
message under multiple tags.

When one or more tags are included in the message every event that SMTPeter
detects will be logged under all these tags. This allows you to easily create
statistics segmented the way you want. Suppose you want to segment your statistics
both by the weeknumber and by the day of the week you had sent them, your tags
could be something like this:

```json
{
    "tags":    [ "week10", "monday" ]
}
```

For more information about statistics and how to retrieve them, see the
[documentation on the stats method](SMTPeter/rest/stats "documentation on the stats method").

