# API Introduction

SMTPeter offers two different ways to send email: through our SMTP API or
by using our REST API. 

## SMTP vs REST

So what exactly are the differences between the SMTP and REST API? The SMTP API uses the 
SMTP protocol, the protocol normally used by mail server to communicate with each other. This 
makes the SMTP API the easiest way to connect to SMTPeter. If you already send using the SMTP 
protocol you only have to change your SMTP configuration. 

The REST API uses the HTTP protocol, a faster and more flexible protocol than SMTP. The 
SMTP protocol tends to be a bit "chatty" compared to the REST API, this because 
the SMTP protocol is a so called [handshake protocol](https://en.wikipedia.org/wiki/Handshaking "Handshaking Wiki"). 
A REST API simply gives 'orders' to be followed by the receiver, making the REST API faster than the SMTP API. 

Another difference is that the REST API inheritly has the possiblity to include different variables 
in a single "call", the SMTP protocol was not designed to do so. Our REST API accepts POST and JSON data 
on its endpoint. 

To enable or disable variables such as tracking, inline css and bounce management in the SMTP API, you currently 
have to create separate SMTP logins in your [Dashboard](copernica-docs:SMTPeter/Dashboard/smtp-credentials "SMTP credentials dashboard documentation") 


You can also enable specific features for SMTPeter through the SMTP api by adding 
special MIME-headers to your email message.

[Read the SMTP API Documentation](copernica-docs:SMTPeter/api-documentation/smtp-api "SMTP API documentation")

[Read the REST API Documentation](copernica-docs:SMTPeter/api-documentation/rest-api "REST API documentation")

<!---
## Which API should I use? 

@todo
-->
