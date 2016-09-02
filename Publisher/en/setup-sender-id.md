Sender ID is a method major Internet service providers (ISPs), like
Microsoft Live and Yahoo Mail use to confirm whether e-mails are
actually coming from the company they say they are coming from. This is
accomplished by checking the address of the server sending the mail
against a registered list of servers that the domain owner has
authorized to send e-mail. It’s one of the many methods email clients
use to distinguish spam from not spam.

*Setting up Sender ID requires access to your domain DNS settings. If
you use the from address
\*[*info@mydomain.com*](mailto:info@mydomain.com) \* for your
newsletter, you need access to the DNS settings of mydomain.com*

### Why is it important?

More and more receiving mail servers utilize Sender ID. Having a Sender
ID definitely increases your deliverability.

### Add the Sender ID to your domain DNS

Setting a Sender ID requires access to the DNS settings of your website
domain. If you don’t have access, ask your network administrator or
contact your ISP.\
 Add the following rule to the TXT record\* on your domain:

`"v=spf1  include:_senderspf.copernica.com a mx ~all"`

**Important notes:**

-   Some ISP's allow the use of the double quotes in TXT records, some
    don't (usually the quotes are automatically added). If the Sender ID
    is not working try removing the surrounding quotes from the Sender
    ID rule.
-   We highly recommend to use the **\~all** SoftFail mechanism in your
    SPF record for the best delivery results.

    If you are interested in reading more about the SPF record syntax,
    please refer to the [OpenSPF website](http://www.openspf.net/) .
    Microsoft also [provides some
    information](http://www.microsoft.com/mscorp/safety/content/technologies/senderid/wizard/)
    .

### How do I know if my Sender ID is configured correctly?

When an e-mailing is being edited in the application, a warning is
displayed if the Sender ID record or the SPF record are not configured
correctly. This check is performed in the background.

It is also possible to perform a document check to see Sender ID and
related errors. The check can of course only be performed if you have
configured a [from address](#) for the document.

Go to Document menu \> **Document check** to see if your Sender ID is
configured correctly.

### What is a TXT record

A **TXT record** is used to provide up to 255 characters of free form
text with information for your website domain. Multiple TXT records are
permitted. Usually you can add a TXT record to your domain in the
interface of your domain. If you don't know how to create a TXT record,
contact your hosting provider or consult their online documentation if
available.

### Combining SPF records

It is possible to include different SPF records into one TXT record
(this is strongly recommended rather than using separate TXT records for
this).

`"v=spf1  include:_senderspf.otherdomain.com include:_senderspf.copernica.com a mx  ~all"`

Now you're at it, also [use a DKIM key](./signing-your-emails-with-dkim.md)
for better deliverability!
