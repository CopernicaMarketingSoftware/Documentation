# Introduction

SMTPeter is a cloud-based SMTP server for fast and secure email delivery. It 
helps applications and websites to send email. Instead of sending email directly
to the recipient, you can let your application send the message through SMTPeter.
This improves your deliverability, and allows you to track all sort of statistics.


![](copernica-docs:SMTPeter/Images/how_does_smtpeter_work_diagram.png "How SMTPeter Works")

You can pass all types of email through SMTPeter: mass mailings, but also
individual transactional emails, or even the messages that you send with your local
desktop based mail client (like Outlook or Thunderbird). We take care of the 
technical and delivery details, and you can focus on creating and optimizing your email 
messages and campaigns. 


## How can you integrate SMTPeter?

SMTPeter comes with two easy-to-use API's. The first one is a regular SMTP API. If you
already have an environment in which you send emails over SMTP, you can simply change
the SMTP settings and have your email sent through SMTPeter instead.

The other API is a REST API. This makes it possible to send out email using regular
HTTP POST calls. Because the HTTP protocol is more flexible than SMTP, you can even
pass all sorts of options with each message to improve deliverability.

[Read more about our REST API vs our SMTP API](copernica-docs:SMTPeter/api-documentation/api-introduction)


## What does SMTPeter do?

There are many reasons why you'd want to use SMTPeter. For example, mail servers such 
as Yahoo, Gmail and Hotmail all have different policies for accepting email. They all
accept emails at different rates, and use different limits for the number of acceptable
connections or messages. SMTPeter knows about these limits, and optimizes and improves 
your email deliverability. 

But deliverability is not the only reason to use SMTPeter. SMTPeter also has many other cool 
features to further improve your email messages. Let's name a few.


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

When you send out email, you normally also have to take care of failed deliveres 
and bounce messages that are sent back to the email's envelope address. However, 
if you do not want to set up an infrastructure to take care of bounces yourself, 
you can let SMTPeter do this for you. SMTPeter can process all bounces and present 
the results in a clear overview. It can also automatically send them to you using 
SMTP or web hooks. You can also use the API to download bounces at periodic intervals. 

[Read more about bounce tracking](copernica-docs:SMTPeter/features/bounce-tracking)
<!--

### Open Tracking

Open tracking adds a so called 'tracking pixel' to your email. When one of your recipients 
opens your email the tracking pixel will send a notification back to SMTPeter's 
servers and show this in your statistics overview or can be retreived using the REST API. 

The tracking pixels knows exactly which email address corresponds with the registered
open, which gives you detailed recipient based statistics. 


### Click Tracking

Click tracking means that SMTPeter convert's all your links to point towards 
SMTPeter's servers, where we forward them to the original link's location. This does not 
change anything for your links, but makes it so our servers receive a notification 
whenever one of your recipients clicks on a link in your email. All clicks are 
show in your statistics overview or can be retreived using the REST API. 

Link tracking shows exactly which email address corresponds with a click, 
which gives you detailed recipient based statistics.

-->