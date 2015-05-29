# API method GET /v1/template/{ID}/html

After you have stored a template on the ResponsiveEmail.com servers, you
can retrieve the HTML representation of it. The input JSON is converted
into HTML code that can be sent over SMTP.

## Example request


````txt
    GET /v1/template/2345/html?access_token=yourtoken
    Host: www.responsiveemail.com

    HTTP/1.1 200 Ok
    Date: Mon, 03 Nov 2014 16:46:59 GMT
    Content-Type: text/html
    Content-Length: 239872

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml"><head> ....
````


To improve readability, we have left out most of the returned HTML code in
above example.

## Personalization

In order to [personalize](/personalization) the output it's possible to
provide additional key-value pairs containing personalization data as parameters
to the GET request. Without these parameters an unpersonalized output
will be returned.

## Related information

You can only retrieve the HTML code of templates that you
created earlier with a POST call to the <a href="/support/api/post-template">/v1/template</a>
method.

Note that the returned HTML code is optimized for *email clients*. If the
template JSON contains <a href="/support/json/property-visibility">visibility properties</a>
that limit certain blocks to only be visible in the web version of
the email, then these blocks will not be included in the returned HTML
code. If you want to fetch the web version of an email, use the
<a href="/support/api/get-template-webversion">/v1/template/{ID}/webversion</a> method
instead.
