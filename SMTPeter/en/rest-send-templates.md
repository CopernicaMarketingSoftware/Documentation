# Sending templates

The SMTPeter dashboard has a drag-and-drop template editor. To send a mailing
based on a template from this editor, you should pass in the template ID to 
the send call. The following request tells SMTPeter to lookup template with 
ID 12, and use it for a mailing to john@doe.com.

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

Instead of template ID's, you can also pass the raw template source to the
API call. Check out [www.responsiveemail.com](https://www.responsiveemail.com)
for the full JSON specification for formatting emails:

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

        /* plus all other properties described on https://www.responsiveemail.com */
    }
}
```

Note that there is a difference in passing a nested template-property (like
we did above), and passing properties to the top document (see 
[send JSON data](./rest-send-json)): if you pass a template-property, the 
nested JSON must be formatted according to the specs from 
[www.responsiveemail.com](https://www.responsiveemail.com).


## Personalizing and changing templates

If you send out a mailing, you probably want to replace personalization
placeholders in it, or make (small) changes to the template to ensure
that the content is adapted to the receiver.

* [Personalized mailings](./rest-send-personalized)
* [Modify templates](./rest-send-modified)

