# Send a mail to multiple recipients

If you want to send the same mail to multiple recipients, e.g. when you
have multiple "to" or "cc"s, or when you want to bcc someone, you don't
have to send a POST request for each recipient. In this case you add all
recipients in the property `recipients` in the JSON data.

An example of a JSON where one mail will be send to multiple recipients
is:

```json
{
    "recipients": [
        "alice@example.com",
        "bob@example.com",
        "charles@example.com"
    ],
    "from": "info@example.com",
    "to": [
        "alice@example.com",
        "bob@example.com"
    ],
    "subject": "Here we have a subject",
    "text":    "Hello Alice and Bob!"
}
```

When a JSON like this is received by SMTPeter, a mail with two "to" fields
will be constructed. This mail will be sent to Alice, Bob, and Charles. In
this case Alice and Bob cannot see that this mail was also sent to Charles.
Charles is in this case bcced.

If you send to multiple people it is still possible to give each email a 
personal touch. Our article on [personalization](./rest-send-personalize) 
explains this in detail.

## More information 

* [REST API](./rest-api)
* [Creating MIME data with SMTPeter](./rest-send-json)
* [Personalization](./rest-send-personalize)
