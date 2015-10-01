# Property attachments

The ResponsiveEmail.com API allows you to add attachments to your emails. Attachments
are defined in the MIME properties and will therefore only show when the
[MIME version](/support/api/get-template-mime "API method to get MIME version")
of your email is retrieved. Attachments are stored in an array, which makes
it possible to add as many attachments to an email as you want. You can either place
the data of your attachment directly in the json (base64 encoded) or you provide an url
to your data.

## Background properties

| Property | Value | Description                                                                                                                 |
|:---------|-------|-----------------------------------------------------------------------------------------------------------------------------|
| url | _string_ | Url to your data, this will be downloaded and included                                                                        |
| data | _string_ | The raw data of your attachment, this has to be base64 encoded                                                               |
| name | _string_ | The name for your attachment, this will be visibile in most email clients                                                    |
| type | _string_ | The content type for this file, this is ignored in case you provide your attachment by url as it'll look at the http headers |

## Example Code

```javascript
{
    "from" : "info@example.com",
    "subject" : "Here are some example attachments",
    "attachments": [ {
        "url": "https://www.example.com/attachment1.pdf",
        "name": "example-1.pdf"
    }, {
        "data": "VGhpcyBpcyBqdXN0IGFuIGV4YW1wbGUgdGV4dCBmaWxlLi4=",
        "name": "test.txt",
        "type": "text/plain"
    } ],
    "background": {
        "color": "#f3f3f3"
    },
    "content": {
        "blocks": [ {
            "type": "text",
            "content": "This is example text"
        }, {
            "type": "image",
            "src": "http://www.example.com/example.jpeg"
        } ]
    }
}
```
