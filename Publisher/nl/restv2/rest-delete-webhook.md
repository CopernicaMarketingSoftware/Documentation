# REST API: DELETE webhook

Deze methode wordt gebruikt om een bestaande webhook te verwijderen met de REST API. Door een HTTP DELETE verzoek te sturen naar de volgende URL kun je de webhook verwijderen.

`https://api.copernica.com/v2/webhook/$id?access_token=xxxx`

Hier moet `$id` vervangen worden door het ID van de webhook.

## PHP voorbeeld

Het onderstaande script demonstreert hoe je deze API methode gebruikt. Vergeet niet de ID in de URL te vervangen voor je het verzoek uitvoert.

```php
// vereiste scripts
require_once("copernica_rest_api.php");

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// voer het verzoek uit
$api->delete("webhook/{$id}");
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie 

- [Overzicht van alle REST API calls](rest-api)
