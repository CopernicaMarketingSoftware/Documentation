# REST API: Conditie type todo

Condities hebben onderling verschillende eigenschappen. Sommigen betreffen 
de periode waarin iets is gebeurd (datum eigenschappen), anderen informatie 
over een mailing (mailing eigenschappen) en weer anderen zijn specifiek voor 
het type condities (individuele eigenschappen). Alle eigenschappen moeten waar zijn 
om de conditie waar te maken en er hoeft maar een conditie waar te zijn 
om een regel waar te maken. 

Dit artikel gaat over de verschillende eigenschappen van de todo conditie.

## Datum eigenschappen

De datum eigenschappen kunnen gebruikt worden om de selectie te limiteren 
binnen een gegeven tijdperiode. Alle variabelen hieronder moeten ingesteld 
worden in YYYY-MM-DD HH:MM:SS formaat.

* **before-time**: Matcht alleen profielen die het document ontvingen voor deze tijd.
* **after-time**: Matcht alleen profielen die het document ontvingen na deze tijd.
* **before-mutation**: De beforemutation (tijdverschil) voor de change conditie.
* **after-mutation**: De aftermutation (tijdverschil) voor de change conditie.

## Individuele eigenschappen

* **match-type**: Match type van het laatste contact. Mogelijke waarden:
"match_intelligent", "match_exact"
* **match-mode**: Matchmode van de lastcontactconditie. Mogelijke waarden: 
"match_contacted_profiles", "match_not_contacted_profiles". Deze geven aan of 
een profiel wel of niet gecontacteerd is respectievelijk.
* **contact-type**: Het type contact of geen contact. Mogelijke waarden zijn 
een PxPomContactType of de waarde "false" als er geen contact was.
* **min-closed**: Minimum hoeveelheid items vereist op de todo lijst.
* **max-closed**: Maximum hoeveelheid items vereist op de todo lijst.
* **user**: Gebruiker van de conditie (PxPomUser), of "false" als er geen 
selectie nodig is.
* **priority**: Vraag prioriteit van geselecteerde todo's op.
* **contains**: Zoek string voor het doorzoeken van todo's.

## Voorbeeld

Stel dat je een update hebt uitgebracht voor je software en je klanten wil 
informeren. Het document voor de mail was nog niet klaar, maar je had er 
wel todo's voor aangemaakt. Nu het document klaar is wil je een selectie maken 
met de todo's. Je kunt dit doen met de todo condition met de volgende waarden:

* **match_type**: "match_intelligent"
* **contains**: \<naam van document>

Door "match_intelligent" te gebruiken voorkom je dat documenten niet 
gevonden worden door typo's of gespreide woorden.

## Meer informatie

* [Regel condities opvragen](rest-get-rule-conditions)
* [Regel condities aanpassen](rest-post-rule-conditions)
* [Conditie type laatste contact](rest-condition-type-lastcontact)
