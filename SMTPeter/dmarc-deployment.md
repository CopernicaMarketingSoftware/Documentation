# DMARC deployment

Besides [DKIM](dkim-signing) and [SPF](spf-validation) there is a third
technology that receivers use to verify whether an email was legitimate
or whether it was faked: DMARC. DMARC was invented to solve some shortcomings
of DKIM and SPF.

To understand this, one must realize that new features in email are alway 
_optional_. Email has been around for ages, and new technologies may not 
break existing email software. This means that even though DKIM and SPF 
were invented to make email more secure, it still is perfectly legal to 
send emails _without_ DKIM signatures, and to send email from servers 
that are _not_ listed in SPF records. It is for example possible that the 
IT department in an organization has updated its mail architecture and 
ensured that everyone sends messages with perfectly valid DKIM signatures, 
but that one key figure runs a mail server from her home and still sends 
messages without signatures.

If a receiver gets a message from this company without a DKIM signature,
there is for this receiver no way to find out whether this mail was sent
by a malicious phisher, or by the employee who simply forgot
to update. The simple fact that a DKIM signature is missing, or that there
was no matching SPF record _could_ be an indication that something is
terribly wrong, but it could also be harmless. So even though we have DKIM 
and SPF, there was still no good way to distinguish valid mails from abuse. 
DMARC is a technology to solve this.


## DMARC and DNS

Just like DKIM and SPF, DMARC also relies on the DNS. DMARC allows you
to add an extra record to your DNS server, and in that record you can
specify things like "yes, all of my colleagues always send DKIM signed emails,
and if you ever receive an email from my company without a DKIM signature, 
just throw it away. By the way, please keep me informed about the messages
that you throw away, so that I can check internally if someone on the team
forgot to update her computer".

That's essentially what DMARC is. It allows receivers to query the DNS, so
that they know what to do when a DKIM signature is missing, or what to do when SPF
records seem to be incorrectly configured. The receiver can check the DMARC
record to find out whether this is a real indication that someone is trying
to abuse the domain, or that the company has just not completely rolled out
DKIM and SPF and that some mails might still be valid despite the mismatch.

On the other hand, DMARC also allows senders to receive periodic notifications
from receivers about failed checks, so that they can roll out
DMARC slowly, and get notifications if anything is wrong.


## Setting up DMARC

Setting up DMARC is not always easy. The SPF and DKIM records already allow
many different parameters, and DMARC makes it only more complicated. The
SMTPeter dashboard helps you with the concept of "sender domains".
A sender domain is a domain from which you intend to send out mail. 
If you use the dashboard to configure a sender domain, SMTPeter automatically
creates all the appropriate DNS records and private keys so that you can
start sending mail using that domain. You just have to copy the DNS records 
that were created by SMTPeter to your own DNS server (or give them to your 
provider) and you are ready to go.


## Domains vs sub-domains

If you configure "yourdomain.com" as a sender domain, SMTPeter automatically
creates example DNS records for this domain. These are records for SPF, DKIM,
DMARC but also DNS records for the clicks and bounce domains. If you copy all 
these records to your DNS server, you are ready to start sending email
through SMTPeter.com. But be careful!

The moment that you update the DNS records for your domain, all mails that
you do not send through SMTPeter.com are invalid. Although this does not
necessarily mean that these mails are going to be rejected (in the DMARC record
you can specify that invalid mails should initially be accepted anyway), but
it is better to eventually update your entire email architecture so that all mails
are passed through SMTPeter.com and are correctly signed and sent from the 
right servers.

If changing your entire mail architecture is too much of a hassle (for now), 
you can take an alternative approach: you can use a _subdomain_ for 
your email deliveries. For example, if your normal mail is sent out from the
"yourcompany.com" domain name, you can use SMTPeter.com to set up a sender
domain for a subdomain e.g. "newsletter.yourcompany.com". After this setup
you can use the SMTPeter.com service for messages with a _from_ address that 
ends with "@newsletter.example.com". You still can use your current setup 
to send mails from example.com.


## DMARC deployment

DMARC gives you the option to specify what receivers should do with invalid
emails. There are three options, called policies you can choose from. The
most relaxed policy is none, this means that the outcome of the SPF and DKIM
check is just ignored and the mail is delivered as if SPF and DKIM checks
would be successful. A bit more strict is the quarantine policy. Under this
policy a failing SPF or DKIM check will result in a delivered mail, but the
mail will be put in a special folder, generally the spam folder. The last
policy, reject, is the most strict, and will result in that the message will
not be delivered at all. Besides the policy a percentage for the number of
mails the policy should be applied can be specified. Say, you set your policy
to reject and the percentage to 25. There is only a 25 percent change that
the mail is treated under the reject policy. For the remaining 75 percent
the mail is treated as if the quarantine option were set.

Given these settings, using DMARC is not an all or nothing decision. You
can start with a very relaxed DMARC setting, e.g. using policy quarantine for only 1 percent.
If things go well this can be increased to finally end up in policy reject
for 100 percent, i.e. the most secure setting. SMTPeter can help you with
this slow deployment. You can set a policy and an end date and SMTPeter will
increase the DMARC settings for you over time. You can of course overwrite
this behavior if you want and deploy DMARC yourself. If you want to do so
you can use the schedule below.


| Domain policy | Percentage |
| ----   | ---        |
| Accept | 100% |
| Quarantine | 1% |
| Quarantine | 5% |
| Quarantine | 10% |
| Quarantine | 25% |
| Quarantine | 50% |
| Quarantine | 100% |
| Reject | 1% |
| Reject | 5% |
| Reject | 10% |
| Reject | 25% |
| Reject | 50% |
| Reject | 100% |


## Processing reports

Receiving parties send back daily reports to SMTPeter in which they tell
how many emails failed the DKIM, SPF or DMARC checks. These daily reports
are processed by SMTPeter and presented to you via the dashboard. It allows
you to monitor whether your configuration is valid, and/or whether your
domain is being abused.

