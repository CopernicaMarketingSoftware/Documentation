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

 > **Note:** All API requests must use secure HTTPS connections. Unsecure
HTTP requests will result in a 400 Bad Request response.

You can provide either HTTP POST variables or JSON documents to the 
SMTPeter API endpoint. Make sure to set the 'content-type' header to 
the correct type, else the content cannot be read. 

For HTTP POST variables:
```text
POST /v1/send?access_token={YOUR_API_TOKEN} HTTP/1.0 
Host: www.smtpeter.com
Content-Type: application/x-www-form-urlencoded
Content-Length: ...

``` 
For JSON variables:
```text
POST /v1/send?access_token={YOUR_API_TOKEN} HTTP/1.0 
Host: www.smtpeter.com
Content-Type: application/json
Content-Length: ...
```

## Sending email using the REST API

To send email using the REST API you will have to use the 'send' method. 
This method can be accessed at:

```text
https://www.smtpeter.com/v1/send?access_token={YOUR_API_TOKEN}
```

When sending a message using there REST API there are several variables that 
an email **must** contain. These are the envelope variable with the envelope 
email address, the recipient variable, with the recipient's email address and 
the message itself. 

There are two ways to include the message, you can either 
include the "mime" variable followed by a full mime string or provide "html", 
, "subject", text", "to" and "cc" variables, SMTPeter will then turn these 
loose variables into a full MIME message. 


The envelope and recipient variables: 
```text
"envelope":         string with a pure email address
"recipient":        string or array with a pure email address
```

The MIME variable:
```text
"mime":             string containing the full mime message
```

Or defining individual message variables:

```text
"subject":          string containing the subject
"from":             string containing the sender (email address)
"to":               string or array containing recipients (email address)
"cc":               string or array containing the cc addresses (email address)
"text":             text version of the email
"html":             html version of the email
```

The 'from', 'to' and 'cc' variables only state what the MIME
looks like, not who the actual recipients of the email are. The email
will be delivered to the email address stated in the 'recipient' variable
and not necessarily to the addresses stated in the MIME headers. The email
addresses stated in the 'to' and 'cc' variables will (often) be the same
as the ones stated in the recipient variable.



### Additional variables for tracking and processing

SMTPeter also offers the following boolean variables (e.g. "variable": true/false), 
which can be included in each POST request. Including these variables and setting them
to true or false will enable or disable the features for the email. This makes it possible 
to use different settings for individual emails. The variables can be either provided as 
regular POST data, or they can be encoded in JSON. If you use JSON, the content-type should 
be set to application/json.


```text
"inlinecss":        When set to true, all CSS will be inlined inside the HTML
"trackclicks":      When set to true, links will be redirected and tracked
"trackbounces":     When set to true, bounces will be tracked
"trackopens":       When set to true, opens will be tracked
```

These variables are optional and disabled by default, not inluding a variable means it 
will automatically be set to 'false'. 



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
