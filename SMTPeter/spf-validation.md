# SPF validation

If you send email through SMTPeter, you must make sure that you've
configured your SPF records correctly. You must make sure that the IP
addresses from which SMTPeter is going to send mail are included in
your SPF record. Luckily, the SMTPeter dashboard has the right tools
to help you with your configuration.


## What is SPF?

Let's start with some background information first. SPF is a technology
to specify which servers on the internet may send out email messages
out of your name. Without SPF it is possible to send out email from every 
computer on the internet: your personal computer or even your telephone can deliver mail 
directly to Gmail or directly to Hotmail, and it is not necessary to 
use intermediate gateways like SMTPeter to reach your recipients. 

However, it is highly unlikely that a laptop in a village that you 
never heard of directly connects to Gmail to send an email using your 
domain name. If that happens, you can be pretty sure that someone is 
trying to do something nasty, and is abusing your domain. You can 
prevent this with SPF records.

An SPF record is a setting in DNS. If you have a domain name, you can not
only use DNS to store the IP address of your website, but also to
advertise a list of IP addresses from which you send out email. When
a receiver gets an email message from a server or computer who claims
to represent you, it can check this DNS record. If the IP address of this
server or computer is indeed in this list, it knows for sure that the mail 
came from a valid source. When the IP is on the other hand not listed in 
the SPF record, it handles the mail with much more care, or even rejects
the message.


## Configuring your SPF records

If you do not yet have a SPF record for your domain, we strongly advise you 
to install it. With such a record you prevent that random computers on the 
internet can claim to send out mail from your domain. Besides that, with
a valid SPF record your mails seems more professional and that might have
a positive influence on the placement of your message in the users' inbox.

Your SPF record should hold a list of all the IP addresses from servers that
send your email. Thus, if you send *all* your email through SMTPeter,
you only have to include SMTPeter's IP addresses. But if you also use other
servers to send email, you have to include these other addresses too. If you 
use SMTPeter exclusively to send out email, you can use the following SPF record:

````
v=spf1 include:smtpeter.com ?all
````

This is an SPF record that basically says: "all SMTPeter IP addresses
can be used to send email out of my name." If you use other servers too, 
then your SPF record has to be a little longer, but it should at least contain
the "include:smtpeter.com" part, so that your mails can flow through 
SMTPeter.


## Using the dashboard 

When you go to the SMTPeter dashboard, you can register sender domains.
A sender domain is a domain name from which you intend to send out
email. If you add a sender domain to your dashboard, SMTPeter automatically
generates the appropriate DNS records for you, so that you only have to
copy these records to your DNS configuration.

SMTPeter also automatically checks whether you have correctly copied this. 
It checks your DNS records and if it indeed contains the IP addresses of 
SMTPeter it compliments you. If something is wrong with your configuration,
it shows an error that allows you to repair your setup.

