# Webhook beveiliging
Webhooks staan meestal open voor de wereld, dit betekent dat iedereen met de URL toegang heeft. Een https-endpoint alleen is helaas niet voldoende, de verbinding mag dan wel beveiligd zijn maar het is nog steeds onduidelijk van wie het bericht afkomstig is. Om deze reden maakt Copernica gebruik van zogeheten signature, door middel van deze signature kunnen berichten geverifieerd worden door onder andere te bepalen of een request afkomstig is van één van onze services.

## headers

### Digest
De `Digest` wordt toegevoegd aan de hand van de [RFC 3230](https://tools.ietf.org/html/rfc3230#section-4.3.2). Dit kan worden gebruikt om de integriteit van berichten te controleren.

### X-Copernica-ID
De `X-Copernica-ID` is de id van je Copernica account. De header bevat de gegevens in de vorm van `X-Copernica-ID: account_<id>`.

### Signature
De headers worden ondertekend door middel van een gestandaardiseerde methode, kijk [hier](https://tools.ietf.org/html/draft-cavage-http-signatures-10) voor meer informatie over deze methode.

De `keyId` header bevat een URL die verwijst naar een geldig [DKIM](./dkim)-record. Om de veiligheid te waarborgen, worden deze sleutels elke maand automatisch gegenereerd.

Als extra beveiligingsmaatregel moeten de headers in de signature ten minste de volgende velden bevatten:
*   (request-target):    De URL waarna deze request verwijst (bijv. /path/to/your/script.php) 
*   Host:                De hostnaam van je server
*   Date:                De datum waarop dit verzoek is gemaakt
*   X-Copernica-ID:      Je Copernica account id
*   Digest:              De berichtsamenvatting

## Checklist
De headers zelf zijn niet voldoende om de berichtbeveiliging te controleren. Om de verbinding volledig veilig te maken, doorloopt je alle stappen in de volgende lijst.

*   Date:        Is recent?
*   Host:        Verwijst naar de juiste host?
*   Digest:      Komt overeen met de inhoud?
*   Signature:   Is correct?
*   Signature:   Bevat ten minste de aanbevolen headers?
*   Signature:   De header `keyId` verwijst naar een `copernica.com` subdomein?

## Voorbeeld
Om je op weg te helpen heeft Copernica een PHP library ontwikkeld die gebruikt kan worden voor het verifiëren van een signature. Kijk op onze [Github](https://github.com/CopernicaMarketingSoftware/http-signatures-php) voor een voorbeeld implementatie.

## Meer informatie
*   [Callbacks](./callbacks)
