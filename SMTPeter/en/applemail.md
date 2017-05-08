# Setting up SMTPeter in Apple Mail

It is possible to use SMTPeter in combination with Apple's mail client. 
Follow these steps to add SMTPeter as your outgoing mail server.

Go to 'Accounts' and select the account you want to use with SMTPeter. 
Click the menu next to 'Outgoing mail server' and select 'Edit SMTP server list'.
Click the '+'-symbol to add a new server to the list. Fill in the following settings:

- 'Description': Name for your server
- 'Server name': 'mail.smtpeter.com'
- 'Port': Number of the [port](./smtp-ports) you'll use
- 'Authentication': Same as 'Password'
- 'User name' and 'Password' should hold the credentials of the SMTP login that you created in SMTPeter

![Apple mail screenshot 1](Images/apple-en-1.png 'Apple mail instellingen')
![Apple mail screenshot 2](Images/apple-en-2.png 'Apple mail instellingen 2')

After this, select the newly created server in the drop-down menu next to 
'Outgoing email server'. From now on, all your outgoing email will be processed by SMTPeter!

## More information

* [Configuring the SMTP API](./introduction-smtp-api)
* [SMTP API](./smtp-api)
