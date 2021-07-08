# REST API: DELETE document (Publisher)

Het verwijderen van een document kan gedaan worden door een HTTP DELETE verzoek te sturen naar de volgende URL:

`https://api.copernica.com/v2/publisher/document/$id?access_token=xxxx`

De `$id` hier moet vervangen worden door de id van het document dat je wilt verwijderen.

## Voorbeeld in PHP

Het volgende voorbeeld demonstreert hoe je gebruik maakt van deze methode met de API:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// voer het verzoek uit
$api->delete("publisher/document/{$documentID}");
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle REST API calls](rest-api)
