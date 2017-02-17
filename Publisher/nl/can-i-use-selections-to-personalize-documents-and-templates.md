# Selecties gebruiken voor personalisatie

Het is mogelijk om selecties en/of miniselecties te gebruiken binnen
smarty personalisatie. Je gebruikt hiervoor de **in\_selection** en
**in\_miniselection** tags. Je kan met behulp van deze tags bijvoorbeeld
andere content tonen aan bestemmingen die in selectie X voorkomen dan
aan bestemmingen die niet in deze selectie voorkomen.

Voorbeeld 1 - Content alleen tonen aan bestemmingen uit selectie

> `{in_selection selection=20}     Deze tekst is alleen zichtbaar voor personen uit de selectie met ID 20     {/in_selection}`

Voorbeeld 2 - Content alleen tonen aan bestemmingen uit miniselectie

> `{in_miniselection miniselection=50}     Deze tekst is alleen zichtbaar voor personen uit de miniselectie met ID 50     {/in_miniselection}`

[Ga naar het volledige artikel over deze
functies](http://www.copernica.com/nl/ondersteuning/de-in-selection-en-in-miniselection-functie "Opmaak van smarty personalisatie (Smarty filters)")
