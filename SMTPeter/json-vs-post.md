# JSON vs POST data

With the REST API you use HTTP POST requests to send data to SMTPeter.
The posted data can either be in JSON format, or url-encoded format.
Sending data in JSON format is slightly more powerful than sending
traditional POST data, because JSON allows you to send deeper nested
data. 

The results that are sent back by SMTPeter are most of the times JSON 
formatted, unless it makes more sense to use a different formatting (for
example, if you use the REST API to download an jpeg image, or a HTML
string). The "content-type" should be inspected to find out what kind
of data is returned. 


## Example API call with POST data

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

## Example with JSON data

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

