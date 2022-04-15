# Uitschrijflink en webversie

## Uitschrijflink
Het is wettelijk verplicht om iedere (commerciële) e-mail die je verstuurt, te voorzien van een goed zichtbare uitschrijfmogelijkheid. De meest gemakkelijke en laagdrempelige manier om een uitschrijflink toe te voegen is de tag {unsubscribe}.

### Uitschrijflink toevoegen
Gebruik de volgende code om een uitschrijflink toe te voegen aan je template of document:

`<a href="{unsubscribe}">Uitschrijven</a>`

### Uitschrijflink activeren
Als je de tag {unsubscribe} gebruikt, dien je ook het uitschrijfgedrag in te stellen op de database of collectie waaraan je de e-mailing richt. Het uitschrijfgedrag wordt uitgevoerd in de database wanneer een ontvanger van de e-mail klikt op de uitschrijflink. Als je het uitschrijfgedrag niet instelt dan blijft de uitschrijver je e-mails ontvangen.

Het uitschrijfgedrag stel je in via *Profielen > Configuratie > Omgang met uitschrijvingen*.

### Uitschrijflink doorverwijzen naar eigen pagina  
Ontvangers die op de uitschrijflink klikken worden doorverwezen naar een standaardpagina.  
Om een eigen pagina te tonen, kun je gebruik maken van de functie 'redirect':

`{unsubscribe redirect="http://www.eendomein.nl/eigenlandingspagina"}`

Je kunt op de volgende manier gebruik maken van een variabele uit het (sub)profiel dat wordt gebruikt als bestemming van de e-mail:  

`{unsubscribe redirect="http://www.eendomein.nl/eigenlandingspagina?profile=$id&code=$code"}`

Wanneer je zelfgedefinieerde variabelen wilt gebruiken dien je eerst de URL te definiëren voordat je deze in de redirect-parameter kunt gebruiken.
```
{capture assign="url"}http://www.eendomein.nl/eigenlandingspagina?variabele1={$variabale1}&variabele2={$variabele2}{/capture}
{unsubscribe redirect=$url}
```

## Webversie
Het kan voorkomen dat een e-mail niet goed wordt weergegeven in het e-mailprogramma van de ontvanger. Door een webversie mee te sturen met je e-mails, kan de ontvanger deze openen in een internetbrowser. Deze webversie wordt automatisch op de juiste manier getoond en gepersonaliseerd. Gebruik voor de webversie onderstaande tag:

`{webversion}`

*Voorbeeld binnen je HTML*:

`<a href="{webversion}" title="Klik hier voor de webversie">Bekijk deze email in je browser</a>`
