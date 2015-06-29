# API method GET /v1/template/{ID}/mime

After you've stored a template on the `responsiveemail.com` servers, you
can retrieve the full MIME representation of it. The input JSON is converted
into a MMIE object, including both the HTML and text version, and all
attachments.

## Example request

```txt
GET /v1/template/2345/mime?access_token=yourtoken
Host: www.responsiveemail.com

HTTP/1.1 200 Ok
Date: Mon, 03 Nov 2014 16:46:59 GMT
Content-Type: multipart/mixed
Content-Length: 239872

Content-Type: text/html; charset="utf-8"
Content-Transfer-Encoding: quoted-printable
Mime-Version: 1.0
Subject: Responsive email.com example
From: Clayton <clayton@copernica.com>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN http://www.w3.org/T=
R/xhtml1/DTD/xhtml1-strict.dtd">=0A<html xmlns=3D"http://www.w3.org/1999/xh=
tml"><head><meta http-equiv=3D"content-type" content=3D"text/html; charset=
```


To help readability, we have left out most of the returned MIME code in
above example. Note that the HTTP protocol also returns data
in MIME format, so although it looks like you receive two headers, the
first header is the HTTP header, and the second header is part of the returned email.

## Personalization

In order to [personalize](copernica-docs:ResponsiveEmail/personalization) the output it's possible to
provide additional key-value pairs containing personalization data as parameters
to the GET request. Without these parameters an unpersonalized output will be returned.

## Related information

You can only retrieve the MIME code of templates that you created earlier with 
a POST call to the [/v1/template](copernica-docs:ResponsiveEmail/api/post-template) method.
