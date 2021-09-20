# REST API: PUT senderdomain

Deze methode wordt gebruikt om een bestaande senderdomain bij te werken met de REST API. Door een HTTP PUT verzoek te sturen naar de volgende URL kun je de senderdomain bijwerken.

`https://api.copernica.com/v3/senderdomain/$id?access_token=xxxx`

Hier moet `$id` vervangen worden door het ID van de senderdomain.

## Beschikbare parameters

| Naam              | Beschrijving                                                                          |
|-------------------|---------------------------------------------------------------------------------------|
| **tracking**      | (optioneel) Het domein waarop de impressies van de mailings geregistreerd kunnen worden.          |
| **bounce**        | (optioneel) Het domein waarop de bounces van de mailings geregistreerd kunnen worden.             |

## PHP voorbeeld

Het onderstaande script demonstreert hoe je deze API methode gebruikt. Vergeet niet de ID in de URL te vervangen voor je het verzoek uitvoert.

```php
// vereiste script
require_once("copernica_rest_api.php");

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// data
$data = array(
    'tracking' => 'tracking.mysenderdomain.com',
    'bounce' => 'bounces.mysenderdomain.com'
);

// voer het verzoek uit
$api->put("senderdomain/{$id}", $data);
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie 

- [GET senderdomain](rest-get-senderdomain)
- [PUT senderdomain](rest-put-senderdomain)
- [POST senderdomains](rest-post-senderdomains)
- [Overzicht van alle REST API calls](rest-api)
