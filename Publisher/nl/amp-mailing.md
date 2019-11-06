# Voordat je begint
Voordat je begint met het versturen van een email met AMP content is het belangrijk om te kijken of je wel aan de voorwaarden voldoet om een AMP email te versturen.

* DKIM, SPF and DMARC moeten goed ingesteld staan. Wanneer je gebruik maakt van Copernica senderdomains en deze zijn goedgekeurd staat dit goed ingesteld.
* Gmail vereist een minimale verzending in de orde van gemiddeld 100 berichten naar Gmail adressen per dag van het email adres vanaf waar gestuurd gaat worden. Dit houdt in dat je over een maand tijd ongeveer 3000 Gmail adressen moet benaderen.
* Stel altijd een back-up HTML email in, AMP is slechts een toevoeging en niet altijd voor iedereen zichtbaar.

Als laatste is het belangrijk om je te realiseren dat het implementeren van goede AMP emails een tijdrovend traject is waar op sommige punten redelijk wat technische kennis nodig is. Overweeg voordat je hier mee begint goed of AMP de investering waard is.

# AMP mailings in Publisher
De Copernica Publisher biedt de functionaliteit om een AMP versie aan je mailing toe te voegen. Dit zorgt voor meer interactiviteit in je e-mail in vergelijking tot de HTML versie.
Voor alle mogelijkheden binnen AMP mailings kun je de [officiële documentatie](https://amp.dev/about/email/) raadplegen.

## Aan de slag
Om je templates uit te breiden met AMP-onderdelen, ga je naar je template onder het tabblad **Emailings**. Hier vind je een tabblad `AMP broncode` waar je de AMP code kunt invoegen. Een voorbeeldweergave van je AMP template is zichtbaar onder `AMP-versie`. In een AMP template kun je gebruik maken van tekst-, afbeelding- en loopblokken op de manier die je gewend bent bij het maken van [HTML templates](./templates-publisher#contentblokken). De Publisher ondersteunt gedeelde content in blokken tussen HTML en AMP templates. Meer informatie is te vinden [op deze pagina](./amp-mailing#Gedeelde-blok-structuur).

## Aanmaken van een document
Wanneer je een document aanmaakt gebaseerd op een template met een AMP versie, kun je de AMP blokken aanpassen door naar het tabblad `AMP-versie` te gaan en te kiezen voor `Bewerkmodus`. Een andere optie is door naar het submenu `Document [naam]` te gaan en te kiezen voor `AMP-blokken bewerken`. Het bewerken van blokken in een AMP document werkt hetzelfde als het bewerken van blokken in een HTML document.

## Gedeelde blok structuur
Zoals hierboven beschreven is het mogelijk om in de Publisher content te delen tussen de HTML en AMP versie van je documenten. Wanneer de blokstructuur gedeeltelijk wordt gedeeld tussen de HTML en AMP versie, wordt de inhoud van de blokken ook gedeeld. Neem de volgende versies als voorbeeld:

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

In het bovenstaande voorbeeld worden de blokken `loop` en `afbeelding` gedeeld en daardoor hebben ze hetzelfde aantal iteraties (voor het loopblok) en dezelfde afbeelding (voor het afbeeldingsblok). De tekstblokken zijn echter verschillend en zullen hierdoor verschillen van content. Door deze techniek te gebruiken kun je snel twee versie maken van een document met een gedeelde basis.

## Versturen van de AMP mailing
Zorg er bij het maken van een AMP mailing voor dat je altijd een volledig HTML document hebt om op terug te vallen. AMP clients kunnen de AMP versie na een bepaalde periode of bij het doorsturen van een mailing mogelijk niet meer weergeven. Daarnaast ondersteunen nog niet alle clients AMP.

Tot slot hebben AMP clients een geldige SPF, DKIM en DMARC configuratie nodig, dus zorg ervoor dat je je [sender domains](./quick-sender-domain-guide) goed hebt ingesteld.
