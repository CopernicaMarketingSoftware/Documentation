# Webhook beveiliging
Webhooks zijn meestal toegankelijk voor iedereen die de URL tot beschikking heeft. Door een https-eindpunt toe te voegen kan dit voorkomen worden, maar dit alleen is niet genoeg. Bij het toevoegen van een https-eindpunt is de verbinding namelijk wel beveiligd, maar het is nog steeds onduidelijk van wie een aanvraag afkomstig is. Daarom voegt Copernica een signature toe aan alle aanvragen. Zo kan geverifieerd worden dat een aanvraag afkomstig is van onze services.

## headers

### Digest
De `Digest` wordt toegevoegd aan de hand van de [RFC 3230](https://tools.ietf.org/html/rfc3230#section-4.3.2). Dit kan worden gebruikt om de integriteit van berichten te controleren.

### X-Copernica-ID
De `X-Copernica-ID` is de id van je Copernica account. De header bevat gegevens in de vorm van `X-Copernica-ID: account_<id>`.

### Signature
De headers worden ondertekend door middel van een gestandaardiseerde methode.[Hier](https://tools.ietf.org/html/draft-cavage-http-signatures-10) vind je meer informatie over deze methode.

De `keyId` header bevat een URL die verwijst naar een geldig [DKIM](./dkim)-record. Om de veiligheid te waarborgen, worden deze sleutels elke maand automatisch gegenereerd.

Als extra beveiligingsmaatregel moeten de headers in de signature ten minste de volgende velden bevatten:
*   (request-target):    De URL waarna deze request verwijst (bijv. /path/to/your/script.php) 
*   Host:                De hostnaam van je server
*   Date:                De datum waarop dit verzoek is gemaakt
*   X-Copernica-ID:      Je Copernica account id
*   Digest:              De samenvatting van het bericht

## Checklist
De headers zelf zijn niet voldoende om de beveiliging van het bericht te controleren. Voor een veilige verbinding is het belangrijk dat je alle stappen in deze lijst doorloopt:

*   Date:        Is de datum recent?
*   Host:        Verwijst dit naar de juiste host?
*   Digest:      Komt dit overeen met de inhoud?
*   Signature:   Is het correct?
*   Signature:   Bevat dit ten minste de aanbevolen headers?
*   Signature:   Verwijst de header `keyId` naar een `copernica.com` subdomein?

## Voorbeeld
Om je op weg te helpen heeft Copernica een PHP library ontwikkeld die gebruikt kan worden voor het verifiëren van een signature. Kijk op onze [Github](https://github.com/CopernicaMarketingSoftware/http-signatures-php) voor een voorbeeld van een implementatie.

## Meer informatie
*   [Callbacks](./callbacks)
