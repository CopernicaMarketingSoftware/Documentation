# Tips om buttons in Outlook goed weer te geven (Tips & Tricks)

Outlook is vergeleken met andere e-mailclients een zeer specifieke service:
- Het ondersteunt geen mediaquery's; 
- het heeft problemen met het weergeven van achtergrondafbeeldingen, bepaalde fonts en knoppen; 
- veel stijlen worden niet door Outlook ondersteund.

Dit alles maakt het zeer lastig om op de gebruikelijke stylingswijze een mooie button in je mail te krijgen. 

Om ervoor te zorgen dat je mails ook in Outlook de juiste styling weergeven, hebben we een aantal stylingtips voor jullie op een rij gezet.


## Outlook-versie

De configuratie van je Outlook-versie kan ervoor zorgen dat de styling niet correct wordt weergegeven. De versie van je Outlook, en of dit een desktop versie is, speelt dus ook een grote rol. 

Mocht je tegen een error aanlopen, of mocht de styling in je ontvangen mail afwijken, zoek dan op of de styling door de Outlook-versie die je gebruikt wordt ondersteund. Op het internet kan je informatie hierover terug vinden.

## Tip 1: Altijd de button, 'Ondersteuning voor Outlook' in de editor, aan

Deze knop is in de uiterlijk van het template in de E-mail-Editor terug te vinden, onder 'Knoppen'. De knop zorgt voor de meest nauwkeurige weergave van je knoppen in Outlook-e-mailclients, en wordt by default ingeschakeld. Wanneer de optie is geactiveerd in de 'Uiterlijk' van de editor, voegt de editor de bepaalde stijl aan de CSS code toe. Dit zorgt ervoor de 
```.msohide { mso-hide: all;} ``` toe aan het CSS-bestand.

Hoe schakel ik de knop 'Ondersteuning voor Outlook' in?
- Ga naar de E-mail-editor.
- Ga naar de desbetreffende drag-and-drop template.
- Kies voor de optie 'Uiterlijk' in het template.
- Kies voor de optie 'Knoppen'.
- Zet de knop 'Ondersteuning voor Outlook' aan.

![Afbeelding 1](https://github.com/Quancode/Documentation/blob/master/Publisher/images/gitbuttonnieuw2.png)

## Tip 2: Problemen met de hoogte en breedte van de knoppen

Problemen met de hoogte en breedte van de knoppen kan veroorzaken dat de tekst in de button verschuift of zelfs verdwijnt. 

Hoe zorg je ervoor dat de tekst weer zichtbaar is in de button? 
- Voeg meer interne opvullingen (padding) toe aan de boven- en onderkant om meer ruimte in de knop toe te voegen.
- Stel een kleinere tekstgrootte in op de knop in de **VML-opmerkingen** om deze weer te geven in Outlook.
- Wanneer de breedte van de knop is verminderd in vergelijking met de weergave van de knop in de editor. Voeg dan opvulling via het menu toe.

![Afbeelding]

![Afbeelding]

## Tip 2: De gemarkeerde knopkleur en hover functies werken niet

Bij het instellen van "Kleur knop" en "Gemarkeerde knopkleur" binnen het knoppenblok, werkt het in de sjabloon en in het voorbeeld. Bij het verzenden naar een Outlook e-mailadres lijkt de gemarkeerde kleur echter niet te werken, ook de hover-functie werkt niet. Wanneer je deze instelt, zal deze in Outlook niet werken. 

De hover-effect is mogelijk op die e-mailclients die de @media-query's herkennen. Outlook ondersteunt de @media-query's niet. Dit effect werkt daarom niet in Outlook. 


## Tip 2: De lettergrootte van een knop wordt aangepast op het moment dat de lettergrootte groter dan 28 pixels wordt ingesteld

Het de letterhoogte van de knop kan worden gewijzigd wanneer deze bijvoorbeeld groter
Als de letterhoogte van een knop wordt ingesteld op bijvoorbeeld 28 pixels, dan wordt de lettergrootte in de MSO-tag aangepast naar 17 pixels.

Dit is met opzet gedaan volgens de specifieke formule die we hebben bedacht tijdens het werken aan deze functie. Zie je, de aangepaste lettertypen (ook wel weblettertypen genoemd), evenals niet-standaard lettertypen, worden niet ondersteund door Outlook, dus de fallback-lettertypen worden in plaats daarvan toegepast. Als dezelfde lettergrootte wordt toegepast voor het fallback-lettertype, kan de hoogte van de knop veel hoger zijn dan voor het webversie van de e-mailsjabloon. Veel klanten beweren dat de hoogte van de knop in Outlook hetzelfde blijft als in de webversie, dus om het resultaat te bereiken verkleinen we de lettergrootte van de knop voor de VML-code (die alleen wordt toegepast voor Outlook).

