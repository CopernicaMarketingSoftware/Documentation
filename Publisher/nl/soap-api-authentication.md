# SOAP API authentication

Copernica heeft in mei 2020 een nieuw systeem uitgerold om toegang te 
krijgen tot de API, waarmee toegang door middel van een `access_token`
wordt geregeld. Heb je een applicatie die nog gebruik maakt van de oude 
[login](https://www.copernica.com/nl/support/apireference/login) methode?
Volg dan onze [upgrade-instructies](./soap-api-upgrade-login).


## Access tokens

Een `access_token` is een unieke string die je met elke aanroep van de API
meestuurt. Dit token identificeert het account dat je aanroept, maar ook de 
identiteit van de aanroeper (de "applicatie"). Zorg dat je dit
token altijd geheim houdt! De tokens kun je beheren en aanmaken via de
[API-toegang dashboard](https://www.copernica.com/en/api) op copernica.com.
Per token kun je de toegangsrechten (lezen en/of schrijven) instellen, en
je kunt aangeven vanaf welke IP adressen aanroepen zijn toegestaan.

De access-tokens zijn gegroepeerd per applicatie, waarbij een applicatie
staat voor het API script (of de verzameling van scripts) waar de aanroepen
vandaan komen, en de tokens die aan de applicatie zijn gekoppeld, verwijzen
naar de accounts die mogen worden benaderd.

Het applicatie/token-systeem is krachtig en stelt je niet alleen in staat
om je eigen account te benaderen via de SOAP API, maar ook om toegang te
verkrijgen tot de accounts van anderen door middel van [OAuth authenticatie](./restv2/rest-oauth).
De meeste gebruikers van Copernica houden het echter eenvoudig, en registreren
slechts één applicatie met één access-token, alleen voor het eigen account.

[Terug naar overzicht](./soap-api-documentation)
