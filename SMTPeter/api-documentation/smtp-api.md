## SMTP API Overview

An overview of SMTPeter's SMTP API. 

## Connecting through SMTP

Connecting to SMTPeter through our SMTP API is very simple. First
you will need to create login credentials in your [Dashboard](copernica-docs:SMTPeter/dashboard/smtp-credentials "Dashboard Documentation"), 
these credentials will let SMTPeter know that you are allowed to
send email. Once you have your credentials you will have to configure
your email client/mail server to forward email with the following settings:

```
Host:       mail.smtpeter.com
Port:       25 or 587
Encryption: STARTTLS
```

You can connect using either port 25 or 587, but these are identical. Some residential 
ISPs and Cloud Hosting Providers block port 25 and it is often recommended to use 
port 587 instead. 

 > **Note:** All connections on port 25 and 587 have to use STARTTLS, SMTPeter does not accept 
unsecured connections. 

MailerQ also supports port 465 for SSL connections. If you use this port you do not 
have to use STARTTLS, but SSL. These connections are always encrypted. To use this port 
you have to set your application to forward email using the following settings: 

```
Host:       mail.smtpeter.com
Port:       465
Encryption: SSL
```

Using port 465 the SMTP protocol will look something like this: 


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

 > **Note:** Whilst we do support port 465, it is mostly to support legacy 
 system that are only capable of using this method. Using port 465 for SMTPS 
 is depriciated because [IANA has reassigned a new service to this port](http://www.iana.org/assignments/service-names-port-numbers/service-names-port-numbers.xhtml?search=465 "IANA Port 465"). 

## Which ports does SMTPeter support? 

SMTPeter supports both port 25, 587 and 465. Port 25 and 587 are for STARTTLS encryption, 
SSL is supported on port 465.

### SMTP Authentication

Whenever you send email using the SMTPeter SMTP API you will need to include 
your login credentials. In order to login you should configure your 
application to either authenticate with [AUTH PLAIN or AUTH LOGIN](https://en.wikipedia.org/wiki/SMTP_Authentication). 

### Where can I find my SMTP credentials?

You can find and create your SMTP credentials in your
[SMTP credential overview](https://www.smtpeter.com/app/#/admin/smtp-credentials "Go to your dashboard") 
on your SMTPeter Dashboard. The overview shows all the generated usernames for 
your account, the passwords are not shown in the dashboard and are only shown once
when you create new SMTP credentials. Make sure you write down your password somewhere
safe!

You can create multiple SMTP credentials for your account. Each set of credentials
can have a [specific set of features](copernica-docs:SMTPeter/features) enabled or 
disabled, which you need to specify when you create new SMTP credentials. You can use the 
different logins if you want to enable or disable certain features for specific emails. 

## Enabling SMTPeter features with the SMTP API

There are two ways to enable specific features in the SMTP API. The first one 
is to [create separate logins](copernica-docs:SMTPeter/dashboard/smtp-credentials "Dashboard Documentation") 
with different features enabled and use these logins when you connect to SMTPeter. 

The second one is to add special MIME-headers to your email. You can add these to 
the MIME of your email and enable or disable a feature by setting them to true 
or false:

MIME headers for SMTPeter features:
```
x-smtpeter-inlinecss:        When set to true, all CSS will be inlined
x-smtpeter-trackclicks:      When set to true, links will be tracked
x-smtpeter-trackbounces:     When set to true, bounces will be tracked
x-smtpeter-trackopens:       When set to true, opens will be tracked
```

## Setting up your local mail server to send with SMTPeter

You can also set up your local mail server, such as Postfix
to use SMTPeter as [smart host](copernica-docs:SMTPeter/smart-host "Using SMTPeter as smart host"). 
If you want to use your local mail server setting SMTPeter as smart host 
is the fastest and recommended way to connect. 

[Learn how to set up Postfix to send through SMTPeter](copernica-docs:SMTPeter/quick-start/postfix "Setting up Postfix to send with SMTPeter") 


<!---
## Common errors

@todo
-->