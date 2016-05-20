# SPF validation

If you send email through SMTPeter, you must make sure that you set up 
SPF records in your DNS. Luckily, the SMTPeter dashboard has tools to help 
you. You can simply follow the recommendations that come with 
[sender domains](sender-domains). If you set up a sender domain, the
dashboard give you precise instructions on how to set up your DNS records,
including the SPF records.

This article is intended for advanced users who want to have background
information about SPF, or who want to control the SPF records that are 
created by us.


## What is SPF?

Let's start with some background information first. SPF is a technology
to specify which servers on the internet may send out email messages
out of your name. In reality people normally use an intermediate 
server offered by their provider to send out emails. However, from a 
technical perspective it is perfectly possible for every computer to deliver 
email directly without such an intermediate server.

However, it is highly unlikely that a laptop in a village that you 
never heard of directly connects to Gmail to send an email using your 
domain name. If that happens, you can be pretty sure that someone is 
trying to do something nasty and is abusing your domain. This can be
prevented with SPF records.

An SPF record is a setting in DNS. If you have a domain name, you can not
only use DNS to store the IP address of your website, but also to
advertise a list of IP addresses from which you send out email. When
a receiver gets an email message from a server or computer who claims
to represent you, it can check this DNS record. If the IP address of this
server or computer is indeed in this list, it knows for sure that the mail 
came from a valid source. When the IP is on the other hand not listed in 
the SPF record, it handles the mail with much more care, or even rejects
the message.

With SPF records in your DNS you prevent that random computers on the 
internet can claim to send out mail from your domain. Besides that, with
a valid SPF record you look more professional and that might also have
a positive influence on the placement of your message in the users' inbox.


## The sender domain recommendations

If you use SMTPeter's dashboard to set up a [sender domain](sender-domains), 
we take care of hosting your SPF records. This means that you do not have
to set up SPF records yourself, but that we do that for you. In your
DNS you just have to add a very simple SPF record that refers (using an
"include" mechanism) to the SPF record that we created for you. The exact 
record that you should copy can be found on the dashboard.

However, the SPF record that we host for you only contains SMTPeter's own 
IP addresses. If you also send out email from other places, you need to
add these other IP addresses too. You can do this in two different ways: you
can either not refer to the SPF record that we host for you at all and do 
everything yourself, or you go to the dashboard to instruct us from
which IP addresses you also send out mail.

This second approach is easier. The dashboard contains easy tools that allow
you to add IP addresses or other rules to your hosted-by-us SPF
records. In fact, if you've followed our recommendations closely, we
probably even receive DMARC reports from various parties over the world, 
so we already know from which places you are sending out your email.


## Setting up your own SPF records

If you do not want to use our recommended SPF records, you should do 
everything yourself. Your SPF record should hold a list of all the IP 
addresses from which you send out email. Make sure you also include
SMTPeter's IP addresses. You can do this by adding "include:smtpeter.com"
to your record.

If you use SMTPeter exclusively to send out email, you can use the 
following SPF record:

````
v=spf1 include:smtpeter.com -all
````

This is an SPF record that basically says: "all SMTPeter IP addresses
can be used to send email out of my name." If you use other servers too, 
then your SPF record has to be a little longer, but it should at least contain
the "include:smtpeter.com" part, so that your mails can flow through 
SMTPeter.


