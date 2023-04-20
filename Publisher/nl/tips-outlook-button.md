# Tips om buttons in Outlook goed weer te geven

Outlook is vergeleken met andere e-mailclients een zeer specifieke service:
- Het ondersteunt geen mediaquery's;
- het heeft problemen met het weergeven van achtergrondafbeeldingen, bepaalde fonts en knoppen;
- veel stijlen worden niet door Outlook ondersteund.

Het bovenstaande maakt het zeer lastig om op de gebruikelijke stylingswijze een mooie button in je mail te krijgen.

Om ervoor te zorgen dat je mails ook in Outlook de juiste styling weergeven, hebben we een aantal stylingtips voor je op een rij gezet.

## Outlook-versie

De configuratie van je Outlook-versie kan ervoor zorgen dat de styling niet correct wordt weergegeven. De versie van je Outlook, en of dit een desktop versie is, speelt dus ook een grote rol.

Mocht je tegen een error aanlopen, of mocht de styling in je ontvangen mail afwijken, bekijk dan of de styling door de Outlook-versie die je gebruikt, wordt ondersteund.

## Tip 1: Altijd de button, 'Ondersteuning voor Outlook' in de editor, aan

De knop zorgt voor de meest nauwkeurige weergave van je knoppen in Outlook-e-mailclients, en wordt by default ingeschakeld. Wanneer de optie is geactiveerd in de 'Uiterlijk' van de editor, voegt de editor de bepaalde stijl aan de CSS code toe.
Dit zorgt ervoor de '''.msohide { mso-hide: all;} ''' in het CSS-bestand.
De MSO-opmerkingen zorgen ervoor dat jouw mail tussen versies correct wordt weergegeven.

Hoe schakel ik de knop 'Ondersteuning voor Outlook' in?
- Ga naar de E-mail-editor.
- Ga naar de desbetreffende drag-and-drop template.
- Kies voor de optie 'Uiterlijk' in het template.
- Kies voor de optie 'Knoppen'.
- Zet de knop 'Ondersteuning voor Outlook' aan.

![Afbeelding](https://github.com/Quancode/Documentation/blob/master/Publisher/images/gitbuttonnieuw2.png)

## Tip 2: Problemen met de hoogte en breedte van de knoppen

Problemen met de hoogte en breedte van de knoppen kan veroorzaken dat de tekst in de button verschuift of zelfs verdwijnt.

Hoe zorg je ervoor dat de tekst weer zichtbaar is in de button?
- Voeg meer interne opvullingen (padding) toe aan de boven- en onderkant om meer ruimte in de knop toe te voegen.
- Stel een kleinere tekstgrootte in op de knop. Dit doe je in de *VML-opmerkingen (Vector Markup Language)*.VML wordt gebruikt om sommige elementen er hetzelfde uit te laten zien in oudere versies van Outlook.
- Wanneer de breedte van de knop is verminderd in vergelijking met de weergave van de knop in de editor. Voeg dan opvulling via het menu toe.

![Afbeelding](https://github.com/Quancode/Documentation/blob/master/Publisher/images/button2nieuw.png)

## Tip 2: De gemarkeerde knopkleur en hover functies werken niet

Bij het instellen van "Kleur knop" en "Gemarkeerde knopkleur" binnen het knoppenblok, is de functie wel in het template en in de voorvertoning zichtbaar. Bij het verzenden van de template naar een Outlook e-mailadres werken deze functies echter niet, ook de hover-functie werkt niet.

De hover-effect is mogelijk op die e-mailclients die de @media-query's herkennen. Outlook ondersteunt de @media-query's niet.

## Tip 2: De lettergrootte van een knop wordt aangepast

De letterhoogte van een knop kan worden gewijzigd wanneer deze groter is dan 28 pixels. Als de letterhoogte van een knop wordt ingesteld op bijvoorbeeld 28 pixels, dan wordt de lettergrootte in de MSO-tag aangepast naar 17 pixels. Dit heeft als gevolg dat de tekst in de button buiten de button uit komt.

Stripo heeft deze functie ingesteld omdat de aangepaste lettertypen (ook wel weblettertypen genoemd), evenals niet-standaard lettertypen, niet door Outlook worden ondersteund. Hierdoor wordt een fallback-lettertype toegepast. Als dezelfde lettergrootte wordt toegepast voor het fallback-lettertype, kan de hoogte van de knop veel hoger zijn dan voor het webversie van de template. Stripo geeft aan dat klanten aangeven dat de hoogte van de knop in Outlook hetzelfde blijft als in de webversie. Om deze reden verkleint Stripo weer de lettergrootte van de knop voor de VML-code (dit wordt dus alleen toegepast voor Outlook). 
