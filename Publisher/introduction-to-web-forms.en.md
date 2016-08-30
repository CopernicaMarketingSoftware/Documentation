A web form is one of the most effective tools to gather information.
Copernica offers two different ways to create web forms:

1. The generated web form
-------------------------

This is a very straight forward, but limited way to create a subscribe
form, an unsubscribe form, a change form or a tell-a-friend form.

Run though the wizard. In the end a piece of HTML code is outputted that
can be pasted into your company website's source code. The generated web
form is less powerful than the content web form (see below), however it
is easier to alter its lay-out and to publish it on a externally hosted
website.

The wizard to generate web forms is found under Websites \> Web page \>
Form wizard

[Read how you quickly generate a
webform](./generate-a-web-form-without-a-hassle.en.md)

2. The Content web form
-----------------------

Our web form module under Content lets you create very powerful web
forms by giving you full control over the web form behaviour. The wizard
will pilot you through the settings. The web form is easily published on
your Copernica hosted website using the special tag {webform name="your
webform"} that we have introduced. The content web form look great by
default, but with the help of a little CSS and/or  XSLT you are able
style the web form completely to match your own corporate identity or
website lay-out.

These are the steps to create a content web form

1.  [Compose the web form, by adding fields, interest fields, and text
    blocks](#)
2.  Configure the web form behaviour (the working of the web form).
3.  Publish the web form onto your web page
4.  You may also edit its stylesheet or xslt for a different lay-out or
    look 'n feel

Below are some of the most utilized web forms.

### The Subscription form

A subscription form creates a new profile in your database. It is used
to gather new contacts through your website or from another location
where you do not know who the person filling out the form is beforehand.

[How to create a subscription web form](#)

### Unsubscribe form (profile will be entirely removed from database)

An unsubscribe form is used to delete a contact from your database. The
addressee has to fill in his own data, then this is cross referenced to
your database to find his profile. That profile is then deleted.

An unsubscribe form deletes the entire profile from your database. Their
contact information is irretrievable!

[How to create an unsubscribe web form](#)

### Change form (also used as a less definitive unsubscribe form)

A change form only works for contacts you already know. It is used to
alter data of existing profiles. It has to be reached with a special
hyperlink that lets the form know who is filling it out, or the profile
is recognized through the submitted information (using key fields). It
is usually linked to an emailing or a web page that has to be logged in
to.\
 This type of form can be prefilled with the contact's current profile
information, so that he only has to change values of choice.

We recommend using this type of form for unsubscribing contacts from
mailings without losing their contact data. You can incorporate a field
where they switch 'receives newsletter' from yes to no, to unsubscribe
themselves.

How to create a change form

### Login / logout form

A login form lets visitors of your website login to their profile of
subprofile and thus give them access to [restricted/protected pages](#).
For example to see and edit their own details. To state the obvious: a
log out form does exactly the opposite.

[How to create a login or logout form](#)
