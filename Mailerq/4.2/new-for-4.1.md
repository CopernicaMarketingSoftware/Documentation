# What is new in version 4.1?

MailerQ 4.1 is a minor release with relatively small changes that do not
break compatibility with the previous 4.0 version. 


## SMTPUTF8 support

MailerQ now announces to incoming SMTP connections that it supports the
SMTPUTF8 extension ([RFC 6531](https://tools.ietf.org/html/rfc6531)). This
means that addresses that you pass to the "MAIL FROM" and "RCPT TO" 
commands may contain UTF8 characters in the local part and/or the domain 
part.

Envelope and recipient addresses that are published to RabbitMQ are 
now always UTF8 encoded, even if the original mail was submitted using 
punycode. MailerQ internally uses UTF8 encoded addresses. However, if you
can still use punycode for addresses that you publish to the outbox yourself,
MailerQ checks and converts all incoming addresses.


## Bug fixes

Various small bug have been fixed since MailerQ 4.0.0:

* Responsive JSON documents with invalid URL's caused the application to crash
