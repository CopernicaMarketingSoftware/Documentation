# Surveys: Conclude page

Survey participants are redirected to the survey conclude page after
they submitted the survey. The content of this page can be edited to 
thank your users and inform them. 

You can edit it by choosing 'Edit conclude page...' in the survey menu, 
using the either the rich editor or the HTML editor. The conclude page 
will have the same lay-out as the rest of the survey. 

![Editing the conclude page](../images/editconcludepage.png)

Personalization code is not supported, but it is possible to re-direct to 
your own page.

## Personalizing with profile information

When thanking the user for completing your survey you might want to use their 
name or other profile information. Please note that the user has to be logged in 
to be able to access their information. If you want to account for both anonymous 
and logged in users you could use something like the following code:

`{if $profile.id} Text for logged in users {else} Text for anonymous users {/if}`

## Re-direct to page

If you want to re-direct to your own (externally hosted) webpage 
you can do so by adding the following snippet of javascript with the HTML
editor. The participant will then be sent to that webpage.

<script type="text/javascript"> document.location = "http://www.mywebsite.nl/thanks"; </script>

## More information

* [Survey overview](./surveys)
