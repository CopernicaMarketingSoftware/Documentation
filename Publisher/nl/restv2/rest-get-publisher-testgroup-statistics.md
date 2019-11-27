# REST API: GET testgroup statistics (Publisher)

Je kunt de statistieken van een testgroep van een Publisher mailing opvragen door een HTTP GET request 
te sturen naar de volgende URL:

`https://api.copernica.com/v2/publisher/testgroup/$id/statistics?access_token=xxxx`

Hier moet `$id` vervangen worden door de ID van de testgroep.

## Beschikbare parameters

* **begintime**: Start datum (en tijd) voor de statistieken (YYYY-MM-DD HH:MM:SS formaat).
* **endtime**: Eind datum (en tijd) voor de statistieken (YYYY-MM-DD HH:MM:SS formaat).

## Teruggegeven velden

De teruggegeven waarde is een JSON object met de volgende velden:

* **abuses**: Array met het aantal totale ('total') en unieke ('unique') abuses.
* **clicks**: Array met het aantal totale ('total') en unieke ('unique') clicks.
* **errors**: Array met het aantal totale ('total') en unieke ('unique') errors.
* **impressions**: Array met het aantal totale ('total') en unieke ('unique') impressions.
* **unknown**: Array met het totale ('total') aantal onbekende statistieken.
* **unsubscribes**: Array met het aantal totale ('total') en unieke ('unique') unsubscribes.

### JSON voorbeeld

De JSON voor de statistieken ziet er bijvoorbeeld zo uit:

```json
{  
   "clicks":{  
      "total":"3",
      "unique":"2"
   },
   "impressions":{  
      "total":"5",
      "unique":"5"
   },
   "errors":{  
      "total":"0",
      "unique":"0"
   },
   "unsubscribes":{  
      "total":"1",
      "unique":"1"
   },
   "abuses":{  
      "total":"0",
      "unique":"0"
   },
   "unknown":{  
      "total":"1"
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
print_r($api->get("publisher/testgroup/{$testgroupID}/statistics"));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php).

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Opvragen van een testgroep](./rest-get-publisher-testgroup)
* [Opvragen van alle testgroepen voor een Publisher mailing](./rest-get-publisher-emailing-testgroups)

