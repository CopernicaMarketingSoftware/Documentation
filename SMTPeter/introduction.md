# Getting started with SMTPeter

SMTPeter is a cloud-based SMTP service for fast and secure email delivery. Instead 
of directly sending your email to the recipient, it gets relayed through SMTPeter.
You can send any kind of email through SMTPeter, as long as you have the recipients 
consent. So whether you send transactional, mass or even your own outlook/thunderbird 
emails through SMTPeter is up to you. 

## Why do you want to use SMTPeter?

There are many reasons why you would want to use SMTPeter. For example with
SMTPeter's features you can increase the deliverability and security of
your emails. You can easily obtain statistics from your mailings and
add bounce tracking. Or you can increase the consistency of the layout of
your emails. Or you can have it all. Curious?
[Read more about SMTPeter's features](copernica-docs:SMTPeter/features).


## Connecting to SMTPeter

Besides all the features, SMTPeter is easy to use too. There are two ways
to connect to SMTPeter: you can connect through the SMTP API or the REST
API. Connecting to the SMTP API is simple: all you have to do is configure
your application or mail server to forward email to SMTPeter. You can find more details
about our SMTP API in our [SMTP API documentation](copernica-docs:SMTPeter/smtp-api "SMTP API").

The other option is to use the REST API to send your emails through SMTPeter. This makes
it possible to send email using regular HTTPS POST calls. The REST API is the recommended
way to connect to SMTPeter because the REST protocol is faster and more flexible than the
SMTP protocol. Our [REST API documentation](copernica-docs:SMTPeter/rest-api "REST API")
tells you how to connect to SMTPeter and what the different options are.

Although there are two APIs, both APIs fully support all of SMTPeter's options. 
