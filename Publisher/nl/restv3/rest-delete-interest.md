# REST API: DELETE interest

Een interesse kan verwijderd worden door een HTTP DELETE verzoek te sturen naar de volgende URL:

`https://api.copernica.com/v3/interest/$id?access_token=xxxx`

De `$id` moet vervangen worden door de ID van de interesse die je wilt verwijderen.

## Voorbeeld in PHP

Het volgende voorbeeld demonstreert hoe je deze methode uitvoert in php:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// voer het verzoek uit
$api->delete("interest/{$interestID}");
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)

