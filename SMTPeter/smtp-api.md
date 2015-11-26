# SMTP API

The SMTPeter service can of course be accessed using the traditional SMTP
API. SMTP (Simple Mail Transfer Protocol) is the "language" that email programs 
(like servers and clients) use to transfer mail from one computer to the 
other. Because SMTPeter comes with such a SMTP API, you can easily integrate 
SMTPeter in your existing mail infrastructure, and you can even set up 
traditional email clients like Outlook, Thunderbird or your mobile devices 
to send all messages through SMTPeter.

To use the SMTP API there are a few things you need to do. First you need to 
create an [SMTPeter account](https://www.smtpeter.com/app/ "dashboard"). 

Once you have created your account you have access to your SMTPeter dashboard. Here
you need to generate your own [SMTP login](https://www.smtpeter.com/app/#/admin/api/smtp). 
Make sure to write down your password somewhere safe, it is only shown once. 

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
Port:       25 or 587
Encryption: STARTTLS
````

Only authenticated and encrypted connections using "STARTTLS" are supported. 
Non-authenticed email and email that is not send over a secure connection are 
rejected. 

### What is the difference between port 25 and port 587? 

You can use both port 25 and port 587 to send mail to SMTPeter. There is no 
difference between these two ports. We have opened port 587 because some providers 
block access to port 25.

## Example

To demonstrate how easy connecting to SMTPeter is we will give you an example of 
setting up a Mozilla Thunderbird application to use SMTPeter for email delivery. 
This works the same with any other application as well. In just 3 easy steps 
you are ready to send:


### 1: Create your SMTP login

Log into your account and go to the api settings menu. Here you can manage your 
REST and SMTP credentials. Go to 'manage SMTP credentials' and create a new SMTP 
login. Choose the options you want to enable with this login and create the 
credentials. 

You will now see your generated username and password. Save this password somewhere 
safe, you only get to see it once. Note that you have to include the spaces when 
entering the password. 


### 2: Configure your application to use SMTPeter

Once you have your credentials it is time for step 2: configuring your application. 
The application we use for this example is Mozilla Thunderbird, however any email application 
that allows you to configure the outgoing SMTP server can be used. 

In Thunderbird we are going to account settings: 

![Account Settings](copernica-docs:SMTPeter/Images/account_settings.png "Go to account settings")

In your account settings we go to the Outgoing Server and press Add. A small 
popup window will come up: 

![Add SMTP server](copernica-docs:SMTPeter/Images/add_smtp_server.png "Add SMTP server")

Here we have to fill out our SMTP settings and username, we will use the default 
settings: 

![SMTP settings](copernica-docs:SMTPeter/Images/smtp_settings.png "Configure SMTP settings")

Now we have set up SMTPeter as a possible SMTP server, the next step is to actually 
make sure you are using SMTPeter. We have not filled out our password yet either, we 
won't have to until we send our first email. 

Now let's set SMTPeter as our main outgoing SMTP server. Go back to main 
account settings page and select SMTPeter as your Outgoing Server.  

![Set SMTP server](copernica-docs:SMTPeter/Images/set_smtp_server.png "Set SMTP server")

And that's all the configuration you have to do! 

### 3: send email!

Now your emails will use SMTPeter as your default smtp server and will apply any 
options and keys to your email. The first time you send an email you are prompted 
to enter your password (if you use Thunderbird) and after that you're all set!


## Passing parameters

The SMTP protocol was never meant to pass parameters with each message. If you want to 
enable or disable specific SMTPeter features for specific messages, you will have to 
either use MIME header fields or use different SMTP credentials.

In the SMTPeter dashboard you can create multiple SMTP logins. You can for example 
create a login for which the "inlinecss" feature is enabled, and one for which it 
is disabled. When you connect to the SMTP API, you simply pick a login/password 
combination that has the features you need.

The alternative method to enable or disable features is by adding special MIME-headers to your email.

```
x-smtpeter-inlinecss:        When set to true, all CSS will be inlined 
x-smtpeter-trackclicks:      When set to true, links will be tracked
x-smtpeter-trackbounces:     When set to true, bounces will be tracked
x-smtpeter-trackopens:       When set to true, opens will be tracked
```

Every incoming MIME message is parsed by SMTPeter and if one of the above MIME 
headers is set the corresponding feature is activated, this overrides the settings 
from your login credentials (in other words: if you have disabled the "inlinecss" 
feature for an SMTP login, but you do include the "x-smtpeter-inlinecss: true" 
header in the mime, the CSS code is going to be inlinized anyway).

All headers prefixed with "x-smtpeter-" are instructions to the SMTPeter servers, and are 
stripped from the message before it is delivered. Your receivers will therefore never 
see these "x-smtpeter-" headers, even if they do inspect the source.
