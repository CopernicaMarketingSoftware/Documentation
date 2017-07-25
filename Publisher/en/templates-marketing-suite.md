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

Headers are used to add information to an email. There are standardized 
headers such as "From" and "Subject", but you can also use so called "x-headers". 
Using these you can add any type of information you like. You can use them 
to make analysing your campaign easier, for example. You can also send 
a BCC (Blind Carbon Copy) or add the *List unsubscribe* header. See 
also the [article on headers](./headers)

## More information

* [Templates](./templates)
* [Templates in Publisher](./templates-publisher)
* [Personalizing in the Marketing Suite](personalizing-your-newsletter-in-the-marketing-suite)
* [Followups](./followups)
* [Headers](./headers)

### Template content

* [Text tag](text-tag)
* [Image tag](image-tag)
* [Loop tag](loop-tag)
