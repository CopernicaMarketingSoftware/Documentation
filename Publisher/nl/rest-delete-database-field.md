# REST API: DELETE database field

Als je een HTTP DELETE request stuurt naar de volgende URL, verwijder je een 
veld uit een database:

`https://api.copernica.com/v1/database/$id/field/$id?access_token=xxxx`

De eerste `$id` variabele moet je vervangen door de numerieke identifier of de naam
van de database, en de tweede door het ID of de naam van het veld dat je wilt
verwijderen.

## Voorbeeld in PHP

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestApi("your-access-token");

// voer het verzoek uit
$api->delete("database/id/field/id");
```

Dit voorbeeld vereist de [REST API class](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [GET database velden](rest-get-database-fields)
* [POST database veld](rest-post-database-fields)

