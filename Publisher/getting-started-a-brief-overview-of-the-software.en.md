Thank you for choosing Copernica Marketing Software! Although the
software is very user-friendly, getting started on something new never
comes without hiccups. That's why we've made you this starter guide. In
it, you'll find all the basic functionalities and how to use them.

Database structures
-------------------

Before you can send emails, you first need to create something to send
them to. In Copernica, this is done by making databases consisting of
profiles, subprofiles, collections, selections and miniselections.
Below, we'll explain them briefly.

### Profiles, subprofiles and interest groups {#profiles,-subprofiles-and-interest-groups}

Profiles are probably the most important section for every online
marketing campaign you're going to unfold with Copernica. Therefore, it
is recommended to keep this section complete and organized right from
the start. Profiles are database entries that have fields holding
information. For example, a profile about a relation can have the
properties 'name', 'email', 'birthday', et cetera. Each profile also has
its own [campaign
history](<https://www.copernica.com/en/blog/view-profile-history-and-campaigns>)
, in which you can see all results a profile has had since it was
created. Subprofiles are basically the same as profiles, only not on
profile level, but in a collection.

A profile can also have interests, which are ordered by interest groups.
The name of the interest group will be the field name, from which
interests can be selected if they apply to a profile. You create these
groups and their options yourself.

### Collections

A
[collection](<https://www.copernica.com/en/blog/working-with-database-collections>)
can be seen as a deeper layer of the main database, like a sub-database.
For example, a profile can have a collection of orders they placed. The
collection 'orders' then holds subprofiles with fields, and possibly
selections, for every product that person has bought.

### Selections and miniselections: {#selections-and-miniselections:}

[Selections and
miniselections](<https://www.copernica.com/en/blog/selections-and-miniselections>)
are, well, selections of profiles or subprofiles based on certain
conditions. Their position in the database is on the same level as the
section the profiles are selected from: selections are on profile level
and miniselections are selections on collection level. There are many
things you can check for in conditions such as dates, spam issues,
numerical values, alphabetical values, bounces, etc. You use these to
determine which users should recieve which mailings, and , more
importantly, if they even should receive mailings. Learn how to create a
mailing list
[here.](<https://www.copernica.com/en/blog/create-a-mailing-list>)

1.  [Learn how to set up a database](<http://www.copernica.com/en/support/setting-up-your-database-and-import-your-contacts>) Templates and the editor {#[learn-how-to-set-up-a-database](<http://www.copernica.com/en/support/setting-up-your-database-and-import-your-contacts>)
    templates-and-the-editor}
    --------------------------------------------------------------------------------------------------------------------------------------------------

After you've got your database and sender domain set up, it's time to
start sending email. You do, however, need to have something to send. We
do so using templates and documents.

Every email made in Copernica is based on an [HTML
template](<https://www.copernica.com/en/blog/getting-started-building-email-templates>)
. In the template, the layout of the email is determined, but the
content is not yet there. You use special blocks to specify where which
sort of content is going to fill the space. This way, it's possible to
use a template as many times as you want.

Copernica offers a [default
template](<https://www.copernica.com/en/blog/using-the-copernica-default-template>)
that's quick and easy to load. It contains text, image and loop blocks.
You can use it to play around with and discover the possibilities HTML
templates and documents have to offer.

After you've created a template you're content with, you can [compose a
document](<https://www.copernica.com/en/blog/composing-email-documents-in-copernica>)
in which you actually fill the email with images and text. The document
is what you 're going to end up sending eventually.

Personalizing emails using Smarty
---------------------------------

Smarty is a well documented, easy to use template engine for PHP that
allows you to use data from subprofiles to [personalize your
emails](<https://www.copernica.com/en/blog/personalize-campaigns>) .

In normal-human language: for example, if you type in a variable, such
as 'Hello {\$First\_name}!' , Smarty will look into the database, find
the person you're sending an email to, and put whatever is in the field
called 'First\_name' in the email. If you're sending an email to Hank,
Mike and Lisa, the mails they receive will say 'Hello Hank!', 'Hello
Mike!' and 'Hello Lisa!' respectively.

Send a mailing
--------------

Once you've got yourself a database and a document to send, you can
start using them to create mailings. However, before you start sending
actual mass mailings, there are a couple of things to keep in mind.

### Authentication and sender domains

If you value your
[deliverability](<https://www.copernica.com/en/blog/the-key-ingredients-for-a-good-deliverability>)
(the ability to deliver emails in recipients' inboxes instead of their
spamboxes) you should authenticate your emails. Email authentication
methods exist to make sure the IP address that sent the mailing was
authorized to send mail using that domain (SPF) and to digitally sign
your emails, proving the sender is who they say they are (DKIM). DMARC
informs the recipient about what it should do in case one of the former
two is not in order.

Setting these up can be tricky, so we do it for you. If you configure
your domain as a sender domain and follow our
[instructions](<https://www.copernica.com/en/blog/new-feature-sender-domains>)
, all of your outgoing mail will be properly authenticated.

### Sending a test email

What's worse than sending a mailing to thousands of customers, only to
realize it's ugly and not working properly? OK, plenty of things, but
you still want to prevent it from happening. That's why it's a good idea
to send [a test
mailing](<https://www.copernica.com/en/blog/send-a-test-mail-or-test-mailing>)
before actually sending the mailing. That way, it's possible to check if
everything stays as pretty as you intended it to be after delivery. You
could send it to yourself, or your colleagues, for example.

### Processing opt-outs

Something very important (legally compulsory, even) is to include an
[opt-out
link](<https://www.copernica.com/en/blog/the-unsubscribe-function>) . If
readers decide they don't want to receive mailings any more, they have
to be able to unsubscribe via a link in the email, usually placed at the
bottom of the document. [Unsubscribe
settings](<https://www.copernica.com/en/blog/setting-unsubscribe-behaviour-for-your-database-or-collection>)
can be managed in the Publisher environment.

Once you've got all of this covered, you can send your first [mass
mailing.](<https://www.copernica.com/en/blog/sending-a-mass-mailing>)

Campaign results
----------------

In Copernica, it's possible to see how your mails are doing on the other
side of the line. The software automatically makes you an overview of
[statistics](<https://www.copernica.com/en/blog/campaign-results-and-statistics>)
like clicks, destinations, devices, opens and way more. This way, you
know exactly what went right in your email, or what needs extra
attention.

Other features
--------------

Sending mailings and managing databases is of course the main objective
of Copernica Marketing Software. However, the software offers a number
of other features to enrich your experience. You'll find them in the
main menu header. Here's a quick overview.

-   [Websites](<https://www.copernica.com/en/blog/websites>) : once you
    have created your first email document with Copernica Marketing
    software, you will find it pretty easy to create an interactive
    website as well. Use this section to develop personalized landing
    pages, to publish online surveys, to set up RSS feeds and much more.
    Best of all: apart from HTML and CSS, no knowledge of computer
    programming is needed for any of it.
-   [Mobile](<https://www.copernica.com/en/blog/sms-and-mobile>) : send
    personalized SMS messages to all your relations at once or messages
    to individual subscribers. For instance as a reminder for an event
    they have subscribed for, or a mass message to all your relations to
    announce something important (like your birthday).
-   [PDF](<https://www.copernica.com/en/blog/print-pdf-and-fax>) : send
    personalized coupons, tickets, whitepapers, leaflets or anything
    else along with your email that is meant to be printed on paper.
-   Content: within the Content module you create and manage your own
    web forms, RSS and Atom feeds, surveys and [Media Libraries](<a>)
    that you can quickly and easily use in both your Copernica projects
    and anywhere outside Copernica.\
     Media Libraries enable you to centrally manage your images and
    files, making them automatically available for use in templates and
    documents, forms, et cetera. You are allowed to create as many
    forms, surveys, feeds, and libraries as you want. There's no extra
    charge involved.
-   Style: everything you create in Copernica can be styled and modified
    completely to match your corporate identity or lay-out. Whether it’s
    the lay out of your website, web form or published survey,it can all
    be managed in this section. Note that basic knowledge of CSS and in
    some cases XSLT is required.

