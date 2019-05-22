# Send MIME data

The SMTPeter REST API can be used to send mails in many different forms.
The most pure one let you send a MIME formatted message, where it is
your own responsibility to pass a correctly formatted MIME message to
SMTPeter:

```json
POST /v1/send?access_token={YOUR_API_TOKEN} HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/json
Content-Length: 9827

{
    "recipient":    "john@doe.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n...."
}
```

Note that to make the above example more readable, we cut down most of the "mime"
string. This example shows a very minimal API call: just a recipient and a
message are sufficient to delivery the mail.

*Tip: Don't know MIME? You can format a mail in [JSON format](./rest-send-json) too*


## Custom envelope address

In a minimal API call, you only have to provide the recipient and the MIME data.
SMTPeter takes care of the rest, including collecting the bounces and
out-of-occice replies that are sent back to the envelope address. If you want
to do your own bounce-processing, you can add an *optional* envelope address:

```json
{
    "recipient":    "john@doe.com",
    "envelope":     "myaddress@example.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n...."
}
```

If you include an envelope address to collect bounces, you may also be interested
in passing a [DSN variable](rest-dsn) to finetune the type of bounces to receive.


## Results

The result of the send call is sent back in the [HTTP response](./rest-api-response).


## More information

* [REST API](./rest-api)
* [Send JSON data](rest-send-json)
* [Send template based mails](rest-send-templates)
* [Advanced delivery options](rest-send-advanced)
