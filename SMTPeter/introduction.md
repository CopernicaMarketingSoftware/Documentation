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


## What does SMTPeter do?

There are many reasons why you would want to use SMTPeter. For example, mail services such 
as Yahoo, Gmail and Hotmail all have different policies for accepting email. They all
accept emails at different rates and use different limits for the number of acceptable
connections or messages. SMTPeter knows about these limits and throttles automatically your 
messages for best deliverability.

But deliverability is not the only reason to use SMTPeter. SMTPeter also has many other cool 
features to further improve your email messages. Let's name a few.


### DKIM signing

You can use SMTPeter to store all your private DKIM keys. Every mail that
is forwarded by SMTPeter is then automatically signed with your private
key before it is delivered to the final recipient. Because signing happens
at the very latest moment - right before the mail is delivered - you can 
be sure that the signature is not going to break.

DKIM signing is especially useful if you use SMTPeter for delivering your
local emails - the messages that you send from your own desktop or email
client. Such messages are often not DKIM signed, while it is much more
secure, and if your domain uses DMARC often necessary, to have such 
signature. By sending mail through SMTPeter.com you can be sure that 
all your mails have a valid DKIM signature.

[Read more about DKIM support](copernica-docs:SMTPeter/features/dkim-support)


### DMARC validation

The latest technology in email delivery is DMARC. DMARC combines SPF and
DKIM to further verify all your outgoing emails. Via the SMTPeter dashboard
you can check whether you have correctly configured your DMARC, DKIM and
SPF records, and set up sender domains to fix this if necessary.

SMTPeter automatically generates correct DNS records for you, which you
can copy-and-paste into your own DNS configuration, so that all mails
sent through the SMTPeter gateway are conform to the DMARC specification.

[Read more about DMARC and sender domains](copernica-docs:SMTPeter/features/sender-domains)


### Inline CSS

The stylesheet (CSS) of your email is normally placed in the header of your HTML document. 
However, some web based email clients strip out these HTML headers, and get rid of the 
complete stylesheet of your email. To avoid this, SMTPeter can automatically inlinize
all CSS code. If you use this feature, the CSS stylesheet that was originally placed on 
top of your HTML document, is transformed by SMTPeter into many different "style" attributes 
for the individual tags. Even when the header gets removed by a web based email client,
your email message will still be displayed correctly.

[Read more about inlining CSS](copernica-docs:SMTPeter/features/inline-css)


### Bounce tracking

When you send an email, you normally have to take care of failed deliveries 
that are sent back to the email's envelope address. However, if you do not want to 
set up an infrastructure to take care of bounces yourself, you can let SMTPeter 
do this for you. SMTPeter processes all bounces and present the results in a 
clear overview. These bounce reports can optionally be forwarded to you by
email or using a POST request to a preconfigured callback url.


[Read more about bounce tracking](copernica-docs:SMTPeter/features/bounce-tracking)

### Click Tracking

SMTPeter can also track when a recipient clicks on a link within your email.
Link tracking shows exactly which email address corresponds with a click, 
which gives you detailed recipient based statistics.

[Read more about click tracking](copernica-docs:SMTPeter/features/click-tracking)


<!--

### Open Tracking

Open tracking adds a so called 'tracking pixel' to your email. When one of your recipients 
opens your email the tracking pixel will send a notification back to SMTPeter's 
servers and show this in your statistics overview or can be retreived using the REST API. 

The tracking pixels knows exactly which email address corresponds with the registered
open, which gives you detailed recipient based statistics. 

-->

