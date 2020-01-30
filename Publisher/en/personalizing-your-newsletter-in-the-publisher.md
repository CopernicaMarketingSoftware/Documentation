# Personalizing with the Publisher

There are advanced personalization functions available within the Publisher so 
you can make very personalized newsletters. On top of that the Publisher makes 
personalization of your created emails very simple. Below, you'll find a few 
personalization examples. 

## Use of variables

With Smarty it is easy to store and use variables. Remember though, that 
there are important rules to keep in mind while working with Smarty:

* Smarty is capital sensitive. `{$profile.name}` is different than `{$profile.NAME}`;
* Curcly braces can be used as symbol with [literal](./personalization-functions-literal).

### Database variables

A personalization variable consists of a dollar sign `$`, profile or subprofile
and the name of the variable placed between curly braces.
The following variables can for example be used in a template
or document:

* `{$profile.name}`
* `{$profile.email}`
* `{$profile.salutation}`

These personalization variables only work when you have
the exact same fields in your database. Of course, the 
receivers information must be stored in the database as 
well. If that's all set, you can use the variables like 
this:

```text
Dear {$profile.salutation} {$profile.name},

You receive this email, because you subscribed 
with the following email address: {$profile.email}.
```

#### Load subprofile
You can retrieve profiles or sub-profiles in ascending or descending order, based on the value in a specific database or collection field.

You do this by adding the option as a parameter to the loadprofile or loadsubprofile tag

##### Example
You have a collection field 'fruit' and a number of subprofiles, which respectively have the values Apple, Banana, Lemon, Nectarine, Watermelon in the field 'fruit'

```
{loadsubprofile assign=loadedfruits multiple=true limit=2 orderby='fruit asc'}

I have in my fruit bowl a:
{foreach $ loadedfruits as $ loadedfruit}
{$ loadedfruit.fruit}
{/ foreach}
```

Result (asc):

I have one in my fruit bowl: Apple, Banana

Result (desc):

I have one in my fruit bowl: Watermelon, Nectarine

If you do not provide an order parameter in your load (sub) profile, the ID field is automatically sorted in ascending order. [Here you can find more info](loadprofile-and-loadsubprofile).

### Template variables

You can also use extra personalization variables by adding them in the 
Template menu. Here you define the name, the value should be specified 
when creating the document. You can use the value with **{$property.name}**, 
where name is replaced with the name of the property.

Let's say you want to give users a score based on their purchases and 
put it in your email. You don't need the score later (if you do, save it 
to your database!). You can then set a template variable **score**, calculate 
and assign the score and use it with **{$property.score}**.

## Curly braces

Our software automatically tracks curly braces as it indicates that Smarty 
code is being stated. However, sometimes you want to use curly braces just as 
symbols.You have to write some code in order to make sure thatthe software does 
not make a mistake by interpreting the curly braces as Smarty. You can do it in 
two ways: you can use {ldelim} and {rdelim} or {literal} en {/literal}. The 
difference is that with literal you can turn of the Smarty engine for a whole 
set of text that goes in between these tags.

```text
{literal}
    I love {curly braces}!
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
* Hyperlinks;
* Follow-up actions;
* Etc.

## More information

* [Personalization variables overview](./personalization-variables.md)
* [Personalization modifiers overview](./personalization-modifiers.md)
* [Personalization functions overview](./personalization-functions.md)
