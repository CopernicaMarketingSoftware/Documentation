# Personalization functions: linkemail

Sometimes an email is not displayed properly in the email program of the 
receiver. No worries, however, since we can simply send the user to the 
webversion of the mail. The webversion is created automatically when 
requested with the *linkemail* function.

## Using the tag

To insert the webversion you use the following tag: `{webversion}`. In the 
following examples you can also use `{linkemail}` instead.

It's that simple! The tag simply inserts the URL for you and the page is 
created automatically. You can't click this yet and there is no text to 
click, but this is easily done with HTML.

    <a href="{webversion}" title="Klik hier voor de webversie">Bekijk deze email in je favoriete browser</a>

## Options

### showheader

The *showheader* option can be used to remove the standard header with 
sender and document information.

`{webversion showheader=false}`

### document

The *document* option can be used to show another document than the one 
that was sent.

`{webversion document='newsletter april 2017'}`

### template

The template option can be used to show a different template than the 
one that was used for the mail. You should also include the document in the 
*document* option.

`{webversion template='Spring2017' document='newsletter april 2017'}`

### domain

The *domain* option can be used to replace the default picserverdomain.

`{webversion domain='newsletter.yourdomain.com'}`

If you want to use your own domain this should have a CNAME reference to 
pic.vicinity.nl.

## More information

* [Personalization](./personalization)
* [Personalization functions](./personalization-functions)
