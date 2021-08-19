# REST API: POST webhooks

Deze methode wordt gebruikt om een nieuwe webhook in te stellen met de REST API. Door een POST GET verzoek te sturen naar de volgende URL de webhook aanmaken.

`https://api.copernica.com/v2/webhooks?access_token=xxxx`

## Beschikbare parameters

| Parameter         | Beschrijving                                                                          |
|-------------------|---------------------------------------------------------------------------------------|
| **handler**       | De URL waarop de webhook wordt uitgevoerd                                             |
| **trigger**       | De aanleiding waardoor de webhook wordt uitgevoerd                                    |
| **callers**       | Array met types (ms / publisher) waardoor de webhook wordt aangeroepen. Deze parameter is optioneel. Als deze niet is gespecificeerd wordt de call door beide types uitgevoerd                             |
| **database**      | Optioneel: het ID van de database waarop de webhook wordt gelimiteerd                 |
| **collection**    | Optioneel: het ID van de collectie waarop de webhook wordt gelimiteerd                |

### JSON voorbeeld

De JSON ziet er bijvoorbeeld zo uit:

```json
{  
   "handler":"https://my-webhook-url.com",
   "trigger":"create",
   "callers":["ms", "publisher"]
}
```

## PHP voorbeeld

Het onderstaande script demonstreert hoe je deze API methode gebruikt. Vergeet niet de ID in de URL te vervangen voor je het verzoek uitvoert.

```php
// vereiste scripts
require_once("copernica_rest_api.php");

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

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
