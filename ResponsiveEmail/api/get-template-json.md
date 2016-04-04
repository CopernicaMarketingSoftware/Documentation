# API method GET /v1/template/{ID}/json

This method can be used to retrieve the JSON representation of a template
that you previously stored. You must include the numeric ID of your
template in the URL.

## Example request

```http
GET /v1/template/1234/json?access_token=yourtoken
Host: www.responsiveemail.com

HTTP/1.1 200 Ok
Date: Mon, 03 Nov 2014 16:46:59 GMT
Content-Type: application/json
Content-Length: 192

{
    "subject" : "Test email",
    "from" : "info@example.com",
    "content" : {
        "blocks" : [ {
            "type" : "text",
            "source" : "Hello world!"
        } ]
    }
}
```

## Related information

You can only retrieve the JSON of template resources that you created with an 
earlier POST call to the [/v1/template](ResponsiveEmail/api/post-template) method.
