# REST API: DELETE condition

Een conditie kan verwijderd worden door een HTTP DELETE verzoek te sturen naar de volgende URL:

`https://api.copernica.com/v4/condition/$type/$id`

De `$type` en `$id` moeten vervangen worden door het type en de ID van de 
conditie respectievelijk.

## Voorbeeld in PHP

Het volgende voorbeeld demonstreert hoe je deze methode uitvoert in php:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 4);

// voer het verzoek uit
$api->delete("condition/{$conditieType}/{$conditieID}");
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)

