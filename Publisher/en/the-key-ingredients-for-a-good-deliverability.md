Deliverability refers to ensuring email messages are delivered and
aren’t blocked by spam filters because the email content or structure
falsely identifies a permission-based email as a spammer, or because the
sender’s IP address has a poor reputation for spam (definition by D.
Chaffey).

This article addresses all key ingredients that will help you
maintaining a healthy sender reputation and deliverability.

**E-mail authentication**
-------------------------

To be able to distinguish legitimate e-mails from the relentless flow of
spam messages, large mailbox providers, including Google, Microsoft and
Yahoo have developed technical tools with which you can be identified as
a trusted sender.

### **Sign your emails with DKIM**

DKIM stands for DomainKey Identified Mail and puts a unique digital
signature in the invisible header of your emails that is checked against
the signature in your DNS. DKIM helps email providers validate that an
email was really sent by you and isn't not forged or forwarded by some
obscure party.

Setting up a DKIM is quite easy in Copernica.

-   [Learn how you can sign your emails with DKIM](./signing-your-emails-with-dkim.md)

### SPF

SPF validates the invisible sender address (the envelope address). You
only need to configure SPF if you use a custom envelope address. For
most users, this is not the case, and the SPF is automatically set
correctly.

-   [Envelope address, MX record settings and SPF](./envelope-address-mx-record-settings-and-spf.md)

### DMARC

DMARC is technical entry that you include in the DNS record of the
sender's domain of your emails. With this (fairly new) policy, you
inform receiving mail servers that you utilize Sender ID and (more
importantly) DKIM.

But what makes DMARC even more powerful is the fact that it allows you
to tell the receiving mail server what it should do with emails that
fail the DKIM and Sender ID test.

It is even possible to receive daily reports about emails that have been
rejected, enabling you to improve your settings.

-   [Create a DMARC record (Google
    documentation)](https://support.google.com/a/answer/2466563?hl=en)
-   [More info on DMARC.org](http://www.dmarc.org/)

### Subscribe to feedback loops

Tell ESP's how they can inform you when a subscriber marks your email as
spam.

-   [Spam complaints (abuses) and feedback loops](./abuse-reports-and-feedback-loops.md)

### Use your own pic-register domain

When sending an emailing with Copernica, all of the clicks, impressions
and images of this emailing are processed by dedicated servers. These
servers are accessed through a specific domain name: the pic-register
domain. Due to (exclusive) actions of our users, a pic-register domain
sometimes ends up on a blacklist.

Copernica is provided with several default domains that you can choose
from. But we advise to set up your own pic-register (sub)domain. This
will make you invulnerable to the (bad bad) actions of some of our users
that misuse our software, or by the actions of anti-spam parties that
are way too easily agitated.

A pic-register domain is set up easily. Most peope create a subdomain
under their company domain (e.g., *newsletter.companydomain.com*). Point
the (sub)domain to pic.vicinity.com using a CNAME (How to create a
CNAME, [Google
Documentation](https://support.google.com/a/answer/47283?hl=en)). Then
go to the delivery settings of your account and enter your own domain at
the pic-register settings, replacing the old one.

The delivery settings can be configured from your account dashboard on
Copernica.com.

Ow, it is also great for **white labeling** and for **gaining user
trust**. Recipients see *your* company domain when they hover links in
your emails, and not ours.

2. Optimize your database and email documents
---------------------------------------------

ESPs do not like it if you keep sending them emails to mailboxes that no
longer exist, to people that have unsubscribed from your list or try to
deliver emails that continuously result in delivery errors.

### Automatically process email bounces

It may happen that an email address for any reason ceases to exist. When
a delivery attempt results in a bounce, it is automatically registered
by Copernica. On this information you can make selections in your
database enabling you to take further action.

-   [Automatically process email bounces in your database](./automatically-process-bounces.md)

**Use double optin for new subscribers**
With double optin a new subscriber asks to be subscribed to the mailing
list, but unlike single opt-in, a confirmation e-mail is sent to verify
it was really them. In this way the person who subscribes always is the
same person who will be receiving the emails. You will not be sending to
non-existing email addresses. It also keeps your database clean.

-   [Learn how you enable double opt-in for your mailing lists](./create-a-double-optin-for-new-subscribers.md)

**Remove erroneous email address**
Email addresses that keep bouncing can better be removed from your
database or removed from the selection that you use to send your
mailings to. This process can also be automated. Copernica can in some
cases repair those erroneous email addresses for you.

-   [Learn how you can repair erroneous addresses](./automatically-repair-invalid-email-addresses.md)
-   [Learn how you can process bounces](./automatically-process-bounces.md)

**Create the lowest possible spam score**
Spam filters and email service providers test incoming mails to
validate whether it is spam or not. The higher your spam score, the more
likely your emails will get trapped in recipients spam folders. Keep
adjusting your email document to reach a **spam score lower than 0.2**
for the best delivery results.
 You can check your documents spam score by clicking on the warnings in
the bottom of your active document.

-   [Learn how you can get a lower spam score](./some-tips-to-lower-your-email-spam-score.md)

**Do not hide unsubscribe links and make sure that they work**\
 If you make it very difficult for subscribers to unsubscribe, they will
use the spam button rather than your perfectly hidden or non-working
unsubscribe function. They do not want to receive any more information,
and you do not want to be marked as a spammer, so make sure your optin
is working and visible.

-   [3 methods to facilitate and process unsubscribes](./3-methods-to-facilitate-and-process-unsubscribes.md)
-   [Setting the unsubscribe behaviour](./setting-unsubscribe-behaviour-for-your-database-or-collection.md)
-   [Creating (unsubscribe) webforms in Copernica](./web-forms.md)

### Another way to optimize your HTML email document

Schema.org is
a [collaboration](http://googlewebmastercentral.blogspot.nl/2011/06/introducing-schemaorg-search-engines.html) between
Google, Yahoo!, Bing and the Russian search engine Yandex and more and
more adopted by email clients. Add micro data to your email documents to
exactly specify what your email is about.

### **Last but not least: send great content**

Probably the most important one in this list and we can't stress it
enough, because we have seen too many of our users having utilized all
of the above and still getting poor delivery results. If nobody is
reading your emails, discarding them without even bothering opening it,
ESP's will lower your sender reputation significantly.
