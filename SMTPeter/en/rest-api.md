# Send via REST API

SMTPeter has a reliable REST API which makes use of the HTTPS protocol.
To acces the REST API, you need an API access token. You can find this
token in the SMTPeter dashboard. The REST API lets you send email
with advanced capabilities, in an easy way. Through an HTTP POST request
you can specify that you want to use the send method. You can now almost
send your first email:

`https://www.smtpeter.com/v1/send`

Now you make sure that you meet the followin two requirements: 'adding content to
the email *body* and assigning which SMTPeter capabilities you want to activate'.
The markup then looks like this:


```text
POST /v1/send?access_token={YOUR_API_TOKEN} HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/json
Content-Length: 246

{
    "recipient":    "john@doe.com",
    "subject":      "This is the subject",
    "html":         "This is example content",
    "from":         "info@example.com",
    "to":           "john@doe.com"
}
```

## Explore the other possibilities

The REST API is comprehensive and provides a great number of options for you:

* [Send MIME data](rest-mime)
* [Let SMTPeter create MIME data](rest-send-json)
* [Sending based on templates](rest-send-templates)
* [Sending mail](rest-send-advanced)
* [API reaction](rest-api-reaction)

*All available REST calls can be found right [here](all-rest-calls).*