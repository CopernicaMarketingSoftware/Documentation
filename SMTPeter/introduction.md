# Introduction

## What is SMTPeter?

SMTPeter is a cloud-based SMTP server for fast and secure email delivery. It 
is designed to help your applications and websites send email messages.


![](copernica-docs:SMTPeter/Images/how_does_smtpeter_work_diagram.png "How SMTPeter Works")


You can send all kinds of email with SMTPeter: from transactional email messages 
to mass mailings. We will take care of all of the technical and delivery details, 
so you can focus on creating and optimizing your email messages and campaigns. 


## What does SMTPeter do?

Different mail servers, such as Yahoo, Gmail and Hotmail, have different configurations. 
They accept email at a different rate, using different limits on, for example the amount 
of connections or messages over a single connection. SMTPeter handles optimizing delivery 
for these diferrent mail servers and improves your email deliverability. 

Besides improving email delivery, SMTPeter also has several different features to help 
you further improve your email messages. 

### Inlining CSS

The style (CSS) of your email is normally placed in the header of your HTML document, 
however some email clients strip out the email headers, getting rid of the complete style 
sheet of your email. To avoid this SMTPeter gives you the option to automatically inline 
all CSS. This will add your header style to each corresponding HTML tag. 


[Read more about inlining CSS](copernica-docs:SMTPeter/features/inline-css)


### Bounce tracking

When an e-mail cannot be delivered the receiving mail server often sends a specific 
'bounce' message. This message often gives a code and states why an email cannot be 
delivered and is sent the the envelope address of your email. 

SMTPeter can track bounces and also allows you to [send bounces to a specific address or link](copernica-docs:SMTPeter/dashboard/bounce-management "Bounce Management"). 
The bounced addresses will be shown in your statistics dashboard and, if you have 
set up your bounce management, they can also be returned to your own application, 
where you can process them further. 


## Email analytics 

Statistics are an important indicator of the succes of an email campaign and 
helps to further improve your campaign. SMTPeter offers both open and click 
tracking. 

### Open Tracking

Open tracking adds a so called 'tracking pixel' to your email. When one of your recipients 
opens your email the tracking pixel will send a notification back to SMTPeter's 
servers and show this in your statistics overview or can be retreived using the REST API. 

The tracking pixels knows exactly which email address corresponds with the 
open, which gives you detailed recipient based statistics. 

### Click Tracking

Click tracking means that SMTPeter convert's all your links to point towards 
SMTPeter's servers where we forward them to the original link's location. This does not 
change anything for your links, but makes it so our servers receive a notification 
whenever one of your recipients clicks on a link in your email. All clicks are 
show in your statistics overview or can be retreived using the REST API. 

Link tracking shows exactly which email address corresponds with a click, 
which gives you detailed recipient based statistics

