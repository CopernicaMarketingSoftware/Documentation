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

## example

```text
<< GET /v1/html/XXXXXXXX?access_token=YOUR_API_TOKEN HTTP/1.0
<< Host: www.smtpeter.com
<<
>> HTTP/1.1 200 OK
>> Date: Tue, 12 Jan 2016 13:29:57 GMT
>> Server: Apache/2.4.7 (Ubuntu)
>> X-Powered-By: PHP/5.5.9-copernica1
>> Content-Length: 184
>> Content-Type: application/json
>>
>> {"id":"XXXXXXXX","received":"2016-01-06 20:01:34","html":"<!DOCTYPE html PUBLIC \"-\/\/W3C\/\/DTD XHTML 1.0 Strict\/\/EN http:\/\/www.w3.org\/TR\/xhtml1\/DTD\/xhtml1-strict.dtd\">..."}
```

## return value

A json object with the following keys

| Key        | Description                                    |
| ---------- | ---------------------------------------------- |
| id:        | The message ID for which the text is retrieved |
| received:  | The date and time the message was received     |
| html:      | The actual content of the message              |
