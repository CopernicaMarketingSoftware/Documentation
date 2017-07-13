# Personalizing with the Marketing Suite

The fancy drag-and-drop, which you can find inside the 
[Marketing Suite](https://ms.copernica.com), gives you 
endless possibilities when creating your e-mails. 
The e-mails sent from this editor are automatically
responsive and thus look great on every device or client.

You can personalize e-mails in several ways: think about
a personal greeting with first and last name, show specific 
piece of content based on interest or don't show a specific
product because a customer has recently bought it. 

```text
{$profile/subprofile.<field>}

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

## Personalizing hyperlinks

It's possible to extend the hyperlinks in your e-mails with data
from a profile or subprofile. Unique login credentials (`$profile.id` en `$profile.code`)
is a good example of data that you can incorporate in a hyperlink. 
Consequently, when users click on a hyperlink, they're automatically 
logged in on the page the hyperlink points to. 

```text
https://www.example.com/gegevens-wijzigen?profile={$profile.id}&code={$profile.code}
```

## Where can I personalize in the drag-and-drop editor?

In the Marketing Suite you have an abundance of places where 
you can apply personalization. These fields can be recognized
by the Dollar `$` sign in the input field. You can for example
edit the 'from name', subject or 'from adres' by adding the code
to each of these fields.