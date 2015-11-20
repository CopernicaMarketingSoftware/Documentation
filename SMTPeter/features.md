# Features

SMTPeter has features that enable you to increase the consistency of the
layout of your emails and your deliverability. SMTPeter can also give you
insight in the outreach and effectiveness of your emails or email campaigns
since it can generate statistics on when and how often your e-mails are opened
and when receivers click on links within your sent email. Moreover, SMTPeter
has two APIs, an SMTP and REST API to give you the maximum amount of flexibility.
This page will give a brief overview of these features.


## Consistent layout

It is of great value that the user will see the email in the way you have
designed it. Generally this design style (CSS) is placed in the header of
your HTML document. Unfortunately, some email clients or ISPs strip out these email
headers and thus the design style. This will ruin the layout of your email.
To overcome this issue SMTPeter gives you the possibility to transform the style in
your header to style attributes in the HTML tags. This will ensure that the
layout of your email is preserved even if the header is stripped by the
email client. So, the recipient always sees the email as you have intended.
This transformation is optional, so if you prefer not to use it you
can switch it of. It is even possible to determine this per message.


## Increased deliverability and security

We at Copernica think that every sent email counts and should be delivered
to its recipient's inbox. Unfortunately, due to spammers and fishers it
becomes more difficult for legitimate senders (like you!) to be sure that
your email indeed ends up in the inbox. Sometimes, legit email is erroneously 
marked as malicious and is moved to ones spam folder instead. Because of
this issue, new technologies are developed that make it easier to check
if a sent email is legit or not. An extra benefit of these new techniques
is that it becomes impossible for others the send out emails using your
name. However, there is one caveat. Using these new technologies can be quite
cumbersome and if you make a mistake in using them it may be that all your
sent email will be marked as malicious. Especially since Yahoo, Gmail, AOL
and basically all the others are getting more strict in applying them.
Furtunately, with SMTPeter you can use these new technologies with ease
as SMTPeter will guide you to a correct setup. For extra information on
how SMTPeter helps you to use the new techniques and what techniques it
is using, you can read our [Setting up sender domains](copernica-docs:SMTPeter/features/sender-domains "Setting up sender domains")
page.

As an extra service, SMTPeter enables you to track bounced email.
When you send out email, you normally also have to take care of failed deliveries
and bounce messages that are returned to sender. However, if you do not
want to set up an infrastructure to take care of bounces yourself, you can
let SMTPeter do this for you. SMTPeter can process all bounces and present
the results in a clear overview. This gives you the insight what happened
with your sent emails. If you already have the infrastructure to process
bounces yourself and want to use that instead, that is possible too.


## Statistics

> **Note:** The statics features below are currently being worked on and should be implemented 
soon.


When you send out an email you are likely interested in getting the best
response from the sent messages. This starts by detecting if your sent message
is opened or not. SMTPeter's open tracking functionality can be used for this.
If you enable open tracking, SMTPeter tracks all opens of your email and
shows the statistics in the statistics overview of your SMTPeter dashboard.

Another aspect of getting the best response possible is figuring out what
in an email attracts users' eyes. This is something you can do by using
SMTPeter's click tracking. When click tracking is enabled, all links in
an email are rewritten so that they are first sent through SMTPeter before
being redirected to the original URI.

All these redirections are logged so statistics of all these clicks can
then be seen. We log the time of the click, as well as the link the user
clicked on and the position of the link within the email. This means it
is possible to add the same link to the email in multiple places to see
which one receives more clicks.

When rewriting the links to detect the clicks, we do our best to make the
rewritten link look as much as the original. We leave the path intact, and
only add a small identifier to the end. We also change the domain to one
that leads to us. This domain is clicks.smtpeter.com by default, which
likely does not ring a bell for many of your customers.

For this reason we have made it possible to configure the exact domain that
is used for click tracking. Say you have a domain called 'example.com' you
could set up 'clicks.example.com' as the click domain to use. The following
URI could then be rewritten as follows:

http://www.example.com/path-of-the-uri

Becomes:

http://clicks.example.com/path-of-the-uri-QogGwQIAgQQAg

[Set up your click domain](https://www.smtpeter.com/app/#/admin/click-tracking "Set up your click domain").


## Flexibility

There are two different ways to use SMTPeter: either using the SMTP API or REST API.
The SMTP protocol is the traditional protocol mail programs use to communicate with
each other, while REST is a protocol built on top of HTTP, the protocol of the web.

The SMTP API uses the SMTP protocol, the standard protocol that is normally used by
mail servers to communicate with each other. The SMTP protocol is very "chatty" - a lot of handshaking and negotiating
goes on between the server and the client, and it does not easily allow to pass
tuning parameters on a per-message level. It therefore is often more efficient to
use the REST API instead. However, if you do want to use the SMTP API, please check
our documentation for more details and examples on how to submit email and enable
SMTPeter's features using SMTP.

[Read our SMTP API Documentation](copernica-docs:SMTPeter/api-documentation/smtp-api "SMTP API documentation")

The REST API uses the the HTTPS protocol, this protocol is the foundation of data communication
for the world wide web. It is faster than the SMTP protocol, because only a single
instruction has to be sent from your application to an SMTPeter web server to send out an email.
To learn more about this API, full documentation and examples on the variables
and content-types that are supported by the REST API, you check the REST API specific 
documentation.

[Read the REST API Documentation](copernica-docs:SMTPeter/api-documentation/rest-api "REST API documentation")
