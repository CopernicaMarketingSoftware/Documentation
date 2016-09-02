Dit artikel laat zien hoe je een gemakkelijk onderhoudbare inhoudsopgave
kan maken in een e-maildocument waarin verschillende artikelen worden
herhaald middels een loopblok.

[Dit is een voorbeeldanker, klik op mij om naar een artikel te
gaan ](#art1)

### Het gebruik van HTML ankers

HTML ankers worden veelal gebruikt voor het maken van een inhoudsopgave.
De hoofdstukken uit de inhoudsopgave zijn aanklikbaar en verwijzen naar
het lager gelegen hoofdstuk.

Onderstaand een voorbeeld van een ankerverwijzing in een HTML document.
Wanneer de bezoeker klikt op de hyperlink, springt de pagina naar het
eerste artikel binnen hetzelfde document.

`<a href="#article1">Ga naar artikel 1</a>`

### De iteratie van de loop gebruiken voor de inhoudsopgave

Artikels in je document worden herhaald met een loop blok. Zo'n
herhaling noemen we ook wel een iteratie. Artikel 1 zit in iteratie 0,
artikel 2 in iteratie 1, enzovoorts. De huidige iteratie van een loop
blok kan je opvangen met smarty variabel. De waarde van deze variabel
kan vervolgens gebruikt worden voor de ankerverwijzing in de
inhoudsopgave.

In het onderstaande codevoorbeeld worden zowel het woord *artikel*en de
huidige loop iteratie opgevangen in de variabel *toc*.

De eerste loopiteratie heeft de waarde 0 (nul) waar voor elke opvolgende
loopiteratie telkens een 1 wordt opgeteld. De output van {\$toc} zal in
de eerste loopiteratie article0 zijn, in de tweede loopiteratie
article1, enzovoorts.

Gebruik de variabel toc vervolgens in de HTML bookmark binnen iedere
loopiteratie. Bovenaan je document gebruik je ankerverwijzingen om naar
de individuele artikelen te verwijzen.

`<a href="#article0">Ga naar eerste artikel</a> <br/> <a href="#article1">Ga naar tweede artikel</a>`

![](loopblock.png)

 

 

 

 

 

 

 

 

 

 

 

 Hallo!
