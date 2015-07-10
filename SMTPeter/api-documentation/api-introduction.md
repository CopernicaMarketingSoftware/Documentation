# API Introduction

SMTPeter offers two different ways to send email: through our SMTP API or
by using our RESTful API. Whilst bost API's will have the same result - 
they will deliver your email - they are actually quite different. 

## SMTP API

The SMTP API is the easiest way to connect to SMTPeter: it only requires you
to change your SMTP configuration. This means you can even use standard 
desktop email programs, such as Thunderbird, Microsoft Outlook or 
Apple Mail to send email with SMTPeter. Simply change your application
 settings to forward its email to SMTPeter's servers:

    Host: mail.smtpeter.com
    Port: 25
    Encryption: STARTTLS

To makes sure not just anyone can use SMTPeter to send email, we require 
authentication before the connection is accepted. The credentials for 
SMTP authentication can be found in the [SMTP credentials](copernica-docs:SMTPeter/dashboard/smtp-credentials)
tab of your [SMTPeter Dashboard](copernica-docs:SMTPeter/dashboard/dashboard-overview).

To authenticate with SMTPeter, make sure to configure your client to authenticate either
using [AUTH PLAIN or AUTH LOGIN](https://en.wikipedia.org/wiki/SMTP_Authentication).

[Read more about the SMTP API](copernica-docs:SMTPeter/api-documentation/smtp-api)

## REST API

SMTPeter also provides a REST API to send email. The SMTPeter API provides a 
powerful RESTful interface.  Which means that your application can access 
the API using the HTTP protocol. 

Before you can send a request to our API you will need to 
[create an API access token](copernica-docs:SMTPeter/dashboard/rest-api-token "Create REST API token documentation"). This token has to be added as a parameter (so as `?access_token={YOUR_API_TOKEN}`) to all of your API calls. 

All API methods are accessed via:

    https://www.smtpeter.com/v1/{METHOD}?access_token={YOUR_API_TOKEN}

 > **Note:**All API requests must use secure HTTPS connections. Unsecure HTTP requests will 
result in a 400 Bad Request response. 

[Read more about the REST API](copernica-docs:SMTPeter/api-documentation/rest-api)

## SMTP vs REST

So what exactly is the difference between the SMTP and REST API? The biggest difference
is that SMTP tends to be a bit "chatty" compared to the REST API, this because the SMTP protocol is
a so called [handshake protocol](https://en.wikipedia.org/wiki/Handshaking). A REST API simply gives 
orders to be followed by the receiver, making the REST API faster than the SMTP API. 

Another difference is that the REST API inheritly has the possiblity to include different variables 
in a single "call", the SMTP protocol was not designed to do so. Because of this you currently have to 
create separate logins in your [Dashboard](copernica-docs:SMTPeter/Dashboard/smtp-credentials) for
variables such as tracking, inline css and bounce management. 

<!---
## Which API should I use? 

@todo
-->
