# REST API: DELETE database field

Als je een HTTP DELETE request stuurt naar de volgende URL, verwijder je een 
veld uit een database:

`https://api.copernica.com/v2/database/$id/field/$id?access_token=xxxx`

De eerste `$id` variabele moet je vervangen door de numerieke identifier of de naam
van de database. De tweede `$id` moet vervangen worden door het ID of de naam van het veld dat je wilt
verwijderen.

## Voorbeeld in PHP

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// voer het verzoek uit
$api->delete("database/{$databaseID}/field/{$veldID}");
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Alle velden van een database opvragen](rest-get-database-fields)
* [Nieuw veld aanmaken](rest-post-database-fields)
* [Veld aanpassen](rest-put-database-fields)

