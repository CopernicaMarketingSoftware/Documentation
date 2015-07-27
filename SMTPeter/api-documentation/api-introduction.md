# API Introduction

SMTPeter offers two different ways to send email: through our SMTP API or by using our REST API. 
Below we will explain the differences between the SMTP and REST API. 


## The SMTP protocol

The SMTP API uses the SMTP protocol, the protocol normally used by mail servers to communicate with 
each other. Your application connects to one of the SMTP ports (25, 587 or 465) of mail.smtpeter.com, and
submits one or more email messages:

````
220 smtpeter1.copernica.nl MailerQ ESMTP
EHLO mydomain.com
250-STARTTLS
250-PIPELINING
250-8BITMIME
250 Pleased to meet you
STARTTLS
220 Ready to start TLS
EHLO mydomain.com
250-PIPELINING
250-8BITMIME
250 Pleased to meet you
AUTH LOGIN bXktdXNlcm5hbWU=
334 UGFzc3dvcmQ6
bXktcGFzc3dvcmQ=
235 Welcome back
MAIL FROM:<info@example.com>
250 Sender OK
RCPT TO:<john@doe.com>
250 Recipient OK
DATA
From: <info@example.com>
To: <john@doe.com>
Subject: Example email
MIME-Version: 1.0

This is example content
.
250 Ok, queued as jkKa2Skd3Uu
````

As you can see, the SMTP protocol is very "chatty", a lot of handshaking and negotiating
is going on between the server and the client. Even though the SMTP protocol is the
world wide standard for mail delivery, and can be very easy to integrate if you have an
already working architecture, it is not as fast as it could be, and does not allow one
to (easily) supply per-message settings. We therefore recommend using the REST API instead.

However, if you do want to use the SMTP API, please check our documentation for more details on
how to submit email and enable SMTPeter's features using SMTP. 

[Read our SMTP API Documentation](copernica-docs:SMTPeter/api-documentation/smtp-api "SMTP API documentation")


## The REST protocol

The REST API uses the the HTTP protocol, this protocol is the foundation of data communication 
for the world wide web. To send an email your application sends an HTTP POST request to the 
SMTPeter API endpoint:

```
POST /v1/send?access_token={YOUR_API_TOKEN} HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/x-www-form-urlencoded
Content-Length: 146

envelope=info%40example.com&recipient=john%doe.com&subject=this+is+the+subject&html=This+is+example+text&from=info%40example.com&to=john%40doe.com
```

The above example shows how to send a message using HTTP POST variables. In order to send through 
SMTPeter you will also need to include an API token, which you can create on your SMTPeter dashboard. 

Instead of HTTP POST variables, you can also send JSON documents to the API endpoint. To learn more 
about adding variables, where to find your API token and how to enable or disable features using 
our REST API, please check our REST API documentation. 

[Read the REST API Documentation](copernica-docs:SMTPeter/api-documentation/rest-api "REST API documentation")

