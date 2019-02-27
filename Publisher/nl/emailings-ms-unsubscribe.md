# De uitschrijflink in de Marketing Suite
Het is wettelijk verplicht om iedere (commerciële) e-mail die je
verstuurt, te voorzien van een goed zichtbare en werkende
uitschrijfmogelijkheid. Copernica biedt verschillende mogelijkheden voor
het toevoegen van een dergelijke uitschrijflink. De meest gemakkelijke en
laagdrempelige manier om een uitschrijflink toe te voegen is de tag
**{$unsubscribe}**.

**Belangrijke noot:**: Wanneer je gebruik maakt van {$unsubscribe},
dien je tevens het [uitschrijfgedrag in te stellen op de database of
collectie](database-unsubscribe-behavior) waaraan je de e-mailing richt!

## De uitschrijflink toevoegen
Gebruik de volgende code om een uitschrijflink toe te voegen in de HTML-
broncode van het template of in een tekstblok in het document.

`<a href="{$unsubscribe}">Uitschrijven</a>`

## De uitschrijflink activeren
Als je gebruik maakt van de {$unsubscribe} tag, dien je tevens het
uitschrijfgedrag in te stellen op de database of collectie waaraan je de
e-mailing richt! Het uitschrijfgedrag wordt uitgevoerd in de database
wanneer de ontvanger van de e-mail klikt op de uitschrijflink. Doet u
dit niet, dan zal er niets gebeuren, en ontvangt de uitschrijver uw
e-mail de volgende keer nog steeds.

Het uitschrijfgedrag stel je in via **Profielen** > **Databasebeheer** >
**Uitschrijfopties...**

## Doorverwijzen naar eigen landingspagina
Nadat een ontvanger op de uitschrijflink heeft geklikt, wordt hij of zij
doorverwezen naar een standaardpagina.

Om een eigen pagina te tonen, gebruik je de 'redirect' functie

`{unsubscribe redirect='http://www.eendomein.nl/eigenlandingspagina.html'}`

De uitschrijver zal direct na het aanklikken van de uitschrijflink
worden doorverwezen naar de pagina die je als redirect hebt opgegeven.
