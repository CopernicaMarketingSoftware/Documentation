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

## Voorbeeld

Als we twee views willen hebben die geen enkele overlap hebben in profielen 
kunnen we deze conditie gebruiken om ze te vergelijken. Om selectie van profielen 
in de andere view te voorkomen kunnen we de volgende waarden gebruiken:

* **refer-view**: \<View waar we geen profielen uit willen>
* **check-type**: "no"

Het is ook mogelijk om een overkoepelende view te maken, die juist wel 
uit de andere view selecteert. Je kunt dit doen door **check-type** op 
"yes" in plaats van "no" te zetten.

## Meer informatie

* [Regel condities opvragen](rest-get-rule-conditions)
* [Regel condities aanpassen](rest-post-rule-conditions)
* [Conditie type miniview](rest-condition-type-miniview)
