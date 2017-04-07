# REST API: Conditie type lastcontact (laatste contact)

Condities hebben onderling verschillende eigenschappen. Sommigen betreffen 
de periode waarin iets is gebeurd (datum eigenschappen), anderen informatie 
over een mailing (mailing eigenschappen) en weer anderen zijn specifiek voor 
het type condities (individuele eigenschappen). Alle eigenschappen moeten waar zijn 
om de conditie waar te maken en er hoeft maar een conditie waar te zijn 
om een regel waar te maken. 

Dit artikel gaat over de verschillende eigenschappen van de lastcontact conditie.

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
* **min-closed**: Minimum hoeveelheid items vereist op de contact lijst.
* **max-closed**: Maximum hoeveelheid items vereist op de contact lijst.
* **user**: Gebruiker van de conditie (PxPomUser), of "false" als er geen 
selectie nodig is.
* **priority**: Vraag prioriteit van geselecteerde contacten op.
* **contains**: Zoek string voor het doorzoeken van contact rapporten.

## Voorbeeld

Laten we zeggen dat we net een nieuwe aanwinst hebben bij de klantenservice: 
Medewerker Bob. Hij werkt hier net een maand en we willen zien of hij zijn 
klanten goed helpt. We kunnen dan een selectie maken van profielen die 
tenminste drie keer met hem in contact zijn geweest (voor een duidelijker beeld) 
en deze profielen vragen om een evaluatie. We doen dit met de volgende 
waarden.

* **after-time**: Vandaag - 1 maand in YYYY-MM-DD HH:MM:SS format
* **min-closed**: 3
* **contains**: "Bob"

We zoeken hier alleen voor minstens drie keer contact en alleen voor de 
periode waarin Bob gewerkt heeft. We zoeken tevens naar zijn naam in de 
contact rapporten om te checken of ze wel echt door hem geholpen zijn.

## Meer informatie

* [Regel condities opvragen](rest-get-rule-conditions)
* [Regel condities aanpassen](rest-post-rule-conditions)
* [Conditie type todo](rest-condition-type-todo)
