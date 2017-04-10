# Personalizing

You can personalize mailings, web pages, text messages and PDF files by using
special *personalization tags*. These tags are automatically recognized and 
replaced with personal profile data that is stored in the database. The
personalization technology that Copernica uses is based on a template language
named *Smarty* that is developed externally. This is a very well documented php-based (but much easier) 
scripting language to personalize your campaigns with. Both Smarty 2 and 
Smarty 3 are supported. Check out the [Smarty Documentation](http://www.smarty.net/docs/en/) 
for a complete guide and a list of all the features of Smarty.

## Smarty 2 or Smarty 3?

Both version 2 and version 3 of Smarty are supported, but Copernica 
recommends the use of Smarty 3. The [article on Smarty versions](./smarty-2-vs-smarty-3.md) 
explains the differences between both versions and why Smarty 3 is recommended.

## Using variables

A personalization variable is encapsulated inside curly brackets, and starts with 
a dollar sign. These are examples of such personalization variables:

* **{$name}**
* **{$email}**
* **{$salutation}**

Such personalization variables are of course only meaningful if the database
also contains fields with these names, and if these fields have non-empty
values for the profile for which the message is personalized. It is also 
possible to assign variables with [Smarty functions](./personalization-functions).
But if this is indeed true, you can create a personalized message:

    Dear {$salutation} {$name},
    
    We send you this email because your address {$email} is listed in our database.
    
Personalizing is as easy as that. However, there are a couple of things that 
need special care:

* Keep it safe and always escape your variables
* Smarty is *case sensitive*. {$name} does not equal {$NAME}.
* If you want to use curly brackets, you have to use {ldelim} and {rdelim}

## Escaping variables

Although this is an advanced topic to start with, we do mention escaping right
away. It is very important. The personalization data that you use in your mailing
and websites was often entered by visitors of your website when they subscribed
to your newsletter. People enter their own name, city and email address and can
(deliberately!) submit erroneous data. You can therefore never blindly trust the 
data in your database and use it directly in your mailings. What happens to
the layout of your mail if someone has subscribed to the newsletter with the
name "&lt;/table&gt;"? 

However, layout is not even your biggest concern. If you allow
raw unfiltered input from users in your newsletters and websites, you are 
vulnerable for many types of abuse and hacks, such as unauthorized users 
accessing and even altering your database.

There are two very simple ways to prevent this: enable the auto-escaping 
feature in the [small form with personalization settings](./personalization-settings.md), 
or use the Smarty *escape modifier*.

Smarty contains an extremely useful function called the *|escape*
modifier. Every variable that you use in a mailing or website should be passed
through this modifier if auto-escaping is not enabled to neutralize 
possibly harmful HTML code that was entered by users:

    Dear {$salutation|escape} {$name|escape},
    
    We send you this email because your address {$email|escape} is listed in our database.

Always keep this in mind when you are using Smarty code inside HTML texts.
If you cannot be sure of the contents of your database (which nobody 
really can) you must neutralize the data before using it. Do this for all 
variables that you use inside HTML. Variables that you use inside the 
text version of an email, or in the subject line do not have to 
be escaped. These elements of an email do not contain HTML code and are less
vulnerable to abuse.

## Curly brackets

Usually curly brackets are used as to personalize. If you want to use the 
symbols themselves there are a few ways of accomplishing this.

### Trailing spaces in Smarty 3

Smarty 3 automatically ignore curly brackets with spaces placed around them. 
Therefore `{ abc }` would not be recognized, but `{abc}` would.

### {ldelim} and {rdelim}

The tags {ldelim} and {rdelim} (abbreviations of *left delimiter* and *right delimiter*) 
can be used to encode curly brackets without causing conflicts in the Smarty code. 
The left curly bracket '{' can be used with {ldelim} and the right bracket 
'}' with {rdelim}.

### Literal text

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

If you're creating a template or document, you can immediately 
[test the personalization](./personalization-testing.md). The data from the
profile that you assigned as test destination is used for this test/preview.
Do make sure that you assign a profile that comes from the
same database that you will use for your mailing, so that it uses the
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
* [Tips and tricks](./personalization-tricks.md)
* [Smarty Documentation](http://www.smarty.net/docs/en/) 


