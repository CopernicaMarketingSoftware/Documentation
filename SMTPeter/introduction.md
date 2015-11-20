# Getting started with SMTPeter


SMTPeter is a cloud-based SMTP service for fast and secure email delivery. Instead 
of directly sending your email to the recipient, it gets relayed through SMTPeter, 
which adds tracking, bounces, lets you add DKIM signatures and improves your email 
delivery. 

You can send any kind of email through SMTPeter, as long as you have the recipients 
consent. So whether you send transactional, mass or even your own outlook/thunderbird 
emails through SMTPeter is up to you. 

Receiving mail servers have different algorithms for accepting and limiting emails. 
SMTPeter optimizes your email delivery by adjusting delivery speed based on those 
rates. SMTPeter also has many other features to make email delivery easier. 

[Read more about SMTPeter's features](copernica-docs:SMTPeter/features) 

## Connecting to SMTPeter

There are two ways to connect to SMTPeter: you can connect through the SMTP API or 
the REST API. Connecting to the SMTP API is simple: all you have to do is configure 
your application or mail server to forward email to SMTPeter. You can find more details 
about our SMTP API in our SMTP API documentation. 

The other option is to use the REST API to send your emails through SMTPeter. This makes 
it possible to send email using regular HTTPS POST calls. The REST API is the recommended 
way to connect to SMTPeter because the REST protocol is faster and more flexible than the 
SMTP protocol. Our REST API documentation tells you how to connect to SMTPeter and what 
the different options are. 

However, both API's fully support different delivery options, bounce management and tracking 
of opens and clicks. 


[Read our API documentation for more information on our APIs](copernica-docs:SMTPeter/api-overview)
