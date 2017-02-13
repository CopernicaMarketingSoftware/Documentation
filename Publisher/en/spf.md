# SPF records

If you use [sender domains](./sender-domains.md) (and you should!), Copernica
takes care of creating all your relevant [DNS records](./dns.md). You only have
to create a couple of aliases in your own DNS that refer to the settings that we
created. For most of the records (the tracking domain, [DKIM](./dkim.md), 
[DMARC](./dmarc.md)) we recommend to use CNAME records for these aliases.
For SPF however you should make a TXT record.

A SPF record is a DNS record that holds, simply put, a list of IP address that
you use to send out email from. A domain owner can use SPF to publish a list of
IP addresses that he uses for email. A receiving party (like gmail.com  or live.com) 
can query this list, and check if incoming emails were indeed sent from an
expected IP. If a receiver gets an email that appears to come from you (because 
it uses your domain), but that was sent from an IP address not on your SPF list, 
he knows that something strange is going on, and can take action. This does not 
necessarily mean that your email will be blocked, but it certainly is now a good
sign and you therefore better make sure that the list of IPs on your list is
up-to-date.

Everybody always speaks (and we write) about SPF records as if an SPF record is 
a special type of DNS record, just like A, AAAA and MX records. From a technical 
standpoint this is not completely correct. A SPF record is implemented in DNS as
a normal TXT record holding textual content. By putting the text "v=spf1" in front
of the value of a TXT record it gets a special meaning and email programs and
email receivers recognize it as a record with SPF settings. When we speak about
SPF records we therefore actually mean "a TXT record that begins with v=spf1".

And there is a second nuance. We explained that SPF holds a list of IP addresses.
This is indeed what the record contains, but it is, if you want to precise, a
too simplistic descriptions of the record's contents. A SPF record can indeed
hold IP addresses, but it can contain other elements too, like domain names, 
redirects and includes. If you do a SPF record lookup, you will not only receive
a list of IP addresses, but also all these other elements. But this other elements
trigger additional (recursive) lookups, until all the elements have finally been
brought back to (after all) a list of IP addresses.

Copernica utilizes these additional elements. If you go to the 
[sender domain dashboard](./sender-domains.md) in Marketing Suite, you get a
list of recommended DSN settings. For most of the records we recommend to use
CNAME record, because CNAME is the standard record type for aliases and
referals. For SPF however, we recommand to create a regular TXT record holding
an "include" element. In practice both a CNAME record and a SPF record with
an include do the same thing: your own DNS settins refers to the setting in our DNS.


## What should be listed in the SPF record

If you send mail with Copernica, it speaks for itselves that Copernica's IP adresses
also have to be included in the SPF record. Receivers can only then validate that
the messages that we send on your behalf (and that come from our IP's) are legitimate. 
But because we create your DNS record we already take care of this and you can
sit back and relax (if you correctly set up the alias).

You may already know that email messages use two different sender addresses: the
"normal" from address that you normally see when you open a message, and a second
address that we call the *envelope* address. This envelope address is not dislayed
to the user and is intended for communication between mail servers. When a message
bounces (could not be delivered), receiving servers can send back an error to
this envelope addresses. We add such an envelope address to the mail that we send 
on your behalf, so that we can process the bounces on your mailings.

Every mail that we send gets a unique bounce address, using a subdomain of
your main domain. If you have created a sender domain for "yourcompany.com", we 
for example use "feedback.copernica.com" subdomain in the envelope address to 
collect the bounces. Because SPF was designed to verify these envelope addresses, 
the recommended SPF setting is also for the subdomain, and not for the main domain.

In normal circumstances you do not have to edit the recommended SPF setting. The
standard recommendation refers to a list of IP addresses of the Copernica server, 
and is normally (always) sufficient because only we use your subdomain to send out
mail. However, if, for whatever reason, you want to modify the SPF record, you
of course are free to do so. You can copy our recommended SPF records and modify 
it (for example to add more IP addresses to it). ALthough that is probably not 
necessary.
