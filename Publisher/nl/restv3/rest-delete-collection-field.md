# REST API: DELETE collection field

Deze methode verwijdert een veld uit een collectie. De methode kan aangeroepen worden met een HTTP DELETE verzoek aan de volgende URL:

`https://api.copernica.com/v3/collection/$id/field/$id?access_token=xxxx`

De eerste `$id` moet vervangen worden door de numerieke identifier van de collectie. 
De tweede `$id` moet vervangen worden door de ID of de naam van het veld dat je wilt verwijderen.

## Voorbeeld in PHP
Het volgende voorbeeld demonstreert hoe je deze methode kunt gebruiken met de API:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// voer de methode uit
$api->delete("collection/{$collectieID}/field/{$veldID}");
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

- [Overzicht van alle API calls](rest-api)
- [Alle velden van een collectie opvragen](rest-get-collection-fields)
- [Nieuw veld in een collectie aanmaken](rest-post-collection-fields)
- [Veld in een collectie aanpassen](rest-put-collection-fields)

