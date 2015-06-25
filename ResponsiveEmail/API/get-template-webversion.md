# API method GET /v1/template/{ID}/webversion

After you've stored a template on the `responsiveemail.com` servers, you
can retrieve the web version representation of it. The input JSON is converted
into HTML code that you can host on a web server.

## Example request


````txt
    GET /v1/template/2345/web?access_token=yourtoken
    Host: www.responsiveemail.com

    HTTP/1.1 200 Ok
    Date: Mon, 03 Nov 2014 16:46:59 GMT
    Content-Type: text/html
    Content-Length: 239872

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml"><head> ....
````


To help readability, we have left out most of the returned HTML code in
above example.

## Personalization

In order to [personalize](/personalization) the output it's possible to
provide additional key-value pairs containing personalization data as parameters
to the GET request. Without these parameters an unpersonalized output
will be returned.

## Related information

Note that the returned HTML code is optimized for *web browsers*. If the template JSON contains [visibility properties](/support/json/property-visibility) that limit certain blocks to only be visible in an email, then these blocks will not be included in the returned HTML code. If you want to fetch the HTML version of an email optimized to use in email messages, use the [/v1/template/{ID}/html](/support/api/get-template-html) method instead.
