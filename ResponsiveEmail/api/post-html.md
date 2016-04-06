# API method POST /v1/html

With this method you can convert JSON directly into a HTML representation of an
email, without storing any data on the ResponsiveEmail.com servers.

## Example request

```http
POST /v1/html?access_token=yourtoken
Host: www.responsiveemail.com
Content-Type: application/json

{ "name" : "template..." }

HTTP/1.1 200 Ok
Date: Mon, 03 Nov 2014 16:46:59 GMT
Content-Type: text/html
Content-Length: 239872

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head> ....
```

To help readability, we have left out most of the returned HTML code in
above example.

## Related information

Note that the returned HTML code is optimized for *email clients*. If the template 
JSON contains [visibility properties](json/property-visibility) 
that limit certain blocks to only be visible in the web version of the mail, 
then these blocks will not be included in the returned HTML code. If you want to 
fetch the web version of an email, use the [/v1/webversion](api/post-webversion) 
method instead.
