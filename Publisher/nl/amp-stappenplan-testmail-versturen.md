# Versturen met AMP

## Testaccount whitelisten
Voordat je een AMP testmail kunt versturen dien je het afzenderadres die je wilt gebruiken voor het versturen van je e-mails te whitelisten. Hieronder vind je per ISP een uitleg hoe je dit kunt doen:

### Gmail
Als je op je Google account ingelogd bent kun je bij 'Instellingen -> Algemeen -> Dynamische e-mail' aangeven dat dynamische content weergegeven mag worden. 

Onder de optie 'Ontwikkelaarsinstellingen' kun je het e-mailadres opgeven van waaruit je de testmails gaat versturen met Copernica. Om gebruik te maken van de Google Playground raden wij je ook aan om het adres 'amp@gmail.dev' toe te staan.

### Outlook.com
Als je op je Outlook account ingelogd bent kun je bij 'Settings -> View all Outlook settings -> Message handling -> Dynamic email' aangeven dat dynamische content weergegeven mag worden. 

Onder de optie 'Developer settings' kun je het e-mailadres opgeven van waaruit je de testmails gaat versturen met Copernica. Om gebruik te maken van de Google Playground raden wij je ook aan om het adres 'amp@gmail.dev' toe te staan.

## Test mail versturen met de playground
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

## Test mail versturen via Copernica
Je kunt nu een testmail versturen naar je Gmail adres om de AMP versie van je template in te zien. 

**Belangrijk:** Vergeet niet om ook een HTML versie van je template te maken voor clients die het gebruik van AMP nog niet ondersteunen.
