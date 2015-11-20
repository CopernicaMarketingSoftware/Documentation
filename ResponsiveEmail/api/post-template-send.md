# API method POST /v1/template/{ID}/send

With this method you can send a template that you previously stored. 
You must include the numeric ID of your template in the URL. Additionally there are several variables, 
that you can set as email data in your POST request:

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
is not included, the from address email will be set as envelope. Note that 
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
"inlineizecss":        When set to true, all CSS will be inlined inside the HTML
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

## Example request

```http
POST /v1/template/{ID}/send?access_token=yourtoken
Host: www.responsiveemail.com
Content-Type: application/json

{
    "envelope": "example@example.org",
    "recipient": "john@doe.com",
    "inlinecss": true,
    "clicktracking": false,
    "bouncetracking": true,
    "openstracking": false,
    "dsn": {
        "notify": "SUCCESS",
        "orcpt": "john@doe.com",
        "ret":  "HDRS",
    }
}
