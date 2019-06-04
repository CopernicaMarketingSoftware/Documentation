# Personalized mails

If you use personalization placeholders in your messages, you can
pass extra data to the API to have your messages personalized.

```json
POST /v1/send?access_token={YOUR_API_TOKEN} HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/json
Content-Length: 147

{
    "recipient": "john@doe.com",
    "template": 12,
    "data": {
        "firstname":    "John",
        "lastname":     "Doe"
    }
}
```

The above call will ensure that the {$firstname} and {$lastname} variables
used in template 12 are replaced with "John" and "Doe". If you have 
[multiple recipients](./rest-send-multiple-recipients) you can add the 
data per recipient:

```json
POST /v1/send?access_token={YOUR_API_TOKEN} HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/json
Content-Length: 343

{
    "recipients" : [
        "jane@doe.com": {
            "firstname": "Jane",
            "lastname": "Doe",
            "kids" : ["Jacky", "Joe"]
        },
        "john@doe.com": {
            "firstname": "John",
            "lastname": "Doe",
            "kids" : ["Jacky", "Joe"]
        }
    ],
    "template": 12
}
```

More information about this can be found in the article on 
[personalization](./personalization).
