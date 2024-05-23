# First mailing
To help you get started with your first mailing, we have prepared the checklist below. It contains all you need to send your first mailing.

## 1. Set up senderdomain
Before you can send mailings, you need to configure a sender domain. You will find this under __'[Configuration -> Sender domains](https://ms.copernica.com/#/admin/account/senderdomains)'__. 

The configuration process consists of two parts: (1) setting up a senderdomain in the interface and (2) setting up DNS settings at your hosting party. This process enables Copernica to send emails from your domain.

_[More information on setting senderdomains](./sender-domains)_

## 2. Database setup
Databases are the central point of information within Copernica. They store all contacts that you, as a user, are going to mail. These contacts are called 'profiles'. With Copernica you won't be stuck with standard mailing lists. Instead, you can configure a database according to your own preferences.

To view your current databases or create a new one, navigate to __'Profiles'__.

_[More information on creating databases and database fields](./database-profiles)_.

## 3. Importing profiles
There are several ways to add or modify new profiles within your database. You can modify profiles manually, via the [API](./apis), via [web forms](./webforms) or by means of an [import](./database-import). 

For your first mailing, we recommend importing data from your database.

_[More information on importing profile data](./database-import)_

## 4. Selection structure
A good mailing list improves the results of email marketing campaigns. Sending e-mails to non-existent e-mail addresses or people who do not open the e-mails negatively affects your sending reputation. As a result, more emails may end up in the spam folder.

Within Copernica, you are free to determine your own selection structure. However, to help you with that, we also offer a standard structure. The standard structure filters the profiles that can't or don't want to receive your emails from the send selection. Think of bounces, complaints, duplicate profiles, unsubscribers, inactives or profiles with an incorrect e-mail syntax.

You can create the default selection by navigating within your chosen database to __'Configure -> Create default selections'__. You can also set them when creating a new database.

_[More information on creating a selection structure](./database-management)_.

## 5. Email layout
Before you can send an e-mail, it is necessary to create a template or document. The [**'Email Editor'**](https://ms.copernica.com/#/design) allows you to develop extensive email templates using drag-and-drop or HTML. You can use feeds, conditional content and more. 

_[Learn more about drag-and-drop templates](./email-editor-drag-and-drop-templates)_  
_[Learn more about HTML templates](./email-editor-html-templates)_.

## 6. Sending
Sending your first mailing requires a sending selection (including profiles), template and document. The previous steps will help you create these. Have you successfully completed the checklist? Then you are ready to send the mailing. 

_[More information on sending test mailings](./email-editor-tests)_  
_[Learn more about sending bulk mailings](./email-editor-send-mass-mailing)_
