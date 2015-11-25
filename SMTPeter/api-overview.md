# API overview

There are multiple ways to send your emails via SMTPeter: through our powerful 
REST API, a standard SMTP API or by configuring your local mail server 
to use SMTPeter as a smart host. Below we will explain these three concepts. 


## REST API

The REST API uses the HTTPS protocol, which is the foundation of data 
communication on the world wide web, to communicate with SMTPeter.
 This is the preferred API if you do not happen to have any heritage that
compels you to use the other methods of communication with SMTPeter. The
REST API is efficient and flexible. You can send out an email with only
one instruction and adjust SMTPeter's features on a 'per message'-level.

[Start sending email using the REST API](copernica-docs:SMTPeter/rest-api)


## SMTP API

The SMTP API uses the SMTP protocol, the standard protocol mail servers use to 
communicate with each other. We advise you to only use this API if you need
to use this protocol because of your current email setup. Since the SMTP
protocol is quite "chatty", there is a lot of handshaking and negotiating
between the server and client, the protocol is not very efficient. Moreover,
since SMTP does not allow you to pass extra arguments together with a message
setting SMTPeter's features on a 'per message'-level is less elegant than
via the REST API.

[Start sending email using the SMTP API](copernica-docs:SMTPeter/smtp-api)


## Postfix smart host

If you already have a local mail server, such as Postfix, and want to avoid changing 
the way your applications send out mail, you can set up SMTPeter as a smart host. 

This gives you the best of both worlds: low connect times because of the local mail 
sever and the throttling and features offered by SMTPeter. We use Postfix as an 
example in our documentation, however you can set any mail server to use SMTPeter as 
a smart host.  

[Set up SMTPeter as your Postfix smart host](copernica-docs:SMTPeter/smart-host)
