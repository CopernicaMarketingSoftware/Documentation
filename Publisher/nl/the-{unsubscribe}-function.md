Het is wettelijk verplicht om iedere (commerciële) e-mail die je
verstuurt, te voorzien van een goed zichtbare en werkende
uitschrijfmogelijkheid. Copernica biedt verschillende mogelijkheden voor
het toevoegen van zulks een uitschrijflink. De meest gemakkelijke en
laagdrempelige manier om een uitschrijflink toe te voegen is de tag
**{unsubscribe}**.

**Belangrijke noot:** Wanneer je gebruik maakt van de {unsubscribe},
dien je tevens het
[uitschrijfgedrag](./uitschrijfgedrag-instellen-op-database-of-collectie.md) in
te stellen op de database of collectie waaraan je de e-mailing richt!

De uitschrijflink toevoegen
---------------------------

Gebruik de volgende code om een uitschrijflink toe te voegen in de HTML
broncode van het template of in een tekstblok in het document.

`<a href="{unsubscribe}">Uitschrijven</a>`

De uitschrijflink activeren
---------------------------

Als je gebruik maakt van de {unsubscribe} tag, dien je tevens het
uitschrijfgedrag in te stellen op de database of collectie waaraan je de
e-mailing richt! het uitschrijfgedrag wordt uitgevoerd in de database
wanneer de ontvanger van de e-mail klikt op de uitschrijflink. Doet u
dit niet, dan zal er niets gebeuren, en ontvangt de uitschrijver uw
email de volgende keer opnieuw!

Het uitschrijfgedrag stel je in via \*Profielen \> Databasebeheer \>
**Uitschrijfopties...**

Extra opties
------------

**Doorverwijzen naar eigen landingspagina**

Nadat een ontvanger op de uitschrijflink heeft gedrukt, wordt hij of zij
doorverwezen naar een (nogal lege) standaardpagina.

Om een eigen pagina te tonen, gebruik je de 'redirect' functie

*Voorbeeld*

`{unsubscribe redirect='http://www.eendomein.nl/eigenlandingspagina.html'}`

De uitschrijver zal direct na het aanklikken van de uitschrijflink
worden doorverwezen naar de pagina die je als redirect hebt opgegeven.

**Naar eigen domein verwijzen**

Om in plaats van het standaarddomein (pic.vicinity.nl) van Copernica een
eigen domein te tonen, is de optie *domain*  beschikbaar.

*Voorbeeld:*

`{unsubscribe domain='nieuwsbrief.yourdomain.com'}`

Let op: het uitschrijfdomein moet een CNAME verwijzing hebben naar onze
server (http://vicinity.picsrv.net/) om de link te laten werken.
