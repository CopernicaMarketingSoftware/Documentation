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
This is how it works: for us to be able to send your e-mail, you normally have to add
[MX](./mx.md), [SPF](./spf.md), [DKIM](./dkim.md) and [DMARC](./dmarc.md) 
records to your DNS settings. With Sender Domains however, you do not have to
do create and maintain all these records yourself. Instead, *we* create the DNS 
records for you, and store them on *our* DNS server. You just have to create a 
couple of simple aliases (CNAME records) that refer to these settings on our server.
The aliases that you have to create are listed in the sender domain section of
the Marketing Suite dashboard.

That's it. In our special [quick-start guide to set up sender domains](./quick-sender-domain-guide.md)
we already explained all the aliases that you had to set up. In this article we
will focus on the more advanced features of sender domains.


## Subdomain or the main domain?

If you setup a sender domain you can choose whether you want to do this for the
main domain, say yourcompany.com, or for a subdomain, like newsletter.yourcompany.com.
Of course, it is way more elegant if all your email messages are sent from the
main domain, including your newsletters and transactional email. But your main domain 
is probably already in use for sending out email and you therefore also have already 
set up DNS records to enable this. If you do not want to risk breaking things by 
modifying your existing DNS settings, you can opt for a subdomain instead, and use 
this subdomain for the mails that you send with Copernica. If you send with a 
subdomain you do not have to make changes to any existing DNS records, and only
have to add completely new records.

Setting up a subdomain is safer and easier than setting up a Sender Domain for
a subdomain. If you do choose to use the main domain, you must pay close attention 
to a couple of DNS settings. Especially the DMARC settings require attention.


## The DNS records

If you create a Sender Domain in Copernica, we update our DNS servers and add 
records holding settings that are relevant for you. In your DNS you 
then only have to add aliases (using CNAME records) to these records in our DNS. 
The dashboard of the Marketing Suite exactly lists the records that you have to 
add to your DNS, and warns you if you make a mistake in setting up these aliases.

Because you create aliases to records that are hosted by us, we can at any time
make changes to your DNS. If we discover that we need extra IP addresses
to send out your messages, or when we want to rotate your DKIM keys, we can change
the DNS without contacting you. Your alias just points to our DNS
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
to create as many of these records as one need, and they cannot conflict with 
other records. SPF is also not an issue because we use a subdomain for collecting
bounces. DMARC however, might require extra attention.


## Watch out with DMARC

Things are more complex with DMARC, especially if you want to setup Copernica to
send out mail using the main domain. In DNS, you can only
have one DMARC record per (sub)domain, and this DMARC record is probably already
in use for your regular mail flow. You can not simply remove or overwrite this
existing record because that might influence your existing mail flow. The simple
solution would then be to setup Copernica to use a new subdomain instead. However,
if you insist on using the main domain, which of course is way more elegant, you
will have to take some extra steps, and merge your existing DMARC record with the
one that we take care of. We've explained this in more detail in a seperate article:

* [Setting up DMARC](./dmarc.md)

Setting up sender domains can be done via the advanced interface of the Marketing Suite.
With green checks and red warnings we show whether you've created the right aliases.
No hassle whatsoever. 
