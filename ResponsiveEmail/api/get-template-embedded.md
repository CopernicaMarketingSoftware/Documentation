# API method GET /v1/template/{ID}/embedded

After you've stored a template on the `responsiveemail.com` servers, you
can retrieve the full MIME representation of it. The input JSON is converted
into a MIME object, including both the HTML and text version, and all
attachments.

All the images that you've included images in your email, either via 
[`image blocks`](../json/block-image)
or via `<img>` tags inside [`html blocks`](../json/block-html),
will be downloaded by `responsiveemail.com`, and will be embedded in the output mime.

In general, it is considered not to be a good practice to use embedded images. 
It makes the MIME output much larger, and your email will be more vulnerable 
to be blocked by spam and/or virus filters. For this reason it's better use the 
[mime api call](../api/get-template-mime) to retrieve
the MIME with the original image url's still intact.

## Example request

```http
GET /v1/template/2345/embedded?access_token=yourtoken
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

## Related information

You can only retrieve the MIME code of templates that you created earlier with
a POST call to the [/v1/template](../api/post-template) method.
