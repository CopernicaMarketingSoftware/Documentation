# Sender domains

SMTPeter gebruikt het concept van *sender domains* om e-mail simpeler te maken.
Binnen de verschillende diensten van SMTPeter zijn sender domains **verplicht**
gesteld, omdat het zo'n essentieel onderdeel is voor het succesvol versturen
van e-mail.

Het gebruik van sender domains werkt als volgt: in het SMTPeter dashboard 
geef je aan vanaf welke domeinen je wilt e-mailen. SMTPeter laat je vervolgens 
weten hoe je DNS instellingen geconfigureerd moeten worden. 

Dus als je e-mails wilt versturen vanaf adressen die eindigen op 
"@example.com" of "@example.org", gebruik je het dashboard om de domeinen 
"example.com" en "example.org" op te zetten. SMTPeter geeft je een lijst van 
DNS records als je de stappen goed hebt doorlopen. De DNS records hoef je 
vervolgens alleen nog maar te overhandigen aan je DNS provider of je eigen 
DNS server.

Je kunt meer informatie vinden in het achtergrondartikel voor [sender-domains](sender-domains).


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

Je hoeft enkel de CNAME archieven en andere verwijzingen in je DNS op te 
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

Bij het opzetten van een sender domain word je ook gevraagd naar je tracking- 
en bounce domeinen. Dit zijn de hostnames die we gebruiken om 
kliks, opens en errors op te slaan. De gesuggereerde standaarden zijn 
voor de meeste gebruikers geschikt ("tracking.example.nl" en 
"clicks.example.nl").

Als je SMTPeter gebruikt om [clicks](./statistics "Click en open tracking") op te slaan, worden gebruikers 
eerst doorgestuurd naar een andere website die de klik opslaat in onze databases. 
De hyperlinks zien er daarom uit als "clicks.example.com". Sommige 
gebruikers zullen dit herkennen als tracking domein. Als je de naam van 
deze URLs wilt veranderen naar iets zoals "aanbiedingen.example.com" 
kun je het klik domein aanpassen in de sender domain configuratie.

Je kunt ook je bounce domein aanpassen, maar deze is alleen zichtbaar in 
de broncode van de e-mail.


## Meer informatie

* [Configureren van een sender domain](./introduction-sender-domains)
* [SPF records](./spf-validation)
* [DKIM keys](./dkim-signing)
* [DMARC records](./dmarc-deployment)
