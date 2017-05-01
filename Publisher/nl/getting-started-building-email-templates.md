# Documenten maken in de Publisher

## Toevoegen van inhoudsblokken

Als je je HTML-template hebt ontwikkeld, kan je in de HTML-broncode met
behulp van speciale tags aangeven waar in het document door de
eindgebruiker textuele inhoud en afbeeldingen kunnen worden toegevoegd.
Met loop tags kan je definiëren welke content later in het document
herhaald kunnen worden. Hieronder zijn de tags beknopt uitgelegd. Let
op: als je bijvoorbeeld meerdere tekstblokken opneemt in je template,
dan geef je deze verschillende namen.


## Tekst blok

Geef aan waar in het document door de eindgebruiker tekstuele content
kan worden toegevoegd met behulp van de uitgebreide editor of met de
beknopte HTML editor.

De tag: **[text name="artikel"]**

[Volledige artikel over tekstblokken en de extra
opties](./the-text-function-for-adding-textual-content-to-your-document.md)


## Afbeeldingblok

Geef in de template aan waar in het document een afbeelding mag worden
toegevoegd. De eindgebruiker kan vervolgens op documentniveau op deze
plek een afbeelding uploaden, en deze bijvoorbeeld aanklikbaar maken.

De tag: **[image name="foto"]**

[Volledige artikel over afbeeldingblokken en de extra
opties](./the-image-function-for-adding-images-to-your-document.md)


## Loop blok

Geef in de template aan welke content later in het document herhaald
moet worden. Een loopblok kan een stuk HTML broncode bevatten en er
kunnen natuurlijk ook tekst- en afbeeldingenblokken in worden opgenomen.
Het is zelfs mogelijk binnen een loop een tweede loop te te nemen
(geneste loopblokken).

De tag: **[loop name="artikels"]** *Hierin kan je HTML, en andere
contentblokken plaatsen. Dit kan door de eindgebruiker een X-aantal keer
herhaald worden* **[/loop]**

[Volledige artikel over loopblokken en de extra
opties](http://www.copernica.com/nl/ondersteuning/template-blokken-de-loop-tag)


## Extra eigenschappen en beperkingen voor template blokken definiëren

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
eigenschappen van de content blokken ook aanpassen onder *Template menu*,  
*Blokstructuur aanpassen*..


## Automatisch datum en tijd opnemen in template

Met behulp van smarty code kan je automatisch de datum en tijd weergeven
in je document.

Gebruik daarvoor de smarty code `{\$smarty.now}`. Met de modifier
`|date\_format` kun je aangeven hoe de datum moet worden weergegeven.

Voorbeeld: `{\$smarty.now|date\_format:"%A"}` geeft alleen de huidige dag
weer.


## Webversie toevoegen

Met behulp van de [webversietag](./web-version.md)
stuur je snel en gemakkelijk een webversie mee met de nieuwsbrief. De
webversie biedt uitkomst voor ontvangers die de HTML nieuwsbrief niet
goed kan lezen in zijn of haar e-mailprogramma.

De webversie voeg je toe met behulp van de volgende tag

`{webversion}`

Let op, de tag zelf genereert alleen een (voor iedere ontvanger unieke)
URL. Om hier een aanklikbare link van de maken is nog wat HTML nodig.

```html
<a href="{webversion}">Bekijk de webversie van deze mail</a>
```


## Uitschrijflink toevoegen

Een commerciële e-mail is wettelijk verplicht uitgerust met
**werkende**,**goed zichtbare uitschrijflink**. De uitschrijflink voeg
je snel en eenvoudig toe met de speciale tag {unsubscribe}. Met de
uitschrijfopties die je instelt op de database waaraan je de mailing
gaat richten, zorg je ervoor dat het uitschrijfverzoek correct wordt
verwerkt in de database.

```html
<a href="{unsubscribe}">Klik hier om je uit te schrijven voor deze nieuwsbrief</a>
```

Let op: de uitschrijflink moet nog wel geactiveerd worden. Ga naar
*Databasemanagement* - *Uitschrijfgedrag instellen*.. om in te stellen
hoe een uitschrijfverzoek in de database moet worden verwerkt
(bijvoorbeeld de waarde in het veld *Nieuwsbrief* veranderen naar
'Nee').


## Personalisatie toevoegen

Templates en documenten kunnen worden gepersonaliseerd met gegevens van
de ontvanger. Dit maakt het bijvoorbeeld mogelijk een e-mail te beginnen
met een persoonlijke aanhef.

Veronderstel dat je de voornaam van de ontvanger wilt tonen in de
e-mail. Als de voornaam is opgeslagen in het databaseveld 'Voornaam',
dan kan je de waarde hieruit in het template of document weergeven met
de personalisatiecode `{\$Voornaam}`.

Let op, personalisatiecode (smarty) is hoofdlettergevoelig. Dus
`{\$Voornaam}` is iets anders dan `{\$voornaam}`.

Het gebruik van smarty code in de HTML broncode is toegestaan. Dit maakt
het mogelijk om op basis van gegevens over de ontvanger een
verschillende opmaak te tonen.

`{if $Geslacht == "man"}Iets van HTML code{else}Andere HTML code{/if}`

* [Meer over personalisatie](./what-is-personalization.md)
* [Slimme persoonlijke aanhef met smarty](./personalized-salutation-in-email-using-smarty-code.md)


## Template importeren

Wanneer je tevreden bent over je template, kun je deze importeren in
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


## Document bewerken

Om het document te vullen met content, klik je onderaan het geopende
document op **bewerkmodus**. De contentblokken die je in de template
broncode hebt gedefinieerd, worden nu aanklikbaar. Klik op een blok om
de inhoud hiervan te bewerken. Om het document te bekijken zoals het
verstuurd zou worden, klik je onderaan op het document op
**Voorbeeldweergave**.

Bovenaan het document kan je de afzendergegevens en het onderwerp van
het document instellen.


## Andere zaken van bijzonder groot nut

Toon bepaalde content alleen in de e-mail of in de webversie met de
`{mailonly}` en `{webonly}` tags.