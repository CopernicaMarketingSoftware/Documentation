# Send MIME data

The SMTPeter REST API can be used to send mails in many different forms.
The most pure one lets you send a MIME formatted message, where it is
your own responsibility to pass a correctly formatted message to
SMTPeter. The following example shows a very minimal API where just the
MIME message and the recipient is passed:

```json
POST /v1/send?access_token={YOUR_API_TOKEN} HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/json
Content-Length: 9827

{
    "recipient":    "john@doe.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n...."
}
```

To make the above example more readable, we cut down most of the mime
string. In reality this string is much, much longer. A mime string should
contain a header and a message body, separated by an empty line. Once extracted
from the JSON object, the MIME message could for example look like this:

```
MIME-Version: 1.0
From: <info@example.com>
To: "John Doe" <john@doe.com>
Subject: This is the subject line
Date: Thu, 23 May 2019 15:07:11 +0200
Content-Type: text/html

Hello John,

This is a very minimal e-mail message.

Cheers,

Peter
```

The above example shows just a simple MIME message. When you also want to 
include a HTML version of your mail, and/or attachments, or when you want to
use special character sets in your mail or in your message header, the message
would be more complex. 

The destination addess (john@doe.com in our example) often has to be specified
twice: as "recipient" property in the JSON, and also in the "to:" field of the
message header. This is a consequence of the e-mail protocol that allows
mails to be sent to other addresses then listed inside the mail (this is for
example how BCC works).


## Don't want to write MIME?

Writing your own MIME is optional, you can also pass in individual message 
properties. The MIME will then be built by SMTPeter.

```json
POST /v1/send?access_token={YOUR_API_TOKEN} HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/json
Content-Length: 7391

{
    "recipient":    "john@doe.com",
    "subject":      "This is a test mail",
    "from":         "info@example.com",
    "to":           "John Doe <john@doe.com>",
    "text":         "This is the message body...",
    "html":         "<html><head>..."
}
```

The above API call is essentially the same as the first example, but this
time the responsibility to generate the mail is passed on to SMTPeter. For
more information on the supported properties, check out our [JSON documentation](./rest-send-json). 


## Custom envelope address

In a minimal API call, you only have to provide the recipient and the MIME data.
SMTPeter takes care of the rest, including collecting the bounces and
out-of-office replies that are sent back to the envelope address. If you want
to do your own bounce-processing, you can add an *optional* envelope address:

```json
{
    "recipient":    "john@doe.com",
    "envelope":     "myaddress@example.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n...."
}
```

If you include an envelope address to collect bounces, you may also be interested
in passing a [DSN variable](rest-dsn) to finetune the type of bounces to receive.
The result of the send call is sent back in the [HTTP response](./rest-api-response).


