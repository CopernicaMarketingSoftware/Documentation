# Setting up sender domains

With SMTPeter you can set up sender domains and private security keys to
enable receiving servers and mailbox providers (like Gmail, Yahoo, Hotmail, 
et cetera) to verify that your emails are actually sent by you (and not
by a spammer or malicious fisher). SMTPeter comes with an easy to use
and powerful dashboard to configure this.

Why do you need this? For that to understand, you must know that email was 
traditionally not designed to prevent _bad guys_ from sending out emails 
pretending to be sent by you. The email protocol was invented a long time 
ago, when the internet was only used by researchers as a tool to send 
messages to each other. It was designed to be simple, and did not have 
checks or verification mechanisms to ensure that it was not misused. And 
because of this, it is up to this very day still very easy to change the 
_from_ address of a mailing, and send out emails just as if they were
sent by someone else. Spammers and fishers abuse this.

However, new technologies have been invented to solve this shortcoming, 
technologies with names like DMARC, DKIM and SPF. These technologies are 
here to help you, and if you configure your domain and DNS records correctly, 
you can be pretty sure that others can no longer send out email out of 
your name. However, these technologies not only make it harder for spammers 
and fishers to send out email, but it makes it more difficult for legitimate
senders (like you!) to send email as well. SMTPeter can help you out.


## Setting up your sender domain

Via the dashboard on SMTPeter.com you can configure the domain names from
which you normally send out email. For example, if you normally send out
email from the domain name "example.com", you can enter this domain in the
SMTPeter dashboard. SMTPeter will automatically show the DNS records 
that are necessary for setting up DMARC, DKIM and SPF. If you copy-and-paste
these DNS records from the SMTPeter.com dashboard into your DNS configuration
tool, your email platform is ready for use.

Is that all you have to do? No, sadly it is not. The moment you have copied
and installed the DNS records, your DNS records immediately list SMTPeter.com 
as the one and only party from which "example.com" emails may be sent. 
This is a very safe setup and makes it very hard for fishers and spammers
to send out mails from your domain, but you must be absolutely sure that
from that moment on, all your own legitimate mail is really routed via the 
SMTPeter.com gateway. This is not only a requirement for your commercial 
newsletters, but also for your transactional emails (like order confirmations 
and password reminders) as well as all the regular office mails sent by you 
and your colleagues!

