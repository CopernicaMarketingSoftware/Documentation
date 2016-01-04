# SMTP API

The SMTPeter service can of course be accessed using the traditional SMTP
API. SMTP (this stands for Simple Mail Transfer Protocol) is the "language" that email programs
use to transfer mail from one computer to the other. Because SMTPeter comes
with such a SMTP API, you can easily integrate SMTPeter in your existing
mail infrastructure, and you can even set up traditional email clients like
Outlook, Thunderbird or your mobile devices to send all messages through SMTPeter.

To use the SMTP API there are a few things you need to do. First you need to
create an SMTP login via the dashboard. Make sure to write down your password
somewhere safe, it is only shown once.

The SMTP login is used to authenticate with SMTPeter and allows you to enable
[SMTPeter's features](copernica-docs:SMTPeter/features). You can have multiple logins
with different features enabled. The login has to be included whenever you send
email via SMTPeter. In order to login you should configure your application to
authenticate with [AUTH PLAIN or AUTH LOGIN](https://en.wikipedia.org/wiki/SMTP_Authentication).

**Note:** If you see a message you do not have permission to send email please
[contact us](mailto:peter@smtpeter.com "send us email") so we can authenticate your account.


## Connecting to SMTPeter

After you have set up your login credentials it is time to connect to SMTPeter. As
we have said before, connecting using SMTP is really easy. You can simply set your mail
server/application to forward email to SMTPeter's server. SMTPeter can be reached
on the "mail.smtpeter.com" domain, using port 25 and 587:

````
Host:       mail.smtpeter.com
Port:       25, 587, or 465
Encryption: STARTTLS
````

Only authenticated and encrypted connections using "STARTTLS" are supported.
Non-authenticed email and email that is not sent over a secure connection are
rejected.

### What is the difference between port 25 and port 587?

You can use both port 25 and port 587 to send mail to SMTPeter. There is no
difference between these two ports. We have opened port 587 because some providers
block access to port 25.


### Why use port 465
As an alternative to ports 25 and 587, you can also connect to port 465.
This opens up a TCP connection in a secure state right away, and skips
the STARTTLS handshake. Although sending mail over port 465 was never
standardized and is even deprecated in favor of the STARTTLS encryption
(in fact, port 465 has even been reassigned to a new service), communication
over port 465 is faster and SMTPeter supports its usage.


## Examples

To demonstrate how easy connecting to SMTPeter is we will give you three simple
steps of how to set up SMTPeter, with detailed descriptions of the configuration
of various programs.


### 1: Create your SMTP login

Log into your account and go to the api settings menu. Here you can manage your
REST and SMTP credentials. Go to 'manage SMTP credentials' and create a new SMTP
login. Choose the options you want to enable with this login and create the
credentials.

You will now see your generated username and password. Save this password somewhere
safe, you only get to see it once. Note that you have to include the spaces when
entering the password.


### 2: Configure your application to use SMTPeter

The configuration is of course application dependent. Here we give examples
for:

* [Mozilla Thunderbird](copernica-docs:SMTPeter/thunderbird "Example of setting up Mozilla Thunderbird")
* [Android email app](copernica-docs:SMTPeter/android "Example of setting up Android email app")
* [Postfix](copernica-docs:SMTPeter/quick-start/postfix "Example of setting up Postfix")


### 3: send email!

Now your emails will use SMTPeter as your default smtp server and will apply any
options and keys to your email. The first time you send an email you are prompted
to enter your password (if you use Thunderbird) and after that you're all set!


## Passing parameters for SMTPeter's options

The SMTP protocol was never meant to pass parameters with each message. If you want to
enable or disable specific SMTPeter [features](copernica-docs:SMTPeter/features "SMTPeter Features")
for specific messages, you will have to either use SMTP credentials or use different MIME header fields.

In the SMTPeter dashboard you can create multiple SMTP logins. You can for example
create a login for which the "inlinecss" feature is enabled, and one for which it
is disabled. When you connect to the SMTP API, you simply pick a login/password
combination that has the features you need.

The alternative method to enable or disable features is by adding special
[MIME-headers](copernica-docs:SMTPeter/mime "MIME headers") to your email.
