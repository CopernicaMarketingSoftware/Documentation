# REST API: Conditie type field (veld)

Condities hebben onderling verschillende eigenschappen. Sommigen betreffen 
de periode waarin iets is gebeurd (datum eigenschappen), anderen informatie 
over een mailing (mailing eigenschappen) en weer anderen zijn specifiek voor 
het type condities (individuele eigenschappen). Alle eigenschappen moeten waar zijn 
om de conditie waar te maken en er hoeft maar een conditie waar te zijn 
om een regel waar te maken. 

Dit artikel gaat over de verschillende eigenschappen van de field conditie.

## Individuele eigenschappen
* **comparison**: Vergelijk type voor fieldconditie. Zie de [comparison types tabel](rest-conditie-type-field#comparison-types)
* **field**: Veld om te vergelijken met waarde
* **value**: Waarde om mee te vergelijken. (Aanpassing hiervan reset **other-field**)
* **other-field**: Ander veld om **field** mee te vergelijken. Als deze is 
ingesteld wordt **value** niet gebruikt.
* **numeric-comparison**: Boolean value om aan te geven of value numeriek wordt vergeleken.

## Comparison types

De volgende tabel bevat de mogelijke waarden voor de comparison types en hun
omschrijvingen.

| Comparison types | Omschrijving   |
|------------------|----------------|
|equals            | Gelijk aan     |
|not equals        | Ongelijk aan   |
|contains          | Bevat          |
|not contains      | Bevat niet     |
|less              | Minder dan     |
|more              | Meer dan       |
|is email          | Is een mail    |
|regexp            | Regex          |
|is-numeric        | Is numeriek    |

## Meer informatie
* [Regel condities opvragen](rest-get-rule-conditions)
* [Regel condities aanpassen](rest-post-rule-conditions)
* [Conditie type interesse](rest-condition-type-interest)
