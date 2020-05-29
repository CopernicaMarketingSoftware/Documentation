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
De API van maakt gebruik van een logisch en gestructureerd objectmodel. 
Alle gegevens in de software worden door objecten gerepresenteerd. Lees 
de eigenschappen van deze objecten uit met behulp van de SOAP API en werk 
ze bij. 

#### Krachtig callback-systeem
Je hoeft niet zelf telkens de API aan te roepen om erachter te komen welke 
data je moet synchroniseren. Om het synchroniseren van data tussen Copernica 
en jouw applicatie makkelijker te maken, worden er twee callback-mechanismen 
aangeboden. De Publisher Marketing Software faciliteert een systeem genaamd Callbacks. 
De Marketing Suite gebruikt de opvolger hiervan genaamd [webHooks](./webhooks.md).
Copernica gebruikt deze mechanismen om je applicatie op de hoogte brengen 
van verschillende activiteiten zoals het aanmaken, aanpassen en verwijderen
van profielen. Dit zijn maar voorbeelden, je stelt zelf je callback of webHook 
in.

## API-authenticatie
Om toegang te krijgen tot de SOAP API moet je een valide `access_token` meegeven
elke keer dat je de API aanroept. Lees hoe je aan een `access_token` komt en hoe 
de [API-authenticatie](./soap-api-authentication.md "Toegang krijgen tot de SOAP API") werkt.

#### Verouderd: login methode
Gebruikt jouw applicatie nog steeds de oude [login](https://www.copernica.com/nl/support/apireference/login) methode
om toegang te krijgen tot de API? Lees de [upgrade instructies](./soap-api-upgrade-login.md "Upgrade SOAP login") 
om erachter te komen hoe jouw applicatie aangepast moet worden.

## API Methodes
Alle functionaliteiten van de Publisher Marketing Software zijn beschikbaar 
via de SOAP API. Elk object is opgebouwd uit kleinere deelobjecten. Zo is 
een object dat een database representeert bijvoorbeeld opgebouwd uit objecten 
die de profielen representeren. Een object dat een template omvat, heeft een 
methode waarmee je alle documenten opvraagt die op basis van dit template 
zijn aangemaakt. Overzicht [SOAP API methodes](https://www.copernica.com/nl/support/apireference "SOAP API methodes")

## Voorbeeld downloaden
**Waarschuwing:** de soap client in voorbeeldscript versie 1.5 (of ouder) 
zal in de nabije toekomst niet meer werken. Gebruik daarom versie 1.6 (of nieuwer)
om te garanderen dat jouw applicatie blijft werken wanneer de oude [login](https://www.copernica.com/en/support/apireference/login) methode
niet meer ondersteunt wordt. [Lees upgrade instructies](./soap-api-upgrade-login.md "Upgrade SOAP login")

#### versie 1.6
- Binnenkort beschikbaar

#### versie 1.5
- [PHP example](../downloads/soaptest_php_1-5.zip "SOAP API example script for PHP")
- [Java example](../downloads/soaptest_java.zip "SOAP API example script for Java")
- [C\# example](../downloads/soaptest_cs.zip "SOAP API example script for C#")
