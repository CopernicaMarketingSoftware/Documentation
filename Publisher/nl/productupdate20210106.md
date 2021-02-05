# Productupdate

## Je stijl- en XSLT-bestanden beheren in Marketing Suite
* De stylesheets en XSLT-bestanden die je voorheen alleen via Publisher kon beheren, zijn nu ook toegankelijk in Marketing Suite. Hierdoor is het iets makkelijker en sneller om dit soort bestanden te beheren. Je vindt de modules onder het kopje ‘Stijl’ en ‘XSLT’ in de Marketing Suite. 

## Selectie logfiles
* Binnen de logfilesmodule van de Marketing Suite is het nu mogelijk om de historie van de opbouw van selecties in te zien. Hierin staat de opbouwtijd en hoeveel profielen er op dat moment in de selectie aanwezig waren. Dit geeft je meer inzicht in het verloop van je selecties binnen Copernica. 

## Marketing Suite
* Je kunt nu zoeken binnen de supportmodule naar een eerder ingediend ticket. 
* Bij de resultaten van Marketing Suite mailings is het mogelijk om een export naar een CSV-bestand te maken van alle impressies. Hier hebben wij extra gegevens aan toegevoegd. Je kunt nu inzien welke client en besturingssysteem de ontvanger heeft gebruikt bij het openen van je e-mail. Daarnaast zie je of dit de mobiele of desktop weergave betrof.
* Bij de resultaten van Marketing Suite mailings is het mogelijk om een export naar een CSV-bestand te maken van alle fouten. Hier hebben wij de beschrijving die wij terug hebben gekregen van de ontvangende mailserver aan toegevoegd.
* Bugfix: het is weer mogelijk om logfiles te downloaden. Je kunt deze logfiles hier vinden.

## Publisher
* Je kunt nu instellen dat je een notificatie wilt ontvangen wanneer je feed of de pagina die je gebruikt in een fetch niet bereikbaar is.

## API
* Je kunt nu meerdere profielen tegelijk verwijderen door een HTTP delete verzoek te versturen naar database/{$id}/profiles. In een lijst geef je de ID's mee van de te verwijderen profielen.
* Het is nu mogelijk om het verbruik van je account op te halen via een API call. Je kunt de hiervoor het nieuwe consumption endpoint aanroepen. 
