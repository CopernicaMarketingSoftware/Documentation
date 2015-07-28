# Bounce tracking

When you send out email, you normally also have to take care of failed deliveres 
and bounce messages that are sent back to the email's envelope address. However, 
if you do not want to set up an infrastructure to take care of bounces yourself, 
you can let SMTPeter do this for you. 

SMTPeter can process all bounces and present the results in a clear overview. It 
can also automatically send them to you using SMTP or web hooks. You can also use 
our API to download bounces at periodic intervals. 

## How bounces work

As mentioned above, a bounce is normally sent to the envelope address of your email. 
In the examples below this means that any bounces and spam complaints are sent to the 
info@example.com address. 

SMTP PROTOCOL
```
MAIL FROM:<info@example.com>
RCPT TO:<recipient@example.com>
DATA
From: <info@example.com>
To: <recipient@example.com>
This is example content. 
.
```

REST API
```json
{
    "envelope":     "info@example.com",
    "recipient":    "recipient@example.com",
    "from":         "info@example.com",
    "to":           "recipient@example.com",
    "html":         "This is example content."
}
```

However, it is also possible to set a specific bounce address by adding return-path 
MIME header to your email. If you add a Return-Path header, all bounces and spam 
complaints are sent to the Return-Path address. In the example below the bounces 
and complaints will be sent to the bounce@example.com address. 

SMTP PROTOCOL
```
MAIL FROM: <info@example.com>
RCPT TO: <recipient@example.com>
DATA
From: <info@example.com>
To: <recipient@example.com>
Return-Path: <bounce@example.com>

This is example content. 
.
```

REST API
```json
{
    "envelope":     "info@example.com",
    "recipient":    "recipient@example.com",
    "from":         "info@example.com",
    "bounce":       "bounce@example.com",
    "to":           "recipient@example.com",
    "html":         "This is example content."
}
```

## Bounce tracking options in SMTPeter

You can choose to let SMTPeter track your bounces, or do it yourself. If you set 
SMTPeter to track your bounces there are several different ways to do so. 

### No bounce tracking

Not setting up bounce tracking means SMTPeter will not track the bounces of your 
emails. This does not mean you will not receive any bounces. It is impossible to 
completely disable bounces: when you send email through SMTPeter they will be delivered 
 to the recipient's mail server, which will return any bounces to your envelope 
or Return-Path address. 

### Bounce tracking

If you do want SMTPeter to track bounces, SMTPeter will rewrite your email and add 
its own envelope or return-path header to your email. All bounces will be received 
by SMTPeter and your bounce statistics can be found in your SMTPeter dashboard. 

To set up SMTPeter to track your bounces you have to adjust the 
[bounce settings in your SMTPeter dashboard](copernica-docs:SMTPeter/dashboard/bounce-management/ "Bounce Management Dashboard Documentation").
There you can configure SMTPeter to forward the email to a specific email address after 
the bounce is processed or call a specific web hook for processing. 

It is also possible to use the API to download your bounces:

```
GET /v1/bounces/{start_date}/{end_date}?access_token={YOUR_API_TOKEN} HTTP/1.0
Host: www.smtpeter.com

```


