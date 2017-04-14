# Afbeeldingen in een e-mail

Er zijn een aantal manieren om afbeeldingen in je e-mail te krijgen. Je kan een afbeeldingen *embedden* in je *mime*, of je kan afbeeldingen *hosten* en linken naar een afbeelding. Elke methode heeft zijn voor en nadelen. In dit artikel worden de voor en nadelen besproken. 

## Afbeeldingen hosten

Gehoste afbeeldingen werken alleen als deze zijn gedownload. Dit gebeurt niet op hetzelfde moment als de e-mail wordt ontvangen. De meeste e-mailprogramma's vragen de gebruiker eerst of hij of zij de gehoste afbeeldingen wil downloaden. Als de *client* op een correcte wijze de HTML behandeld zal de e-mail er zo uitzien als het is ontworpen.

Verder zijn de voordelen dat de grootte van de e-mail afneemt waardoor de verzendsnelheid toeneemt en dat de spamgevoeligheid afneemt.

**In het kort:** gebruik gehoste afbeeldingen over meegestuurde afbeeldingen.

## Afbeeldingen meesturen


Een meegestuurde of *embedded* afbeelding in een e-mail, kan worden gezien als een downloadbare bijlage, waardoor je bericht niet meer goed wordt getoont. Dit zou natuurlijk niet moeten gebeuren. Het voordeel is wel dat de afbeeldingen worden meegestuurd waardoor de data theoretisch gezien bereikbaar is. Dit resulteert in een e-mail waarvan de afbeeldingen worden geladen zonder dat de ontvanger hier toestemming voor moet geven.   Hierdoor wordt de e-mail gezien en gelezen zoals deze ontworpen is. Het nadeel is natuurlijk dat de e-mail veel groter wordt. 

Het is niet te garanderen of een afbeelding als downloadbare bijlage wordt getoont omdat de *e-mailclient* van de ontvanger bepaald hoe wordt omgegaan met embedded content. Het is mogelijk dat de content wordt weergegeven zoals is bedoeld maar dit hangt af van de *client*. Sommige e-mailproviders met applicaties voor mobieltjes strippen de afbeeldingen er uit omdat het data bespaart. Dit is natuurlijk niet de bedoeling als je ervoor hebt gekozen om afbeeldingen mee te sturen. Wij hebben zelfs ontdekt dat applicaties vaak geen afbeeldingen laten zien als deze worden meegestuurd, zelfs als de gebruiker aan heeft gegeven dit wel te willen zien. 

**In het kort:** Meegestuurde afbeeldingen hebben enkele theoretische voordelen over gehoste afbeeldingen. Toch hebben gehoste afbeeldingen meer voordelen en is het in 99% van de gevallen de beste keus. Alleen als je ontvangers voornamelijk bestaan uit mensen die werkzaam zijn bij een werkgever met een zeer restrictief internetbeleid, kun je er voor kiezen de afbeeldingen mee te sturen.

## Automatisch omzetten

Wij adviseren om gehoste afbeeldingen te gebruiken. Toch, als er afbeeldingen worden meegestuurd in je mime kun je ervoor kiezen dat SMTPeter deze converteert naar een gehoste versie. SMTPeter haalt dan de meegestuurde afbeelding uit de e-mail en host dan deze zelf. SMTPeter herschrijft de link dan in het HTML gedeelte van je mime.

Als je e-mails verstuurt via SMTP kan je deze mime header toevoegen:

```txt
x-smtpeter-images: hosted
```


Of activeer deze functionaliteit voor een SMTP login op het dasboard.

Als je gebruik maakt van de REST API kan je de volgende JSON toevoegen.

```json
{
    ...,
    "images": "hosted"
}
```
