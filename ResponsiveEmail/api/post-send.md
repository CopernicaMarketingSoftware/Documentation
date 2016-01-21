# API method POST /v1/send

With this method you can send an email. There are several variables, 
that you should set as email data in your POST request:

## General data 

### Recipient and envelope

The most important and mandatory variable is the "recipient" variable. This variable controls where the email
is delivered and should therefore contain an email address. Note that this
email address should be **pure**. This means it should just contain the email
address without the name of the recipient or angle brackets ('<' and '>')
(i.e. it should state `richard@copernica.com` and not `"Richard" <richard@copernica.com>`).

If you want to send the same email to multiple email addresses you can do so by
setting "recipients" to an array of email addresses instead of one single address.

Another important variable, although not mandatory, is the "envelope" variable. 
If delivery fails, the email address given here will receive a delivery
status notification indicating the failure and the reason why. If this variable
is not included, it will be automatically set to 'noreply@smtpeter.com'. Note that 
just like the recipient variable the email address in the "envelope" should be 
**pure** as well. It is not possible to specify multiple "envelope" addresses.

The recipient and envelope variables control where the email is delivered ('recipient')
and where delivery failure notifications are sent to ('envelope'). They are like the
addresses written on the outside of an envelope, they do not influence the way the actual
letter (email), looks.

### Tracking

ResponsiveEmail also offers the following boolean variables (e.g. "variable": true/false),
which can be included in each POST request. Using these variables you can enable or disable
certain features. This makes it possible to use different settings for individual emails.

```text
"inlinecss":           When set to true, all CSS will be inlined inside the HTML
"clicktracking":       When set to true, links will be redirected and tracked
"bouncetracking":      When set to true, bounces will be tracked
"openstracking":       When set to true, opens will be tracked
```

These variables are optional and enabled by default, omitting a variable means it
will automatically be set to 'true'.

### DSN

You can specify in what cases you would like to receive a delivery status notification 
and what that notification should contain. It should be provided as an object with the following keys:

```text
"notify":           either "NEVER" or one or more of "FAILURE", "SUCCESS" and "DELAY", comma-separated
"orcpt":            The original recipient (defaults to the recipient address)
"ret":              Either "FULL" to receive the full message back or "HDRS" to receive just the headers
```


## Sending MIME data

The "send" method can both be used to send fully formatted MIME messages,
or to send many different fields so that ResponsiveEmail can generate the MIME
message for you. If you create the MIME message yourself, you need to
provide at least "recipient" and "mime" variables. 


## Sending non-MIME data

If the "mime" field is not included in the call to the REST API, ResponsiveEmail
will generate an email based on the settings of the following variables:

### From, to and cc

You may have noticed that we specify variables, such as "from" and "to" here. These might seem redundant, because
we have already specified the "recipient" and "envelope" addresses. However, these variables
do not control the actual delivery, but only the way the MIME looks. They same is valid for the "cc" variable.
Whereas "envelope" and "recipient" can be seen as the outside of an envelope, 
"from" and "to" can be seen as the address details that are put on the letter itself. 
The "cc" variable has to be a string or array containing the cc email addresses.

### Subject

You could specify the "subject". If not set, the email will be delivered without any subject.

### Text and HTML

You have to specify the "html" and "text" variables, too. These are the html and the text versions of the email.


## Example request

In the example below we've used JSON to format the entire email. You can of course
also submit already formatted MIME messages via the REST API and the "mime" variable.

```http
POST /v1/send?access_token=yourtoken
Host: www.responsiveemail.com
Content-Type: application/json

{
    "envelope": "example@example.org",
    "recipient": "john@doe.com",
    "subject":  "This is the subject",
    "html": "<html><head><style>body { font-weight: 600; }</style></head><body>Hello there!</body></html>",
    "text": "This is example content text",
    "from" : "example@example.org",
    "to": "john@doe.com",
    "cc": "john@doedoe.com",
    "inlinizecss": true,
    "clicktracking": false,
    "bouncetracking": true,
    "openstracking": false,
    "dsn": {
        "notify": "SUCCESS",
        "orcpt": "john@doe.com",
        "ret":  "HDRS",
    }
}

## Return data

After successfully posting your request, your message or messages will be sent.
Each sent message will get a unique ID to identify it. These unique IDs will
be returned to you as properties in a JSON encoded string. The value of each
property is the recipient of the message. The JSON looks like:

```json
{
    "id1" : "recipient1",
    "id2" : "recipient2",
    ...
}
```

If your post resulted in an error another JSON encoded string will be returned.
This JSON has a property "error" that holds another JSON object.
This object has the property "message", that holds the error message. E.g.:

```json
{
    "error": {
        "message": "Decide: recipient or recipients. Can't have both"
    }
}
```
