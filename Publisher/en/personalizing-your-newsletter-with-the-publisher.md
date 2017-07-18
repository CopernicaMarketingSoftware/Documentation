# Personalizing with the Publisher

The Publisher is meant to make advanced newsletters. 
On top of that the Publisher makes personalization 
of your created e-mails very simple. Below, you'll
find a few personalization examples. 

## Use of variables

A personalization variable consists of a dollar sign `$`
and the name of the variable placed between curly braces.
The following variables can for example be used in a template
or document:

* `{$name}`
* `{$email}`
* `{$aanhef}`

These personalization variables only work when you have
the exact same fields in your database. Of course, the 
receivers information must be stored in the database as 
well. If that's all set, you can use the varibales like 
this:

```text
Dear {$salutation} {$name},

You receive this email, because you subscribed 
with the following email address: {$email}.
```

You can also send seperate content to different
[selecties](selections-introduction) in your database
with the [in_selection](./personalization-functions-in_selection)
and [in_miniselection](./personalization-functions-in_miniselection)
functions. 

Remember though, that there are important rules to keep in mind
while working with Smarty:

* Keep it safe by using `escape`;
* Smarty is capital sensitive. `{$name}` is something else as `{$name}`;
* Curcly braces can be used as symbol with [literal](./personalization-functions-literal).

## Escape

It's a difficult subject, but very important for you to grasp.
When you present the opportunity for customers to fill in their
details, such as name, city and email address, the majority of 
them will of course always fill in their correct data. However,
as with everything online, people will always try to do harm
by hacking or other forms of digital abuse. This means that 
you can in no way be sure that the information people fill in,
actually is safe data. When this scenario occurs, there is a 
possibility of very nasty things happening to you or your 
customers when sending out your mailing. 

Luckily, Smarty has this covered with the *|escape* modifier. 
With this modifier you can make sure that input is being 
converted to a neutral format that is safe to store in your 
database. It goes like this:

```text
Dear {$salutation|escape} {$name|escape},
    

You receive this email, because you subscribed 
with the following email address: {$email|escape}.
```

Again, always take in consideration to use |escape when
using Smarty code in HTML code. Don't worry about Smarty
code (personalization) in text versions or subject lines:
the |escape modifier isn't needed here as it only applies
to html code.

## Curly braces

Our software automatically tracks curly braces as it 
indicates that Smarty code is being stated. However, 
sometimes you want to use curly braces just as symbols.
You have to write some code in order to make sure that
the software does not make a mistake by interpretting 
the curly braces as Smarty. You can do it in two ways:
you can use {ldelim} and {rdelim} or {literal} en 
{/literal}. The difference is that with literal you 
can turn of the Smarty engine for a whole set of text  
that goes in between these tags.

```text
{literal}
    Ik ben gek op {accolades}!
{/literal}
```

## Where can you use personalization?

Almost everywhere. Check the list below
to get some inspiration:

* Subject line from email;
* In email and webdocuments
* Various email headers (from, CC, BCC, X-Mailer, etc.);
* Personalized website content;
* Webforms;
* Hyperlinks and mailto: linksl
* Follow-up actions;
* Etc.

## More information

* [Personalization variables overview](./personalization-variables.md)
* [Personalization modifiers overview](./personalization-modifiers.md)
* [Personalization functions overview](./personalization-functions.md)