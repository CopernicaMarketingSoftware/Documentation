## Using SMTPeter as a smart host

If you are already using a local mail server, such as Postfix, 
and want to avoid changing the way that different applications 
send out mail, the best way to send mail is to set up SMTPeter
as a smart host. 

In a smart host setup, your application still connects to
your local mail server. The mail server will then - instead of
directly delivering the mail itself - deliver it to
SMTPeter.

This way, you get the best of both worlds. Connect times
are very low (because the MTA is local), which is
ideal when making many connections for single mail delivery,
while SMTPeter takes care of the actual email delivery,
throttling according to the speed of the receiving mail
server.

[Learn how to set up Postfix to send through SMTPeter](copernica-docs:SMTPeter/quick-start/postfix "Sending through SMTPeter with Postfix")
