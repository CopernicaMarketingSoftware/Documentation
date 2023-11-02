# REST API: GET data request status

Om de status van je dataverzoek op te vragen kun je een HTTP GET request 
sturen naar de volgende URL:

`https://api.copernica.com/v3/datarequest/$id/status?access_token=xxxx`

De code `$id` moet hier vervangen worden door de ID van het relevante dataverzoek.

## Resultaat

Een JSON met informatie over de status van jouw dataverzoek. Deze JSON bevat
altijd de member **status**. Status kan de volgende waardes hebben: "available", "pending" of
"not available". Als de status "available" is, dan zijn de data beschikbaar om
te downloaden. Als de status "pending" is, dan zijn wij nog bezig om data toe
te voegen. Als de status "not available" is, dan is er geen status beschikbaar.
Mogelijk is er een fout ID ingevoerd. De JSON kan ook een member **available**
bevatten. Deze member geeft aan hoe groot de data (reeds) is in bytes.
De JSON kan ook de waarde **content-type** bevatten. Momenteel is de enige
waarde die deze member kan hebben application/json.

Voorbeeld:
```json
{
    "status" : "available"|"pending"|"not available",
    "available" : 1234,
    "content-type" : "application/json"
}
```

## PHP voorbeeld

```php
// required scripts
require_once('copernica_rest_api.php');

// insert your access token here
$api = new CopernicaRestAPI("your-access-token", 3);

// get the status of the data request (don't forget the id)
$api->get("datarequest/{$verzoekID}/status")
```
Dit voorbeeld vereist de [REST API klasse](./rest-php).

## Meer informatie

* [Alle REST calls](./rest-api)
* [Een dataverzoek voor een profiel indienen ](./rest-post-profile-datarequest)
* [Een dataverzoek voor een subprofiel indienen ](./rest-post-subprofile-datarequest)
* [Een dataverzoek voor een e-mailadres indienen](./rest-post-email-datarequest)
* [Data voor een data verzoek downloaden](./rest-get-datarequest-data)
* [Privacy](./privacy)
