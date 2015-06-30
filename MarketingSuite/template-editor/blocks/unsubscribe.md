# Unsubscribe link block
The **unsubscribe link** is similar to the [webversion link](copernica-docs:MarketingSuite/template-editor/blocks/webversion), 
the only difference being that by clicking on this link the subscriber will 
remove himself from the mailing list. 

All commercial emails you send with the Marketing Suite, must have this link 
included. What happens to unsubscribers (they can be removed from the database, 
or just removed from a specific list) is set in the Publisher environment.  

## Create unsubscribe link inside text block

A link to the opt-out form can also be added inside a text / HTML block, 
by creating a link, and point it to `{unsubscribe}`. 

Example:

```
<a href="{unsubscribe}">By clicking on this link, I hereby state that I no longer wish to receive these emails.</a>
```
