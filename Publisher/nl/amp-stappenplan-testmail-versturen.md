# Stappenplan testmail versturen
Voordat je een AMP testmail kunt versturen dien je een aantal stappen te doorlopen.

## Gmail account whitelisten
Voordat je een AMP testmail kunt versturen dien je in Gmail het afzenderadres van je e-mail te whitelisten. Als je op je google account ingelogd bent kun je bij 'Instellingen -> Algemeen -> Dynamische e-mail' aangeven dat dynamische content weergegeven mag worden. 

Onder de optie 'Ontwikkelaarsinstellingen' kun je het e-mailadres opgeven van waaruit je de testmails gaat versturen met Copernica. Om gebruik te maken van de Google Playground raden wij je ook aan om het adres 'amp@gmail.dev' toe te staan.

## Test mail versturen met de playground
Voordat je een template maakt in Copernica raden wij je aan om gebruik te maken van de [Gmail AMP for Email Playground](https://amp.gmail.dev/playground/) van Google. In deze Playground kun je een voorbeeld template maken waarbij je direct ziet wat goed en fout gaat in je code. Nadat je template de validatie status '*PASS*' heeft kun je direct een testmail vanuit deze tool sturen naar het e-mailadres waarmee je bij Gmail bent ingelogd.

Enkele toepassingen voor AMP templates kun je vinden in de [AMP documentatie](https://amp.dev/documentation/components/amp-carousel/?format=email).

## Test mail versturen via Copernica
Zodra je template er vanuit de Playground goed uitziet kun je de mail overzetten naar de *AMP broncode* in je template binnen de Copernica omgeving. Je kunt nu een testmail versturen naar je Gmail adres om de AMP content te zien.
