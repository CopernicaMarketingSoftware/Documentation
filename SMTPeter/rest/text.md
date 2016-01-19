# REST API method: text

To retrieve the text send previously you use the `text` method. This will
return the text as it was received by SMTPeter.

This method can be called using the following URI:

```text
https://www.smtpeter.com/v1/text/<message id>?access_token=YOUR_API_TOKEN
```

Where <message id> can be replaced with the message id SMTPeter provided
after receiving the message.

## example

```text
<< GET /v1/text/XXXXXXXX?access_token=YOUR_API_TOKEN HTTP/1.0
<< Host: www.smtpeter.com
<<
>> HTTP/1.1 200 OK
>> Date: Tue, 12 Jan 2016 13:29:57 GMT
>> Server: Apache/2.4.7 (Ubuntu)
>> X-Powered-By: PHP/5.5.9-copernica1
>> Content-Length: 151
>> Content-Type: application/json
>>
>> {"id":"XXXXXXXX","received":"2016-01-06 20:01:34","text":"Your email client does not support HTML messages. View the mail online at webversion\r\n"}
```

## return value

A json object with the following keys

| Key        | Description                                    |
| ---------- | ---------------------------------------------- |
| id:        | The message ID for which the text is retrieved |
| received:  | The date and time the message was received     |
| text:      | The actual content of the message              |
