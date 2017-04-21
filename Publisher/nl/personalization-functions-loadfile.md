# Personalizatie functies: loadfile

De *loadfile* functie laat je een file laden uit het files onderdeel 
van de profielen in je template of document.

Let op: Deze functie kan niet gebruikt worden in een **Content** web formulier 
tekst blok.

## Voorbeeld

De *loadfile* functie kan gebruikt worden om een file te laden die geupload 
is onder profielen in een webpagina of mail document.

`{loadfile file='path/somepicture.jpg' fallback='defaultimage.jpg'}`

Als de file niet gevonden wordt zal alleen de filename worden weergeven 
aan de gebruiker. Het is daarom verstandig om naast de *file* optie ook 
altijd een *fallback* te definiëren. Als de file dan niet beschikbaar is 
wordt deze file in plaats daarvan weergeven.

## Ondersteunde bestand types

- HTML files: *.html
- TXT files: *.txt

Als je andere formaten wil gebruiken kun je ook [linken naar een file](./personalization-functions-linkfile).

## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie functies](./personalization-functions)
* [Personalizatie functie linkfile](./personalization-functions-linkfile)
