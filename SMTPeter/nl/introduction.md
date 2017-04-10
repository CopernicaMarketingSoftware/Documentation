# Direct aan de slag

SMTPeter is een 'cloud based' e-mail gateway die ervoor zorgt dat je op een makkelijke manier
e-mails kunt versturen. Je kunt kiezen om e-mails naar SMTPeter te versturen via de REST API 
of SMTP API. Om direct te starten met SMTPeter, heb je (naast het registreren) twee dingen 
nodig:
- *Aanmaken van een '**sender domain**'*
- *Aanmaken van een verbinding met de gewenste '**API**'*


## Sender Domain instellen

'Sender domains' vind je in het menu van het SMTPeter dashboard. Klik op ‘Add sender domain’
en volg de stappen. Bij alle stappen staat een uitgebreide omschrijving die je kunt raadplegen 
om het een en ander duidelijk te krijgen. Maak je geen zorgen om klik- en afbeeldingdomeinen 
of DMARC deployment. Deze kun je later allemaal aanpassen in het configuratiescherm. 
Het opzetten van 'sender domains' is gemakkelijk aangezien SMTPeter alles overneemt. 
Echter, het is wel belangrijk dat je alle stappen daadwerkelijk uitvoert omdat SMTPeter 
anders niet werkt. Deze stappen worden in z'n totaliteit uitgelegd op [deze](sender-domains)
pagina.


## REST vs SMTP

SMTPeter maakt het mogelijk om e-mails te versuren via de REST API en
en de SMTP API. We raden je sterk aan om, als je de keuze hebt, te gaan voor de 
REST API. Deze API geeft je zoveel meer opties, vrijheid en gebruiksgemak. 
Denk bijvoorbeeld aan de complexe en tijdrovende SMTP handshake die gedaan 
moet worden om e-mails te versturen van de ene naar de andere server.
Bij de REST API is deze overbodig. 


## REST API

Voor het gebruik van de REST API heb je een zogeheten 'access token' nodig. Deze kun je
eenvoudig genereren in het SMTPeter 'dashboard' onder het kopje 'REST API'.
Vervolgens kun je gebruik maken van alle toepassingen door middel van de onderstaande URL:

```text
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
