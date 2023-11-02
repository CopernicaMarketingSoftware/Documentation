# REST API: PUT webhook

Deze methode wordt gebruikt om een bestaande webhook bij te werken met de REST API. Door een HTTP PUT verzoek te sturen naar de volgende URL kun je de webhook bijwerken.

`https://api.copernica.com/v4/webhook/$id`

Hier moet `$id` vervangen worden door het ID van de webhook.

## Beschikbare parameters

| Paramters         | Beschrijving                                                                          |
|-------------------|---------------------------------------------------------------------------------------|
| **handler**       | De URL waarop de webhook wordt uitgevoerd                                             |
| **trigger**       | De aanleiding waardoor de webhook wordt uitgevoerd                                    |
| **callers**       | Array met types (ms / publisher) waardoor de webhook wordt aangeroepen. Deze parameter is optioneel. Als deze niet is gespecificeerd wordt de call door beide types uitgevoerd                             |

Trigger kan de volgende waardes hebben
* **create**: profiel aangemaakt
* **update**: profiel aangepast
* **delete**: profiel verwijderd
* **click**: kliks
* **delivery**: afgeleverde berichten
* **open**: impressies
* **bounce**: bounces
* **failure**: fouten

## Voorbeeld in JSON

De volgende JSON demonstreert hoe je de API methode kunt gebruiken:

```json
{  
   "handler":"https://my-webhook-url.com",
   "trigger":"create",
   "callers":["ms", "publisher"]
}
```

## Voorbeeld in PHP

Het onderstaande PHP script demonstreert hoe je deze API methode gebruikt. Vergeet niet de ID in de URL te vervangen voor je het verzoek uitvoert.

```php
// vereiste scripts
require_once("copernica_rest_api.php");

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 4);

// voer het verzoek uit
$api->put("webhook/{$id}");
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie 

- [Overzicht van alle REST API calls](rest-api)
