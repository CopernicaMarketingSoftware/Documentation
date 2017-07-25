# Enquêtes in Publisher

In Publisher is het mogelijk om zelf makkelijk enquêtes in elkaar te 
zetten om erachter te komen wat een klant vindt van jouw product of dienst. 
Het is daarnaast een makkelijke manier om data te verzamelen. Let echter 
wel op dat je de juiste vragen stelt op de juiste manier om database 
corruptie te voorkomen. Voor tips over het stellen van vragen klik je 
[hier](./prevent-database-corruption).

Let op: Enquêtes maken in de Marketing Suite is helaas nog niet mogelijk.

## Een enquête maken

Je kan gemakkelijk zelf een enquête aanmaken onder `Content` in de 
Publisher. Het is zelfs mogelijk data automatisch aan profielen te linken 
als je op een slimme manier hyperlinks creëert.

Als je je enquête een naam en beschrijving hebt gegeven kun je vragen 
toe gaan voegen. Er zijn verschillende soorten vragen, zoals de open 
vraag en de multiple choice vraag. De soorten vragen worden behandeld 
in [dit artikel](./surveys-question-types). Vragen kun je altijd 
aanmaken, aanpassen en verwijderen in het *Enquête* menu. 

Voor elke vraag krijg je ook een aantal instellingen. Hier kun je aangeven 
of een vraag optioneel is of op een nieuwe pagina moet beginnen bijvoorbeeld. 
Bij een multiple choice vraag kun je ervoor kiezen om wel of niet meerdere 
antwoorden toe te staan.

Om je enquête af te maken stuur je deelnemers door naar een bedanktpagina. 
Je kunt deze zelf van inhoud voorzien. Het is hierbij niet mogelijk om 
[personalizatie](./personalisation) te gebruiken, maar je kan eventueel 
wel doorverwijzen naar je eigen pagina. Dit doe je met de volgende code:

`<script type="text/javascript"> document.location = "http://www.mijnwebsite.nl/bedankt"; </script>`

## Enquête publiceren

### Linken

De beste manier om naar je enquête te linken is met de profiel identifier 
en code. Door deze informatie mee te geven kunnen de resultaten namelijk 
meteen aan het profiel gelinkt worden.

Stel dat dit de link naar je enquête is:
`http://www.jouwdomein.com/enquete`

Dan kun je de volgende link gebruiken voor profielen:
`http://www.jouwdomein.com/enquete?profile={\$profile.id}&code={\$profile.code}`

En de volgende voor subprofielen:
`http://www.jouwdomein.com/enquete?subprofile={\$subprofile.id}&code={\$subprofile.code}`

Wanneer een profiel deze link gebruikt om de enquête in te vullen kun je 
daarna de antwoorden terugvinden onder het tabjes *Enquêtes* onder het profiel.

### Invoegen op webpagina

Als je zelf je enquête niet host kun je deze ook plaatsen op een Copernica 
[website](./websites). Met de volgende tag hoef je alleen de naam van 
je enquête in te vullen:

`{survey name='surveyname'}`

Je eigen XSLT stylesheet kun je gebruiken als volgt:

`{survey name='enquetenaam' xslt='xsltnaam'}`

Een [XSLT](css-and-xslt) stylesheet kun je aanmaken onder het kopje `Stijl`.

## Resultaten

De resultaten van een enquête kun je per profiel inzien wanneer je het 
profiel zelf hebt geselecteerd. Je kunt er ook voor kiezen om je resultaten 
te [exporteren](./surveys-export-results) of deze te verwerken met 
[opvolgacties](./followups)

## Meer informatie

Met enquêtes kun je nog veel meer. Hieronder vindt je een aantal links 
met meer informatie.

### Algemeen

* [Voorkom database corruptie](./prevent-database-corruption)
* [Soorten enquête vragen](./surveys-question-types)

### Stijl aanpassen

* [Tekst op knoppen aanpassen](./surveys-edit-buttons)
* [Het hekje voor nummering verwijderen](./surveys-remove-hashtag)
