# Uitschrijflink en webversie

## Uitschrijflink
Het is wettelijk verplicht om iedere (commerciële) e-mail die je verstuurt, te voorzien van een goed zichtbare uitschrijfmogelijkheid. De meest gemakkelijke en laagdrempelige manier om een uitschrijflink toe te voegen is de tag {unsubscribe}.

**Belangrijke noot:** wanneer je gebruik maakt van de {unsubscribe}, dien je tevens het uitschrijfgedrag in te stellen op de database of collectie waaraan je de e-mailing richt!

### Uitschrijflink toevoegen
Gebruik de volgende code om een uitschrijflink toe te voegen aan je template of document:

`<a href="{unsubscribe}">Uitschrijven</a>`

### Uitschrijflink activeren
Als je gebruik maakt van de {unsubscribe} tag, dien je tevens het uitschrijfgedrag in te stellen op de database of collectie waaraan je de e-mailing richt. Het uitschrijfgedrag wordt uitgevoerd in de database wanneer de ontvanger van de e-mail klikt op de uitschrijflink. Doe je dit niet, dan zal er niets gebeuren en ontvangt de uitschrijver je e-mail de volgende keer opnieuw.

Het uitschrijfgedrag stel je in via *Profielen > Configuratie > Omgang met uitschrijvingen*.

### Uitschrijflink doorverwijzen naar eigen pagina  
Nadat een ontvanger op de uitschrijflink heeft gedrukt, wordt hij of zij doorverwezen naar een standaardpagina.  
Om een eigen pagina te tonen, kun je gebruik maken van de 'redirect' functie:

`{unsubscribe redirect='http://www.eendomein.nl/eigenlandingspagina'}`

## Webversie
Het kan voorkomen dat een e-mail niet goed wordt weergegeven in het e-mailprogramma van de ontvanger. Door gebruik te maken van een webversie kan de gebruiker alsnog de e-mail inzien. De webversie wordt geopend in de internetbrowser van de ontvanger. Deze versie wordt automatisch gepersonaliseerd aangemaakt door de software bij het gebruik van de webversie-tag.

Om de webversie mee te sturen in je e-mails, gebruik je onderstaande tag:

`{webversion}`

*Voorbeeld binnen je HTML*:

`<a href="{webversion}" title="Klik hier voor de webversie">Bekijk deze email in je browser</a>`
