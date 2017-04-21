# Personalizatie functies: linkemail

Soms als een email aankomt kan deze niet goed weergegeven worden in de 
email client. Copernica heeft hier een mooie oplossing voor: De webversie. 
Deze hoef je niet zelf aan te maken, want dit gebeurt wanneer de *linkemail* 
of *webversion* functie wordt aangeroepen.

## De fucntie gebruiken

Om de functie te gebruiken hoef je alleen een tag toe te voegen aan je 
document: `{webversion}`. Je kunt in de volgende voorbeelden ook `{linkemail}` 
gebruiken in plaats hiervan.

Zo simpel is het! De tag voegt alleen een URL in en de pagina wordt automatisch 
aangemaakt. Je kunt alleen nog niet op deze link klikken en er zijn ook geen 
woorden om op te klikken. Dit is snel op te lossen met wat HTML.

    <a href="{webversion}" title="Klik hier voor de webversie">Bekijk deze email in je favoriete browser</a>

## Opties

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
