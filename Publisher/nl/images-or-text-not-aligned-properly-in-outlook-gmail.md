# Verkeerd getoonde emails

Zien je emails er goed uit in Copernica, maar niet in je outlook of Gmail 
inbox? Dit artikel adresseert een aantal mogelijke oorzaken en hun oplossingen. 
Als je hier iets aan toe wilt voegen kun je altijd contact met ons opnemen.

## CSS style property float

De CSS stijl eigenschap **float** wordt door sommige clients niet ondersteund. 
Daarom kan het gebeuren dat wanneer je iets in de text editor toevoegt 
deze standaard naar links uitlijnt. Dit is hoe de HTML regel met 
[inline CSS](./inline-css.md) eruit komt te zien.

`<p style="float:  right;">Deze paragraaf zou rechts uitgelijnd moeten worden.</p>`

Als je inderdaad deze eigenschap tegenkomt kun je in de template source 
code aanpassingen maken om deze te laten werken. Door overal **float** te 
vervangen door de het oudere HTML attribuut **align** zou nu alles in je 
mail op de juiste plek horen te staan. Je code ziet er nu zo uit:

`<p align="right">Deze paragraaf is altijd rechts uitgelijnd.</p>`

Hetzelfde geldt voor elk ander HTML element.

## HTML alignment property

Het is mogelijk dat er een cel van een tabel, een span, div of ander 
element een **alignment** eigenschap heeft die invloed heeft op de 
*child* elementen.

`<td align="right">Alles in deze cel van de tabel staat rechts.</td>`

Dit kun je echter gemakkelijk oplossen door in de template source code 
de **align** attributen te verwijderen.

`<td>Everything within this table cell  is aligned left</td>`

## Meer informatie
* [Inline CSS](./inline-css)
