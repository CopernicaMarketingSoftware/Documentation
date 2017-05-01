# Direct aan de slag

SMTPeter is een *cloud based e-mail gateway* die ervoor zorgt dat je op een makkelijke manier
e-mails kunt versturen. Je kunt kiezen om e-mails naar SMTPeter te versturen via de REST API 
of SMTP API. Als je start met SMTPeter, moet je (nadat je je hebt geregistreerd) een paar 
dingen doen:

- Via het dashboard moet je instellen vanaf welke domeinnaam je wilt gaan mailen;
- Je moet een paar DNS records aanmaken, zodat SMTPeter e-mail vanuit jouw naam kan versturen;
- En je moet **login credentials** aanmaken om toegang tot de **API** te krijgen.


## Sender Domain instellen

Om in te stellen vanuit welke domeinnaam je mail gaat versturen, moet je een *sender domain*
aanmaken. Deze sender domains vind je in het menu van het SMTPeter dashboard. Klik op 
`Add sender domain` en volg de stappen. Bij alle stappen staat een uitgebreide omschrijving.
De meeste standaardinstellingen zijn eigenlijk al goed, dus je kunt vrij snel doorklikken zonder 
je zorgen te hoeven maken over bijvoorbeeld de klik- en afbeeldingdomeinen of *DMARC deployment*. 
Alles kun je later aanpassen in het configuratiescherm. 

Nadat je de stappen om een sender domain aan te maken hebt doorlopen, zie je in het dashboard
een lijstje van geadviseerde DNS instellingen staan. Deze instellingen moet je in jouw DNS plaatsen.
Dit is nodig, omdat de servers van SMTPeter alleen e-mail uit jouw naam kunnen versturen als
daar in jouw DNS expliciet toestemming voor wordt gegegeven. 

[Klik hier voor meer informatie over sender domains](sender-domains "Sender Domains")


## REST vs SMTP

SMTPeter maakt het mogelijk om e-mails te versuren via de REST API en de 
SMTP API. We raden je sterk aan om, als je de keuze hebt, te gaan voor de 
REST API. Deze API geeft je meer opties, vrijheid en gebruiksgemak. 
En hij is sneller, omdat er geen complexe en tijdrovende *SMTP handshake* nodig is
om e-mails te versturen van de ene naar de andere server.


## REST API

Voor het gebruik van de REST API heb je een zogeheten *access token* nodig. Deze kun je
eenvoudig genereren in het SMTPeter dashboard onder het kopje REST API.
Vervolgens kun je gebruik maken van alle toepassingen door middel van de onderstaande URL:

```text
https://www.smtpeter.com/v1/METHOD?access_token=YOUR_API_TOKEN
```

Let wel op dat je METHOD moet vervangen door de methode die je gaat gebruiken. En dat
YOUR_ACCESS_TOKEN moet worden vervangen door de acces token. Wij raden aan om de
REST API te gebruiken, omdat die simpelweg een betere functionaliteit heeft dan de SMTP API.

Van een aantal programeertalen zijn voorbeeldscripts en *classes* beschikbaar.
Je kunt deze voorbeelden gebruiken om een verbinding op te zetten met de 
REST API. Zo hoef je geen *low-level calls* te schrijven en kun je direct
aan de slag.

* [PHP voorbeeld](php-example "PHP voorbeeld")
* [Python voorbeeld](python-example "Python voorbeeld")


## SMTP API

Naast de REST API heeft SMTPeter een traditionele SMTP API. Deze API is
vooral nuttig als je mails wilt versturen met traditionele email clients
zoals Outlook en Thunderbird, of wanneer je wilt verbinden met een mobiele
telefoon of tablet.

Voor het gebruik van de SMTP API heb je een valide gebruikersnaam en wachtwoord nodig.
Deze kun je creëren door op `Create SMTP login` te klikken en de stappen te volgen.
Zorg dat je de gegevens goed onthoudt, want je krijgt ze maar een keer te zien.
Nu kun je per aangemaakt account de verschillende toepassingen beheren.
Vervolgens kun je de email client met SMTPeter verbinden. De benodigde
instelling kun je [hier](smtp-ports) vinden. Voor meer informatie kun je
de [algemen SMTP API documentatie](smtp-api) lezen. Hier vind je ook onder
anderen ook voorbeelden hoe je GMail, Apple mail, Thunderbird, en Android
in kunt stellen.

Dat is alles! SMTPeter is nu klaar voor gebruik.
Lees meer over de mogelijkheden van SMTPeter via:

- [Meer informatie over Sender Domains](sender-domains "Sender Domains")
- [Meer informatie over de SMTP API](smtp-api "SMTP API")
- [Meer informatie over de REST API](rest-send "REST API")
