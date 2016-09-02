Personalisatie die je toevoegt aan publicaties moet toegespitst zijn op
de bestemming van jouw publicatie. Oftewel, je kan alleen variabelen
gebruiken uit de database en/of collectie waaraan je de uiting richt.
Wanneer je wel wilt personaliseren met gegevens uit een andere database
en/of collectie, kan je gebruik maken van [loadprofile en/of
loadsubprofile](http://www.copernica.com/nl/ondersteuning/de-loadprofile-en-loadsubprofile-functies "De {loadprofile} en {loadsubprofile} functies").

Vanuit het profiel personaliseren met profielgegevens
-----------------------------------------------------

Je kan in een publicatie direct gegevens uit het profiel ophalen met de
Smarty code te verwijzen naar het corresponderende veld.

Hallo {\$voornaam},

Vanuit het subprofiel personaliseren met subprofielgegevens
-----------------------------------------------------------

Net als met profielen kan je in een publicatie direct gegevens uit het
subprofiel ophalen met de Smarty code te verwijzen naar het
corresponderende veld.

Hallo {\$voornaam},

Let op: Wanneer je vanuit een collectie personaliseert, dient
de standaardbestemming ook in een collectie te staan om de
personalisatie binnen de applicatie te testen.

Vanuit subprofiel personaliseren met profielgegevens
----------------------------------------------------

Het is mogelijk om in een mailing aan subprofielen, velden uit
het profiel op te nemen. Bijvoorbeeld als je mailt aan de
contactpersonen (collectie) van een bedrijf (subprofielen), kan je wel
de naam van het bedrijf (profiel) opnemen.

Wanneer je gegevens wilt ophalen uit zowel het profiel als uit het
subprofiel, dan dien je de bestemming in de personalitie te
specificeren.

**Gegevens uit het subprofiel:**{\$subprofile.veldnaam}

**Gegevens uit het profiel:**{\$profile.veldnaam}

Het document wordt zowel verstuurd naar profielen als naar subprofielen
-----------------------------------------------------------------------

Als de bestemming van het document varieert en je wilt de applicatie
laten bepalen waar de gegevens vandaan moeten worden gehaald, gebruik je
een ander voorvoegsel:

Laad gegevens uit het profiel of uit het subprofiel:
**{\$destination.veldnaam}**

Wanneer de mail wordt verzonden aan profielen, zal het eerst in het
profiel kijken. Wordt de mail verstuurd aan subprofielen, dan kijkt het
systeem allereerst in het subprofiel.

De subprofielen uit een collectie doorlopen
-------------------------------------------

Als de bestemming van het document een profiel is, en je wilt gegevens
ophalen uit de subprofielen behorend tot dat profiel (bijvoorbeeld de
aangekochte producten van een klant), dan kan je de smarty foreach
gebruiken, eventueel in samenwerking met de loadsubprofile functie. Je
gebruikt smarty foreach om door de subprofielen heen te loopen.

`{foreach  $Contacts as $Contact}        {$Contact.id}, </br>   {/foreach}`

Met de bovenstaande code loop je door de collectie *Contacts* en dit
wijs je toe aan de variabel *Contact*.

De code {\$Contact.id} zal in het document alle ID's van de subprofielen
weergeven.

Let op, het bovenstaande *foreach* voorbeeld kan alleen worden gebruikt
in een smarty 3 template. Oudere smarty versies hebben een iets andere
syntax.

Let nogmaals op, als je hyperlinks uit de geladen (sub)profielen wilt
printen in de foreach-loop, gebruik dan \<code\>-tags. Voorbeeld:
\<code\>{\$Contact.hyperlink}\</code\>

Meer informatie over foreach op de website van
[Smarty](http://www.smarty.net/)

Personaliseren vanuit een andere database
-----------------------------------------

Als de bestemming van je publicatie Database A is, kan je ook gegevens
ophalen uit Database B. Hiervoor is de functie loadprofile beschikbaar.

[Meer informatie over de loadprofile
functie](http://www.copernica.com/nl/ondersteuning/de-loadprofile-en-loadsubprofile-functies "De {loadprofile} en {loadsubprofile} functies")

Personaliseren vanuit een collectie in een ander database
---------------------------------------------------------

Als de bestemming van je publicatie Database A is, dan is het mogelijk
om gegevens op te halen uit een collectie in Database B. Hiervoor hebben
we de functie loadsubprofile in het leven geroepen.

[Meer informatie over de loadsubprofile
functie](http://www.copernica.com/nl/ondersteuning/de-loadprofile-en-loadsubprofile-functies "De {loadprofile} en {loadsubprofile} functies")
