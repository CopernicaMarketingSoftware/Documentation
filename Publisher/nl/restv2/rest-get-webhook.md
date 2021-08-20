# REST API: GET webhook

Deze methode wordt gebruikt om een bestaande webhook op te halen met de REST API. Je doet dit door een HTTP GET verzoek te sturen naar de volgende URL. 

`https://api.copernica.com/v2/webhook/$id?access_token=xxxx`

Hier moet `$id` vervangen worden door het ID van de webhook.

## Teruggegeven velden

Deze methode geeft een JSON object terug dat de volgende data bevat:

| Paramters         | Beschrijving                                                                          |
|-------------------|---------------------------------------------------------------------------------------|
| **ID**            | Uniek ID van de webhook                                                               |
| **handler**       | De URL waarop de webhook wordt uitgevoerd                                             |
| **trigger**       | De aanleiding waardoor de webhook wordt uitgevoerd                                    |
| **callers**       | Array met types (ms / publisher) waardoor de webhook wordt aangeroepen. Deze parameter is optioneel. Als deze niet is gespecificeerd wordt de call door beide types uitgevoerd                            |

### JSON voorbeeld

De JSON ziet er bijvoorbeeld zo uit:

```json
{  
   "ID":"1894",
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

// voer het verzoek uit
$api->get("webhook/{$id}");
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie 

- [Overzicht van alle REST API calls](rest-api)
