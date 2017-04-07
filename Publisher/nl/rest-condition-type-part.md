# REST API: Conditie type part (deel)

Condities hebben onderling verschillende eigenschappen. Sommigen betreffen 
de periode waarin iets is gebeurd (datum eigenschappen), anderen informatie 
over een mailing (mailing eigenschappen) en weer anderen zijn specifiek voor 
het type condities (individuele eigenschappen). Alle eigenschappen moeten waar zijn 
om de conditie waar te maken en er hoeft maar een conditie waar te zijn 
om een regel waar te maken. 

Dit artikel gaat over de verschillende eigenschappen van de part conditie.

## Individuele eigenschappen
* **begin**: Het eerst geselecteerde profiel als een getal of percentage. 
Je kunt hier een negatieve waarde gebruiken om vanaf het eind te beginnen 
met tellen.
* **length**: Het aantal geselecteerde profielen als getal of percentage. 
* **fields**: Alle velden gebruikt in deze conditie.

## Meer informatie
* [Regel condities opvragen](rest-get-rule-conditions)
* [Regel condities aanpassen](rest-post-rule-conditions)
