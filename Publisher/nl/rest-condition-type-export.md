# REST API: Conditie type export (exporteren)

Condities hebben onderling verschillende eigenschappen. Sommigen betreffen 
de periode waarin iets is gebeurd (datum eigenschappen), anderen informatie 
over een mailing (mailing eigenschappen) en weer anderen zijn specifiek voor 
het type condities (individuele eigenschappen). Alle eigenschappen moeten waar zijn 
om de conditie waar te maken en er hoeft maar een conditie waar te zijn 
om een regel waar te maken. 

Dit artikel gaat over de verschillende eigenschappen van de export conditie.

## Datum eigenschappen

De datum eigenschappen kunnen gebruikt worden om de selectie te limiteren 
binnen een gegeven tijdperiode. Alle variabelen hieronder moeten ingesteld 
worden in YYYY-MM-DD HH:MM:SS formaat.

* **before-time**: Matcht alleen profielen die het document ontvingen voor deze tijd.
* **after-time**: Matcht alleen profielen die het document ontvingen na deze tijd.
* **before-mutation**: De beforemutation (tijdverschil) voor de change conditie.
* **after-mutation**: De aftermutation (tijdverschil) voor de change conditie.

## Individuele eigenschappen

* **include-never-exported-profiles**: Boolean value om aan te geven of 
profielen die niet eerder geëxporteerd zijn meengenomen moeten worden.

## Voorbeeld

Als je alleen profielen zou willen selecteren die je eerder hebt geëxporteerd 
voor een bepaalde dag, dan kun je deze selectie maken met de export conditie. 
Je kunt dan de volgende waarden gebruiken:

* **after-time**: /<Tijdstip in YYYY-MM-DD HH:MM:SS formaat>
* **include-never-exported-profiles**: false

## Meer informatie

* [Regel condities opvragen](rest-get-rule-conditions)
* [Regel condities aanpassen](rest-post-rule-conditions)
