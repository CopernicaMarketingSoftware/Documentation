# API method POST /v1/embedded

With this method you can convert JSON directly into a MIME representation of an
email, without storing any data on the responsiveemail.com servers.

All the images that you've included images in your input JSON, either via 
[`image blocks`](/json/block-image) or via `<img>` 
tags inside [`html blocks`](/json/block-html),
will be downloaded by ResponsiveEmail.com, and will be embedded in the output mime.

In general, it is considered not to be a good practive to use embedded images. 
It makes the MIME output much larger, and your email will be more vulnerable to 
be blocked by spam and/or virus filters. You can therefore better use the 
[mime api call](../api/get-template-mime) to retrieve 
the MIME with the original image url's still intact.

## Example request

```http
POST /v1/embedded?access_token=yourtoken
Host: www.responsiveemail.com
Content-Type: application/json

{ "name" : "template..." }

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
tml"><head><meta http-equiv=3D"content-type" content=3D"text/html" charset=
```

To help readability, we have left out most of the returned MIME code in
above example. Also note that the HTTP protocol also returns data
in MIME format, so although it looks like you receive two headers, the
first header is the HTTP header and the second header is part of the returned email.
