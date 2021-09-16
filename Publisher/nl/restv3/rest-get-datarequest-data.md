# REST API: GET data request data

De data van een data verzoek kun je opvragen door een HTTP GET request 
sturen naar de volgende URL:

`https://api.copernica.com/v3/datarequest/$id/data?access_token=xxxx`

Waar **$id** de ID van van het betreffende dataverzoek is. Je kan eerst 
controleren of de data wel beschikbaar zijn via de 
[data request status](/rest-get-datarequest-status).

## Teruggegeven velden

Een bestand met een JSON waarin alle informatie staat. De JSON heeft twee members 
**info** en **data**. De info member heeft ook twee members:
**type** en **id**. Het type geeft aan van wat voor type verzoek de data afkomstig
zijn. Dit kan een **email**, **profile** of **subprofile** zijn. ID geeft het e-mailadres,
of (sub)profiel ID. De data member in de JSON bestaat uit een array van
arrays met daarin alle informatie die wij gevonden hebben. Voorbeelden
van deze data zijn:

- Complete MIMEs die verstuurd zijn
- Informatie over opens en clicks,
- Ingevulde enquêtes
- etc.

Als de data nog niet beschikbaar zijn wordt een 404 geretourneerd.

## PHP voorbeeld

```php
// required scripts
require_once('copernica_rest_api.php');

// insert your access token here
$api = new CopernicaRestAPI("your-access-token", 2);

// get the status of the data request
$api->get("datarequest/{$verzoekID}/data")
```
Dit voorbeeld vereist de [REST API klasse](./rest-php).

## Meer informatie

* [Alle REST calls](./rest-api)
* [Een dataverzoek voor een profiel indienen ](./rest-post-profile-datarequest)
* [Een dataverzoek voor een subprofiel indienen ](./rest-post-subprofile-datarequest)
* [Een dataverzoek voor een e-mailadres indienen](./rest-post-email-datarequest)
* [De status van een dataverzoek opvragen](./rest-get-datarequest-status)
* [Privacy](./privacy)
