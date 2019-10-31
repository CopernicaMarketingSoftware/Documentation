# AMP mailings in Publisher
De Copernica Publisher biedt de functionaliteit aan om een AMP versie aan je mailing toe te voegen. Dit zorgt voor meer interactiviteit in uw e-mail in vergelijking met de HTML versie.
Voor alle mogelijkheden van AMP mailings kun je de [officiële documentatie](https://amp.dev/about/email/) raadplegen.

## Aan de slag
Om je templates uit te breiden met AMP-onderdelen ga je naar je template onder het tabblad **Emailings**. Hier vind je een tabblad `AMP broncode` waar je de AMP code kunt invoegen. Een voorbeeldweergave van je AMP versie is zichtbaar onder het `AMP-versie` tabblad. In je AMP template kun je gebruik maken van tekst-, afbeelding- en loopblokken op de manier waarop je gewend bent bij het maken van [HTML templates](./templates-publisher#contentblokken). De Publisher ondersteunt gedeelde content in blokken tussen HTML en AMP templates. Meer informatie hierover volgt [verder op deze pagina](./amp-mailing#Gedeelde-blok-structuur).

## Aanmaken van een document
Wanneer je een document aanmaakt gebaseerd op een template met een AMP versie kun je de AMP blokken aanpassen door naar het tabblad `AMP version` te gaan en te kiezen voor `Bewerkmodus`. Een andere optie is door naar het submenu `Document [naam]` te gaan en te kiezen voor `AMP-blokken bewerken`. Het bewerken van blokken van een AMP document werkt hetzelfde als het bewerken van blokken in een HTML document.

## Gedeelde blok structuur
Zoals hierboven beschreven is het mogelijk in Publisher om content te delen tussen de HTML en AMP versie van je documenten. Wanneer de blokstructuur gedeeltelijk wordt gedeeld tussen de HTML en AMP versie wordt de inhoud van de blokken ook gedeeld. Neem de volgende versies als voorbeeld:

**HTML**:
```
[loop name="loop"]
    [text name="html-tekst"]
    [image name="afbeelding"]
[/loop]
```

**AMP**:
```
[loop name="loop"]
    [text name="amp-tekst"]
    [image name="afbeelding"]
[/loop]
```

In deze template worden de blokken `loop` en `afbeelding` gedeeld en daardoor hebben ze hetzelfde aantal iteraties (voor het loopblok) en dezelfde afbeelding (voor het afbeeldingsblok). De tekstblokken zijn echter verschillend en zullen hierdoor verschillende content bevatten. Door deze techniek te gebruiken kun je snel twee versie maken van een document met een gedeelde basis.

## Versturen van de AMP mailing
Zorg er bij het maken van een AMP mailing voor dat je altijd een volledig HTML document hebt om op terug te vallen. AMP clients kunnen de AMP versie na een bepaalde periode of bij het doorsturen van een mailing mogelijk niet meer weergeven. Daarom is het een goede gewoonte om altijd een reserve HTML versie van het document te hebben.

Daarnaast hebben AMP clients ook een geldige SPF, DKIM en DMARC configuratie nodig, dus zorg ervoor dat je je [sender domains](./quick-sender-domain-guide) goed hebt ingesteld.
