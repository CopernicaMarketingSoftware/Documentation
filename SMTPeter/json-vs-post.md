# REST API Overview

SMTPeter provides a powerful REST API using the HTTPS protocol. The 
REST API can be used as an alternative to the SMTP API to inject email,
but also supports many methods and options that are not possible
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


## Examples

For many programming languages we have example scripts and classes 
that you can use to connect to the REST API, so that you do not have to 
program the low-level API calls yourself, and can use our examples 
instead.

* [PHP example](php-example)
* [Python example](python-example)



Sending data in JSON format is slightly more powerful than sending
traditional POST data, because JSON allows you to send deeper nested
data. The results that are sent back by SMTPeter are always JSON formatted, except when retrieving the text
or HTML from a message and no error occurs (when an error occurs, a JSON document is always sent back, with
the error property indicating the cause of the problem).


### Example API call

The following code shows an example communication between a client
application and SMTPeter. For this example, we have truncated the
data that is actually sent. If you send the following data to the REST API of
SMTPeter:

```text
POST /v1/send?access_token=YOUR_API_TOKEN HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/x-www-form-urlencoded
Content-Length: 1484

envelope=info%40example.com&recipient=....
```

You will receive and answer somewhat similer to the following output.
The `send` instruction results in a simple integer telling you that
the mail was correctly sent:

```
@todo include other headers
Content-Type: application/json
Content-Length: 1

1
```


The other way to send data to the REST API is to JSON-encode your input.
This works essentially the same as sending traditional form data, but
you must of course set the 'Content-Type' to 'application/json':

```text
POST /v1/send?access_token={YOUR_API_TOKEN} HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/json
Content-Length: 246

{
    "envelope":     "info@example.com",
    "recipient":    "john@doe.com",
    "subject":      "This is the subject",
    "html":         "This is example content",
    "from":         "info@example.com",
    "to":           "john@doe.com"
}
```
