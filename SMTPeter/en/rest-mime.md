# Send MIME data

You need at least two properties to send an email. The so called "recipient" address
(that's going to be used in the *RCPT TO* part of the SMTP protocol) and the comprehensive
"MIME" data. This simplest case looks somewhat like this:

```json
{
    "recipient":    "john@doe.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n...."
}
```
To make the example more readable, we've cut down on most of the "MIME"
code in the above mentioned example. You are not required to provide your own "MIME" data 
and are able to leave out *mime* property of the JSON. However, in this case 
you should use special MIME properties such as "subject", "text" and "html", 
in order for SMTPeter to construct your MIME data. [This](rest-send-json)) 
article provides more information on how to let SMTPeter construct your MIME data.

You just have to provide SMTPeter with a "recipient" address to send an email. 
Note that normally you would also have to specify an envelope address. This is the 
address where *bounces* or currently-not-in-office replies go to. Of course
SMTPeter takes (automatically) care of all these processes and that's why you 
don't have to provide an envelope address.

It's possible to take care of bounces yourself. Just assign an extra envelope
address to the input data. Besides this envelope address, you might be interested 
in adding the [DSN variable](rest-dsn "REST and DSN Messages") to configure these 
notifications to your envelope adress. After adding your envelope adress 
your code should look similar to this:

```json
{
    "recipient":    "john@doe.com",
    "envelope":     "myaddress@example.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n...."
}
```

If all information is provided in a correct format you will get a [reaction from the API](./rest-api-reaction).

## More information

* [REST API](./rest-api)
* [Advanced send options](./rest-send-advanced)
* [Custom DSN properties for notifications](./rest-dsn)
* [Create MIME data with SMTPeter](./rest-send-json)
* [API reaction](./rest-api-reaction)
