# Direct aan de slag

SMTPeter is een 'cloud based' email gateway die ervoor zorgt dat je op een makkelijke manier
emails kunt versturen. Je kunt kiezen om emails naar SMTPeter te versturen via de REST API 
of SMTP API. Om direct te starten met SMTPeter, heb je (naast het registreren) twee dingen 
nodig:
- *Aanmaken van een '**sender domain**'*
- *Aanmaken van een verbinding met de gewenste '**API**'*


## Sender Domain instellen

'Sender Domains' vind je in het menu van het SMTPeter dashboard. Klik op ‘Add sender domain’
en volg de stappen. Bij alle stappen staat een uitgebreide omschrijving waar alle instructies
staan uitgelegd. Maak je geen zorgen om klik- en afbeeldingdomeinen of DMARC deployment.
Deze kun je later allemaal aanpassen in het configuratiescherm.


## REST API

Voor het gebruik van de REST API heb je een zogeheten 'access token' nodig. Deze kun je
eenvoudig genereren in het SMTPeter dashboard onder het kopje 'REST API'.
Vervolgens kun je gebruik maken van alle toepassingen door middel van de onderstaande URL:
```
https://www.smtpeter.com/v1/METHOD?access_token=YOUR_API_TOKEN
```
Let wel op dat je METHOD moet vervangen door de methode die je gaat gebruiken. En dat
YOUR_ACCESS_TOKEN moet worden vervangen door de 'acces token'. Wij raden aan om de
REST API te gebruiken, omdat die simpelweg een betere functionaliteit heeft dan de SMTP API.


## SMTP API

Voor het gebruik van de SMTP API heb je een valide gebruikersnaam en wachtwoord nodig.
Deze kun je creëren door op 'Create SMTP login' te klikken en de stappen te volgen.
Zorg dat je de gegevens goed onthoud, want je krijgt deze maar een keer te zien.
Nu kun je per aangemaakt account de verschillende toepassingen beheren.


Dat is alles! SMTPeter is nu klaar voor gebruik.
Lees meer over de mogelijkheden van SMTPeter via:

- [Sender Domains](sender-domains)
- [SMTP API](smtp-api)
- [REST API](rest-api)
