# REST API: DELETE senderdomain

Deze methode wordt gebruikt om een bestaande senderdomain te verwijderen met de REST API. Je doet dit door een HTTP DELETE verzoek te sturen naar de volgende URL. 

`https://api.copernica.com/v3/senderdomain/$id?access_token=xxxx`

Hier moet `$id` vervangen worden door het ID van de senderdomain.

## PHP voorbeeld

Het onderstaande script demonstreert hoe je deze API methode gebruikt. Vergeet niet de ID in de URL te vervangen voor je het verzoek uitvoert.

```php
// vereiste script
require_once("copernica_rest_api.php");

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// voer het verzoek uit
$api->delete("senderdomain/{$id}");
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie 

- [GET senderdomain](rest-get-senderdomain)
- [PUT senderdomain](rest-put-senderdomain)
- [POST senderdomains](rest-post-senderdomains)
- [Overzicht van alle REST API calls](rest-api)
