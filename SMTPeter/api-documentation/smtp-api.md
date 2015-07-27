## SMTP API Overview

To use the SMTP API you need SMTP login credentials. You can create
a username/password combination in your [Dashboard](copernica-docs:SMTPeter/dashboard/smtp-credentials "Dashboard Documentation").
Once you have your credentials you can configure your email client/mail server to forward email 
to SMTPeter.com.

The SMTPeter.com server can be reached via the "mail.smtpeter.com" domain, on port 25
and 587. Only authenticated and encrypted connections using "STARTTLS" are supported. 
Mails that are not sent over a secured connection will be rejected.

```
Host:       mail.smtpeter.com
Port:       25 or 587
Encryption: STARTTLS
```

### What is the difference between port 25 and port 587?

You can use both port 25 and port 587 to send mail to SMTPeter. There is no difference
between these two ports. We have opened port 587 because some providers have blocked
access to port 25.


### Example communication

The SMTP protocol is quite "chatty". Once your application has opened up a connection to
SMTPeter, a handshake protocol is started in which your client and the SMTPeter server 
exchange pleasantries, convert the connection into a secure connection, and hand over 
the full MIME message. The following output is a typical handshake that may occur.

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

### Faster handshake using port 465

As an alternative, you can also connect to port 465. This opens up a TCP connection in a
secure state right away, and skips the STARTTLS handshake. Although sending mail over port 465 
was never standardized and is even deprecated in favour of the STARTTLS encryption
(in fact, port 465 has even [been reassigned to a new service](http://www.iana.org/assignments/service-names-port-numbers/service-names-port-numbers.xhtml?search=465 "IANA Port 465")),
communication over port 465 is faster.

Using port 465 the SMTP handshake looks like this: 


````
220 smtpeter1.copernica.nl MailerQ ESMTP
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


### SMTP Authentication

Whenever you send email using the SMTPeter SMTP API you must include your 
login credentials. In order to login you should configure your application to either 
authenticate with [AUTH PLAIN or AUTH LOGIN](https://en.wikipedia.org/wiki/SMTP_Authentication). 

You can find and create your SMTP credentials in the
[SMTP credential overview](https://www.smtpeter.com/app/#/admin/smtp-credentials "Go to your dashboard") 
on your SMTPeter Dashboard. The overview shows all the generated usernames for 
your account. The passwords can not be displayed because they are stored in an encrypted format.
Make therefore sure you write down or remember your password!


### Passing parameters / using different logins

The SMTP protocol was never meant to pass parameters with each message. If you want
to enable or disable specific SMTPeter features for specific messages, you will have
to either use MIME header fields or use different SMTP credentials. 

In the [SMTPeter dashboard](copernica-docs:SMTPeter/dashboard/smtp-credentials "Dashboard Documentation") 
you can create multiple SMTP logins. You can for example
create a login for which the "inlinecss" feature is enabled, and one for which
it is disabled. When you connect to the SMTP API, you simply pick a login/password
combination that has the features you need. 


### Passing parameters / MIME headers

The alternative method to enable or disable features is by adding special MIME-headers to 
your email.

```
x-smtpeter-inlinecss:        When set to true, all CSS will be inlined
x-smtpeter-trackclicks:      When set to true, links will be tracked
x-smtpeter-trackbounces:     When set to true, bounces will be tracked
x-smtpeter-trackopens:       When set to true, opens will be tracked
```

Every incoming MIME message is parsed by SMTPeter, and if one of the above MIME headers
is set, the corresponding feature is activated, possibly overriding the setting
from the credentials (in other words: if you have disabled the "inlinecss" feature
for an SMTP login, but you do include the "x-smtpeter-inlinecss: true" header in the
mime, the CSS code is going to be inlinized anyway).

All headers prefixed with "x-smtpeter-" are instructions to the SMTPeter servers, and are 
stripped from the message before it is delivered. Your receivers will therefore
never see these "x-smtpeter-" headers, even if they do inspect the source.


<!--

examples:
    - configure postfix
    - php script


-->

