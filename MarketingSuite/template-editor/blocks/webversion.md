# Webversion link block

Some people prefer to open emails in their normal web browser rather than in 
an email client. A version of the email that can be opened with a normal browser 
is usually called the *webversion*. The editor automatically creates 
a webversion of each email you send with the application.
 
To add a link to this webversion, just drag the item into your design. The click 
text and appearance of the link can be set in the settings panel of this block.

Clicking on this link will open the subscriber's internet browser and load the 
email in a new browser tab. When any personalization code is used, the receiver 
will see the webversion tailored with his of her details.  

## Include webversion link inside a text block

A link to the webversion can also be added inside a text / HTML block, 
by creating a link, and point it to `{$webversion}`. 

Example:

```
<a href="{$webversion}">Click here to view the webversion</a>
```
