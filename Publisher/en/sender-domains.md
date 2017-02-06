# Sender domains

In the old times it was very easy to *fake* the from address of an e-mail. However, 
this is no longer as easy as it used to be. For Copernica it is therefore
also not directly possible to start out sending mails on your behalf. To be able 
to send out messages out of your name, you (in your role as owner of the domain name) first
have to add a bunch of records to your [DNS](./dns.md) configuration. By adding
these records to your DNS, you enable receivers to check whether we were indeed 
given permission to send your e-mail. If you do not do this, a huge percentage 
of the mails that you send with our software will not be accepted.

Setting up all these [DNS records](./dns.md) can be a complex task. To help you 
out with this we have introduced a technology that we call *Sender Domains*.
This is how it works: for us to be able to send your e-mail, you need to add
[MX](./mx.md), [SPF](./spf.md), [DKIM](./dkim.md) and [DMARC](./dmarc.md) 
records to your DNS settings. With Sender Domains however, you will not have to
do this yourself. Instead, *we* create the DNS records for you, and store them
in *our* DNS server. All that is left for you to do, is to create a couple of 
aliases (CNAME records) that refer to the settings in our server.

And that's it. In our special [quick-start guide to set up sender domains](./quick-sender-domain-guide.md)
we already explained all the aliases that you had to set up. In this article we
will focus on the more advanced features of sender domains.


## Subdomain or the main domain?

If you setup a sender domain you can choose whether you want to do this for the
main domain, say yourcompany.com, or for a sub-domain, like newsletter.yourcompany.com.
Of course, it is way more elegant if all your e-mail messages are sent from the
main domain, including your newsletters and transactional e-mail. But your domain 
is probably already in use for sending out email and you therefore also have already 
set up DNS records to enable this. If you do not want to risk breaking things by 
modifying your existing DNS settings, you can opt for a subdomain instead, and use 
this subdomain for the mails that you send with Copernica. If you send with a 
subdomain you do not have to make changes to any existing DNS records, and only
have to add completely new records.

If you do choose to use the main domain, you must pay close attention to a couple
of DNS settings. Especially the DMARC settings require attention.


## The DNS records

If you create a Sender Domain in Copernica, we update our DNS server and add 
all sorts of records holding settings that are relevant for you. In your DNS you 
then only have to add aliases (using CNAME records) to these records in our DNS. 
The dashboard of the Marketing Suite exactly shows the records that you have to 
add, and warns you if you make a mistake in setting up these aliases.

Because you create aliases to records that are hosted by us, we can at any time
make changes to your DNS. If we discover that we need extra IP addresses
to send out your messages, or when we want to rotate your DKIM keys, we can change
the DNS without you having to do anything. Your alias just points to our DNS
server, where we can make all relevant changes.

There are many different DNS records that we create to send out your messages,
and because of this you also have to create many aliases (CNAME records). The
following records are hosted by us:

* An A record so that we can track clicks and opens
* A MX record to receive bounces and out-of-office replies
* Multiple DKIM records so that we can add digital DKIM dignature to your messages
* A SPF record so that our IP addresses can be used to send out your mail
* A DMARC record to collect DMARC reports

The A, MX and DKIM records are normally easy to set up. The DNS standard allows
to create a many of these records as you need, and they cannot conflict with 
other records. SPF is also not an issue because we use a subdomain for collecting
bounces. DMARC however, might require extra attention.


## Watch out with DMARC

Things are more complex with DMARC, especially if you want to setup Copernica to
send out mail using the main domain (from @yourcompany.nl). In DNS, you can only
have one DMARC record per (sub)domain, and this DMARC record is probably already
in use for your regular mail flow. You can not simply remove or overwrite this
existing record because that might influence your existing mail flow. The simple
solution would then be to setup Copernica to use a new subdomain anyway. However,
if you insist on using the main domain, which of course is way more elegant, you
will have to take some extra steps, and merge your existing DMARC record with the
one that we take care of. We've explained this in more detail in a seperate article:

* [Setting up DMARC](./dmarc.md)

Setting up sender domains can best be done via the Copernica Marketing Suite instead
of the old Copernica Publisher. Although Copernica Publisher also has forms to 
change the Sender Domain settings, the interface in Marketing Suite is more 
advanced, and helps you in setting things up. With green checks and red
warnings we show whether you've created the right aliases.


## Manual settings in Publisher

If you use the old Publisher, you will find all sorts for forms and dialog windows
to manually configure the picserver and envelope domains, and to manually edit private 
DKIM keys. These are all outdated forms that were used before the Sender Domain
technology was introduced. You no longer need these forms and you can better use
the new Sender Domain dashboard from the Marketing Suite. These forms are only 
useful for customers who have not yet switched to Sender Domains.

If you do still use these outdated forms, it is best to switch to Sender Domains.
Configuring your DNS using Sender Domains is safer and easier, and will eventually
lead to a better deliverability because with Sender Domains all domains used in 
your mailings are aligned. However, if you do switch from the old manually settings 
to Sender Domains we do recommend to do this slowly. Generally speaking, it is 
better not to change all your mail settings at once, because receivers do not like 
these sudden changes. If you've built up a good reputation with your current settings,
you better keep them for a while, and slowly move over to the Sender Domain settings.
In the Sender Domain configuration dialog in Publisher you can find a special tab 
where you can enter a deployment percentage. This setting allows you to slowly 
roll out your new Sender Domain configuration.

People often ask us what percentage to use to slowly move to Sender Domains. 
There is not a single answer to this question, and it very much depends on your 
current sender reputation and the number of messages that you send. If you've
configured Sender Domains we normally advise to start with a small percentage, 
say 10%. This means that 10% of your mails will be sent using the Sender Domain
settings, while 90% is still sent with the old settings. One out of ten messages
will use the new envelope- and tracking domains that are configured in the 
Sender Domain, and the other messages still use the old picserver domain.

After a couple of days you can then check the statistics. Did you notice a rise
in the number of errors? Or does everything seem to be ok. Normally things are
ok and you can grow the percentage, for example to 25%. In a number of steps
(for example 10% - 25% - 50% - 75% - 100%) you can roll out a Sender Domain. 
The actual size of the steps depends on the size of your database. If your database
contains a couple of hunder addresses you can take bigger steps, but with
millions of addresses you want to roll it out more slowly.
