# REST API Overview

SMTPeter provides a powerful REST API. With this REST API you can communicate
with SMTPeter using the HTTPS protocol. The API allows you to send an instruction
to SMTPeter and add some extra data to which the instruction should be applied to.
When SMTPeter receives your instruction and the added data, it will take care of it.


## API Access Token

To use the REST API you will need to [create an API access token](https://www.smtpeter.com/app/#/admin/api/rest-token "create a rest token")
in your SMTPeter dashboard. This token is used to authenticate your instructions
to SMTPeter. Therefore, you have to include this token in all your REST API
calls to SMTPeter. Since this token is used for authentication, you should
keep it private. For this reason you also communicate with SMTPeter via
HTTPS so that the communication with SMTPeter is secure. You can create
a new access token, if you need to, on the same page in your SMTPeter dashboard.
After having created a new access token the old access token is revoked.


## API Endpoint

You can reach SMTPeter on the following endpoint:

```
https://www.smtpeter.com/v1/{METHOD}?access_token={YOUR_API_TOKEN}
```

where `{METHOD}` contains the name of the method (e.g. `send`
if you want to send an email) and `{YOUR_API_TOKEN}` contains the API access
token you have created for authenticating your instruction.

> **Note:** All API requests must use secure HTTPS connections. Unsecured
HTTP requests will result in a '400 Bad Request' response.

Besides giving an instruction to SMTPeter, you probably want to add data 
to this instruction as well; e.g. the email information if you want to send
an email. There are two ways to provide this information to the REST API.
The first one is by using regular POST data. This is the same as when you
have your browser POST a form (see our examples page on how to POST over https @todo add page).

Example:
```text
POST /v1/send?access_token={YOUR_API_TOKEN} HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/x-www-form-urlencoded
Content-Length: 148

envelope=info%40example.com&recipient=john%40doe.com&subject=this+is+the+subject&html=This+is+example+text&from=info%40example.com&to=john%40doe.com
```
As you can see `Host` and `POST` form your endpoint and `Content-Type`, `Content-Length`, and
the bottom string form the data.

The other way to send data to the REST API is to JSON-encode your input. 
Please be aware that for this to work, you must set the 'Content-Type' to 'application/json' (see our
example page for an example on how to do this @todo add link).

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
Again, `host` and `POST` form the endpoint. `Content-Type`, `Content-Lenght`,
and the JSON now form the data. Note that `Content-Type` is set to `application/json`
as an indication that the actual data is JSON formatted.


## Sending email using the REST API

To send email using the REST API you call the `send` method. This method
can be called by using the endpoint as discussed above and use for `{METHOD}`
`send`:

```text
https://www.smtpeter.com/v1/send?access_token={YOUR_API_TOKEN}
```

Besides calling the `send` method you also have to provide the data for the
email.

### Recipient and envelope

There are several variables in email data. The most important and mandatory
variable is the "recipient" variable. This variable controls where the email
is delivered and should therefore contain an email address. Note that this
email address should be **pure**. This means it should just contain the email
address without the name of the recipient or angle brackets ('<' and '>')
(i.e. it should state `richard@copernica.com` and not `"Richard" <richard@copernica.com>`).

If you want to send the same email to multiple email addresses you can do so by
setting "recipient" to an array of email addresses instead of one single address.
Note that it really should be an array and not a comma separated list.

```json
{
"recipient": [
                "one@example.com",
                "two@example.com, three@example.com",
                "..."
              ]
}
```

Another important variable, although not mandatory, is the "envelope" variable. 
If delivery fails and bounce tracking is disabled, the email address given here will receive a delivery
status notification indicating the failure and the reason why. If this variable
is not set and bounce tracking is disabled, delivery notifications will be silently
ignored (more on bounce tracking is discussed below). Note that just like the recipient variable the
email address in the "envelope" should be **pure** as well. Unlike recipient
it is not possible to specify multiple "envelope" addresses.

The recipient and envelope variables control where the email is delivered ('recipient')
and where delivery failure notifications are sent to ('envelope'). They are like the
addresses written on the outside of an envelope, they do not influence the way the actual
letter (email), looks.



### Including the message content

Besides the variables "recipient" and "envelope", you have variables that
determine the way the message looks. These message variables are:

```text
"subject":          string containing the subject
"from":             string containing the sender (email address)
"to":               string or array containing recipients (email address)
"cc":               string or array containing the cc addresses (email address)
"text":             text version of the email
"html":             html version of the email
```

You may have noticed that we specify variables, such as "from" and "to" here. These might seem redundant, because
we have already specified the "recipient" and "envelope" addresses. However, these variables
do not control the actual delivery, but only the way the MIME looks. Whereas
"envelope" and "recipient" can be seen as the outside of an envelope, 
"from" and "to" can be seen as the address details that are put on the letter
itself. 

The "from" variable has to contain a **single** email address, just like the
variable "envelope". However,
the notation here is more flexible than the 'recipient' and 'envelope'
variables. The 'from' variable may contain a name in front of the address
as well as angle brackets ('<' and '>').

The "to" and "cc" variables are even more flexible. Just like the "from" variable
they may contain a name and angle brackets. They even
may contain multiple addresses. These can be added in the same way as for
the "recipient" variable, i.e. in an array. Yet, comma separated addresses
are also allowed:

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

Again, the "from", "to", and "cc" variables are not used to determine
the recipients of the email and only to determine the MIME layout. Most users
will use the same values as the ones stated in the "envelope" and "recipient"
variables.

By sending the above listed variables to SMTPeter, SMTPeter will turn
them into a full MIME message. If you have already created the MIME message
yourself, you can pass the MIME message instead of the individual variables.
You can do this via the MIME variable:

```text
"mime":             string containing the full mime message
```

## Bounced emails and bounce tracking.

When you correctly send a message to SMTPeter, SMTPeter will
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


SMTPeter can do the bounce tracking for you, however, you can do it also
yourself by disabling the bounce tracking functionality. If you want to
handle the bounces yourself, you have to make sure that you set the
"envelope" variable in the email data. If you do not set the "envelope" variable
and you do not use SMTPeters bounce tracking, all bounces will silently be
ignored.

If you have set the "envelope" variable, you can specify in what cases you would like
to receive a delivery status notification and what that notification should contain.
It should be provided as an object with the following keys:

```text
"notify":           either "NEVER" or one or more of "FAILURE", "SUCCESS" and "DELAY", comma-separated
"orcpt":            The original recipient (defaults to the recipient address)
"ret":              Either "FULL" to receive the full message back or "HDRS" to receive just the headers
```

Note that this variable is separate from the ['trackbounces' option](#tracking-options). It is
possible to set 'trackbounces' to true and have SMTPeter generate a bounce
report after receiving notification of a bounce. This report will always go
to the address configured under 'Bounce management'.

The envelope, recipient and dsn variables:
```text
"envelope":         string with a pure email address
"recipient":        string or array with a pure email address
"dsn":              object containing the keys "notify", "orcpt" and "ret"
```




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
can set up your bounce management in your [SMTPeter dashboard](copernica-docs:SMTPeter/dashboard/bounce-management).

If you choose to set up a forward address, SMTPeter will forward all bounces after they have been
processed. You can then process the bounces further in your own application. Do note that if you
send email to a lot of recipients at the same time this could fill up the mail box of this address
quite quickly.

It is also possible to forward the bounce message to a 'webhook'. You can specify the
callback url for the webhook in the SMTPeter dashboard. SMTPeter will send the bounce report to
the callback url as a POST request. The bounce message will be sent as a JSON document.








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



<!--

## Examples

@todo example

-->


<!--
Rest documentation in other place 
## Enabling inline CSS using the REST API

If you use the REST API to send emails through SMTPeter, you either submit 
plain HTTP POST variables, or JSON documents. If you set the "inlinecss" 
parameter in these POST variables or in the JSON input to "true", you tell 
SMTPeter to enable the inlinizer.

```txt
POST /send HTTP/1.1
Content-Type: application/json
Content-Length: 302

{
    "envelope": "example@example.org",
    "recipient": "john@doe.com",
    "subject": "example subject",
    "to": "john@doe.com",
    "from": "example@example.org",
    "html": "<html><head><style>body { font-weight: 10pt; }</style></head><body>Hello there!</body></html>",
    "inlinecss": true
}
```

In the above example we've used JSON to format the entire email. You can of course
also submit already formatted MIME messages via the REST API.


-->
