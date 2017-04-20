# Sender Domains

SMTPeter gebruikt het concept van *sender domains* om e-mail simpeler te maken.
*SPF, DKIM en DMARC* zijn lastig te begrijpen en in te stellen. SMTPeter heeft
hier handige oplossingen voor bedacht, zodat jij bezig kunt zijn met je bedrijf 
en andere zaken.

Dit artikel gaat over wat een sender domain precies doet. Het werkt als 
volgt: 'in het SMTPeter dashboard geef je aan vanaf welke domeinen je 
wilt mailen en wij vertellen vervolgens hoe je je DNS moet configureren. 
Het sender domain is de domeinnaam die je gaat gebruiken in je e-mails'.

Stel dat je e-mails wil versturen vanaf adressen die eindigen op 
"@jouwdomein.com" of "@eenanderdomein.org". Je kunt simpelweg het 
dashboard gebruiken om domeinen "example.com" en "example.org" 
op te zetten. Wanneer je dit hebt gedaan geeft SMTPeter een lijst van 
DNS records terug, die je aan je *DNS provider* kunt geven of op je eigen 
DNS server kunt zetten. We hebben daarna nog tips voor je, maar je kunt 
nu beginnen met e-mail sturen via SMTPeter.


## Meer details

Het versturen van e-mail ziet er aan de voorkant ogenschijnlijk simpel uit. 
Achter de schermen gebeurt ontzettend veel om te zorgen dat de e-mails goed 
worden afgeleverd. Er wordt rekening gehouden met SPF records, wisselende 
publieke en persoonlijke key pairs voor DKIM ondertekeningen en het bijhouden 
van DMARC archieven, zodat de wereld weet dat jij de enige bent die een 
bepaald domein gebruikt om mee te e-mailen.

SMTPeter neemt deze verantwoordelijkheden van je over met sender domains.
We maken SPF, DKIM en DMARC archieven voor je aan en slaan ze op onze 
DNS servers op. Zelf hoef je alleen een aantal archieven in je eigen DNS 
archief aan te maken, door deze aan je DNS provider te geven of op je eigen 
DNS server te zetten die naar de onze verwijzen. Als wij een verandering 
doorvoeren (zoals je DKIM sleutels wisselen) heb je hier meteen toegang toe, 
omdat je eigen DNS archieven naar de onze verwijzen. 

In onze DNS (die ".smtpeter.com" subdomeinen gebruikt) bewaren we de volgende 
archieven:

* [SPF archieven](spf-validation "SPF email validatie - een korte introductie") die de IP adressen waar je vandaan mailt opslaan
* [DKIM sleutels](dkim-signing "E-mail ondertekenen met DKIM") met je publieke sleutels die we per maand wisselen
* [DMARC archieven](dmarc-deployment "DMARC deployment") met je DMARC beleid

We vragen jou om CNAME archieven en andere verwijzingen in je DNS op te 
zetten.

## Het "from" adres

Voor elk sender domain hebben we de publieke DKIM sleutels in onze DNS.
We hebben ook een kopie van de persoonlijke key op onze server, zodat we een 
DKIM ondertekenening onder elke mail via de SMTPeter servers kunnen zetten.

Om de juiste sleutels te gebruiken halen we de sleutels uit elk "van" adres
dat we gebruiken. Daarom is het belangrijk dat je altijd geregistreerde 
sender domains gebruikt. Als je geen keys hebt opgezet wordt jij niet 
geverifieerd als de afzender van de e-mail.

## Tracking en bounce domeinen

Als je een sender domain opzet word je ook gevraagd om je tracking en 
bounce domeinen op te zetten. Dit zijn de hostnames die we gebruiken om 
kliks, opens en errors op te slaan. De gesuggereerde standaarden zijn 
voor de meeste gebruikers geschikt ("tracking.example.nl" en 
"clicks.example.nl").

Als je SMTPeter gebruikt om [kliks](/statistics "Click en open tracking") op te slaan, worden gebruikers 
eerst doorgestuurd naar een andere website die de klik opslaat in onze databases. 
De hyperlinks zien er daarom uit als "clicks.example.com". Sommige 
gebruikers zullen dit herkennen als tracking domein. Als je de naam van 
deze URLs wilt veranderen naar iets zoals "aanbiedingen.example.com" 
kun je het klik domein aanpassen in de sender domainn configuratie.

Je kunt ook je bounce domein aanpassen, maar deze is alleen zichtbaar in 
de broncode van de e-mail.
