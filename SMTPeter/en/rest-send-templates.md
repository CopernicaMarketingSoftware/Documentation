# Sending templates

The SMTPeter dashboard has a drag-and-drop template editor. To send a mailing
based on a template from this editor, pass in the template ID or name to 
the API send call. The following request tells SMTPeter to lookup template 12, 
and use it for a mailing to john@doe.com.

```json
POST /v1/send?access_token={YOUR_API_TOKEN} HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/json
Content-Length: 67

{
    "recipient":    "john@doe.com",
    "template":     12
}
```

Templates can be identified by their unique numeric identifier (in our example: 
12) or by their name (which is a string). Besides the template identifier, 
you also have to send the recipient address with your call to the API
("john@doe.com" in the example). This is the address to which the mail is to be sent.
Other properties are supported too, but they are all optional.

Internally, all templates are stored as JSON documents, formatted according
to the specifications published on [www.responsiveemail.com](https://www.responsiveemail.com).
Although the easiest way to send mailings based on templates is to use our 
drag-and-drop editor, and refer in your API call to the template name or ID,
you can also create your templates "by hand" and pass the full JSON source
to the API call:

```json
POST /v1/send?access_token={YOUR_API_TOKEN} HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/json
Content-Length: 1297

{
    "recipient":    "john@doe.com",
    "template":     {
        "from":         "jane@doe.com",
        "subject":      "this is the subject"
        ...
        /* plus other properties described on https://www.responsiveemail.com */
    }
}
```

For more information on how to format this nested JSON object, check out the 
documentation on [www.responsiveemail.com](https://www.responsiveemail.com). It's
a pretty powerful system that allows you to specify the buttons, links, images 
and texts that should be placed in the mail.


## Personalizing and changing templates

If you send out a mailing based on a template, you probably want to replace 
personalization placeholders in it, or make (small) changes to the template to 
ensure that the content is adapted to the receiver. There are two ways to do that,
by sending extra data with your API call to fill in placeholders like {$name} and 
{$salutation}, and by sending patch-instructions with your API 
call.

```json
POST /v1/send?access_token={YOUR_API_TOKEN} HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/json
Content-Length: 653

{
    "recipient":   "john@doe.com",
    "template":     12,
    "data":         {
        "firstname"  : "John",
        "familyname" : "Doe",
        "children"   : ["Jane", "Joe", "Jacky", "Josef"]
    },
    "patch":        [ 
        {
            "op":           "replace",
            "path":         "/subject",
            "value":        "Alternative subject"
        },
        {
            "op":           "replace",
            "path":         "/from",
            "value":        {
                "name":     "Alternative from name",
                "address":  "info@example.com"
            }
        }
    ]
}
```

In above example we use both technologies to personalize the mail: we
pass in extra [personalization variables](./rest-send-personalize) to fill 
the {$firstname}, {$familyname} and {$children} placeholders, and we 
[pass a "patch" property](./rest-send-modified) to make changes to the 
template.

