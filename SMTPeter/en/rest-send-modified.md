# Send modified templates

When you send a mailing based on a template, you may want to make
small changes to it to adapt the mailing to the receiver. For example,
you can change the subject line, from address or add one or
more attachments to the mail. This can all be achieved through JSON
patches and a couple of custom convenience properties.


## JSON patches

Templates are implemented as JSON documents. If you pass a "patch" property
to your call, the patch will be applied to the JSON document before the
document is sent:


```json
POST /v1/send?access_token={YOUR_API_TOKEN} HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/json
Content-Length: 67

{
    "recipient":    "john@doe.com",
    "template":     12,
    "patch": [
        {
            "op":           "replace",
            "path":         "/subject",
            "value":        "Alternative subject"
        },
        {
            "op":           "replace",
            "path":         "/from/name",
            "value":        "Alternative from name"
        }
    ]
}
```

The patch is a JSON array, holding all the changes that you want to 
make to the template. See the [JSON patch](http://www.jsonpatch.com)
specification for an overview of the supported operations.


## Simple operations

The patches described above offer a very powerful API to make changes
to the template before it is sent. However, it can be a little complex
at first sight. We have therefore also some convenience properties for
popular operations:

- subject
- text
- from
- replyTo
- to
- cc
- headers
- attachments

If you add one of the above properties to your JSON, it will be directly
copied to your template:

```json
POST /v1/send?access_token={YOUR_API_TOKEN} HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/json
Content-Length: 116

{
    "recipient":    "john@doe.com",
    "template":     12,
    "subject":      "alternative subject line",
    "from":         "Sender Name <info@example.com>"
}
```

With the example above you send a mailing based on template 12, but with a 
different subject and different from address than were set in the template.
It's also possible to add attachments to a mailing:

```json
POST /v1/send?access_token={YOUR_API_TOKEN} HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/json
Content-Length: 202

{
    "recipient": "john@doe.com",
    "template": 12,
    "attachments": [{
        "data": "base64-encoded data",
        "name": "attachment.pdf",
        "type": "application/pdf"
    }]
}
```

Or if you want SMTPeter to download the attachment for you:

```json
POST /v1/send?access_token={YOUR_API_TOKEN} HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/json
Content-Length: 152

{
    "recipient": "john@doe.com",
    "template": 12,
    "attachments": [{
        "url": "http:://example.com/path/to/document.pdf",
    }]
}
```

