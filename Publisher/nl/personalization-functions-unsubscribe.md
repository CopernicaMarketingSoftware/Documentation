# Personalisatie functies: Unsubscribe

Het is wettelijk verplicht om iedere (commerciële) e-mail die je
verstuurt, te voorzien van een goed zichtbare en werkende
uitschrijfmogelijkheid. Copernica biedt verschillende mogelijkheden voor
het toevoegen van zulks een uitschrijflink. De meest gemakkelijke en
laagdrempelige manier om een uitschrijflink toe te voegen is de tag
**{unsubscribe}**.

**Belangrijke noot:** Wanneer je gebruik maakt van de {unsubscribe},
dien je tevens het [uitschrijfgedrag](./database-unsubscribe-behavior) in
te stellen op de database of collectie waaraan je de e-mailing richt!

## De uitschrijflink toevoegen

Gebruik de volgende code om een uitschrijflink toe te voegen in de HTML
broncode van het template of in een tekstblok in het document.

    <a  href="http://www.example.com" data-script="profile.unsubscribe();">Uitschrijven</a>

### Voorbeeld


    <a href="https://www.copernica.com/nl/afmelden/{$profile.id}/{$profile.code}/">
        Stuur mij geen e-mails meer
    </a>

## Extra opties

**Doorverwijzen naar eigen landingspagina**  

Nadat een ontvanger op de uitschrijflink heeft gedrukt, wordt hij of zij
doorverwezen naar een (nogal lege) standaardpagina.

Om een eigen pagina te tonen, gebruik je de 'redirect' functie

`{unsubscribe redirect='http://www.eendomein.nl/eigenlandingspagina.html'}`

De uitschrijver wordt, bij het klikken op de link, direct doorverwezen naar 
de pagina die je als redirect hebt opgegeven.

Je kunt op de volgende manier gebruik maken van een variabele uit het (sub)profiel dat wordt gebruikt als bestemming van de e-mail:  

`{unsubscribe redirect="http://www.eendomein.nl/eigenlandingspagina?profile=$id&code=$code"}`

Wanneer je zelfgedefinieerde variabelen wilt gebruiken dien je eerst de URL te definiëren voordat je deze in de redirect-parameter kunt gebruiken.
```
{capture assign="url"}http://www.eendomein.nl/eigenlandingspagina?variabele1={$variabale1}&variabele2={$variabele2}{/capture}
{unsubscribe redirect=$url}
```

**Toevoegen bevestigingspagina** 

We merken dat steeds vaker antivirussoftware linkjes in een mail probeert om zo spam te detecteren. Om te voorkomen dat zo'n geautomatiseerde klik
een uitschrijving tot gevolg heeft, kun je aangeven dat er een bevestigingspagina voor de doorverwijzing plaatsvindt (dit is een pagina met daarop
een uitschrijfknop). Dit kun je doen met de 'confirmation' functie:  
`{unsubscribe redirect='http://www.eendomein.nl/eigenlandingspagina.html' confirmation=true}` 

## Meer informatie

* [Personalisatie functies](./publisher-personalization-functions)
