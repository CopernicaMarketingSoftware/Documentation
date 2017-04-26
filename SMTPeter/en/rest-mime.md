# Send MIME data

You need at least two properties to send an email. The so called "recipient" address
(that's going to be used in the *RCPT TO* part of the SMTP protocol) and the comprehensive
"MIME" data.

```json
{
    "recipient":    "john@doe.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n...."
}
```
To establish that everything is more readable, we've cut down on most of the "MIME"
code in the above mentioned example. If you don't want to curate your own "MIME",
just leave out the property of the JSON. However, do use the special mime properties
like "subject", "text" and "html", so that SMTPeter can construct the mime instead.

You just have to provide SMTPeter with a "recipient" address to send an email. 
Note that normally you have to also specify an envelope address. This is the 
address where *bounces* or currently-not-in-office replies go to. Of course
SMTPeter takes (automatically) care of all these processes and that's why you 
don't have to provide an envelope address.

It's prossible to take care of bounces yourself. Just assign an extra envelope
address to the input data. Besides this envelope address, it might be interesting
to add a [DSN property](rest-dsn "REST and DSN Messages") as well. Now you can 
cherry pick which kind of notifications you want to receive regarding the bounces
that might occur.

```json
{
    "recipient":    "john@doe.com",
    "envelope":     "myaddress@example.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n...."
}
```