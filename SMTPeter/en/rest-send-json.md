# Send JSON data

SMTPeter can generate and send messages based on JSON input. The
properties in the JSON (like the subject and message body) are converted
into a valid email message and sent to the recipient. This feature is
especially useful if you do not want to bother about setting up a MIME
string yourself.

```json
POST /v2/send?access_token={YOUR_API_TOKEN} HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/json
Content-Length: 7391

{
    "recipient":    "john@doe.com",
    "subject":      "This is a test mail",
    "from":         "info@example.com",
    "text":         "This is the messge body...",
    "html":         "<html><head>..."
}
```

The following table lists all supported properties:

| Property           | Description                          |
|--------------------|--------------------------------------|
| from               | "From:" header                       |
| to                 | "To:" header                         |
| cc                 | "Cc:" header                         |
| replyto            | "Reply-To:" header                   |
| subject            | Subject of the mail                  |
| text               | Text version of the mail             |
| html               | HTML version of the mail             |
| unsubscribe        | The "list-unsubscribe" header        |
| extra              | Extra `x-\*` headers                 |
| attachments        | Attachments to be added to the mail  |


## Address format

The "from", "to", "replyto" and "cc" fields can be used to add email addresses to
the message header. The "from" variable must be a *single* email
address, while there is no limit to the number of addresses that you use
for the "to", "replyto" and the "cc" fields.

The notation for the email addresses in the "from", "to", "replyto" and "cc" fields
is very flexible: SMTPeter also recognizes display names and comma
separated lists of addresses.

```json
{
    "from": "info@example.com",
    "to": [
        "one@example.com",
        "two@example.com",
        "\"Number three\" <three@example.com>, info@example.com"
    ],
    "cc": "John Doe <johndoe@example.org>"
}
```

**Important:** the addresses in "from", "to", "replyto" and "cc" are not used for
the e-mail delivery. You need a special "recipient" property for this.
The "from", "to", "replyto" and "cc" are only used to create the content of the e-mail 
message, and it is thus in fact possible to create an e-mail with a
different to-address than the address to which the mail is sent. For more
information about this, check out the article on 
[setting up the recipients](./rest-send-multiple-recipients).


## Subject, text and HTML

The "subject", "text" and "html" properties can be used to set the
subject line of the email, and the text and HTML version. The properties
are self-explanatory.

```json
{
    "subject": "this is the subject line",
    "html": "<html> .... </html>",
    "text": "text version of the email"
}
```

## Unsubscribe header

If you want to add a "list-unsubscribe" header to your email, you can
add the JSON "unsubscribe" option. You can add either an URL or an email address, 
or both:

```json
{
    "subject": "this is the subject line",
    "html": "<html> .... </html>",
    "text": "text version of the e-mail",
    "unsubscribe": {
        "email": "unsubscribe@example.com",
        "url": "http://www.example.com"
    }
}
```

If your unsubscribe form complies with [RFC 8058](https://datatracker.ietf.org/doc/html/rfc8058), you can add the "one-click" option to the "unsubscribe" settings. When using this option, an additional "list-unsubscribe-post" header is added to the email. This allows receiving software to recognize that the unsubscribe page distinguishes between "one-click" unsubscribes and regular unsubscribes. Please note that if you choose to use this option, your website's unsubscribe page must indeed adhere to this specification. Unsubscribes received via HTTP POST should be processed without further interaction, while for unsubscribes via HTTP GET, it is allowed to first display a confirmation page.

It is highly recommended to use this option because some recipients, including gmail.com, take this into account for deliverability. However, you need to first modify your website to distinguish between HTTP POST unsubscribes and HTTP GET unsubscribes before adding the "one-click" option to the JSON.

```json
{
    "subject": "this is the subject line",
    "html": "<html> .... </html>",
    "text": "text version of the e-mail",
    "unsubscribe": {
        "url": "http://www.example.com",
        "oneclick": true
    }
}
```

## Extra "x-*" headers

The "extra" property can be used in case you want to add custom headers
to your email. To ensure that your custom headers do not conflict with
other headers, you may only add headers with a "x-*" prefix.

```json
{
    "subject": "this is the subject line",
    "html": "<html> .... </html>",
    "text": "text version of the email",
    "extra": {
        "x-my-identifier": "abcdefg",
        "x-custom-property": "custom"
    }
}
```


## Attachments

With the "attachments" property you can attach files to your mailing. SMTPeter
expects an array with JSON objects. There are two types of objects that are
supported. For one you provide a link to the attachment that you want
to send and for the other you provide the data in the JSON object itself.
If you provide the data in the JSON, this data has to be base64 encoded.
Moreover, you can optionally specify the type of data that you send.

```json
{
    "attachments": [
        {
            "url": "https://www.example.com/attachment1.pdf",
            "name": "attachment1.pdf",
            "type": "application/pdf"
        },
        {
            "data": "VGhpcyBpcyBqdXN0IGFuIGV4YW1wbGUgdGV4dCBmaWxlLi4=",
            "name": "test.txt",
            "type": "text/plain"
        }
    ]
}
```

If all information is provided in a correct format you will get a [reaction from the API](./rest-api-reaction).

## More information

* [REST API](./rest-api)
* [Send MIME data](rest-mime)
* [Send template based mails](rest-send-templates)
* [Advanced delivery options](rest-send-advanced)
