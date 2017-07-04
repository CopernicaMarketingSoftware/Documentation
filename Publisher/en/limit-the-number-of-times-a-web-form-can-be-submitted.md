# Webforms: Limit amount of submits

Imagine that you have a form that you want customers to submit a maximum 
of three times. This can be achieved using [Smarty Personalization tags](./personalization). 
In this article we explain how.

Note: In this case we only track the amount of times a form is submitted 
for individual profiles. This means that we do not track the total amount 
of times the form is submitted.

## Database

In your database you will need to make a field ('submits') with 
default 0.

### Webform

First you need to make a webform with a textblock on the top. Place 
the following rule of code in the block:

`{capture assign=submits}{$currentsubmits}{/capture}`

Make a new webform field that is of the type invisible with the 
following default value:

`{math equation="x+y" x=$number y=1}`

Make another field that correspond to the profile, for example the 
email address. Make this a *key field* so it can be matched to the profile.

Set the webform to check on the keyfields, edit the profile, login as the 
profile in the [database](./database-introduction).

If you set everything up correctly the amount of submits should now increase 
when the webform is submitted. You can now place the form on your page.

On the closing page of the webform (this should be a webpage) you should 
now add the following code to inform your users of the amount of submits.

`{if $currentnumber > 3}You have submitted the form too many times{else}Please try again.{/if}`

[Back to webforms](./webforms)
