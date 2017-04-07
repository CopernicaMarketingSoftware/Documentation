# REST API: Conditie type lastcontact (laatste contact)

Condities hebben onderling verschillende eigenschappen. Sommigen betreffen 
de periode waarin iets is gebeurd (datum eigenschappen), anderen informatie 
over een mailing (mailing eigenschappen) en weer anderen zijn specifiek voor 
het type condities (individuele eigenschappen). Alle eigenschappen moeten waar zijn 
om de conditie waar te maken en er hoeft maar een conditie waar te zijn 
om een regel waar te maken. 

Dit artikel gaat over de verschillende eigenschappen van de lastcontact conditie.

## Datum eigenschappen
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
* **min-closed**: Minimum hoeveelheid items vereist op de contact lijst.
* **max-closed**: Maximum hoeveelheid items vereist op de contact lijst.
* **user**: Gebruiker van de conditie (PxPomUser), of "false" als er geen 
selectie nodig is.
* **priority**: Vraag prioriteit van geselecteerde contacten op.
* **contains**: Zoek string voor het doorzoeken van contact rapporten.

## Meer informatie
* [Regel condities opvragen](rest-get-rule-conditions)
* [Regel condities aanpassen](rest-post-rule-conditions)
* [Conditie type todo](rest-condition-type-todo)
