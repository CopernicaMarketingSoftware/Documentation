# SOAP API login upgrade-instructies
Copernica heeft in mei 2020 een nieuw systeem uitgerold om toegang te 
verschaffen tot de SOAP API. Externe applicaties dienen een `access_token` te 
gebruiken om toegang te krijgen tot de API. Heb je een applicatie draaien
die nog gebruik maakt van de oude [login](https://www.copernica.com/nl/support/apireference/login) methode?
Volg zo snel mogelijk de de onderstaande stappen!

## Wat is een access token?
Een `access_token` is een unieke code gekoppeld aan een applicatie. Een 
token geeft toegang tot een specifiek account binnen Copernica. Je kunt 
je tokens beheren in de [API-toegang](https://www.copernica.com/nl/api) dashboard.

## Upgrade-instructies
**Gebruik je de (voorbeeld) SOAP client gefaciliteerd door Copernica?**
1. Maak een nieuw applicatie en token aan in je [API-toegang](https://www.copernica.com/nl/api) dashboard. Je kan meerdere tokens koppelen aan één applicatie of één token per applicatie. Er worden geen kosten in rekening gebracht voor aantal applicaties en/of tokens. 
2. Upgrade je SOAP client naar [versie 1.6](./soap-api-documentation#download-example).
3. Vul de `access_token` in je soap client.
4. That's it!

**Gebruik je een andere SOAP client?**
1. Maak een nieuw applicatie en token aan in je [API-toegang](https://www.copernica.com/nl/api) dashboard. Je kan meerdere tokens koppelen aan één applicatie of één token per applicatie. Er worden geen kosten in rekening gebracht voor aantal applicaties en/of tokens. 
2. Roep het verouderde [login](https://www.copernica.com/nl/support/apireference/login) methode niet meer aan.
3. Wijzig je SOAP client om altijd een valide `access_token` mee te sturen elke keer dat de SOAP API aangeroepen wordt. 
4. That's it!

[Terug naar overzicht](./soap-api-documentation)
