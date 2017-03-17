# REST API Overview

SMTPeter provides a powerful REST API using the HTTPS protocol. The 
REST API can be used as an alternative to the SMTP API to inject email,
but it also supports many methods and options that are not supported
with SMTP (like retrieving statistics, or submitting email in JSON
format).

You can only use HTTPS connections. Unsecure HTTP requests are not
accepted and will result in a '400 Bad Request' response. To access 
the REST API you need an API access token, which can be created using 
the SMTPeter dashboard.


## REST vs SMTP

To send mail to SMTPeter, you can use both the REST and the SMTP API.
However, if you have the choice, we recommend the REST API, because
it is much more powerful than SMTP, supports way more features, and
the REST protocol is also much less chatty than SMTP: you don't have to
go through the entire SMTP handshake before a message is passed from
one server to the other.


## Error handling

If you submit invalid data, or in case of other errors, the REST API
returns a regular [HTTP error code](https://nl.wikipedia.org/wiki/Lijst_van_HTTP-statuscodes)
and a textual description of what went wrong. Successful calls always
return a status code in the "200" range ("200" up to "202").


## Examples

For many programming languages we have example scripts and classes 
that you can use to connect to the REST API, so that you do not have to 
program the low-level API calls yourself, and can use our examples 
instead.

* [PHP example](php-example)
* [Python example](python-example)


