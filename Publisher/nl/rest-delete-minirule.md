# REST API: DELETE minirule

Een minirule kan verwijderd worden door een HTTP DELETE verzoek te sturen naar de volgende URL:

`https://api.copernica.com/v1/minirule/$id?access_token=xxxx`

De `$id` moet vervangen worden door de ID van de miniregel die je wilt verwijderen.


## Voorbeeld in PHP

Het volgende voorbeeld demonstreert hoe je deze methode uitvoert in php:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestApi("your-access-token");

// voer het verzoek uit
$api->delete("minirule/id");
```

Dit voorbeeld vereist de [REST API class](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [DELETE database field](rest-delete-database-field)
* [GET minirule](rest-get-minirule)
* [PUT minirule](rest-put-minirule)
