# Integrate SMTPeter

There are two ways to connect to SMTPeter: you can connect through the SMTP API or the REST
API. Connecting to the SMTP API is simple: all you have to do is configure
your application or mail server to forward email to SMTPeter. You can find more details
about our SMTP API in our [SMTP API documentation](copernica-docs:SMTPeter/smtp-api "SMTP API").

The other option is to use the REST API to send your emails through SMTPeter. This makes
it possible to send email using regular HTTPS POST calls. The REST API is the recommended
way to connect to SMTPeter because the REST protocol is faster and more flexible than the
SMTP protocol. Our [REST API documentation](copernica-docs:SMTPeter/rest-api "REST API")
tells you how to connect to SMTPeter and what the different options are.

Although there are two APIs, both APIs fully support all of SMTPeter's options. 
