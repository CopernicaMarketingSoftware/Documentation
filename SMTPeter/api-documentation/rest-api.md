# REST API Overview

The SMTPeter API provides a powerful RESTful interface.
Which means that your application can access the API using
the HTTP protocol.

## API Access Token

Before you can send a request to our API you will need to
[create an API access token](copernica-docs:SMTPeter/dashboard/rest-api-token "Create REST API token documentation").
This token has to be added as a parameter to all of your API calls.

## API Endpoint

The SMTPeter REST API accepts POST and JSON data on its endpoint.

All API methods are accessed via:

```
https://www.smtpeter.com/v1/{METHOD}?access_token={YOUR_API_TOKEN}
```

 > **Note:** All API requests must use secure HTTPS connections. Unsecure
HTTP requests will result in a 400 Bad Request response.

## Sending email using the REST API

To send email with SMTPeter you will have to use the `send` method, which can be
accessed at:

```
https://www.smtpeter.com/v1/send?access_token={YOUR_API_TOKEN}
```

When sending a message through the API, it needs to contain **at least** the following
variables as well as the message itself:

```
"envelope":     string with a pure email address
"recipient":    string or array with a pure email address
```

If you do not include these variables in your request, you will receive an error and
the email will not be sent.

### Including your email message

The request should, of course, also contain your email message. SMTPeter offers two ways
to include your message when sending through our REST API:


* Add the variable "mime", followed by the full mime message.
* Submit the different parts of your message, such as the subject and the html parts.

If you want to use the mime variable, simply add the following variable to your request:

```
"mime":             string containing the full mime message
```

If you do not use the mime variable, but define the individual values you can do so by
adding the following variables:

```
"subject":          string containing the subject
"from":             string containing the sender (email address)
"to":               string or array containing recipients (email address)
"cc":               string or array containing the cc addresses (email address)
"text":             text version of the email
"html":             html version of the email
```

 >**Note:** The 'from', 'to' and 'cc' variables only state what the MIME
 looks like, not who the actual recipients of the email are. The email
 will be delivered to the email address stated in the 'recipient' variable
 and not necessarily to the addresses stated in the MIME headers. The email
 addresses stated in the 'to' and 'cc' variables will (often) be the same
 as the ones stated in the recipient variable.


These variables will then be converted to a full MIME message by SMTPeter.


### Additional variables for tracking and processing

SMTPeter also offers the following boolean variables (e.g. variable: true/false)
that can be sent with each request. Including these variables and setting them
to true or false will enable or disable the features for the email.

```
"inlinizecss":        When set to true, all CSS will be inlined inside the HTML
"clicktracking":      When set to true, links will be redirected and tracked
"bouncetracking":     When set to true, bounces will be tracked
"openstracking":      When set to true, opens will be tracked
```


### Handling bounces

If you provide a `bounce` variable in your request SMTPeter will notify you
if it was unable to deliver the message by sending a bounce report to the
given email address. Note that if the receiving mail daemon first accepts
the message and later decides it does not like it after all, this variable
will be ignored (as it is not sent to the receiving mailer daemon) and the
Return-Path or envelope address is likely used instead, depending on the
configuration of the mailer daemon.

The variables can be either provided as regular POST data, or they can be encoded in JSON. If you
use JSON, the content-type should be set to application/json.


### Envelope and recipient address notation

The email addresses stated in the envelope and recipient variables have to
be **pure** email addresses. That means they should just contain the email
address without the name of the recipient or angle brackets ('<' and '>')
(e.g. it should state 'richard@copernica.com' and not '"Richard" /<richard@copernica.com/>').

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


### PHP examples

The example below illustrates how you can send an email with SMTPeter using PHP and cURL.

```php
<?php
// access token
$token = "your-api-token";

// create curl resource
$curl = curl_init("https://www.smtpeter.com/v1/send?access_token={$token}");

$data = array(
    'recipient'     =>  'reciever@example.com',
    'envelope'      =>  'sender@example.com',
    'subject'       =>  'This is a test mail',
    'text'          =>  'This is the body of the text mail',
    'from'          =>  '"Peter" <sender@example.com>',
    'to'            =>  '"John" <reciever@example.com>'

);

// set options
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER      =>  1,
    CURLOPT_POST                =>  true,
    CURLOPT_POSTFIELDS          =>  json_encode($data),
    CURLOPT_HTTPHEADER          =>  array('content-type: application/json')
));

// $output contains the output string
$output = curl_exec($curl);

// clean up curl resource
curl_close($curl);
```
