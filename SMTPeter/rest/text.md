# REST API method: text

To retrieve the text send previously you use the `html` method. This will
return the text as it was received by SMTPeter.

This method can be called using the following URI:

```text
https://www.smtpeter.com/v1/text/<message id>?access_token=YOUR_API_TOKEN
```

Where <message id> can be replaced with the message id SMTPeter provided
after receiving the message.
