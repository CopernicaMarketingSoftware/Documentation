# Inline CSS

The style (CSS) of your email is normally placed in the header of your HTML document, 
however some email clients strip out the email headers, and remove the complete style 
sheet of your email and ruin your layout. 

To avoid this, SMTPeter can automatically inlinize all CSS code. This transforms the 
styles in your header to style attributes in the HTML tags. 


Example:

```html
<head>
    <style>
     td {
        font-family: helvetica, sans-serif;   
     }
    </style>
</head>

```

Turns into:


```html
<td style="font-family: helvetica; sans-serif;"></td>

```

There are a couple of ways to enable this feature, depending on whether you
use the REST API or the SMTP API to inject emails into the SMTPeter service.


## Enabling inline CSS using the SMTP API

There are two ways to enable SMTPeter's inline CSS feature when using the 
SMTP API. The first one is to go to your SMTPeter dashboard and 
[create a new SMTP login](copernica-docs:SMTPeter/dashboard/smtp-credentials).
As you probably know, the SMTP protocol does not easily allow to pass
parameters with each message. To overcome this, we allow you to create
many different SMTP logins, each one with different features enabled. If you
want to automatically inline CSS, you just have to create a login with
this feature enabled, and use that login for sending your messages.

If you are in a position to change the MIME bodies of the email messages,
you can also enable the CSS inlinizer by adding a single special MIME
header variable. If this header line is present in the mail, SMTPeter will
also transform the CSS header into style attributes.

```
x-smtpeter-inlinecss:   true
```

The MIME header will be stripped from the mail when the mail is sent to
the final recipient.


## Enabling inline CSS using the REST API

If you use the REST API to send emails through SMTPeter, you either submit 
plain HTTP POST variables, or JSON documents. If you set the "inlinecss" 
parameter in these POST variables or in the JSON input to "true", you tell 
SMTPeter to enable the inlinizer.

```http
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
