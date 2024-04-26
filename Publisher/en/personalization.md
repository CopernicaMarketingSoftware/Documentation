# Personalization

The Marketing Suite and Publisher let you personalize emails in an easy way.
Just incorporate a little piece of code in your email. When sent, the code gets
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
or collection field can be put inside an email. When sent,
this code gets evaluated and substituted by the field value
in the profile of the receiver.

It's always needed to specify exactly whether a field is
called from a profile or from a subprofile. It's perfectly
fine to call `{$profile.firstname}` or `{$subprofile.firstname}`.
You just call the firstname property from a different place.

## Display data from a collection in the Marketing Suite

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

To display data from the last row we have to count the rows first.
Because we start from zero we have to subtract one of the total amount of rows.

```text
{$profile.collection[{$profile.collection|count -1].fieldname}
```

### The foreach function

To display all subprofiles you can use a foreach function.

```text
{foreach $ item in $ profile.collection}
{$item.fieldname}
{/ foreach}
```

If you do not want to display all fields you can use the if function in combination with the foreach function.

```text
{foreach $item in $profile.collection}{if $item.status == "InShoppingCart"}
{$item.fieldname}
{/if}{/foreach}
```

If there aren't any subprofiles you can automatically show different content.

```text
{foreach $item in $profile.collection}
If there are subprofiles
{foreachelse}
If there aren't’ any subprofiles
{/foreach}
```
#### Native integrations

You can loop over certain variables in a native integration.     
Available modifiers are:
* add filters using the "filter" modifier
* order using the "orderby" modifier
* limit the amount of items using the "limit" modifier

```text
{foreach from=$nickname.products|filter:"price":"<":15|orderby:"price"|limit:1 item="product"}
{$product.name}
{/foreach}
```

##### Filter modifier

The filter modifier has several variations:

* filter:"price":">":15 - checks if price is greater than 15
* filter:"sku":"test" - if operator is omitted, we assume an 'equals' comparison
* filter:"sku" - if value is also omitted, we do a notnull check

##### Orderby modifier

The orderby modifier can be used ascending or descending

orderby:"price" - sorts by price, by default in an ascending direction
orderby:"price":"desc" - sorts by price in an descending direction


## Variables

You can also use variables. This can be useful, for example, if you have created a template that suddenly has to use other database fields.

First you have to define a variable. Then you can use this variable.

```
{$name = $profile.firstName}

Dear {$name}
```

You can also store text in a variable.
```
{$foo = 'hello'}
{$foo}
```

And you can calculate:

```
{$total = $profile.product_price * $profile.product_qty}
{$total}
```

## Personalizing hyperlinks

It's possible to extend the hyperlinks in your emails with data
from a profile or subprofile. You can use unique credentials such as
(`$profile.id` and `$profile.code`) that you can incorporate in a hyperlink.
You can make a landing page that recognizes the ID and CODE. Then when users
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
* [Follow-ups](./database-follow-ups)



