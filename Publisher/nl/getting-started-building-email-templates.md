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

[Volledige artikel over afbeeldingblokken en de extra opties](./the-image-function-for-adding-images-to-your-document.md)

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

## Personalizeren

Met behulp van Smarty code kun je gemakkelijk een webversie toevoegen, 
een uitschrijflink toevoegen, informatie uit profielen gebruiken en 
nog veel meer. Zie ook het [artikel over personalizatie](./personalization)

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
