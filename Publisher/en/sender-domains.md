# Sender domains

Nowadays sending email is a very complicated procedure. However, there is 
a very good reason for this: Email with a *fake* "from" address, which 
can be very harmful to your reputation as a company. Of course Copernica 
can't just start sending email in your name either. First you need to configure 
your [DNS](./dns), which is a complicated matter that is simplified with 
**sender domains**. The sender domain handles complicated matters such 
as [MX](./mx.md), [SPF](./spf.md), [DKIM](./dkim.md) and [DMARC](./dmarc.md), 
allowing Copernica to send email for you. This is why sender domains are 
also mandatory. We will create the DNS records for you and maintain the 
records, you just refer to our DNS server.

That's all. In our [quick-start guide to set up sender domains](./quick-sender-domain-guide.md)
we already explained all the aliases that you had to set up. In this article we
will focus on the more advanced features of sender domains.

## Subdomain or the main domain?

If you set up a sender domain you can choose whether you want to do this for the
main domain, say yourcompany.com, or for a subdomain, like newsletter.yourcompany.com.
Of course, it is way more elegant if all your email messages are sent from the
main domain, including your newsletters and n email. But your main domain 
is probably already in use for sending out email and you therefore also have already 
set up DNS records to enable this. If you do not want to risk breaking things by 
modifying your existing DNS settings, you can opt for a subdomain instead, and use 
this subdomain for the mails that you send with Copernica. If you send with a 
subdomain you do not have to make changes to any existing DNS records, and only
have to add completely new records.

Setting up a subdomain is safer and easier than setting up a Sender Domain for
a subdomain. If you do choose to use the main domain, you must pay close attention 
to a couple of DNS settings. Especially the DMARC settings require attention. 
For information how to set these up you can refer to the [article on DMARC](./dmarc).

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
* Multiple DKIM records so that we can add digital DKIM n to your messages
* A SPF record so that our IP addresses can be used to send out your mail
* A DMARC record to collect DMARC reports

```text
    Advised DNS records to add to               DNS records on the server
    the domain:                                 of Copernica, with settings 
                                                of the sender domain:

    +-------------------+                       +-------------------+
    |   SPF alias       |           --->        |   TXT record      |
    +-------------------+                       +-------------------+
    |   DKIM alias      |           --->        |   TXT record      |
    +-------------------+                       +-------------------+
    |   DMARC alias     |           --->        |   TXT record      |
    +-------------------+                       +-------------------+
    |   Tracking alias  |           --->        |   A record(s)     |
    +-------------------+                       +-------------------+
    |   Bounce alias    |           --->        |   MX record(s)    |
    +-------------------+                       +-------------------+
```

The A, MX and DKIM records are normally easy to set up. The DNS standard allows
to create as many of these records as one need, and they cannot conflict with 
other records. SPF is also not an issue because we use a subdomain for collecting
bounces. [DMARC](./dmarc) however, might require extra attention, because 
it can cause a conflict.

## More information

* [Configuring a sender domain](./quick-sender-domain-guide)
* [DMARC](./dmarc)
* [DKIM](./dkim)
* [SPF](./spf)
* [MX](./mx)
* [DNS](./dns)
