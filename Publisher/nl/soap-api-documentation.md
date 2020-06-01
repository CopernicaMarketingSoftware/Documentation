# SOAP API
Ben je een nieuwe gebruiker op zoek naar informatie over de API mogelijkheden 
van Copernica? Wij raden aan om de [REST API v2](./restv2/rest-api.md "REST-API") 
te gebruiken die sneller is en makkelijker te implementeren.

## Over de API
De API van Copernica maakt gebruik van de SOAP-standaard. SOAP staat voor 
Simple Object Access Protocol. Dit is een XML gebaseerde protocol die 
communicatie mogelijk maakt tussen applicaties via HTTP ongeacht besturingssystemen, 
technologieën of programmeertalen die je gebruikt.

#### Volledige controle dankzij Copernica object model
De SOAP API maakt gebruik van een logisch en gestructureerd objectmodel. 
Alle gegevens in de software worden door objecten gerepresenteerd. Lees 
de eigenschappen van deze objecten uit met behulp van de SOAP API en werk 
ze bij. 

#### Krachtig callback-systeem
Je hoeft niet zelf telkens de API aan te roepen om erachter te komen welke 
data je moet synchroniseren. Om het synchroniseren van data tussen Copernica 
en jouw applicatie makkelijker te maken, worden er twee callback-mechanismen 
aangeboden. De Publisher faciliteert een systeem genaamd Callbacks. 
De Marketing Suite gebruikt de opvolger hiervan genaamd [webHooks](./webhooks.md).
Copernica gebruikt deze mechanismen om je applicatie op de hoogte brengen 
van verschillende activiteiten zoals het aanmaken, aanpassen en verwijderen
van profielen. Dit zijn maar voorbeelden, je stelt zelf je callback of webHook 
in.

## API-authenticatie
Om toegang te krijgen tot de SOAP API moet je een valide `access_token` meegeven
elke keer dat je de API aanroept. [Meer informatie over API-authenticatie](./soap-api-authentication.md "SOAP API-authenticatie").

#### Verouderd: login-methode
Gebruikt jouw applicatie nog steeds de oude [login](https://www.copernica.com/nl/support/apireference/login) methode
om toegang te krijgen tot de API? Lees de [upgrade-instructies](./soap-api-upgrade-login.md "Upgrade SOAP login") 
om erachter te komen hoe jouw applicatie aangepast moet worden.

## API methodes
Alle functionaliteiten van de Publisher zijn beschikbaar via de SOAP API. 
Elk object is opgebouwd uit kleinere deelobjecten. Zo is een object dat 
een database representeert bijvoorbeeld opgebouwd uit objecten die de 
profielen representeren. Een object dat een template omvat, heeft een 
methode waarmee je alle documenten opvraagt die op basis van dit template 
zijn aangemaakt. Naar overzicht van [SOAP API methodes](https://www.copernica.com/nl/support/apireference "SOAP API methodes")

## Voorbeelden
**Waarschuwing:** de soap client in voorbeeldscript versie 1.6 (of ouder) 
zal in de nabije toekomst niet meer werken. Gebruik daarom versie 2 (of nieuwer)
om te garanderen dat jouw applicatie blijft werken wanneer de oude [login](https://www.copernica.com/nl/support/apireference/login) methode
niet meer wordt ondersteund. Lees voor meer informatie de [upgrade-instructies](./soap-api-upgrade-login.md "Upgrade SOAP login")

#### versie 2
- [PHP script](../downloads/soaptest_php_2-0.zip "SOAP API example script for PHP")

#### versie 1.6
- [PHP script](../downloads/soaptest_php_1-6.zip "SOAP API example script for PHP")
- [Java script](../downloads/soaptest_java.zip "SOAP API example script for Java")
- [C\# script](../downloads/soaptest_cs.zip "SOAP API example script for C#")
