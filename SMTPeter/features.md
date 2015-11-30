# Features

SMTPeter is not only a cloud-based SMTP service for fast and secure email 
delivery, it has extra unique features too. These features are listed over
here.


## Consistent layout

It is of great value that the user will see the email in the way you have
designed it. Unfortunately, some email clients will strip out part the header
of the HTML document that holds the style (CSS). This will ruin your
carefully designed layout.

Example of a deleted style:
![Inlinize CSS](copernica-docs:SMTPeter/Images/inlinecss.png "Inlinize CSS")

With SMTPeter you can inline this style into your HTML and thus your layout
will be preserved if the header is stripped. This transformation is optional, so if you prefer not to use it you
can switch it of.


## Increased security with ease

With SMTPeter you can use DKIM, SPF and DMARC easily. These names are 
abbreviation of current technologies that enable receiving servers and
mailbox providers (like Gmail, Yahoo, Hotmail, et cetera) to verify that
your emails are actually sent by you (and not by a spammer or malicious
fisher). Not only can you use these techniques, SMTPeter will also guide
you on how to use them so you do not make any mistakes. You can read more
about this on our [Secure email](copernica-docs:SMTPeter/secure "Security")
page.


## Bounce management

When you send out email, you normally also have to take care of failed
deliveries and bounce messages that are sent back to the email's envelope
address. However, if you do not want to set up an infrastructure to take
care of bounces yourself, you can let SMTPeter do this for you.


## Flexible input

With SMTPeter you can send your MIME messages or let SMTPeter create MIME messages
out the information you provide.


## Detailed Statistics

When you send out an email you are likely interested in getting the best
response from the sent messages. To help you with this you can track the
openings of your emails with our openings statistics. You also can track
on which links are clicked within the email with our click statistics.


## Email Throttling

Sending large volumes of email messages can be tricky: receiving domains often set 
limits on the amount of messages or connections they accept. SMTPeter knows
about these limits and throttles automatically your messages for best deliverability.


## Simplicity

Although there are a lot of features, SMTPeter is easy to use. There is a
dashboard that provides all information in an accessible way, there are
wizards that help you with the setup, and there are two easy two use APIs
(see below).


## Flexibility

There are two different ways to use SMTPeter: either using the SMTP API or REST API.
The SMTP protocol is the traditional protocol mail programs use to communicate with
each other, while REST is a protocol built on top of HTTP, the protocol of the web.

You can use the SMTP protocol if you have already the infrastructure for this
or if you are using an e-mail client like Outlook or Thunderbird. You can
also use our REST API, which is more flexible and efficient.

* [Read our SMTP API Documentation][smtp-api-documentation] 
* [Read the REST API Documentation](copernica-docs:SMTPeter/api-documentation/rest-api "REST API documentation")

[smtp-api-documentation]: copernica-docs:SMTPeter/api-documentation/smtp-api "SMTP API documentation"
