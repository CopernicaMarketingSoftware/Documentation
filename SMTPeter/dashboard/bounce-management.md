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

If you choose to set up a forward address, SMTPeter will forward all bounces after they have been 
processed. You can then process the bounces further in your own application. Do note that if you 
send email to a lot of recipients at the same time this could fill up the mail box of this address 
quite quickly. 

### Post the bounce message to a callback url

It is also possible to forward the bounce message to a 'webhook'. You can specify the 
callback url for the webhook in your dashboard. SMTPeter will send the bounce report to 
the callback url as a POST request. The bounce message will be sent as a JSON document. 
