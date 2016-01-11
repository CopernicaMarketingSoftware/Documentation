# REST API method: html

To retrieve the HTML send previously you use the `html` method. This will
return the HTML as it was when SMTPeter was done processing it - with links
rewritten (if enabled) and image links rewritten to be tracked by SMTPeter.

This method can be called using the following URI:

```text
https://www.smtpeter.com/v1/html/<message id>?access_token=YOUR_API_TOKEN
```

Where <message id> can be replaced with the message id SMTPeter provided
after receiving the message.
