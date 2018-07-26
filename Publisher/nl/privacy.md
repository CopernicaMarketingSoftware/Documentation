# Privacy

Privacy is een belangrijk onderwerp in de digitale wereld waar we in leven, 
omdat iedereen afhankelijk is van technologie die elke dag meer informatie 
over ons verzamelt. Hoe de data van je klanten beheerd wordt is belangrijk 
voor de betrouwbaarheid van jouw bedrijf, dus Copernica wil dit zo gemakkelijk 
mogelijk voor je maken.

## GDPR/AVG

De GDPR (General Data Protection Regulation), ook wel AVG (Algemene Verordening Gegevensbescherming) 
geheten in het Nederlands, beschermt de data van de staatsburgers van de 
Europese Unie. Mensen hebben het recht om te weten welke persoonlijke 
gegevens van hen opgeslagen worden en moeten deze kunnen corrigeren. 
Daarnaast moet alle data opgeslagen door organisaties relevant zijn voor het 
doel van deze organisatie en moet de data ook binnen redelijke tijd verwijderd 
worden wanneer deze niet relevant meer is. Als klant van Copernica moet je 
uiteraard aan deze regulaties voldoen.

## Persoonlijke data opvragen 

In de Marketing Suite vind je onder **Configuration** een GDPR kopje waar 
je de data voor een (sub)profiel of e-mailadres op kunt vragen. Je kunt 
deze data ook opvragen via onze [REST API](./rest-api).

### Persoonlijke data opvragen met de REST API

Copernica's [REST API](./rest-api) biedt de optie om alle informatie opgeslagen 
over een e-mailadres, profiel of subprofiel op te vragen. Om de data op te 
vragen dien je eerst een verzoek in voor een (sub)profiel of e-mailadres. 
Je kunt de data laten versturen in een e-mail of met een POST call naar 
een webadres. Kies je daar echter niet voor dan kun je de status van de 
data en de data zelf opvragen met aparte calls. Je vindt alle gerelateerde 
calls hieronder:

* [Data verzoek voor een e-mailadres](./rest-post-email-datarequest)
* [Data verzoek voor een profiel](./rest-post-profile-datarequest)
* [Data verzoek voor een subprofiel](./rest-post-subprofile-datarequest)
* [Data van een dataverzoek](./rest-get-datarequest-data)
* [Status van een dataverzoek](./rest-get-datarequest-status)

## Meer informatie

Heb je meer informatie nodig over hoe je data op kunt slaan bij Copernica 
of wil je weten hoe onze API werkt? De artikelen hieronder helpen je op weg.

* [Database management](./database-introduction)
* [REST API introductie](./rest-introduction)
