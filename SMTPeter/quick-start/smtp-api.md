# SMTP API quick start guide

If you want to send through SMTPeter using our SMTP API, please follow the 
steps below to get started. 

## Create your SMTP credentials

To make sure not just anyone can send email through SMTPeter you will need to 
create an access key. Go to your dashboard and create yoru SMTP credentials:

[Create your SMTP credentials](https://www.smtpeter.com/app/#/admin/smtp-credentials "Create your SMTP credentials")

Please enable or disable the features you want to use whilst creating your login. 
You can create multiple logins. 


## Change your SMTP Configuration

Now you've created your login credentials you will need to change the 
SMTP credentials of your application/mail server. Please set it to the 
following to send through SMTPeter:

```text
Host:       mail.smtpeter.com 
Port:       25 or 587 
Encryption: STARTTLS 
```

or, for SSL connections:

```text
Host:       mail.smtpeter.com 
Port:       465 
Encryption: SSL 
```

Authentication is done using your login credentials. Make sure to use either 
[AUTH PLAIN or AUTH LOGIN](https://en.wikipedia.org/wiki/SMTP_Authentication). 

And that's it! You are now ready to send using our SMTP API. If you want more 
information about our SMTP API and its features, please read our 
[SMTP API documentation](api-documentation/smtp-api).
