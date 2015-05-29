# API method GET /v1/templates/{start}/{length}

This method can be used to retrieve a list of your previously stored templates.
The start and length parameters are supported, when not supplied the default start value is 0 and the length value is 100.

## Example request

````txt
    GET /v1/templates/0/100/?access_token=yourtoken
    Host: www.responsiveemail.com

    HTTP/1.1 200 Ok
    Date: Mon, 03 Nov 2014 16:46:59 GMT
    Content-Type: application/json
    Content-Length: 145

    [
        {
            "id"    : 1,
            "name"  : "Test email"
        }
        {   "id"    : 2,
            "name"  : "Test 123"
        }
    ]
````

## Related information

You can only retrieve the templates which you have already stored with POST
calls to the <a href="/support/api/post-template">/v1/template</a> method.
