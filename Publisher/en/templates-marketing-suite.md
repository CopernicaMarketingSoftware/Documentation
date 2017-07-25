# Templates: Marketing Suite

In the Marketing Suite there are two ways to create templates: There 
is the very user-friendly drag-and-drop editor and the more technical 
HTML editor. With the drag-and-drop editor anyone can make high quality 
emails in very little time. Simply drag elements to indicate where to 
place your text, images, share buttons, follow icons, unsubscribe buttons 
and much more. Besides the [follow-up manager](./followups) the Marketing Suite has many 
more functionalities to create a beautiful functional email.

## Extend hyperlinks

In the template editor you can use "extend hyperlinks". This adds the 
necessary information (such as login credentials) to save customer behaviour. 
Using this functionality you can log your clients into a website automatically, 
for example. You can also add your own custom option and pass on your own 
tags to have customer information delivered directly to your URL.

## Inlinize CSS

When left in a stylesheet CSS is often messed up by email clients, making 
your emails look very differently than you imagined. To prevent this you 
can use the inlinizer: The inlinizer adds the CSS directly to each element 
from your stylesheet, preventing it from being ruined by email clients, 
so every client sees your email exactly as you intended.

## Diff tool

Accidents happen and sometimes a tab is closed while you were still working 
in it. It also often occurs that you lose all progress. The Marketing Suite, 
however, saves your progress and allows you to view what was changed when 
the screen was closed.

## Responsive templates

Templates created and used with the drag-and-drop editor are automatically 
responsive. If you would take a look under the hood you would see that 
each template is actually a JSON file, which is converted into a beautiful 
email with our [ResponsiveEmail](http://www.responsiveemail.com) service. 
This means that no matter which device, your email always looks as intended.

## Spam check

It's also possible to check your spam score so you are sure the email will 
reach your recipients. You can check it by clicking `Tools` and navigating 
to `Spam check`. Several things determine your spam score, which influences 
your [deliverability](./deliverability). Tips on how to lower your spam 
score can be found [here](./some-tips-to-lower-your-email-spam-score). If your 
spam score is above 5 we will not send your email to protect our and our customers 
reputation.

## Headers

All headers from this article can be found at the top of the Template 
Editor in the Marketing Suite.

### BCC header

The BCC (Blind Carbon Copy) can be used to send copies of emails to one 
or multiple addresses, without showing the recipients the addresses of the 
others. This reduces the chances of addresses ending up in the hands of 
spammers, or receiving long chains of "Reply all" emails. Additionally it 
protects your users from viruses that spread by sending to other email 
adresses.

### X-headers

X-headers are additional headers that can be added next to the usual 
standardized headers such as the "From" address and the "Subject". The 
"X-" stands for eXperimental or eXtension. You can add your own values to 
add more information to the emails you send. You can name and use these 
X-headers however you want, for example to add the name of the selection 
and campaign to each email to use in your own statistics.

With Copernica you can also use Smarty [personalization](./personalization) 
in these headers. You can add a header named "X-PF-ID" for example 
and use it to store the ID of the profile from your own database for example, 
because you usually sync it to Copernica. You can then use this ID when 
your email bounces to look up the contact in your own database and contact 
them for the right email address.

### Unsubscribe

You can also use the *list unsubscribe* header. This is used to display 
the unsubscribe link right on the top of the email in some email clients. 
We recommend always using at least an unsubscribe link. This will help your 
[sender reputation](./sender-reputation) and you can 
[set unsubscribe behaviour](./database-unsubscribe-behavior) yourself. 

## More information

* [Templates](./templates)
* [Templates in Publisher](./templates-publisher)
* [Personalizing in the Marketing Suite](personalizing-your-newsletter-in-the-marketing-suite)
* [Followups](./followups)

### Template content

* [Text tag](text-tag)
* [Image tag](image-tag)
* [Loop tag](loop-tag)
