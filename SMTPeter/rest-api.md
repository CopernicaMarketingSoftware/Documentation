# REST API Overview

SMTPeter provides a powerful REST API. With this REST API you can communicate
with SMTPeter using the HTTPS protocol. The REST API is ofter faster than
the SMTP protocol (because you don't need the full SMTP handshake between
the server and the client), and it is more powerful because you can send
all sorts of parameters with each calls.


## API Endpoint

To use the REST API you need an API access token, which can be created via the
SMTPeter dashboard. This token is used to authenticate
your calls to SMTPeter. You must keep this access token private, to prevent that
other people can send out emails out of your name. With your access token, you can
reach the SMTPeter API via the following URL:

```
https://www.smtpeter.com/v1/METHOD?access_token=YOUR_API_TOKEN
```

You can only use HTTPS connections. Unsecure HTTP requests are not
accepted and will result in a '400 Bad Request' response.

## Available methods

| Method                                                                                    | Type  | Description                                       |
| ----------------------------------------------------------------------------------------- | ----- | ------------------------------------------------- |
| [/v1/send](copernica-docs:SMTPeter/rest/send "REST command send")                         | POST  | Send one or more new messages                     |
| [/v1/text](copernica-docs:SMTPeter/rest/text "REST command text")                         | GET   | Retrieve the text version as sent out by SMTPeter |
| [/v1/html](copernica-docs:SMTPeter/rest/html "REST command html")                         | GET   | Retrieve the HTML version as sent out by SMTPeter |

<!---
| [/v1/recent-tags](copernica-docs:SMTPeter/rest/recent-tags "REST command recent-tags")    | GET   | Get an overview of recently active tags           |
| [/v1/tag](copernica-docs:SMTPeter/rest/tag "REST command tag")                            | GET   | Get overview for a specific tag                   |
-->

## Sending and retrieving data

With all HTTP POST calls you can send the data in either JSON format or
in the traditional post data format with encoded variables. The
"content-type" header in your HTTP headers tells SMTPeter which format
you use. This header should be set to "application/x-www-form-urlencoded"
if you're submitting traditional form data, or "application/json" if your
input data is JSON formatted.

For many programming languages we have [created example scripts](copernica-docs:SMTPeter/examples "Examples"),
so that you do not have to program the low-level API calls yourself, and can use
our examples instead.

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
