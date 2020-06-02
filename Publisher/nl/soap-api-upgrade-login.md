# SOAP API login upgrade-instructies
Copernica heeft in mei 2020 een nieuw systeem uitgerold om toegang te 
verschaffen tot de SOAP API. Het oude login/wachtwoord-systeem is hierbij
vervangen door een krachtiger en veiliger systeem met 
[access-tokens](./soap-api-authentication).

## Upgrade-instructies
**Alleen van toepassing als je gebruik maakt van het soapclient PHP script van Copernica**
1. Maak een nieuw applicatie en token aan in je [API-toegang](https://www.copernica.com/nl/api) dashboard. Je kan meerdere tokens koppelen aan één applicatie of één token per applicatie. Er worden hier geen kosten in rekening gebracht. 
2. Upgrade je SOAP client naar [versie 2.0](./soap-api-documentation#download-example).
3. Vul de `access_token` in je soap client.
4. That's it!

**Gebruik je een andere SOAP client?**
1. Maak een nieuw applicatie en token aan in je [API-toegang](https://www.copernica.com/nl/api) dashboard. Je kan meerdere tokens koppelen aan één applicatie of één token per applicatie. Er worden hier geen kosten in rekening gebracht. 
2. Roep het verouderde [login](https://www.copernica.com/nl/support/apireference/login) methode niet meer aan.
3. Wijzig je SOAP client om altijd een valide `access_token` mee te sturen elke keer dat de SOAP API aangeroepen wordt. 
4. That's it!

[Terug naar overzicht](./soap-api-documentation)

