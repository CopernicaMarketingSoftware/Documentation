# Bounce Mangement

In the Bounce Managment tab of your SMTPeter dashboard
you can configure what SMTPeter should do with bounces. 

An email is considered 'bounced' when it cannot be delivered, due 
to, for example a full mailbox or a non existing recipient. It 
is considered good practice to remove unreachable addresses from 
your email list. 

## Managing Bounces in SMTPeter

You can set SMTPeter to react in three different ways when a bounce 
is received:

### Ignore bounces

You can choose to ignore bounces (not recommended), 
which means SMTPeter will receive the bounce message and do nothing.

### Forward the bounce message

You can also choose to let SMTPeter forward the bounce report to a 
specific email address. The bounce message will then be forwarded to 
this address where your own application can process it further. 

### Post the bounce message to a callback url

Another way to process bounces is to post the bounce report 
to a callback URL. This is the best way for your own application 
to further process the bounce message. 
