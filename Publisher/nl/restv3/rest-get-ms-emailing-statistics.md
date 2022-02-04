# REST API: GET statistics (Marketing Suite mailing)

Je kunt de statistieken van een Marketing Suite mailing opvragen door een HTTP GET request 
te sturen naar de volgende URL:

`https://api.copernica.com/v3/ms/emailing/$id/statistics?access_token=xxxx`

Hier moet `$id` vervangen worden door de ID van de mailing.

## Beschikbare parameters

* **begintime**: Start datum (en tijd) voor de statistieken (YYYY-MM-DD HH:MM:SS formaat).
* **endtime**: Eind datum (en tijd) voor de statistieken (YYYY-MM-DD HH:MM:SS formaat).

## Teruggegeven waarde

### Velden

Het JSON object bevat de volgende velden:

* **destinations**: Aantal ontvangers van deze mailing.
* **abuses**: Array met het veld 'total' voor het aantal abuses.
* **clicks**: Array met de velden 'total' en 'unique' voor het aantal kliks 
en het aantal unieke kliks respectievelijk.
* **deliveries**: Array met het veld 'total' voor het aantal deliveries.
* **errors**: Array met het veld 'total' voor het aantal errors.
* **impressions**: Array met de velden 'total' en 'unique' voor het aantal impressies 
en het aantal unieke impressies respectievelijk.
* **retries**: Array met het veld 'total' voor het aantal retries.
* **unsubscribes**: Array met het veld 'total' en 'unique' voor het aantal unsubscribes.

### Voorbeeld

Hieronder vind je een voorbeeld van zo'n JSON object:

```json
{  
   "destinations":"13801",
   "abuses":{  
      "total":0
   },
   "clicks":{  
      "total":15,
      "unique":11
   },
   "deliveries":{  
      "total":39
   },
   "errors":{  
      "total":0
   },
   "impressions":{  
      "total":24,
      "unique":18
   },
   "retries":{  
      "total":0
   },
   "unsubscribes":{  
      "total":3,
      "unique":2
   }
}
```

## PHP voorbeeld

Het volgende script demonstreert hoe je deze API methode kunt gebruiken:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// stel de periode in
$data = array(
    'begintime' => "2019-01-01 00:00:00", 
    'endtime'   => "2019-02-01 00:00:00"
);

// voer het verzoek uit
print_r($api->get("ms/emailing/{$emailingID}/statistics/", $data));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php).

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Opvragen van een Marketing Suite emailing](./rest-get-ms-emailing)

