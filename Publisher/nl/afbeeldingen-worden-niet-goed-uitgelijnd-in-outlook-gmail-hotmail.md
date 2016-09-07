E-mailprogramma's hanteren soms afwijkende regels voor het uitlezen van
HTML. Een regelmatig terugkerend probleem is dat afbeeldingen of andere
elementen niet goed gepositioneerd zijn. Dit artikel bespreekt twee
veelvoorkomende oorzaken.

#### Oorzaak 1. Er is gebruik gemaakt van CSS float property.

De uitlijnfunctionaliteit die wordt aangeboden in de uitgebreide
teksteditor maakt voor de uitlijning gebruik van de CSS float property.
Dit is in browserland een breed geaccepteerde standaard, helaas, door
e-mailprogramma's wordt het nauwelijks ondersteund.

`<p style="float:  right;">Deze paragraaf zou naar rechts uitgelijnd moeten worden</p>`

Om dit op te lossen, dien je de CSS float te vervangen door het HTML
align attribuut.

`<p align="right">This  paragraph is aligned right</p>`

Hetzelfde kan worden toegepast worden op andere HTML elementen, zoals
div, img, table et cetera.

#### Oorzaak 2. Een bovenliggend HTML element

Mogelijk heeft een bovenliggend HTML element een uitlijning, die niet is
afgesloten of anderszijds invloed heeft op de positionering van
afbeeldingen of tekst in het template/document.

`<td align="right">Alles in deze tabelcel wordt naar rechts uitgelijnd</td>`

Zoek op (Ctrl + F) op *align* om mogelijke boosdoeners te identificeren,
en vervolgens vakkundig te elimineren.

`<td>Zo, nu staat alles weer keurig links uitgelijnd</td>`
