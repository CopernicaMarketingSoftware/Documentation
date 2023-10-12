# REST API: POST webhooks

Deze methode wordt gebruikt om een webhook aan te maken met de REST API. Je doet dit door een HTTP POST verzoek te sturen naar de volgende URL.

`https://api.copernica.com/v3/webhooks?access_token=xxxx`

## Beschikbare parameters

| Parameter         | Beschrijving                                                                          |
|-------------------|---------------------------------------------------------------------------------------|
| **handler**       | De URL waarop de webhook wordt uitgevoerd                                             |
| **trigger**       | De aanleiding waardoor de webhook wordt uitgevoerd                                    |
| **callers**       | Array met types (ms / publisher) waardoor de webhook wordt aangeroepen. Deze parameter is optioneel. Als deze niet is gespecificeerd wordt de call door beide types uitgevoerd                             |
| **database**      | Optioneel: het ID van de database waarop de webhook wordt gelimiteerd                 |
| **collection**    | Optioneel: het ID van de collectie waarop de webhook wordt gelimiteerd                |

## Voorbeeld in JSON
De volgende JSON demonstreert hoe je de API methode kunt gebruiken:

```json
{  
   "handler":"https://my-webhook-url.com",
   "trigger":"create",
   "callers":["ms", "publisher"],
   "database":1017
}
```

## Voorbeeld in PHP

Het onderstaande script demonstreert hoe je deze API methode gebruikt. Vergeet niet de ID in de URL te vervangen voor je het verzoek uitvoert.

```php
// vereiste scripts
require_once("copernica_rest_api.php");

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// data
$data = array(
    'handler'   =>  'https://my-webhook-url.com',
    'trigger'   =>  'create',
    'callers'   =>  array('publisher','ms'),
    'database'  =>  1017
);

// voer het verzoek uit
$api->post("webhooks/{$id}");
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie 

- [Overzicht van alle REST API calls](rest-api)
