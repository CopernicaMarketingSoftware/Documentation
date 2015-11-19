# REST API Overview

SMTPeter provides a powerful REST API. With this REST API you can communicate
with SMTPeter using the HTTPS protocol.


## API Endpoint

To use the REST API you need an [API access token](https://www.smtpeter.com/app/#/admin/api/rest-token "create a rest token"),
which can be created via the SMTPeter dashboard. This token is used to authenticate 
your calls to SMTPeter. You must keep this access token private, to prevent that
other people can send out emails out of your name.

With your access token, you can reach the SMTPeter API via the following 
HTTPS endpoint:

```
https://www.smtpeter.com/v1/{METHOD}?access_token={YOUR_API_TOKEN}
```

`{METHOD}` contains the name of the method (e.g. `send` if you want to send 
an email) and `{YOUR_API_TOKEN}` contains the API access token.

**Note:** You can only use HTTPS connections. Unsecure HTTP requests are not
accepted and will result in a '400 Bad Request' response.


## Sending and retrieving data

For all HTTP POST calls you can send the data in either JSON format or
in the traditional "application/x-www-form-urlencoded" format with
encoded variables. You need to add a "content-type" header to your HTTP 
headers to tell SMTPeter which format you use. This content-type should
be set to "application/x-www-form-urlencoded" if you're submitting
traditional form data, or "application/json" if your input data is 
JSON formatted.

For many programming languages we have created example scripts, so that
you normally do not have to do the low-level API calls, and can use
our examples instead.

Sending data in JSON format is slightly more powerful than sending
traditional POST data, because JSON allows you to send deeper nested
data to the API.

All results that are sent back by SMTPeter are JSON formatted.


### Example API call

The following code shows an example communication between a client
application and SMTPeter. For this example, we have truncated the
actual sent data. If you send the following data to the REST API of
SMTPeter:

```text
POST /v1/send?access_token={YOUR_API_TOKEN} HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/x-www-form-urlencoded
Content-Length: 1484

envelope=info%40example.com&recipient=....
```

The output from SMTPeter always is JSON formatted. The `send` instruction
results in a simple integer telling you that the mail was correctly sent:

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

## Supported methods

The following methods are supported by the REST API:

* [POST /v1/send](copernica-docs:SMTPeter/rest/send "REST command send")

