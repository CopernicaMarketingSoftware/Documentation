# REST API: Conditie type referview (verwijzing naar andere view)

Condities hebben onderling verschillende eigenschappen. Sommigen betreffen 
de periode waarin iets is gebeurd (datum eigenschappen), anderen informatie 
over een mailing (mailing eigenschappen) en weer anderen zijn specifiek voor 
het type condities (individuele eigenschappen). Alle eigenschappen moeten waar zijn 
om de conditie waar te maken en er hoeft maar een conditie waar te zijn 
om een regel waar te maken. 

Dit artikel gaat over de verschillende eigenschappen van de referview conditie.

## Individuele eigenschappen

* **refer-view**: View waar de conditie naar verwijst.
* **check-type**: Boolean value om aan te geven of een profiel zichtbaar 
moet zijn in de andere view. Mogelijke waarden: "yes", "no".

## Meer informatie

* [Regel condities opvragen](rest-get-rule-conditions)
* [Regel condities aanpassen](rest-post-rule-conditions)
* [Conditie type miniview](rest-condition-type-miniview)
