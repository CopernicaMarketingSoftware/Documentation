# API method GET /v1/template/{ID}/text

After storing a template on the ResponsiveEmail.com servers, you can retrieve the plain text representation using this method.
This will simply return the [text property](/support/json/property-text).

## Example request


```txt
    GET /v1/template/2345/text?access_token=yourtoken
    Host: www.responsiveemail.com

    HTTP/1.1 200 Ok
    Date: Mon, 03 Nov 2014 16:46:59 GMT
    Content-Type: text/plain
    Content-Length: 38

    This is the text version of the email.
```


## Personalization

In order to [personalize](/personalization) the output it's possible to
provide additional key-value pairs containing personalization data as parameters
to the GET request. Without these parameters an unpersonalized output
will be returned.

## Related information

You can only retrieve the text version of templates that you created earlier with a POST call to the [/v1/template](/support/api/post-template) method.
