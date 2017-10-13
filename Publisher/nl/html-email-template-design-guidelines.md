# HTML e-mail template design guidelines

Dit artikel gaat over de ondersteuning van HTML en CSS door diverse
e-mailprogramma's zoals Gmail en Outlook. De regels van
e-mailprogramma's wat betreft HTML en CSS gebruik verschillen onderling
behoorlijk en zijn daarnaast voortdurend aan verandering onderhevig. Wij
raden aan een e-mailtemplate/document -voordat je deze gaat versturen-
ook te testen in de LitmusApp e-mail preview. U ontvangt dan screenshots
van uw document zoals deze wordt weergegeven in alle mogelijke
e-mailprogramma's en internetbrowsers.

## Gebruik HTML tabellen voor de layout van de e-mailing

Tabellen worden het beste ondersteund door de meeste e-mail programma’s
dus is het aan te raden om de layout volledig uit tabellen te laten
bestaan in plaats van gepositioneerde ‘divs’.

**Tip:** Gebruik altijd een aparte tabel om de boel bij elkaar te houden.
Zo voorkom je dat er onwenselijke ruimte ontstaat tussen de overige
tabellen.

## Voeg CSS altijd direct toe aan het HTML element

Sommige e-mailprogramma's (Gmail is er een van) negeren alle informatie
die je in de HTML header meestuurt. Eventuele CSS code die je binnen de
\<head\>...\</head\> tags opneemt, wordt dus niet ingeladen. De juiste
manier om toch CSS te gebruiken in een HTML e-mailing is om deze inline
op te nemen.

De software van Copernica beschikt over een functie om alle CSS uit een header, of een
gekoppeld stylesheet, automatisch om te zetten naar inline CSS. Zo
behoud je het gemak van een extern stylesheet en wordt het document toch
correct weergegeven in de inbox.

## CSS styleregels die niet (goed) worden ondersteund

Onderstaand de meest belangrijke zaken wanneer je CSS gebruikt in je
HTML template en document

### Gebruik geen CSS margin en padding

Padding en margins worden helaas genegeerd door enkele e-mailprogramma’s
en/of e-maildiensten. Maak daarom gebruik van **CSS-borders**, die wel goed worden ondersteund.

### Vermijd het gebruik van achtergrondafbeeldingen

Vraag ons niet waarom, maar Microsoft Outlook is gestopt met het
ondersteunen van het gebruik van achtergrondafbeeldingen sinds Outlook
2007. De meeste HTML en CSS attributen werken helaas niet. Als je alsnog
achtergrondafbeeldingen wilt gebruiken (wat wij volledig kunnen
begrijpen), moet je niet vergeten ook een achtergrondkleur
(vergelijkbaar met de kleur van de gebruikte afbeelding) te definiëren.
Dus als er tekst geplaatst wordt over een afbeelding zal deze nog
leesbaar zijn ook voor de Outlook-gebruikers. De inhoud zal ook leesbaar
blijven als de ontvanger besluit geen afbeeldingen te downloaden (veel
ontvangers doen dit). Daarom is het definiëren van een achtergrondkleur
sowieso een goed idee.

### Maak geen gebruik van pseudo classes

Pseudo classes worden veel gebruikt om het uiterlijk van bijvoorbeeld
hyperlinks manipuleren. Met het gebruik van pseudo classes kun je 
bijvoorbeeld de onderstreping van een hyperlink verwijderen.

### Gebruik websafe lettertypen

Wij adviseren om alleen lettertypen te gebruiken die standaard zijn
opgenomen in alle besturingssystemen. Als je een ander lettertype wilt
gebruiken, wordt deze vervangen door een standaard systeem lettertype
(hoogstwaarschijnlijk Times of Arial). Als je de e-mail leesbaar wilt
houden, raden wij het gebruik van Arial, Verdana, Georgia of Trebuchet
MS aan. Gebruik alsjeblieft niet (of eigenlijk nooit) Comic Sans, tenzij
je natuurlijk limonade verkoopt.

## Bekende problemen en vraagstukken

### Geen afbeelding borders in Outlook

Afbeelding borders worden niet ondersteund door Outlook. Daar kunnen wij
helaas ook niks aan doen.

Dit is een bekend probleem. Het kan opgelost worden door de afbeelding
in een container te zetten, en dan deze container een border te geven.

### Witruimte onder elke afbeelding in Hotmail

Hotmail heeft de neiging om 1 pixel witruimte onder elke afbeelding toe
te voegen. Dit kan worden opgelost door het toevoegen van de volgende
styling aan de header van de e-mail (Hotmail verwijderd nooit de header
uit je HTML-template).

```html
<style type="text/css">
  table img {
    display: block;
  }
</style>
```

## Extra tips:

-   Handhaaf een maximale breedte van 600 pixels voor uw e-mail
    templates.
-   Gebruik geen float om div's en andere elementen te positioneren.
    Gebruik daarvoor het ouderwetse align="left" of "right".
-   Gebruik geen korte notatie voor inline stijlen, bijvoorbeeld:
    border: 1px solid red. Gebruik de volledige notatie: border 1px;
    border-color: red; border-style: solid.
-   Gebruik nooit Javascript, of embeded video's in je e-mailing. Dit
    zal ten eerste niet werken en zal ook nog eens je afzender reputatie
    verminderen. Houd het simpel. Een alternatief voor de embeded
    video's is het plaatsen van een screenshot van de video die als een
    hyperlink verwijst naar de webpagina van de desbetreffende video.
    Als je een link naar een Youtube-video plaatst, zal Gmail deze
    automatisch in je e-mail insluiten.
-   Voeg altijd alt attributen toe aan afbeeldingen en title attributen
    aan de hyperlinks.
-   Voeg altijd summary attributen toe aan tabellen (table
    summary=header). Dit maakt je e-mails minder aantrekkelijk voor
    spamfilters.
-   Test uitgebreid je template op alle gangbare e-mail clients en
    internet browsers (bijvoorbeeld via Litmus)!
