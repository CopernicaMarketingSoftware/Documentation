# Introduction

## What is SMTPeter?

SMTPeter is a cloud-based SMTP server for fast and secure email delivery. It 
is designed to help your applications and websites send email messages. From
transactional email messages to mass mailings, we will take care of 
all of the technical and delivery details, so you can focus on creating 
and optimizing your email messages. 

## Who is SMTPeter for?

SMTPeter is for anyone looking for enterprise level of email delivery.
Whether they are transactional or marketing emails, SMTPeter is made
to deliver large volumes of email messages on demand.

## Why use SMTPeter?

When sending an e-mail, the mail has to be delivered to the recipient's 
mail server. For example: if you send an email to user@gmail.com, a
connection is made to one of Googles email servers to deliver the email.
An email sent to user@live.com will be delivered to Microsoft.

All these mail senders have their own configuration. They may e.g.
limit the number of messages that may be delivered over a single connection,
how many connections may be opened from a single I.P. address. They may also
keep an eye on IP addresses that suddenly send a lot of mails when they did not
use to do so in the past and mark these mails as spam.

When using SMTPeter you don't have to worry about this at all. You simply deliver
your mail to SMTPeter and we take care of the rest. We make sure to connect to the
right server, and that the addresses we send from have a reputation sufficient to
avoid getting marked as spam. If the receiving server can not handle the flow of
messages, we throttle back delivery.

![](copernica-docs:SMTPeter/Images/how_does_smtpeter_work_diagram.png)

## Connecting with SMTPeter

SMTPeter proves two ways to send email: through our SMTP API or our REST API. 

The [SMTP API](copernica-docs:SMTPeter/api-documentation/smtp-api "SMTP API Documentation) 
makes it easy to integrate SMTPeter with any exising application. 
Simply modify your SMTP configuration to use SMTPeter and you are ready to send. 

The [REST API](copernica-docs:SMTPeter/api-documentation/rest-api "REST API Documentation"), 
ads more control, speed and configuration options to the integration. 
Allowing for a deeper and more advanced integration with our email delivery service. 

[Introduction to our REST and SMTP APIs](copernica-docs:SMTPeter/api-documentation/api-introduction "API Overview")

## The SMTPeter Dashboard

On the SMTPeter website you can find your (personal) company Dashboard. In this Dashboard
you can view and edit your company information and see your licenses and billing information. 
The Dashboard is also used for creating and storing REST API tokens, SMTP credentials, DKIM keys
and to set up your bounce management. 

[Read more about the Dashboard functions](copernica-docs:SMTPeter/dashboard/dashboard-overview)

<!---
## SMTPeter features

Of course, there is more to SMTPeter than just delivering your email messages. We can track 
opens, clicks and bounces, and you can create fully responsive emails using our 
[ResponsiveEmail service](https://www.responsiveemail.com "ResponsiveEmail website"). 
All statistics and created templates can be found in your [ResponsiveEmail Dashboard](https://www.responsiveemail.com/https://www.responsiveemail.com/app/ "ResponsiveEmail Dashboard").

@todo features and what they do. 

[link to feature overview]
-->
