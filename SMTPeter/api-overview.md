# API overview

There are multiple ways to send your emails via SMTPeter: through our powerful 
REST API, our easy to use SMTP API and by configuring your local mail server 
to use SMTPeter as a smart host. Below we will explain these three concepts. 

## SMTP API

The SMTP API uses the SMTP protocol, the standard protocol mail servers use to 
communicate with each other. This protocol is quite "chatty", there is a lot of 
handshaking and negotiating between the server and client. There are ways to 
include parameters to include SMTPEter's features using SMTP, however it does 
not inherently support these parameters. 

[Start sending email using the SMTP API](copernica-docs:SMTPeter/smtp-api)

## REST API

The REST API uses the HTTPS protocol, this protocol is the foundation of data 
communication on the world wide web. It allows for all sorts of parameters to be 
added in a single request, making it easy to adjust SMTPeter's features on a 
'per message'-level. The REST protocol is faster than the SMTP protocol: 
it only needs to send a single instruction from your application to send out an email. 

[Start sending email using the REST API](copernica-docs:SMTPeter/rest-api)


## Postfix smart host

If you already have a local mail server, such as Postfix, and want to avoid changing 
the way your applications send out mail, you can set up SMTPeter as a smart host. 

This gives you the best of both worlds: low connect times because of the local mail 
sever and the throttling and features offered by SMTPeter. We use Postfix as an 
example in our documentation, however you can set any mail server to use SMTPeter as 
a smart host.  

[Set up SMTPeter as your Postfix smart host](copernica-docs:SMTPeter/smart-host)
