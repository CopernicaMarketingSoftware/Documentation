# Hoe maak je een e-maildocument

Een e-maildocument is altijd gebaseerd op een HTML template. In de
template bepaal je de lay-out en de structuur van de e-mail. De
daadwerkelijk inhoud voeg je pas later toe in het document. Met speciale
tags kan je in de template broncode definiëren waar in het document de
content moet worden toegevoegd. \

Templates kan je op deze wijze keer op keer hergebruiken

### Structuur van het document bepalen met speciale content tags

**Tekstblok**: hiermee geef je aan waar tekstuele of HTML content kan
worden toegevoegd op documentniveau.

`[text name=artikel_inhoud]`

**Afbeeldingblok**: hiermee definieer je waar op documentniveau een
afbeelding kan worden toegevoegd.

`[image name=artikel_afbeelding]`

**Loopblok**: De verschillende plekken in een HTML document waar je
tekstblokken en afbeeldingblokken kunt herhalen, worden loopblokken
genoemd.

`[loop name=artikel] Alle HTML, tekst en afbeeldingblokken binnen deze loop kan in het document worden geïtereerd. [/loop]`

In het document kan je vervolgens aangeven hoe vaak een loopblock moet
worden herhaald. Elke iteratie kan van unieke content worden voorzien.

Een document maken met de Copernica voorbeeldtemplate
-----------------------------------------------------

In Copernica is een voorbeeldtemplate beschikbaar. Deze is vrij simpel
(aan een hele serie nieuwe voorbeeldtemplates wordt hard gewerkt door
ons en door onze partners), maar de template laat de werking van
templates en documenten nu even goed zien.

Voorbeeldtemplate en -document inladen
--------------------------------------

Om het document in te laden ga je naar het onderdeel E-mailings. Als er
nog geen voorbeeldtemplate aanwezig is, kies in het Templatemenu voor
‘Nieuwe template’.

Kies een naam voor de template, en kies bij opties voor ‘Template
voorzien van voorbeeldcode’. Klik op opslaan.

De nieuw-aangemaakte template wordt direct getoond. Klik in het linker
overzicht op het plusje en vervolgens op het document (Voorbeeld).

Voila. Dit is je eerste template en document!

Inhoud document bewerken
------------------------

Je kan een document tonen in Voorbeeldweergave en in Bewerkmodus. Om de
inhoud van het document te bewerken klik je (onderaan het document) op
**Bewerkmodus**. De bewerkbare onderdelen in het document worden nu
gearceerd en aanklikbaar. Klik op een blok om de inhoud hiervan te
bewerken.

Zoals je ziet zijn in het voorbeelddocument **tekstblokken**,
**afbeeldingblokken** gebruikt, en zijn **loopblokken** gebruikt om de
artikelstructuur te herhalen.

Maak gerust een tweede document aan op basis van dit template. Kies voor
Nieuw document in het Document menu. Er wordt dan op basis van hetzelfde
template een nieuw document aangemaakt. Er is geen limiet gesteld aan
het aantal documenten en templates dat je kan beheren binnen de
software. Ook zijn hieraan geen kosten aan verbonden.

Document afzendergegevens en onderwerp wijzigen
-----------------------------------------------

Elk document dat je met de software gaat versturen, heeft een
**afzender** en een **onderwerp**. Deze stel je in **direct boven het
geopende document**. Zweef met je muis over het grijs om het
**afzenderadres**, de afzendernaam en -onderwerp direct te bewerken. Als
je dit hebt gedaan, en je hebt al een database met hierin een
standaardbestemming, dan kan je je eerste testmail gaan versturen!

Testmail versturen naar een enkel adres
---------------------------------------

Voor het versturen van een testmail heb je een database nodig met hierin
een profiel die je als standaardbestemming hebt aangewezen. De
(informatie uit de) standaardbestemming wordt gebruikt om personalisatie
mee te testen en om test mails naartoe te sturen. Maak daarom een
profiel met hierin je eigen gegevens en gebruik deze als
standaardbestemming.

*Om de standaardbestemming in te stellen, ga je naar het desbetreffende
profiel, en klik je op Standaardbestemming (links onder in de
menubalk).*

Open het document dat je wilt gaan versturen. Kies vervolgens voor
*Testmail versturen…* in het Mailings menu. In het dialoogvenster word
je overvallen een hoop opties die je verder kan negeren. Controleer
alleen of het e-mailadres de jouwe is, en geef een stoot op de
verzendknop om de testmail te versturen.

Testmail versturen naar meerdere ontvangers
-------------------------------------------

Om een testmail te sturen naar meerdere ontvangers tegelijk maak je in
de database een selectie aan, waarin alle testadressen zijn opgenomen.
Maak bijvoorbeeld eerst een extra databaseveld aan (noem deze
***testadres*** o.i.d.). Vul deze bij ieder testprofiel met de waarde
***ja***, en maak vervolgens een selectie (de waarde in het veld
*testadres* moet gelijk zijn aan **ja**). Stuur vervolgens een
bulkmailing naar deze selectie.
