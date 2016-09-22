In de drag-and-drop editor van de [Copernica Marketing
Suite](https://ms.copernica.com "ga naar de Marketing Suite") stel je
gemakkelijk nieuwsbrieven samen. Deze nieuwsbrieven zijn net als de oude
HTML-editor te personaliseren door het gebruik van Smarty-code. Het
personaliseren in de drag-and-drop editor werkt echter iets anders dan
in de HTML-editor van Copernica.

De Copernica Marketing Suite is de nieuwe interface van Copernica. De
[eerste versie van deze interface staat sinds kort
online](https://www.copernica.com/nl/blog/introductie-van-de-copernica-marketing-suite-beta "Introductie Copernica Marketing Suite").
Hoewel het om de eerste versie van de interface gaat, is de
drag-and-drop editor al functioneel en kunnen er nieuwsbrieven mee
verstuurd worden. De nieuwsbrieven verzonden vanuit deze editor zijn
automatisch responsive en zijn gemakkelijk in elkaar te slepen.

Personaliseren in e-mailberichten kan op verschillende manieren: een
persoonlijke aanhef met de voor-en achternaam van de relatie, bepaalde
content tonen op basis van een interesse, bepaalde producten niet tonen
in een aanbieding als deze recent zijn aangeschaft, enzovoorts. In de
software van Copernica kan je personaliseren met behulp van
[Smarty-code](https://www.copernica.com/nl/blog/de-basisbeginselen-van-smarty-personalisatie "bekijk de Smarty-documentatie").
Je kan met deze Smarty-code de gegevens van elk database- of
collectieveld opnemen in een e-mailbericht. Deze code wordt in het
verstuurde bericht vervangen door de veldwaarde in het profiel van de
ontvanger.

Smarty-code wordt gekenmerkt door het gebruik van accolades, { en }, en
het dollarteken, \$.

Wat is er veranderd in de personalisatie
----------------------------------------

Personaliseren met Smarty-code was al mogelijk in de HTML-editor van
Copernica. Dit kon bijvoorbeeld door de voornaam van een persoon,
opgeslagen in het profielveld Voornaam, ophalen door in het
e-mailbericht *{\$Voornaam}* te noteren:

    Beste {$Voornaam}

Op deze manier vervangt de data onder het veld 'Voornaam' bij de
ontvanger de {\$Voornaam} Smarty-code. De ontvanger krijgt dan de
voornaam die hij of zij heeft doorgegeven te zien in het e-mailbericht.

In de drag-and-drop editor werkt dit iets anders: er moet namelijk
altijd gespecificeerd worden of een veld uit het profiel of het
subprofiel aangeroepen wordt. Door in plaats van {\$Voornaam},
{\$profile.Voornaam} of {\$subprofile.veldnaam} te gebruiken is het
mogelijk om vanuit de gegevens van zowel het profiel als het subprofiel
van de klant te personaliseren. Dit was al mogelijk in de HTML-editor,
maar het was niet nodig om dit te specificeren als er alleen gegevens
uit een profiel gehaald werden. Om een voornaam weer te geven in de
drag-and-drop editor moet er dus in plaats van {\$Voornaam} de volgende
code geschreven worden:

    Beste {$profile.Voornaam}

Het is dus maar een klein verschil met de personalisatie in de
HTML-editor. Het is echter belangrijk dat hier rekening mee wordt
gehouden. Wanneer er niet gespecificeerd wordt of een veldwaarde uit een
profiel of subprofiel komt, wordt de personalisatie in de drag-and-drop
editor namelijk niet toegepast.

Andere personalisatiemogelijkheden
----------------------------------

Uiteraard is het ook mogelijk andere soorten personalisatie en meer
geavanceerde Smarty-codes toe te passen. Alle Smarty-code die in de
HTML-editor toegepast kon worden, kan ook in de drag-and-drop editor
toegepast worden. Je kan bijvoorbeeld bepaalde content laten zien op
basis van een score of een product dat aangeschaft is. *Denk er wel aan
dat ook hier altijd gespecificeerd moet worden of een veld uit een
profiel of uit een subprofiel wordt aangeroepen*

Bij een e-mail met een aanbieding voor een smartphone, is het
bijvoorbeeld mogelijk om de aanbieding weglaten voor personen die de
smartphone al hebben aangeschaft. Aan de ontvangers die de smartphone al
hebben gekocht kan een alternatieve aanbieding getoond worden:

Waar kan ik personaliseren in de drag-and-drop editor
-----------------------------------------------------

In de drag-and-drop editor in de Copernica Marketing Suite kan je naast
in de tekstvelden ook op vele andere plaatsen personalisatie toepassen.
Deze velden zijn te herkennen aan het Dollar (\$) teken in het
input-veld. Zo kan je bijvoorbeeld de 'from name', het onderwerp, maar
ook het 'from adres' aanpassen door in deze velden Smarty-code toe te
passen.

Verdere ontwikkelingen
----------------------

Op dit moment is het nog niet mogelijk om in de drag-and-drop editor
volledige contentblokken (zoals tekstblokken of afbeeldingsblokken) weg
te laten of aan te passen op basis van veldgegevens. Dit wordt
binnenkort echter wel mogelijk en kan dan gedaan worden in een drop-down
menu, waar geen Smarty-code voor nodig is.

[Ga naar de Marketing Suite](https://ms.copernica.com)
