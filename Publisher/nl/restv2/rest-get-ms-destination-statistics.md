# REST API: GET statistics (Marketing Suite destination)

Je kunt de statistieken van een Marketing Suite destination opvragen door een HTTP GET request 
te sturen naar de volgende URL:

`https://api.copernica.com/v2/ms/destination/$id/statistics?access_token=xxxx`

Hier moet `$id` vervangen worden door de ID van de destination.

## Teruggegeven velden

Het **data** veld van het teruggegeven JSON object bevat de statistieken. 
De volgende velden zijn beschikbaar:

* **abuses**: Aantal abuses gerapporteerd voor deze destination.
* **clicks**: Array met de velden 'total' en 'unique' voor het aantal kliks 
en het aantal unieke kliks respectievelijk.
* **deliveries**: Aantal deliveries voor deze destination.
* **errors**: Aantal errors ontvangen voor deze destination.
* **impressions**: Array met de velden 'total' en 'unique' voor het aantal impressies 
en het aantal unieke impressies respectievelijk.
* **retries**: Aantal retries voor deze destination.
* **unsubscribes**: Aantal unsubscribes voor deze destination.

## PHP voorbeeld

Het volgende script demonstreert hoe je deze API methode kunt gebruiken:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// voer het verzoek uit
print_r($api->get("ms/destination/{$destinationID}/statistics/"));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php).

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Opvragen van een Marketing Suite destination](./rest-get-ms-destination)

