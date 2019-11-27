# REST API: GET document statistics (Publisher mailing)

Je kunt de statistieken van een Publisher emailing document opvragen door een HTTP GET request 
te sturen naar de volgende URL:

`https://api.copernica.com/v2/publisher/document/$id/statistics?access_token=xxxx`

Hier moet `$id` vervangen worden door de ID van het emailing document.

## Beschikbare parameters
 
* **begintime**: Start datum (en tijd) voor de statistieken (YYYY-MM-DD HH:MM:SS formaat).
* **endtime**: Eind datum (en tijd) voor de statistieken (YYYY-MM-DD HH:MM:SS formaat).

## Teruggegeven waarde

### Velden

Het JSON object bevat de volgende velden:

* **abuses**: Array met de velden 'total' en 'unique' voor het aantal kliks 
en het aantal unieke abuses respectievelijk.
* **clicks**: Array met de velden 'total' en 'unique' voor het aantal kliks 
en het aantal unieke kliks respectievelijk.
* **errors**: Array met de velden 'total' en 'unique' voor het aantal kliks 
en het aantal unieke errors respectievelijk.
* **impressions**: Array met de velden 'total' en 'unique' voor het aantal impressies 
en het aantal unieke impressies respectievelijk.
* **unsubscribes**: Array met de velden 'total' en 'unique' voor het aantal kliks 
en het aantal unieke unsubscribes respectievelijk.
* **unknown**: Array met het velden 'total' voor de statistieken die niet binnen 
de bovenstaande categorieën vallen.

### Voorbeeld

Hieronder vind je een voorbeeld van zo'n JSON object:

```json
{  
   "clicks":{  
      "total":"53",
      "unique":"14"
   },
   "impressions":{  
      "total":"80",
      "unique":"49"
   },
   "errors":{  
      "total":"2412",
      "unique":"2289"
   },
   "unsubscribes":{  
      "total":"0",
      "unique":"0"
   },
   "abuses":{  
      "total":"0",
      "unique":"0"
   },
   "unknown":{  
      "total":"22"
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
print_r($api->get("publisher/document/{$documentID}/statistics/"));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php).

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Opvragen van een Publisher document](./rest-get-publisher-document)

