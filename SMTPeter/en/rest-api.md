# Send via REST API

SMTPeter has a powerful and secure REST API which makes use of the HTTPS protocol.
To access the REST API, you need an API access token. You can find this
token in the SMTPeter dashboard. Now sending an email is as easy as sending
an HTTP POST request to the following URL:

`https://www.smtpeter.com/v1/send?access_token={YOUR_API_TOKEN}`

where `{YOUR_API_TOKEN}` is the token you have obtained from the dashboard.
The extra data of the POST call, containing the information about the email and optionally some
SMTPeter settings, can be added as a JSON. A simple but complete call can
look like this:

```text
POST /v1/send?access_token={YOUR_API_TOKEN} HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/json
Content-Length: 246

{
    "recipient":    "john@doe.com",
    "from":         "info@example.com",
    "to":           "john@doe.com"
    "subject":      "This is the subject",
    "text":         "This is example content",
}
```
When sending this call, SMTPeter generates a MIME (i.e. an email) with the specified `from`,
`to`, `subject`, and `text` and will send the mail to the address specified
in `recipient`. 

If you want to send a mail with html, or add attachments, that is possible
too. To see which properties SMTPeter supports you can read the
[Let SMTPeter create MIME data](rest-send-json) documentation. SMTPeter
can also be used to send MIMEs created by you. For more information on this
you can read the [Send MIME data](rest-mime) documentation.


## Explore the other possibilities

The REST API is comprehensive and provides a great number of options for you:

* [Send MIME data](rest-mime)
* [Let SMTPeter create MIME data](rest-send-json)
* [Sending based on templates](rest-send-templates)
* [Sending mail](rest-send-advanced)
* [API response](rest-api-reaction)

*All available REST calls can be found right [here](all-rest-calls).*
