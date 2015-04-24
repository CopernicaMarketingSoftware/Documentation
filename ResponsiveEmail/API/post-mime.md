# API method POST /v1/mime

With this method you can convert JSON directly into a MIME representation of an
email, without storing any data on the responsiveemail.com servers.

## Example request

    POST /v1/mime?access_token=yourtoken
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
    tml"><head><meta http-equiv=3D"content-type" content=3D"text/html; charset=

To help readability, we have left out most of the returned MIME code in
above example. Also note that the HTTP protocol also returns data
in MIME format, so although it looks like you receive two headers, the
first header is the HTTP header and the second header is part of the returned email.