There are a couple of approaches that you can take if you want to be sure
that all mails are correctly validated by the receivers: you can set up 
your mail infrastructure so that _indeed_ all your mail is sent out via 
the SMTPeter.com gateway (this is the recommended approach: you secure 
100% of all your mails by setting up all your applications, websites and 
email clients (don't forget the mobile devices) to send email via 
SMTPeter.com). You can even roll this our slowly, there is a special 
mechanism that allows you to configure that only a small percentage of 
mails is initially going to be checked, and that you are informed if you 
have forgotten to change the configuration of one or more of your mail 
clients.

But if you do not want to change all these application, you can also take
a different approach. You can for example modify the suggested DNS records, 
so that they also include the data of your regular email servers, or you
could use SMTPeter.com only for sending mails from a certain _subdomain_.


## Incorporating your own servers

We mentioned that once you copy the DNS records that are suggested by 
SMTPeter.com to your DNS servers, all your mails must be sent out by 
SMTPeter.com. This is true. However, you are free to edit the DNS record
suggestions and include your own settings in it too. If you do this, it 
is possible to send out mail from both your own servers, and from the 
SMTPeter.com servers too.

For more information on the format of the DKIM, SPF, DMARC records that
are generated, and to find out how you can modify them to include your
own IP and/or own DKIM keys, you can take a look at the official 
specification of these technologies. You can find links to the 
specifications near the bottom of this article.


## Using subdomains

If changing your entire mail architecture is too much of a hassle (for now), 
but you also do not feel like manually editing DNS records, you can take
also take an alternative approach, and use a (new) _subdomain_ for your email
delivery instead. For example, if your normal mail is sent out from the 
"example.com" domain name, you can use the SMTPeter.com dashboard
to set up a sender domain for the "newsletter.example.com" subdomain, and
use the SMTPeter.com service just for messages with a _from_ address that
ends with "@newsletter.example.com".

In this setup, SMTPeter will present you the DNS records that you can
copy-paste into your DNS configuration so that your newsletters that are 
sent out through SMTPeter.com are accepted by the mailbox providers. Your
newsletters must use a _from_ address of the form "something@newsletter.example.com".
This of course does not look as cool as a "something@example.com", but
it allows you to setup SMTPeter.com without changing the rest of your
email infrastructure.



## Slow rollout

Whatever setup you choose, if you change your DNS configuration, we 
recommend to use a slow rollout. A mistake is easily made, and you
do not want to have all your emails blocks, simply because you made
a typo in your DNS, or because you forgot to send out a mail via SMTPeter.com. 
Via the dashboard you can create a slow-rollout DNS record that instructs 
receivers that email that is not sent out via SMTPeter.com should be 
accepted anyway, and that a notification is sent back to you.

Using the slow rollout feature, you can basically configure two things:
(1) what do you want receivers to do with mails that are not sent out via
SMTPeter.com (or one of your other outgoing mail servers if your manually
edited the DNS records to incorporate your own servers), and (2) for 
what percentage of all your mails do you want this behavior?

There are three types of behaviors or policies: "reject", "quarantine" 
and "none". The most strict policy is "reject". If you choose this, you
instruct all receivers that all your mails that are not received via 
SMTPeter.com should be rejected. "Quarantine" is less strict, and means 
that you want these kind of mails to be placed in a spam folder. The 
"none" policy means that all mails should be accepted, even the ones 
that were not sent via SMTPeter.com (although in reality some mailbox 
providers do not respect this "none" property and reject or quarantine 
such messages anyway).

Besides the policy you can specify a percentage of mails to which the
policy should be applied. If you set the policy to "reject", and the
precentage to "10", it means that only 10% of all mails that do not
come from a SMTPeter.com server should be rejected, and you want all
other mails to be accepted anyway. This percentage is another tool to 
slowly rollout and/or to test a sender domain setup.

After the slow rollout, and once you have ensured that all the configuration
seems to be okay, you should change the percentage to 100%, and 
the policy to "reject". This is the best protection against fishers, and
also leads to the best deliverability.


## What if you do not set up a sender domain?

Setting up a sender domain via the SMTPeter.com dashboard is _optional_.
If you do not set up sender domains, all mails that you send through the
SMTPeter.com gateway are simply forwarded to the internet, using our IP addresses
and using our domain names - and many emails will probably just end up
where you want them to be: in the mailboxes of your recipients.

However, mailbox providers like Yahoo, Gmail, AOL and basically all the 
others are getting more and more strict in applying the DMARC, DKIM and
SPF protocols, so we do recommend to spend some extra time on the 
SMTPeter.com dashboard and with your DNS configuration. Adding these
extra records is very helpful.


## What is DKIM, SPF and DMARC?

In this document we have mentioned the DKIM, SPF and DMARC abbreviations
a couple of times. These are technologies that (1) allow a sender to
sign an email, so that nobody can modify mails, and receivers can verify
that a message was really sent by the person who claims to be the sender 
(this is DKIM), a technology (2) to list the servers that have permission
to send out email for a certain domain (this is SPF), and (3) a technology 
that receivers can use to find out what they should do in case the DKIM
or SPF checks fail (this is DMARC).

DKIM, SPF and DMARC all use the Domain Name System (DNS, the technology to
turn domain names into IP addresses, and to store other domain name related
information), and it is therefore up to you as the domain owner to add 
records to your DNS configuration to enable this for your emails. Setting 
up these DKIM, SPF and DMARC records can sometimes be troublesome. This 
is exactly where SMTPeter helps you, because if you tell SMTPeter that 
you want to send out mail from a certain domain, we will show you exactly 
what type of DNS records you have to copy-and-paste into your DNS 
configuration tool.

To learn more about these technologies, we recommend to take a look at
the offical protocol specifications:

* [RFC 6376 DomainKeys Identified Mail (DKIM)](https://tools.ietf.org/html/rfc6376)
* [RFC 7208 Sender Policy Framework (SFP)](https://tools.ietf.org/html/rfc7208)
* [RFC 7489 Domain-based Message Authentication, Reporting, and Conformance (DMARC)](https://tools.ietf.org/html/rfc7489)


