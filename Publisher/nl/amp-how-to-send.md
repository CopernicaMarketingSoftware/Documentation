# Stappenplan versturen met AMP

## Testaccount whitelisten
Voordat je een AMP testmail kunt versturen dien je het afzenderadres die je wilt gebruiken voor het versturen van je e-mails te whitelisten. Hieronder vind je per ISP een uitleg hoe je dit kunt doen:

### Gmail
Als je op je Google account ingelogd bent kun je bij 'Instellingen -> Algemeen -> Dynamische e-mail' aangeven dat dynamische content weergegeven mag worden. 

Onder de optie 'Ontwikkelaarsinstellingen' kun je het e-mailadres opgeven van waaruit je de testmails gaat versturen met Copernica. Om gebruik te maken van de Google Playground raden wij je ook aan om het adres 'amp@gmail.dev' toe te staan.

### Outlook.com
Als je op je Outlook account ingelogd bent kun je bij 'Settings -> View all Outlook settings -> Message handling -> Dynamic email' aangeven dat dynamische content weergegeven mag worden. 

Onder de optie 'Developer settings' kun je het e-mailadres opgeven van waaruit je de testmails gaat versturen met Copernica.

## Testmail versturen met de Gmail AMP for Email Playground
Voordat je een template maakt in Copernica raden wij je aan om gebruik te maken van de [Gmail AMP for Email Playground](https://amp.gmail.dev/playground/) van Google. In deze Playground kun je een voorbeeld template maken waarbij je direct ziet wat goed en fout gaat in je code. Nadat je template de validatie status '*PASS*' heeft kun je direct een testmail sturen naar het e-mailadres waarmee je bij Gmail bent ingelogd.

Enkele AMP toepassingen voor in je templates kun je vinden in de [AMP documentatie](https://amp.dev/documentation/components/amp-carousel/?format=email).

## Naar Copernica kopieren en tags toevoegen
Zodra je template er vanuit de Playground goed uitziet kun je de mail overzetten naar de *AMP broncode* binnen je Copernica template. Om teksten en afbeeldingen niet dubbel toe te moeten voegen kun je gebruik maken van onze [gedeelde blokstuctuur](./amp-mailing#gedeelde-blok-structuur) tussen je HTML en AMP template.

Hierbij een voorbeeld van de [AMP carousel](https://amp.dev/documentation/components/amp-carousel/?format=email) in combinatie met Copernica blokken:

```
<amp-carousel width="450" height="300">
  [image name='afb1']
  [image name='afb2']
  [image name='afb3']
</amp-carousel>
```

## Test mail versturen met Copernica
Je kunt nu een testmail versturen naar je Gmail of Outlook.com adres om de AMP versie van je template in te zien. 

**Belangrijk:** Vergeet niet om ook een HTML versie van je template te maken voor clients die het gebruik van AMP nog niet ondersteunen.

## AMP sender registratie
Wanneer je klaar bent om met AMP te starten dan dien je je domein te registeren bij de AMP ontvangers. Je kan per ISP en per emailadres waaruit je verstuurt aanvragen om AMP emails te mogen versturen naar deze ISP. Het emailadres dient vast te zijn, kortom je kan niet met emailadressen AMP versturen die niet geregistreerd zijn. 

### Gmail
De eerste stap is een productie klaar AMP email te versturen naar ampforemail.whitelisting@gmail.com en wacht vervolgens repons af tot je verder gaat.

Hierna kan aanvragen om AMP verzender te worden als je aan de onderstaande eisen voldoet:
- DKIM, SPF and DMARC moeten goed ingesteld staan. Wanneer je gebruik maakt van Copernica senderdomains en deze zijn goedgekeurd staat dit goed ingesteld.
- Je dient een minimale verzending in de orde van gemiddeld 100 berichten per dag te hebben vanaf het verzendadres. Dit houdt in dat je over een maand tijd minimaal 3000 Gmail adressen moet benaderen. 
- Je moet voldoen aan de [bulk sender guidelines](https://support.google.com/mail/answer/81126) van Gmail.

Je kan bij Gmail via het onderstaande forumulier aanvragen om AMP verzender te worden:
https://docs.google.com/forms/d/e/1FAIpQLScRYD2lohy28EVgXwDZUCC1yHw5qg-Gfz31jGuy8uSfi-hA0Q/viewform

Voor meer informatie over AMP registiratie bij Gmail klik dan [hier](https://developers.google.com/gmail/ampemail/register)

### Outlook.com
Bij Outlook is het niet nodig om een minimale verzend hoeveelheid te hebben, je dient wel een AMP email getest te hebben. Vervolgens kan je het onderstaande formulier invullen om een AMP verzender aan te vragen:
https://forms.office.com/Pages/ResponsePage.aspx?id=v4j5cvGGr0GRqy180BHbRzX-CbfWK8dJr5uYgzqdeDJUMkRSRFpJUEoxRUVOTFpXVEpWR0xJVlpSTy4u

Voor meer informatie over AMP registiratie bij outlook.com klik dan [hier](https://docs.microsoft.com/nl-nl/outlook/amphtml/register-outlook)


