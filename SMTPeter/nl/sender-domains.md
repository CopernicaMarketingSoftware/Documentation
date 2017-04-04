# Zender domeinen

SMTPeter gebruikt het concept "Sender Domains", of zender domeinen,
om email simpeler te maken. Het laat je email versturen zonder je bezig 
te houden met SPF, DKIM en DMARC. Zo kun jij je bezig houden met je 
bedrijf terwijl wij je berichten afhandelen.

Dit artikel gaat over wat een zender domein precies doet. Het werkt als 
volgt: Op het SMTPeter dashboard geef je aan vanaf welke domeinen je 
wilt mailen en wij vertellen hoe je je DNS moet configureren. Het zender 
domein is de domein naam die je gaat gebruiken in je emails.

Stel dat je emails wilt versturen vanaf adressen die eindigen op 
"@jouwdomein.com" of "@eenanderdomein.org". Je kan simpelweg het 
dashboard gebruiken om domeinen "jouwdomein.com" en "eenanderdomein.org" 
op te zetten. Wanneer je dit hebt gedaan geeft SMTPeter een lijst van 
DNS records terug, die je aan je DNS provider kunt geven of op je eigen 
DNS server kunt zetten. We hebben daarna nog tips voor je, maar je kunt 
nu beginnen met email sturen via SMTPeter.

## Meer details

Email tegenwoording wordt steeds moeilijker. Je moet je met veel dingen 
bezig houden, zoals SPF records in je DNS waar je IP adressen instelt om 
mail te versturen, wisselende publieke en persoonlijke key pairs for DKIM 
signatures bijhouden en DMARC archieven in je DNS opslaan zodat de 
wereld weet dat jij de enige bent die dit domein gebruikt om mee te emailen.

SMTPeter neemt deze verantwoordelijkheden van je over met zender domeinen.
Wij maken SPF, DKIM en DMARC archieven voor je aan en slaan ze op onze 
DNS servers op. Zelf hoef je alleen een aantal archieven in je eigen DNS 
archief aan te maken door deze aan je DNS provider te geven of op je eigen 
DNS server te zetten die naar de onze verwijzen. Als wij een verandering 
doorvoeren (zoals je DKIM sleutels wisselen) heb je hier meteen toegang toe, 
omdat je eigen DNS archieven naar de onze verwijzen. 

In onze DNS (die *.smtpeter.com subdomeinen gebruikt) bewaren we de volgende 
archieven:

* [SPF archieven](spf-validation) die de IP adressen waar je vandaan mailt opslaan
* [DKIM sleutels](dkim-signing) met je publieke sleutels die we per maand wisselen
* [DMARC archieven](dmarc-deployment) met je DMARC beleid

We vragen jou om CNAME archieven en andere verwijzingen in je DNS op te 
zetten.

## Het "van" adres

Voor elk zender domein hebben we de publieke DKIM sleutels in onze DNS.
We hebben ook een kopie van de persoonlijke key op onze server zodat we een 
DKIM ondertekenening onder elke mail via de SMTPeter servers kunnen zetten.

Om de juiste sleutels te gebruiken halen we de sleutels uit elk "van" adres
dat we gebruiken. Daarom is het belangrijk dat je altijd geregistreerde 
zender domeinen gebruikt. Als je geen keys hebt opgezet wordt jij niet 
geverifieerd als de afzender van de email.

## Tracking en bounce domeinen

Als je een zender domein opzet wordt je ook gevraagd om je tracking en 
bounce domeinen op te zetten. Dit zijn de hostnames die we gebruiken om 
kliks, opens en errors op te slaan. De gesuggereerde standaarden zijn 
voor de meeste gebruikers geschikt. (tracking.jouwdomein.nl en 
clicks.jouwdomein.nl)

Als je SMTPeter gebruikt om [kliks](./statistics) op te slaan worden gebruikers eerst 
doorgestuurd naar een andere website die de klik opslaat in onze databases. 
De hyperlinks zien er daarom uit als "clicks.jouwdomein.com". Sommige 
gebruikers zullen dit herkennen als tracking domein. Als je de naam van 
deze URLs wilt veranderen naar iets zoals "aanbiedingen.jouwdomein.com" 
kun je het click domein aanpassen in de zender domein configuratie.

Je kunt ook je bounce domein aanpassen, maar deze is alleen zichtbaar in 
de broncode van de email.


