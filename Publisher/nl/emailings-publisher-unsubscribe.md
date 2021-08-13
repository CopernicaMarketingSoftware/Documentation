# De uitschrijflink in de Publisher
Het is wettelijk verplicht om iedere (commerciële) e-mail die je
verstuurt, te voorzien van een goed zichtbare en werkende
uitschrijfmogelijkheid. Copernica biedt verschillende mogelijkheden voor
het toevoegen van een dergelijke uitschrijflink. De meest gemakkelijke en
laagdrempelige manier om een uitschrijflink toe te voegen is de tag
**{unsubscribe}**.

**Belangrijke noot:** wanneer je gebruik maakt van de {unsubscribe},
dien je tevens het uitschrijfgedrag in te stellen op de database of collectie
waaraan je de e-mailing richt!

## De uitschrijflink toevoegen
Gebruik de volgende code om een uitschrijflink toe te voegen in de HTML
broncode van het template of in een tekstblok in het document.

`<a href="{unsubscribe}">Uitschrijven</a>`

## De uitschrijflink activeren
Als je gebruik maakt van de {unsubscribe} tag, dien je tevens het
uitschrijfgedrag in te stellen op de database of collectie waaraan je de
e-mailing richt! Het uitschrijfgedrag wordt uitgevoerd in de database
wanneer de ontvanger van de e-mail klikt op de uitschrijflink. Doe je
dit niet, dan zal er niets gebeuren en ontvangt de uitschrijver je
e-mail de volgende keer opnieuw!

Het uitschrijfgedrag stel je in via \*Profielen \> Databasebeheer \>
**Uitschrijfopties...**

## Extra opties
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
eigen domein te tonen, is de optie *domain* beschikbaar.

*Voorbeeld:*

`{unsubscribe domain='nieuwsbrief.yourdomain.com'}`

Let op: het uitschrijfdomein moet een CNAME verwijzing hebben naar onze
server (http://vicinity.picsrv.net/) om de link te laten werken.

## Registreren van een uitschrijving op een verzonden e-mail
Als je geen gebruik maakt van de standaard Copernica uitschrijflink, maar de uitschrijving wilt registreren via een webformulier, kun je dit aangeven bij de instellingen van je formulier.

Hiervoor ga je binnen je formulier naar '*Webformulier [naam]*' in het submenu en kies je voor *Instellingen*. Onder het tabblad '*Algemeen*' vind je de optie 'Uitschrijfactie'.
 
Hier heb je de keuze uit 3 opties:
 
1. **Voer geen uitschrijfactie uit.**  
Het uitschrijfgedrag wordt niet geregistreerd in de statistieken van de e-mail en het uitschrijfgedrag wordt niet toegepast.
 
2. **Registreer een uitschrijving voor de e-mailing die als referer is opgegeven en voer het uitschrijfgedrag uit.**  
Het uitschrijfgedrag wordt geregistreerd in de statistieken van de e-mail en het uitschrijfgedrag wordt toegepast.
 
3. **Registreer een uitschrijving voor de e-mailing die als referer is opgegeven en voer het uitschrijfgedrag niet uit.**  
Het uitschrijfgedrag wordt geregistreerd in de statistieken van de e-mail en het uitschrijfgedrag wordt niet toegepast.
 
### Refereren in de uitschrijflink
Om het ingestelde gedrag toe te passen dien je in de e-mail een referentie te plaatsen waardoor het formulier weet bij welke mailing de uitschrijving hoort. Je kunt dit doen door drie parameters mee te geven in de URL:
- profile={$profile.id}
- code={$profile.code}
- publisherRefererEmailing={$mailing.id}

**Voorbeeld:** 
 
```
https://www.copernica.nl/afmelden?profile={$profile.id}&code={$profile.code}&publisherRefererEmailing={$mailing.id}
```
