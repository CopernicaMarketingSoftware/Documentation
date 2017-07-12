# Websites: instellingen

Voor elke website kun je verschillende instellingen specificeren voor 
het opslaan van sessie cookies (time-out) en HTTPS secure access.

## Time-out instellingen

De time-out op een website bepaalt hoe lang een gebruiker ingelogd blijft 
zonder nieuwe pagina's op te vragen of pagina's te verversen. Als je een 
time-out op 1 minuut zet, bijvoorbeeld, wordt een gebruiker uitgelogd na 
een minuut zonder interactie met je website. 

De standaard time-out is "0". Dit is een speciale waarde die de sessie 
actief houdt tijdens de huidige browser sessie. Als je deze waarde niet 
veranderd zal je gebruiker altijd uitgelogd worden wanneer de browser wordt 
gesloten.

## HTTPS access

Hypertext Transfer Protocol Secure (HTTPS) is een extensie van het HTTP 
protocol met als doel om informatie op veilige wijze over te dragen. 
Het gebruikt Hypertext Transfer Protocol (HTTP) in combinatie met SSL/TLS 
protocol om op veilige wijze versleutelde informatie uit te wisselen. 
Door de versleuteling is het voor een buitenstaander onmogelijk om te weten 
wat voor informatie er uitgewisseld is, zelfs als deze het te pakken krijgt. 
HTTPS wordt vaak gebruikt waar privacy-gevoelige informatie wordt uitgewisseld, 
zoals naam, adres, geboortedatum, bsn's en dergelijke.

Copernica biedt de optie om HTTPS connectie af te dwingen. Er mag dan 
geen gebruikt worden van onversleutelde HTTP. Als je met privacy-gevoelige 
informatie omgaat kun je het beste HTTPS gebruiken om de gegevens van jou 
en je klanten veilig te houden. Als je je eigen domein naam gebruikt 
zijn hier wat extra stappen voor vereist.

## SSL met je eigen domeinnaam

Het is mogelijk om je Copernica website beschikbaar te maken met een HTTPS 
connectie. Als je een Copernica subdomein hebt zijn hier geen extra 
stappen voor nodig, omdat Copernica's SSL certificaat ook voor jouw 
website geldt. Als je echter je eigen domeinnaam wil gebruiken moet je 
eerst een SSL certificaat aanvragen en bij ons aaleveren. Je hebt deze 
bijvoorbeeld nodig als je je wil associëren met social media websites.

Volg de volgende stappen om HTTPS te kunnen gebruiken met je eigen domein:

1. Vraag een SSL certificaat aan (type is onbelangrijk) als je er nog geen hebt. 
Bronnen hiervoor kun je op Google vinden.
2. Vraag een toegewijd IP adres bij Copernica aan als je deze nog niet 
hebt. Je kunt deze aanvragen bij ons Support team (support@copernica.com) 
voor een kleine maandelijkse toeslag.
3. Lever je SSL certificaat in bij ons Support team met de private key, het 
intermediate-certificaat en de root-certificate. Dit is gevoelige informatie, 
dus verstuur deze niet onversleuteld. Je kunt eventueel het certificaat 
uploaden naar een veilige FTP server of via Skype.
4. Als je al deze stappen hebt uitgevoerd kun je je website opzetten om 
alleen HTTPS te gebruiken.

## Meer informatie

* [Websites](./websites)
* [Toegang beperken](./websites#toegang-beperken)
