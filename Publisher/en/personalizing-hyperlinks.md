# Personalizing hyperlinks

The hyperlinks in your emailings and webpages can be supplemented with
data from a profile or subprofile. An common example is the login code
(**{\$profile.id}** and **{\$profile.code}**) that you add to the
hyperlink, to automalically login subscribers when they click to your
webpage.

The below example demonstrates how a hyperlink is personalized with the
unique credentials of the recipient using Smarty code:

`http://newsletter.mycompany.com/preferences?profile={$profile.id}&code={$profile.code}`

It is also possible a store a full URL or a part of a URL in the profile
or subprofile and use it in any hyperlink in the document or template.

`<a href="{$url}">Go to shopping cart</a>`

Optionally supplemented with login code or any other code from the
profile

`<a href="{$url}?profile={$profile.id}&code={$profile.code}">Go to shopping cart</a>`

### Using more advanced code for a hyperlink

If you target your mailing to profiles, and you want to personalize the
URL with data from a subprofile in a Collection, you use the
loadsubprofile function, for example:

`<a href="{loadsubprofile source='databasenaam:collectienaam' assign=ls profile=$profile.id}{$ls.url}">Go to your personal page</a>`

As you can see, all the code necessary for the personalization of the
hyperlink is placed within the link href. The reason why is explained
below.

Oops, link does not work
------------------------

If you click on the link in your email, you are redirected to a blanco
page.

This is a known issue. Scoping problem.

All smarty code necessary for the personalization of the link must be
placed within the quotes after the link href. Otherwise your subscribers
will find themselves redirected to a blank page.

Hyperlinks in emailings are processed through a dedicated server
(identified by http://pic.vicinity.nl/../ ..), enabling us to record the
clicks in the emailings. This link however is compiled (and
personalized) after the recipient clicks on the link in the email.\
 Smarty code that is used in the template or document, is already
executed at this very moment. Consequently, variables that you created
in the template or document are no longer available when the subscriber
clicks the link. As a result Smarty code in the hyperlink that rely on
Smarty code in the template will not function.

`{capture assign="url"}http://www.google.nl{/capture}`

`<a href="{$url}">Go to google.nl</a>`

The above example will be executed as expected when you test the code in
Copernica. However when clicked from the email, you're redirected to a
blanco page. For the link to work, the variable must also be created
within the link itself.

`<a href="{capture assign="url"}http://www.google.nl{/capture}{$url}">Go to google.nl</a>`

### Workarounds for this problem

​1. Wrap your link in html **\<code\>** tags to prevent that the link is
redirected via our pic servers. Clicks on these links are then not
recorded, but your link will function normally.

​2. Choose to not register clicks in the mailing at all. You find this
option in the tab 'Options' at the second step in the dialog to send a
mass mailing.

It is then no longer needed to redirect clicks and the link and the
document will be personalized at the same time. But unfortunately there
are no clicks recorded for the mailing and follow-ups based on the click
on a link will not function.
