# Personalization

The Marketing Suite and Publisher let you personalize emails in an easy way.
Just incorporate a little piece of code in your e-mail. When sent, the code gets
compiled and substitutes the code with the correct credentials of the receiver.
By clicking on the links below, you'll find out how to personalize your emails
in the Marketing Suite as well as the Publisher:

* [Personalizing with the Publisher](personalizing-your-newsletter-in-the-publisher.md)

## Personalizing with the Marketing Suite

The fancy drag-and-drop, which you can find inside the 
[Marketing Suite](https://ms.copernica.com), gives you 
endless possibilities when creating your emails. 
The emails sent from this editor are automatically
responsive and thus look great on every device or client.

You can personalize emails in several ways: think about
a personal greeting with first and last name, show specific 
piece of content based on interest or don't show a specific
product because a customer has recently bought it. 

```text
{$profile.<field>}

Example:

Dear {$profile.firstname}
```

With this syntax, every piece of data from a database
or collection field can be put inside an e-mail. When sent,
this code gets evaluated and substituted by the field value 
in the profile of the receiver.

It's always needed to specify exactly whether a field is
called from a profile or from a subprofile. It's perfectly 
fine to call `{$profile.firstname}` or `{$subprofile.firstname}`.
You just call the firstname property from a different place.

## Display data from a collection

You can also easily display data from a collection. You can do this
in two different ways. To display data from the first row of the collection
you can use this syntax.

```text
{$profile.collection[0].fieldname}
```

To display data from the next row, you can replace [0] with [1].

```text
{$profile.collection[1].fieldname}
```

To display all subprofiles you can use a foreach function.

```text
{foreach $ item in $ profile.collection}
{$item.fieldname}
{/ foreach}
```

If you do not want to display all fields you can use the if function in combination with the foreach function.

```text
{foreach $item in $profile.collection} {if $item.status == "InShoppingCart"}
{$item.fieldname}
{/if}{/foreach}
```

## Personalizing hyperlinks

It's possible to extend the hyperlinks in your emails with data
from a profile or subprofile. You can use unique credentials such as 
(`$profile.id` and `$profile.code`) that you can incorporate in a hyperlink. 
You can make a landing page that recognizes the ID and CODE. Than when users 
click on that hyperlink, they can be automatically logged in on the page the
hyperlink points to. 

```text
https://www.example.com/gegevens-wijzigen?profile={$profile.id}&code={$profile.code}
```

## Where can I personalize in the drag-and-drop editor?

In the Marketing Suite you have an abundance of places where 
you can apply personalization. These fields can be recognized
by the Dollar `$` sign in the input field. You can for example
edit the 'from name', subject or 'from adres' by adding the code
to each of these fields.

## More information

* [Personalization variables overview](./personalization-variables.md)
* [Personalization modifiers overview](./personalization-modifiers.md)
* [Personalization functions overview](./personalization-functions.md)

Besides personalization there are many more fun things you can do with 
your templates. You can add videos or GIFs to make your email more 
interesting or add follow-ups to automate your campaigns. Find out more 
in the articles below.

* [Videos and GIFs](./templates-video-gif)
* [Follow-ups](./followups)
