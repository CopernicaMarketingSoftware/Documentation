# Set up Postfix to send through SMTPeter

## Configure your hostname

Before you can properly relay your email messages, make sure that
the **myhostname** parameter is configured with your
server's fully-qualified domain name (FQDN). You can set this by
going to `/etc/postfix/main.cf` and set the following:

```ini
myhostname = fqdn.yourdomain.com
```

## Configure SMTP username and password

The next step is to configure your SMTP username and password for
SMTPeter. These credentials are generally stored in a file called
*sasl_passwd* in your `/etc/postfix/` directory. If you already have
the *sasl_passwd* file, open it using your text editor of choice:

```bash
$ sudo nano /etc/postfix/sasl_passwd
```

If not, simply create one. On a new line, add the following (replacing
username and password with your SMTPeter SMTP credentials):

```ini
[mail.smtpeter.com] USERNAME:PASSWORD
```

If you want to specify the port, you can do so by adding the port number
after the hostname:

```ini
[mail.smtpeter.com]:587 USERNAME:PASSWORD
```

When you add (or change) these credentials you should run the following
postmap command:

```bash
$ postmap /etc/postfix/sasl_passwd
```

For security reasons, run the following command to make sure
only root can read and write to the file with your SMTP credentials: 

```bash
$ sudo chmod 0600 /etc/postfix/sasl_passwd /etc/postfix/sasl_passwd.db
```

## Configure Postfix to send all email through SMTPeter

Now you have set up your credentials it is time to configure Postfix
to use SMTPeter. First open your Postfix configuration file, */etc/postfix/main.cf*, with your text editor of choice:

```bash
$ sudo nano /etc/postfix/main.cf
```

Then update or add the following configuration settings:

```ini
# enable SASL authentication
smtp_sasl_auth_enable       = yes

# tell Postfix where the credentials are stored
smtp_sasl_password_maps     = hash:/etc/postfix/sasl_passwd 
smtp_sasl_security_options  = noanonymous

# use STARTTLS for encryption
smtp_use_tls                = yes 

# specify SMTP relay host
relayhost                   = [mail.smtpeter.com]:587

# where to find CA certificates
smtp_tls_CAfile             = /etc/ssl/certs/ca-certificates.crt
```

 > **Note:** If you specified a non-default TCP port in the *sasl_passwd file, you will have
    to use the same port when setting the **relayhost** parameter.

After you have saved your changes, restart Poxtfix and you 
should be ready to test. 

```bash
$ sudo service postfix restart
```

<!---
### configure Postfix to only send certain emails through SMTPeter

@todo
-->
