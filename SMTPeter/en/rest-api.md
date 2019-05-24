# Send with REST API

SMTPeter has a powerful and secure REST API on top of the HTTPS protocol.
Sending an email is as simple as sending a HTTP POST request to the 
following URL:

`https://www.smtpeter.com/v1/send?access_token={YOUR_API_TOKEN}`

Where `{YOUR_API_TOKEN}` is the API access token that can be obtained from the dashboard.
The body data of the POST call should hold the information about the email and 
optionally extra settings. A simple but complete call can look like this:

```text
POST /v1/send?access_token={YOUR_API_TOKEN} HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/json
Content-Length: 247

{
    "recipient":    "john@doe.com",
    "from":         "info@example.com",
    "to":           "john@doe.com",
    "subject":      "This is the subject",
    "text":         "This is example content",
}
```
This call will instruct SMTPeter to generate an e-mail message with the 
specified `from`, `to`, `subject`, and `text` and to send it to the 
address specified in `recipient`. 

This is just a simple example. More powerful mails (for example with html 
or attachments) can be sent too. And you can supply the entire email
contents (headers+body) yourself. Check out the following articles for
more info:

* [Send MIME data](rest-mime)
* [Send JSON data](rest-send-json)
* [Send template based mails](rest-send-templates)
* [Advanced delivery options](rest-send-advanced)

*All available REST calls can be found right [here](./all-rest-calls).*
