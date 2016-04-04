# Inline CSS

Some email clients (and especially web based email clients) do strange things
with your mail. The CSS style sheet in the HTML header of your carefully
constructed message might for example be removed or replaced, so that the
layout of your mail is ruined when it ends up in your recipient's inbox:

![Inlinize CSS](SMTPeter/Images/inlinecss.png "Inlinize CSS")

Many email programmers prevent this by using inline style
attributes in their HTML code instead of style blocks on top of the message.
SMTPeter can do this automatically.
 
Consider for example the following HTML code with a style block on top
of the HTML code:

```html
<head>
    <style>
     td {
        font-family: helvetica, sans-serif;   
     }
    </style>
</head>
```

If you send this message through SMTPeter and you have enabled SMTPeter's 
"inline-css" feature, the above message is automatically converted. The
CSS code from the style block is copied to the style attributes from all
matching HTML elements:

```html
<td style="font-family: helvetica; sans-serif;"></td>
```

There are a couple of ways to enable this feature, depending on whether 
you use the REST API or the SMTP API to inject emails into the SMTPeter 
service.


## Enabling inline CSS using the SMTP API

There are two ways to enable SMTPeter's inline CSS feature when using the 
SMTP API. The first one is to go to the SMTPeter dashboard and 
[create a new SMTP login](dashboard/smtp-credentials) that has this
feature enabled.

As you know, the SMTP protocol does not easily allow to pass parameters 
with each message. To overcome this, we allow you to create many different 
SMTP logins, each one with different features enabled. If you
want to automatically inlinize CSS, you just have to create a login with
this feature enabled, and use that login for your messages.

If you are in a position to change the MIME header of the email messages,
you can also enable the CSS inlinizer by adding a special MIME
header variable. If this header line is present in the mail, SMTPeter will
also transform the CSS code into style attributes.

```
x-smtpeter-inlinecss:   true
```

The MIME header will be stripped from the mail when the mail is sent to
the final recipient.


## Enabling inline CSS using the REST API

If you use the REST API to send emails through SMTPeter, you can add the 
"inlinecss" parameter to your POST variables or your JSON input. This tells 
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

In the above example we've used JSON to format the entire email. You can 
of course also submit regular POST data via the REST API.

