#Starter guide to the Copernica Marketing Suite
Thank you for choosing Copernica Marketing Software! Although the software is very user-friendly, getting started on something new never comes without hiccups. That's why we've made you this starter guide. In it, you'll find all the basic functionalities and how to use them.
##Database structures
Before you can send emails, you first need to create something to send them to. In Copernica, this is done by making databases consisting of profiles, collections and subprofiles. Below, we'll explain them briefly.

###Profiles, subprofiles and interest groups
Profiles are probably the most important section for every online marketing campaign you're going to unfold with Copernica. Therefore, it is recommended to keep this section complete and organised right from the start.
Profiles are basically database entries that have fields holding information. For example, a profile can be John, and it can have the properties 'name', 'email', 'birthday', et cetera. You can add as many profiles and as many fields as you like.  Subprofiles are basically the same as profiles, only not on profile level, but in a collection.

A profile or subprofile can also have interests, which are ordered by interest groups. The name of the interest group will be the field name, from which interests can be selected if they apply to a profile.  You create these groups and their options yourself.

###Collections
A collection can be seen as a deeper layer of the main database, kind of like a sub-database. For example, a profile can have a collection of orders they placed. The collection 'orders' then holds subprofiles with fields, and possibly selections, for every product that person bought. 

##Setting up a sender domain
If you value your deliverability (the ability to deliver emails in recipients' inboxes instead of their spamboxes) you should authenticate your emails. Email authentication methods exist to make sure the IP address that sent the mailing was authorized to send mail using that domain ([SPF](Documentation/MarketingSuite/send-app/spf-validation.md) and to digitally sign your emails, proving the sender is who they say they are ([DKIM](Documentation/MarketingSuite/send-app/dkim-signing.md).([DMARC](Documentation/MarketingSuite/send-app/dmarc-deployment.md) informs the recipient about what it should do in case one of the former two is not in order. 

Setting these up can be tricky, so we do it for you. If you configure your domain as a sender domain and follow our [instructions](Documentation/MarketingSuite/send-app/sender-domains.md), all of your outgoing mail will be properly authenticated.

##Templates and the editor
After you've got your database and sender domain set up, it's time to start sending email. You do, however, need to have something to send. We do so using templates. Templates are the documents that your mailings are based on. What they look like, the text they hold, the buttons, everything.

Creating templates is done in the template editor, to be found  under ['Create template'](Documentation/MarketingSuite/template-editor/create-template.md) in the 'Email templates' dashboard. Using a drag-and-drop technique, templates can be created from scratch, or the standard templates can be edited to one's liking. To add an element to a template, simply drag it to the place you want it to be in and adjust it to work for your document. 

###Personalising emails using Smarty
Smarty is a well documented, easy to use template engine for PHP that allows you to use data from subprofiles to [personalise documents for recipients](Documentation/MarketingSuite/template-editor/personalization.md). In normal-human language: for example, if you type in a variable, such as 'Hello {$First\_name}!' , Smarty will look into the database, find the person you're sending an email to, and put whatever is in the field called 'First\_name' in the email. If you're sending an email to Hank, Mike and Lisa, the mails they receive will say 'Hello Hank!', 'Hello Mike!' and 'Hello Lisa!' respectively. 

##Send a mailing
Once you've got yourself a template that works for you, you can start using it to create mailings. This is done under the 'Mailings' tab. Click the green 'Create mailing' button to, well, create a mailing. The interface speaks for itself: just do what it says to send an emailing. It's possible to send your mailing right away or [delay it for a certain amount of time.](Documentation/MarketingSuite/send-app/repeat-mailings.md) You can also make it a repeated mailing.

Before you start sending actual mass mailings, there are a couple of things to keep in mind.
###Sending a test email
What's worse than sending a mailing to thousands of customers, only to realise it's ugly and not working properly? OK, plenty of things, but you still want to prevent it from happening. That's why it's a good idea to send a test mailing before actually sending the mailing. That way, it's possible to check if everything stays as pretty as you intended it to be after delivery. You could send it to yourself, or your colleagues, for example. You can send a test email in the template editor, under 'Tools'.

###Processing opt-outs
Something very important (legally compulsory, even) is to include an opt-out link. If readers decide they don't want to receive mailings any more, they have to be able to unsubscribe via a link in the email, usually placed at the bottom of the document. Unsubscribe settings can be managed in [Publisher](https://www.publisher.copernica.com)

Once you've got all of this covered, you can send your first mass mailing!

##Campaign results
In Copernica, it's possible to seeyour mails are doing on the other side of the line. The software automatically makes you an overview of things like clicks, destinations, devices, opens and way more. It also gives you an overview of how you are doing as a sender: it parses the [DMARC reports](Documentation/MarketingSuite/send-app/dmarc-deployment.md) that email receivers send you to show you how many of the mailings sent with your domain were sent with correct authentication, and how many weren't.

More detailed information on the subjects described in this article and other objects can be found in the rest of the Marketing Suite documentation.



