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
    "text":    "Hello Alice en Bob!"
}
```
When a JSON like this is received by SMTPeter, a mail with two "to" fields
will be constructed. This mail will be sent to Alice, Bob, and Charles. In
this case Alice and Bob cannot see that this mail was also sent to Charles.
Charles is in this case bcced.

If you want to send a similar mail to multiple persons, but you want to give
each mail a personal touch you probably want to read our
[Personalize email](personalisation-data) documentation.
