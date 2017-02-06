# Personalizing

You can personalize mailings, web pages, text messages and PDF files by using
special *personalization tags*. These tags are automatically recognized and 
replaced with personal profile data that is stored in the database. The
personalization technology that Copernica uses is based on a template language
named *Smarty*. Check out [http://www.smarty.net/docs/en/](http://www.smarty.net/docs/en/) 
for a complete guide and a list of all the features of Smarty.


## Using variables

A personalization variable is encapsulated inside curly brackets, and starts with 
a dollar sign. These are examples of such personalization variables:

* **{$name}**
* **{$email}**
* **{$salutation}**

Such personalization variables are of course only meaningful if the database
also contains fields with these names, and if these fields have non-empty
values for the profile for which the message is personalized. But if this is
indeed true, you can create a personalized message:

    Dear {$salutation} {$name},
    
    We send you this email because your address {$email} is listed in our database.
    
Personalizing is as easy as that. However, there are a couple of things that 
need special care:

* Keep it safe and always escape your variables
* Smarty is *case sensitive*. {$name} does not equal {$NAME}.
* If you want to use real curly brackets, you have to use {ldelim} and {rdelim}


## Smarty 2 or Smarty 3?

Sometimes, when you create a new template, you have to choose between Smarty
version 2 and Smarty version 3. [Always choose version 3.](./smarty-2-vs-smarty-3.md)


## Escaping variables

Although this is an advanced topic to start with, we do mention escaping right
away. It is very important. The personalization data that you use in your mailing
and websites was often entered by visitors of your website when they subscribed
to your newsletter. People enter their own name, city and email address en can
(deliberately!) submit erroneous data. You can therefore never blindly trust the 
data in your database and use it directly in your mailings. What happens to
the layout of your mail if someone has subscribed to the newsletter with the
name "&lt;/table&gt;"? And layout is not even your biggest concern. If you allow
raw unfiltered input from users in your newsletters and websites, you are 
vulnerable for many types of abuse and hacks.

Luckily, there is a simple Smarty *modifier* to prevent this. The *|escape*
modifier. Every variable that you use in a mailing or website should be passed
through this modifier to neutralize possible harmful HTML code that was entered
by users:

    Dear {$salutation|escape} {$name|escape},
    
    We send you this email because your address {$email|escape} is listed in our database.

Always keep this in mind when you are using Smarty code inside HTML texts.
If you cannot be sure of the contents of your database because the data was
entered by people using free text formfields you must neutralize the data before
using it. Do this for all variables that you use inside HTML. Variables that you 
use inside the text version of an email, or in the subject line do not have to 
be escaped. These elements of an email do not contain HTML code and are less
vulnerable for abuse.

If you want to escape variables automatically, so that you do not have to manually
append the |escape modifier to each variable, you can enable the auto-escaping
feature in the [small form with personalization settings](./personalization-settings.md)
that is displayed below the template and document.


## Curly brackets

If you want to use curly brackets inside a template or document you need a trick to
prevent that these brackets are not recognized by Smarty as personalization
tokens. You can either use {ldelim} and {rdelim} to encode curly brackets, or you can
use the {literal} and {/literal} tags to mark a whole block as literal code.

The {ldelim} and {rdelim} (abbreviations of *left delimiter* and *right delimiter*)
tags can be used to use curly brackets inside a document or template without causing
conflicts with other Smarty code. The {ldelim} tag can be used to encode a left
curly bracket: '{', and the {rdelim} for the right one: '}'.

If you want to disable the Smarty engine for a large piece of text, you can use
the {literal} and {/literal} tags. All text between these two tags is literally
copied into your mailing, without being checked for personalization tags and
variables. Curly brackets inside this text are also copied, even if they look
like valid Smarty functions or variables:

    {literal}
        I am a big fan of {curly} {brackets}!
    {/literal}

If you include the above code in a template, the {curly} {bracket} text will
not be recognized as Smarty code, but is literally included in the mailing.
    

## Testing personalization

If you're creating a template or document, you can directory 
[test the personalization](./personalization-testing.md). The data from the
profile that you have assigned as test destination is used for this test/preview.
Do make sure that you assign a profile as test destination that comes from the
same database that you are going to use for your mailing, so that it uses the
same database field names.


## Where can you use personalization tags

Almost all free texts that you enter in Copernica may contain personalization
variables:

* The email subject line
* Inside emails and web pages
* Almost all email headers (like the from address, CC, BCC, X-Mailer)
* Personalized website content
* Webforms (default values, labels, et cetera)
* Hyperlinks and mailto: links
* Follow up actions
* Et cetera...

Personalization is not yet supported in the following places:

* Inside surveys
* Inside content feeds

 
## Further reading

* [Overview of variables](./personalization-variables.md)
* [Overview of modifiers](./personalization-modifiers.md)
* [Overview of functions](./personalization-functions.md)
* [Tips en tricks](./personalization-tricks.md)


