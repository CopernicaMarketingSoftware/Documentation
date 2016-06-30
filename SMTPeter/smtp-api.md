# SMTP API

The SMTPeter service can be accessed using a traditional SMTP API. SMTP is 
the language or protocol that email programs use to transfer mail from 
one computer to the other. Because SMTPeter comes with a SMTP API, you can 
easily integrate SMTPeter in your existing mail infrastructure, and you can 
even set up traditional email clients like Outlook, Thunderbird or your 
mobile devices to send all messages through SMTPeter.

To use the SMTP API there are a few things you need to do. First you need to
create an SMTP login via the dashboard. This SMTP login is used to authenticate 
with SMTPeter. The login has to be included in the SMTP handshake whenever 
you send email via SMTPeter. In order to login you should configure your 
application to authenticate with 
[AUTH PLAIN or AUTH LOGIN](https://en.wikipedia.org/wiki/SMTP_Authentication).

It is possible to create multiple logins. You can for example make different
logins for different users, and/or to enable or disable specific features per
login. You can for example set up a login that with click tracking enabled,
and a second login for which this feature is disabled. Based
on your needs, you can then use one of these logins to inject mail.
 

## Examples

To demonstrate how easy it is to connect with SMTPeter, we have three 
examples of how to set SMTPeter for different email clients.

Before you set up your client, you first have to open SMTPeter's dashboard
and create a SMTP login. Remember the password or copy it immediately to 
your application, because this is the only time that you are going to 
see it. Internally, all passwords are encrypted by SMTPeter, so if you lose 
it, you will have to create a new password.


### Configure your application

The SMTP configuration is application dependent. We have examples 
for a couple of well known email programs:

* [Mozilla Thunderbird](thunderbird "Example of setting up Mozilla Thunderbird")
* [Android email app](android "Example of setting up Android email app")
* [Postfix](quick-start/postfix "Example of setting up Postfix")

After setting up your email program to use SMTPeter, all your emails will 
pass through SMTPeter as your default SMTP gateway. The first time you send 
an email you are prompted to enter your password (if you use Thunderbird) 
and after that you're all set!


## Passing parameters for SMTPeter's options

The SMTP protocol was never meant to pass parameters with each message. If you want to
enable or disable specific SMTPeter features for specific messages, you will have 
to either use SMTP credentials or use different MIME header fields.

In the SMTPeter dashboard you can create multiple SMTP logins. You can for example
create a login for which the "inlinecss" feature is enabled, and one for which it
is disabled. When you connect to the SMTP API, you simply pick a login/password
combination that has the features you need.

The alternative method to enable or disable features is by adding special
[MIME-headers](mime "MIME headers") to your email.
