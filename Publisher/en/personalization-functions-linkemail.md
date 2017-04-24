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

    <a href="{webversion}" title="Click for webversion">Klik hier om de mail in je browser te bekijken</a>

## Options

### **showheader**

De *showheader* optie kun je gebruiken om de standaard header met de informatie 
over de zender en de document informatie weg te laten.

`{webversion showheader=false}`

### **document**

De *document* optie kun je gebruiken om een ander document weer te geven 
dan degene die je hebt verzonden. Je hebt hiervoor slechts de titel nodig.

`{webversion document='newsletter april 2017'}`

### **template**

De template optie kun je gebruiken om een ander template te laten zien dan 
degene die gebruikt is in de mail. Je moet hier ook het onderliggende document 
toevoegen onder de *document* optie.

`{webversion template='Spring2017' document='newsletter april 2017'}`

### **domain**

De *domain* optie kan gebruikt worden om het picserverdomein aan te passen, 
zodat je link er anders uit ziet.

`{webversion domain='newsletter.yourdomain.com'}`

Om er echter voor te zorgen dat je webversie nog wel samenwerkt met Copernica 
moet je een CNAME referentie toevoegen aan het domein die verwijst naar 
pic.vicinity.nl.

## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie functies](./personalization-functions)
