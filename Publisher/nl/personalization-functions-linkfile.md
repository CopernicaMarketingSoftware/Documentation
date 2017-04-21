# Personalizatie functies: linkfile

De *linkfile* functie laat je een file linken uit het files onderdeel 
van de profielen in je template of document.

Let op: Deze functie kan niet gebruikt worden in een **Content** web formulier 
tekst blok.

## Voorbeeld

De *linkfile* functie kan gebruikt worden om een file te linken die geupload 
is onder profielen in een webpagina of mail document.

`{linkfile file='path/somepicture.jpg' fallback='defaultimage.jpg'}`

Als de file niet gevonden wordt zal alleen de filename worden weergeven 
aan de gebruiker. Het is daarom verstandig om naast de *file* optie ook 
altijd een *fallback* te definiëren. Als de file dan niet beschikbaar is 
wordt deze file in plaats daarvan weergeven.

## Ondersteunde bestand types

* ZIP bestand: *.zip
* Plain tekst
* HTML tekst
* PDF bestand: *.pdf
* DOC/DOCX Word bestanden: *.doc/*.docx
* GIF/PNG/JPEG/JPG/JPE afbeeldingen: *.gif/*.png/*.jpeg/*.jpg/*.jpe

## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie functies](./personalization-functions)
* [Personalizatie functie loadfile](./personalization-functions-loadfile)
