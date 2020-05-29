# SOAP API authenticatie
Copernica heeft in mei 2020 een nieuw systeem uitgerold om toegang te 
verschaffen tot de API. Externe applicaties dienen een `access_token` te 
gebruiken om toegang te krijgen tot de API. Heb je een applicatie draaien
die nog gebruik maakt van de oude [login](https://www.copernica.com/nl/support/apireference/login) methode?
Volg zo snel mogelijk de [upgrade-instructies](./soap-api-upgrade-login).

## API applicatie
Externe applicaties en websites die toegang nodig hebben tot de API, dien je
als applicatie binnen Copernica te registreren.Tokens worden gegroepeerd 
per applicatie. De REST API gebruikt de applicaties voor het OAuth-protocol.
Voor de SOAP API gebruik je applicaties alleen om tokens te genereren.

## Access tokens
Een `access_token` is een unieke code gekoppeld aan een API applicatie.
Een token geeft toegang tot een specifiek account binnen Copernica. Je kunt 
je tokens beheren in de [API-toegang](https://www.copernica.com/nl/api) dashboard 

## Toegangsrechten
Bij het aanmaken van een nieuwe token kan je toegangsrechten instellen. 
Tokens kunnen lees-, schrijf- of lees- en schrijfrechten krijgen. 

## IP-restrictie
Om je applicatie veiliger te maken kan je een IP-restrictie instellen op 
een `access_token`. Hierdoor werkt de token alleen vanaf bepaalde IP-adressen. 

[Terug naar overzicht](./soap-api-documentation)
