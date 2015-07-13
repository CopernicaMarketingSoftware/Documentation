# Introduction

## What is SMTPeter?

SMTPeter is a cloud-based SMTP server for fast and secure email delivery. It 
is designed to help your applications and websites send email messages. You can 
send all kinds of email with SMTPeter: from transactional email messages 
to mass mailings. We will take care of all of the technical and delivery details, 
so you can focus on creating and optimizing your email messages and campaigns. 

## Who is SMTPeter for?

SMTPeter is for anyone looking for enterprise level of email delivery.
Whether they are transactional or marketing emails, SMTPeter is made
to deliver large volumes of email messages on demand.

## Why use SMTPeter?

When sending an email, the message has to be delivered to the recipient's 
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

![](copernica-docs:SMTPeter/Images/how_does_smtpeter_work_diagram.png "How SMTPeter Works")

## Connecting with SMTPeter

SMTPeter proves two ways to send email: through our SMTP API or our REST API. 

The [SMTP API](copernica-docs:SMTPeter/api-documentation/smtp-api "SMTP API Documentation") 
makes it easy to integrate SMTPeter with any exising application. 
Simply modify your SMTP configuration to use SMTPeter and you are ready to send. 

The [REST API](copernica-docs:SMTPeter/api-documentation/rest-api "REST API Documentation"), 
adds more control, speed and configuration options to the integration. 
Allowing for a deeper and more advanced integration with our email delivery service. 

[Introduction to our REST and SMTP APIs](copernica-docs:SMTPeter/api-documentation/api-introduction "API Overview")

## The SMTPeter Dashboard

On the SMTPeter website you can find your (personal) Company 
Dashboard. On this Dashboard you can view and edit your company 
information, and also see your license and billing information. 

The Dashboard is also used for creating access tokens for our 
REST API and SMTP credentials for our SMTP API. Setting up your 
configuration, such as creating and setting up your DKIM keys 
and bounce management for SMTPeter is also done in your dashboard. 

The statistics tab of the dashboard gives you easy access to the 
statistics of all your email messages and campaigns.

[Read more about the Dashboard functions](copernica-docs:SMTPeter/dashboard/dashboard-overview)

## SMTPeter features

Of course, there is more to SMTPeter than just delivering your email messages. We can track 
opens, clicks and bounces, and can also automatically inline all your css for you 

[Read more about SMTPeter's features](copernica-docs:SMTPeter/dashboard/features "SMtpeter features")

##Responsive Email

[Copernica](https://www.copernica.com "Copernica Website"), the company behind SMTPeter, 
offers a wide range of email and email delivery tools. SMTPeter has been designed for 
email delivery, hwoever for those of you that want to create emails and save templates 
for SMTPeter, we also offer a drag-and-drop editor for fully responsive emails. 

If you already have an SMTPeter account, all you have to do is go to 
[ResponsiveEmail.com](https://www.responsiveemail.com "ResponsiveEmail website") 
and log in. You can create your templates there and all your templates and statistics
can be found in the ResponsiveEmail dashboard. 

[Using ResponsiveEmail with SMTPeter](copernica-docs:SMTPeter/responsive-email "Using ResponsiveEmail with SMTPeter")

## MailerQ

SMTPeter is a SaaS (software as a service) soluttion. It operates on our servers 
and we handle all the techinical details. For those of you that are not interested 
in a SaaS-solution, or do not want to share data with third parties, we also offer MailerQ,
the Mail Transfer Agent behind SMTPeter's and Copernica's email delivery, as an on-premise 
solution. 

[Learn more about MailerQ](https://www.mailerq.com "MailerQ Website")


