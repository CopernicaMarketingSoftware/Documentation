##SPF email validation - a brief introduction
Ever since email became commonplace for everyday communication, spammers and other crooks have 
taken advantage of the medium to try to lure people into buying certain pills or to kindly ask 
if they can help stash millions on behalf of a deceased Nigerian princess. Especially with phishing
emails, these culprits use forged sender addresses to make it look like a legit email, for instance 
from your credit card company. To prevent these emails from actually reaching your inbox, various
tools have been developed over the years. SPF is one of them.
This article is intended for users who want to have background information about SPF, or who want 
to control the SPF records that are created by us. If you want to set up SPF with your sender domain, 
please follow the instructions on our article about setting up sender domains with Marketing Suite.

##What is SPF?
Let's start with some background information. SPF is a tool to specify which servers on the internet
may send out email messages using your name. In reality people normally use an intermediate server 
offered by their provider to send out emails. However, from a technical perspective it is perfectly
possible for every computer to deliver email directly without such an intermediate server.
However, it is highly unlikely that a laptop in a village that you never heard of directly connects 
to Gmail to send an email using your domain name. If that happens, you can be pretty sure that someone
is trying to do something nasty and is abusing your domain. This can be prevented with SPF records.
An SPF record is a setting in DNS. If you have a domain name, you can use DNS not only to store the 
IP address of your website, but also to advertise a list of IP addresses from which you send out email.
When a receiver gets an email message from a server or computer who claims to represent you, it can check 
this DNS record. If the IP address of this server or computer is indeed in the list, it knows for sure that
the mail came from a valid source. On the other hand, when the IP is not listed in the SPF record, 
it handles the mail with much more care, or even rejects the message.
With SPF records in your DNS you prevent random computers on the internet from claiming to send out mail 
from your domain. Besides that, a valid SPF record makes you look more professional, which could also have
a positive influence on the placement of your message in the users' inbox.

##The sender domain recommendations
If you use the Marketing Suite dashboard to set up a sender domain, we take care of hosting your SPF records. 
This means you do not have to set up SPF records yourself, but we do that for you. All you have to do is add 
a very simple SPF record to your DNS that refers (using an "include" mechanism) to the SPF record that we created
for you. The exact record that you should copy can be found on the dashboard.
However, the SPF record that we host for you only contains SMTPeter's (our own email gateway) IP addresses.
If you also send out email from other places, you need to add these other IP addresses too. You can do this in 
two different ways: you can either not refer to the SPF record that we host for you at all and do everything yourself,
or you can go to the dashboard to instruct us from which IP addresses you also send out mail.
The second approach is easier. The dashboard contains easy-to-use tools that allow you to add IP addresses or other
rules to your hosted-by-us SPF records. In fact, if you've followed our recommendations closely, we probably even 
receive DMARC reports from various parties over the world, so we already know from which places you are sending 
out your email.

##Setting up your own SPF records
If you do not want to use our recommended SPF records, you can do it yourself. Your SPF record should hold a list 
of all the IP addresses from which you send out email. Make sure you also include SMTPeter's IP addresses. You can 
do this by adding "include:smtpeter.com" to your record.
If you only use SMTPeter to send out email, you can use the following SPF record:
v=spf1 include:smtpeter.com -all
This is an SPF record that basically says: "all SMTPeter IP addresses can be used to send email out of my name." 
If you use other servers too, then your SPF record has to be a little longer, but it should at least contain the
"include:smtpeter.com" part, so that your mails can flow through SMTPeter.
