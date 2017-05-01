# Personalizatie functies: Unsubscribe

Het is wettelijk verplicht om iedere (commerciële) e-mail die je
verstuurt, te voorzien van een goed zichtbare en werkende
uitschrijfmogelijkheid. Copernica biedt verschillende mogelijkheden voor
het toevoegen van zulks een uitschrijflink. De meest gemakkelijke en
laagdrempelige manier om een uitschrijflink toe te voegen is de tag
**{unsubscribe}**.

**Belangrijke noot:** Wanneer je gebruik maakt van de {unsubscribe},
dien je tevens het
[uitschrijfgedrag](./setting-unsubscribe-behaviour-for-your-database-or-collection.md) in
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

Nadat een ontvanger op de uitschrijflink heeft gedrukt, wordt hij of zij
doorverwezen naar een (nogal lege) standaardpagina.

Om een eigen pagina te tonen, gebruik je de 'redirect' functie

`{unsubscribe redirect='http://www.eendomein.nl/eigenlandingspagina.html'}`

De uitschrijver wordt, bij het klikken op de link, direct doorverwezen naar 
de pagina die je als redirect hebt opgegeven.

Om in plaats van het standaarddomein (pic.vicinity.nl) van Copernica een
eigen domein te tonen, is de optie *domain* beschikbaar.

`{unsubscribe domain='nieuwsbrief.yourdomain.com'}`

Let op: het uitschrijfdomein moet een CNAME verwijzing hebben naar onze
server (http://vicinity.picsrv.net/) om de link te laten werken.

## Meer informatie

* [Personalizatie functies](./personalization-functions)
