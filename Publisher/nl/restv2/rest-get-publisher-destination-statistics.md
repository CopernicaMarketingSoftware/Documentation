# REST API: GET statistics (Publisher destination)

Je kunt de statistieken van een Publisher destination opvragen door een HTTP GET request 
te sturen naar de volgende URL:

`https://api.copernica.com/v2/publisher/destination/$id/statistics?access_token=xxxx`

Hier moet `$id` vervangen worden door de ID van de destination.

## Teruggegeven waarde

### Velden

Het JSON object bevat de volgende velden:

* **ID**: ID van de destination
* **abuses**: Array met het veld 'total' voor het aantal abuses.
* **clicks**: Array met het veld 'total' voor het aantal clicks.
* **deliveries**: Array met het veld 'total' voor het aantal deliveries.
* **errors**: Array met het veld 'total' voor het aantal errors.
* **impressions**: Array met het veld 'total' voor het aantal impressions.
* **retries**: Array met het veld 'total' voor het aantal retries.
* **unsubscribes**: Array met het veld 'total' voor het aantal unsubscribes.

### Voorbeeld

Hieronder vind je een voorbeeld van zo'n JSON object:

```json
{  
   "ID":"893915",
   "abuses":{  
      "total":4
   },
   "clicks":{  
      "total":4
   },
   "deliveries":{  
      "total":5
   },
   "errors":{  
      "total":4
   },
   "impressions":{  
      "total":1
   },
   "retries":{  
      "total":4
   },
   "unsubscribes":{  
      "total":0
   }
}
```

## PHP voorbeeld

Het volgende script demonstreert hoe je deze API methode kunt gebruiken:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// voer het verzoek uit
print_r($api->get("publisher/destination/{$destinationID}/statistics/"));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php).

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Opvragen van een Publisher destination](./rest-get-publisher-destination)

