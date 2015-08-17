# REST API Overview

SMTPeter provides a powerful REST API. The SMTPeter REST API uses
the HTTPS protocol, which is faster and more flexible than the
SMTP protocol.

## API Access Token

To use the REST API you will need to [create an API access token](copernica-docs:SMTPeter/dashboard/rest-api-token "Create REST API token documentation")
in your SMTPeter dashboard. You have to include this token in all
of your REST API calls to SMTPeter.

## API Endpoint

You can reach SMTPeter on the following endpoint:

```
https://www.smtpeter.com/v1/{METHOD}?access_token={YOUR_API_TOKEN}
```

 > **Note:** All API requests must use secure HTTPS connections. Unsecured
HTTP requests will result in a '400 Bad Request' response.

There are two ways to provide imput variables to the REST API. The first one
is by using regular POST data. This is the same as when you have your browser
POST a form.

Example:
```text
POST /v1/send?access_token={YOUR_API_TOKEN} HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/x-www-form-urlencoded
Content-Length: 148

envelope=info%40example.com&recipient=john%40doe.com&subject=this+is+the+subject&html=This+is+example+text&from=info%40example.com&to=john%40doe.com

```
The other way is to JSON-encode your input. Please be aware that for this
to work, you must set the 'Content-Type' to 'application/json'.

Example:
```text
POST /v1/send?access_token={YOUR_API_TOKEN} HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/json
Content-Length: 246

{
    "envelope":     "info@example.com",
    "recipient":    "john@doe.com",
    "subject":      "This is the subject",
    "html":         "This is example content",
    "from":         "info@example.com",
    "to":           "john@doe.com"

}

```

## Sending email using the REST API

To send email using the REST API you will have to use the 'send' method.
This method can be accessed at:

```text
https://www.smtpeter.com/v1/send?access_token={YOUR_API_TOKEN}
```

### Recipient and envelope information

The recipient and envelope variables control where the email is delivered ('recipient')
and where delivery failure notifications are sent to ('envelope'). They are like the
addresses written on the outside of an envelope, they do not influence the way the actual
letter (email), looks.

When sending a message using the REST API there is one variable that
an email **must** contain. This is the recipient address that will
receive the message.

Another variable you can use is the "envelope" variable. If delivery fails and
bounce tracking is disabled, the email address given here will receive a delivery
status notification indicating the failure and the reason why. If this variable
is not set and bounce tracking is disabled, delivery notifications will be silently
ignored.

Note that this variable is separate from the ['trackbounces' option](#tracking-options). It is
possible to set 'trackbounces' to true and have SMTPeter generate a bounce
report after receiving notification of a bounce. This report will always go
to the address configured under 'Bounce management'.

The envelope and recipient variables:
```text
"envelope":         string with a pure email address
"recipient":        string or array with a pure email address
```

### Including the message content

The variables below specify the actual content of the email message. You might notice
that we specify variables, such as 'from' and 'to' here. These might seem redundant, because
we have already specified the 'recipient' and 'envelope' address. However, these variables
do not control the actual delivery, but only the way the MIME looks. 

There are two ways to include the message content. You can either
include the "mime" variable followed by a full mime string or provide "html",
"subject", "text", "to" and "cc" variables, SMTPeter will then turn these
separate variables into a full MIME message.

The MIME variable:
```text
"mime":             string containing the full mime message
```

Defining individual message variables:

```text
"subject":          string containing the subject
"from":             string containing the sender (email address)
"to":               string or array containing recipients (email address)
"cc":               string or array containing the cc addresses (email address)
"text":             text version of the email
"html":             html version of the email
```


###<a name="tracking-options"></a> Additional variables for tracking and processing

SMTPeter also offers the following boolean variables (e.g. "variable": true/false),
which can be included in each POST request. Using these variables you can enable or disable
certain features. This makes it possible to use different settings for individual emails.


```text
"inlinecss":        When set to true, all CSS will be inlined inside the HTML
"trackclicks":      When set to true, links will be redirected and tracked
"trackbounces":     When set to true, bounces will be tracked
"trackopens":       When set to true, opens will be tracked
```

These variables are optional and enabled by default, omitting a variable means it
will automatically be set to 'true'.



### Envelope and recipient address notation

The email addresses stated in the envelope and recipient variables have to
be **pure** email addresses. That means they should just contain the email
address without the name of the recipient or angle brackets ('<' and '>')
(e.g. it should state `richard@copernica.com` and not `"Richard" <richard@copernica.com>`).

The envelope variable should only contain a single email address.

### Adding multiple email addresses

It is possible to add multiple recipients by adding an array with multiple email addresses.
The email addresses have to be stored in an array, they cannot be comma-separated.

Examples:

```json
{
"recipient": [
                "one@example.com",
                "two@example.com, three@example.com",
                "..."
              ]
}
```

### Email address notation for other variables

The 'from' variable has to contain a **single** email address. However,
the notation here is more flexible than the 'recipient' and 'envelope'
variables. The 'from' variable may contain a name in front of the address
as well as angle brackets ('<' and '>')

The 'to' and 'cc' variables are even more flexible. Like the 'from' variable
they may contain a name and angle brackets. Unlike the 'from' variable they
may contain multiple addresses. These can be added in the same way as
the 'recipient' variable, but also allow comma separated addresses:

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

Again, the 'from', 'to' and 'cc' variables are not actually used to determine
the recipients of the email and only to determine the MIME layout. Most users
will use the same values as the ones stated in the 'envelope' and 'recipient'
variables.



<!--

## Examples

@todo example

-->
