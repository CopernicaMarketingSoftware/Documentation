# Send via SMTP API

The SMTPeter service can be accessed using a traditional SMTP API. SMTP is 
the language or protocol that email programs use to transfer mail from 
one computer to the other. Because SMTPeter comes with a SMTP API, you can 
easily integrate SMTPeter in your existing mail infrastructure, and you can 
even set up traditional email clients like Outlook, Thunderbird or your 
mobile devices to send all messages through SMTPeter.

To use the SMTP API you need to authenticate yourself to our servers,
so you should configure your application to authenticate with 
[AUTH PLAIN or AUTH LOGIN](https://en.wikipedia.org/wiki/SMTP_Authentication).
You can create different SMTP logins via the SMTPeter dashboard. 
So you can for make different logins for different users, and/or enable or disable specific features such
as click tracking, for different logins.

If you do not want to bother with different accounts, you can instead use the 
email/password combination of your SMTPeter account or Copernica account to login.
Note however that most additional features, including tracking of clicks and opens, are disabled for this option.

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
* [Postfix](postfix "Example of setting up Postfix")

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
[MIME-headers](mime-headers "MIME headers") to your email.