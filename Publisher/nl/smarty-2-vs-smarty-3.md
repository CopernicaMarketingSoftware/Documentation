# Smarty 2 vs. Smarty 3

Copernica gebruikt de extern ontwikkelde Smarty template engine welke 
gebaseerd is op PHP. Smarty maakt dit echter gemakkelijker, zodat iedereen 
kan personalizeren. Smarty is niet ontwikkeld door Copernica, maar wel 
goed gedocumenteerd door vele enthousiastelingen. Zie hun eigen documentatie 
[hier](http://www.smarty.net/docs/en/) (geen Nederlands beschikbaar).

In 2011 heeft Copernica de overstap gemaakt van Smarty 2 naar Smarty 3. 
De syntax van de personalisatie code die gebruikt wordt in Smarty 3 verschilt 
enigzins.

Hierbij een aantal aandachtspunten:

- Personalisatie in bestaande templates gebaseerd op versie 2 zal valide 
blijven. Je hoeft deze templates dus niet aan te passen, deze werken nog 
gewoon.
- Als je een nieuwe template aanmaakt kun je er nog voor kiezen Smarty 2 
te gebruiken, maar dit wordt afgeraden. Later in dit artikel bespreken we 
de voordelen van Smarty 3.
- De syntax van Smarty 3 is iets anders. Het kan dus gebeuren dat je een 
aantal (vaak simpele) errors krijg als je een Smarty 2 template naar een 
Smarty 3 template kopieert.
- Personalisatie gebruikt in webformulieren en followups 
gebruiken nog de Smarty 2 engine, zelfs als deze gerelateerd zijn aan een 
Smarty 3 document of template.
- Je kunt de gebruikte versie van Smarty opvragen met {$smarty.version}.

## Advantages of smarty 3

### Automatische escaping van accolades {}

Smarty onderscheidingstekens zoals accolades worden genegeerd als er 
spaties om deze tekens heen staan. Zo wordt bijvoorbeeld { abc } genegeerd, 
zodat de accolades hier zich gedragen als normale accolades. Als je echter 
{abc} gebruikt wordt deze behandeld als een Smarty variabele. In templates 
die Smarty 3 gebruiken hoef je dus geen [delimiters](personalization-functions-delim) 
te gebruiken.

### Variabelen aanmaken is sneller en makkelijker

In Smarty 2 kun je met [capture](./personalization-functions-capture.md) 
variabelen aanmaken als volgt:

`{capture assign="namevar"}This is a var{/capture}`

In Smarty 3 bestaat hiervoor een kleine shortcut die simpeler is en 
hetzelfde bereikt:

`{$namevar="This is a var"}`

Beide variabelen geven dezelfde waarde weer als ze geprint worden: "This is a var".

### Functies

Functies zijn niet nieuw in Smarty 3, maar sinds de upgrade naar deze 
versie zijn functies wel beschikbaar gemaakt in de software. Dit is 
vooral handig wanneer code meerdere keren gebruikt wordt binnen dezelfde 
template. Door een functie te schrijven kun je deze simpelweg meerdere 
keren aanroepen in plaats van je code te moeten kopiëren. Zo hoef je 
de functie ook maar een keer aan te passen als je hem wil veranderen. 

Meer over functies kun je leren in de [Smarty documentatie](http://www.smarty.net/docs/en/) 
of in ons artikel over [personalisatie functies](./personalization-functions.md)

### Syntax

Als je meedere parameters meegeeft aan een Smarty 3 functie moet je hier 
quotes omheen zetten, in het bijzonder wanneer de parameter spaties of 
dubbele punten gebruikt. Voorbeeld:

`[text name="paragraph 1"]`

of

`{in_miniselection miniselection="database:myCollection:myMiniSelection"}`
