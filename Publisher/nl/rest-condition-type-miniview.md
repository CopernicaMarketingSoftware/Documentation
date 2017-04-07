# REST API: Conditie type miniview

Condities hebben onderling verschillende eigenschappen. Sommigen betreffen 
de periode waarin iets is gebeurd (datum eigenschappen), anderen informatie 
over een mailing (mailing eigenschappen) en weer anderen zijn specifiek voor 
het type condities (individuele eigenschappen). Alle eigenschappen moeten waar zijn 
om de conditie waar te maken en er hoeft maar een conditie waar te zijn 
om een regel waar te maken. 

Dit artikel gaat over de verschillende eigenschappen van de miniview conditie.

## Individuele eigenschappen

* **mini-view**: Miniview geassocieerd met de conditie.
* **min-subprofiles**: Minimum hoeveelheid subprofielen in de miniview
* **max-subprofiles**: Maximum hoevelheid subprofielen in de miniview

## Voorbeeld

We kunnen ervoor kiezen om meerdere kleinere miniviews te combineren als 
we er te veel hebben. Om te checken of een miniview klein genoeg is kunnen 
we **max-subprofiles** naar het maximum aantal subprofielen in de miniview zetten

## Meer informatie

* [Regel condities opvragen](rest-get-rule-conditions)
* [Regel condities aanpassen](rest-post-rule-conditions)
* [Conditie type referview](rest-condition-type-referview)
