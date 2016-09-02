Een HTML template vormt de blauwdruk voor de e-maildocumenten die je
gaat versturen. In de template bepaal je de structuur en de lay-out. Ook
geef je in de template met speciale tags aan waar in het document door
de eindgebruiker content (afbeeldingen en tekst) kan worden toegevoegd.

Een template dient te zijn voorzien van een uitschrijflink, en vaak
wordt aan de template ook een link naar de webversie toegevoegd. Dit
artikel gaat in op de basisbeginselen die komen kijken bij het
ontwikkelen van een HTML template.

Hoewel de applicatie voldoende mogelijkheden biedt om hierin een
template te ontwikkelen, kiezen de meeste gebruikers ervoor de HTML
template lokaal op de computer te fabrieken. Je kan hiervoor een WYSIWYG
editor gebruiken (zoals Dreamweaver) of de HTML zelf schrijven,
bijvoorbeeld met [Notepad ++](http://notepad-plus-plus.org/).

Vervolgens kan je met een aantal eenvoudige **tags** de template zeer
flexibel maken voor hergebruik.

Een template begint met een idee en een design. Bedenk van te voren goed
hoe je de template wilt maken, zodat deze keer op keer hergebruikt kan
worden. Bedenk hoeveel kolommen de template moet krijgen, en hoe
bijvoorbeeld verschillende artikelen geïtereerd moeten gaan worden in
het uiteindelijke document.

De meeste e-mailtemplates hebben een header, twee kolommen (een voor
inhoudsopgave en een voor de artikelen), en een footer (met hierin vaak
adresgegevens, en de uitschrijflink).

![](differentlayouts.png)

Waar moet je op letten
----------------------

Houd bij de ontwikkeling van je HTML template er rekening dat je
e-maildocumenten in de laatste plaats pas worden bekeken in een moderne
internet browser (middels de
[webversie](./linken-naar-de-webversie-van-een-e-mail.md)).
Het vaakst zullen ze worden bekeken met e-mailprogramma's zoals Outlook
Express, Gmail, Hotmail, maar ook steeds vaker op de smartphone.

-   Moderne internetstandaarden worden door deze programma's niet of
    nauwelijks ondersteund. Je kan bij het ontwikkelen van een template
    dus niet helemaal los gaan met CSS en JavaScript. Javascript kan
    zelfs helemaal niet worden gebruikt.
-   Gebruik voor de lay-out HTML tabellen, en geen CSS positionering.
-   Maak voor ieder onderdeel in je template een aparte tabel (geneste
    tabellen). Op deze wijze wordt je template gemakkelijker in
    onderhoud.
-   Gebruik geen margins en paddings, maar gebruik hiervoor een lege
    tabelcel waarin je met behulp van een transparante pixel de hoogte
    of breedte kunt vastleggen. Onder andere Gmail ondersteunt CSS
    margin en padding niet.
-   Maak je template niet breder dan 700 pixels.
-   Zorg dat de verhouding afbeeldingen / tekst niet hoger is dan 1:1,
    in het voordeel van de afbeeldingen.

We hebben een speciaal artikel voor de [HTML richtlijnen in
e-mailmarketing](./html-richtlijnen-voor-e-mail-template-design.md).

Toevoegen van inhoudsblokken
----------------------------

Als je je HTML-template hebt ontwikkeld, kan je in de HTML-broncode met
behulp van speciale tags aangeven waar in het document door de
eindgebruiker textuele inhoud en afbeeldingen kunnen worden toegevoegd.
Met loop tags kan je definiëren welke content later in het document
herhaald kunnen worden. Hieronder zijn de tags beknopt uitgelegd. Let
op: als je bijvoorbeeld meerdere tekstblokken opneemt in je template,
dan geef je deze verschillende namen.

### Tekst blok

Geef aan waar in het document door de eindgebruiker tekstuele content
kan worden toegevoegd met behulp van de uitgebreide editor of met de
beknopte HTML editor.

De tag: **[text name="artikel"]**

[Volledige artikel over tekstblokken en de extra
opties](./template-blokken-het-tekstblok.md)

### Afbeeldingblok

Geef in de template aan waar in het document een afbeelding mag worden
toegevoegd. De eindgebruiker kan vervolgens op documentniveau op deze
plek een afbeelding uploaden, en deze bijvoorbeeld aanklikbaar maken.

de tag: **[image name="foto"]**

[Volledige artikel over afbeeldingblokken en de extra
opties](./template-blokken-de-afbeelding-tag.md)

### Loop blok

Geef in de template aan welke content later in het document herhaald
moet worden. Een loopblok kan een stuk HTML broncode bevatten en er
kunnen natuurlijk ook tekst- en afbeeldingenblokken in worden opgenomen.
Het is zelfs mogelijk binnen een loop een tweede loop te te nemen
(geneste loopblokken).

De tag: **[loop name="artikels"]** *Hierin kan je HTML, en andere
contentblokken plaatsen. Dit kan door de eindgebruiker een X-aantal keer
herhaald worden* **[/loop]**

[Volledige artikel over loopblokken en de extra
opties](./template-blokken-de-loop-tag.md)

Extra eigenschappen en beperkingen voor template blokken definiëren
-------------------------------------------------------------------

Alle drie de bloktypen kunnen worden voorzien van extra eigenschappen.
Je kan bijvoorbeeld aangeven dat een loop maximaal 5 keer mag worden
herhaald, en dat een afbeelding niet groter mag zijn dan 200 x 200
pixels. Ook is het mogelijk HTML code toe te voegen aan het begin en
einde van een content blok. Deze HTML wordt dan alleen ingeladen als het
blok daadwerkelijk wordt gebruikt in het document. Dit is handig als je
een afbeelding altijd in een tabel wilt inladen, maar wilt voorkomen dat
deze tabel ook in het document wordt geladen als de eindgebruiker een
afbeelding weglaat in het document.

De extra instellingen voor de content blokken kan je in de HTML broncode
specificeren met speciale parameters. Deze vind je in de help-artikelen
over de individuele content blokken.

Wanneer je de template hebt geüpload naar de software, dan kan je de
eigenschappen van de content blokken ook aanpassen onder *Template menu
\>* **Blokstructuur aanpassen...**

Automatisch datum en tijd opnemen in template
---------------------------------------------

Met behulp van smarty code kan je automatisch de datum en tijd weergeven
in je document.

Gebruik daarvoor de smarty code {\$smarty.now}. Met de modifier
|date\_format kan je aangeven hoe de datum moet worden weergegeven.

Voorbeeld: {\$smarty.now|date\_format:"%A"} geeft alleen de huidige dag
weer.

Webversie toevoegen
-------------------

Met behulp van de [webversie
tag](https://www.copernica.com/nl/ondersteuning/linken-naar-de-webversie-van-een-e-mail)
stuur je snel en gemakkelijk een webversie mee van de nieuwsbrief. De
webversie biedt uitkomst voor ontvanger die de HTML nieuwsbrief niet
goed kan lezen in zijn of haar e-mailprogramma.

De webversie voeg je toe met behulp van de volgende tag

`{webversion}`

Let op, de tag zelf genereert alleen een (voor iedere ontvanger unieke)
URL. Om hier een aanklikbare link van de maken is nog wat HTML nodig.

`<a href="{webversion}">Bekijk de webversie van deze mail</a>`

Uitschrijflink toevoegen
------------------------

Een commerciële e-mail is wettelijk verplicht uitgerust met
**werkende**,**goed zichtbare uitschrijflink**. De uitschrijflink voeg
je snel en eenvoudig toe met de speciale tag {unsubscribe}. Met de
uitschrijfopties die je instelt op de database waaraan je de mailing
gaat richten, zorg je ervoor dat het uitschrijfverzoek correct wordt
verwerkt in de database.

`<a href="{unsubscribe}">Klik hier om je uit te schrijven voor deze nieuwsbrief</a>`

**Let op:** De uitschrijflink moet nog wel geactiveerd worden. Ga naar
*Databasemanagement \> Uitschrijfgedrag instellen* ... om in te stellen
hoe een uitschrijfverzoek in de database moet worden verwerkt
(bijvoorbeeld de waarde in het veld *Nieuwsbrief* veranderen naar
'Nee'.)

Personalisatie toevoegen
------------------------

Templates en documenten kunnen worden gepersonaliseerd met gegevens van
de ontvanger. Dit maakt het bijvoorbeeld mogelijk een e-mail te beginnen
met een persoonlijke aanhef.

Veronderstel dat je de voornaam van de ontvanger wilt tonen in de
e-mail. Als de voornaam is opgeslagen in het databaseveld 'Voornaam',
dan kan je de waarde hieruit in het template of document weergeven met
de personalisatiecode {\$Voornaam}.

Let op, personalisatiecode (smarty) is hoofdlettergevoelig. Dus
{\$Voornaam} is iets anders dan {\$voornaam}.

Het gebruik van smarty code in de HTML broncode is toegestaan. Dit maakt
het mogelijk om op basis van gegevens over de ontvanger een
verschillende opmaak te tonen.

`{if $Geslacht == "man"}Iets van HTML code{else}Andere HTML code{/if}`

-   [Meer over
    personalisatie](https://www.copernica.com/nl/ondersteuning/de-basisbeginselen-van-smarty-personalisatie)
-   [Slimme persoonlijke aanhef met
    smarty](https://www.copernica.com/nl/ondersteuning/persoonlijke-aanhef-maken)

Template importeren
-------------------

Wanneer je tevreden bent over je template, dan kan je deze importeren in
de marketing software.

Als je in je template gebruik maakt van afbeeldingen, maak dan een ZIP
bestand waarin je zowel de afbeeldingen en het HTML-bestand opneemt. Ga
vervolgens in de marketing software naar E-mailings, en kieze **Nieuwe
template** uit het template menu. Kies voor een lege template en kies de
smarty versie. Klik vervolgens op **opslaan**. Een leeg template wordt
nu aangemaakt.

Kies in het **Template menu**vervolgens voor **Template importeren**.
Localiseer het ZIP bestand op je computer en importeer de template.

Maak je eerste document op basis van dit template door in het **Document
menu**voor **Nieuw document**te kiezen.

Document bewerken
-----------------

Om het document te vullen met content, klik je onderaan het geopende
document op **bewerkmodus**. De contentblokken die je in de template
broncode hebt gedefinieerd, worden nu aanklikbaar. Klik op een blok om
de inhoud hiervan te bewerken. Om het document te bekijken zoals het
verstuurd zou worden, klik je onderaan op het document op
**Voorbeeldweergave**.

Bovenaan het document kan je de afzendergegevens en het onderwerp van
het document instellen.

Andere zaken van bijzonder groot nut
------------------------------------

Toon bepaalde content alleen in de email of in de webversie met de
[{mailonly} en
{webonly}](./de-webonly-en-mailonly-functies.md)tags.
