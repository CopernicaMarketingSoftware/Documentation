## SMTP API Overview

An overview of SMTPeter's SMTP API. 

## Connecting through SMTP

Connecting to SMTPeter through our SMTP API is very simple. First
you will need to create login credentials in your [Dashboard](copernica-docs:SMTPeter/dashboard/smtp-credentials "Dashboard Documentation"), 
these credentials will let SMTPeter know that you are allowed to
send email. Once you have your credentials you will have to configure
your email client/mail server to forward mail with the following settings:

    Host: mail.smtpeter.com
    Port: 587 (recommended) or 25
    Encryption: STARTTLS

And that is it! You are all set up for sending email through SMTPeter. 

## Where can I find my SMTP credentials?

You can find and create your SMTP credentials in your
[SMTP credential overview](https://www.smtpeter.com/app/#/admin/smtp-credentials "Go to your dashboard") 
on your SMTPeter Dashboard. The overview shows all the generated usernames for 
your account, the passwords are not shown in the dashboard and are only shown once
when you create new SMTP credentials. Make sure you write down your password somewhere
safe!

You can create multiple SMTP credentials for your account. Each set of credentials
can have a [specific set of features](copernica-docs:SMTPeter/features) enabled or 
disabled, which you need to specify when you create new SMTP credentials. You can use the 
different logins if you want to enable or disable certain features for specific emails. 

## Which ports does SMTPeter support? 

SMTPeter supports both port 25 and 587. 

> Whilst we support both port 25 and 587, we recommend using **Port 587** 
to avoid limits set by some hosting providers. 

<!---
## Common errors

@todo

## Examples?

@todo

-->

## Setting up your local mail server to send with SMTPeter

You can also set up your local mail server, such as Postfix
to use SMTPeter as [smart host](copernica-docs:SMTPeter/api-documentation/smart-host).

[Learn how to set up Postfix to send through SMTPeter](copernica-docs:SMTPeter/integrate/postfix) 
