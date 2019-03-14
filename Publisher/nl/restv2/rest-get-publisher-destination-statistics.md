# REST API: GET statistics (Publisher destination)

Je kunt de statistieken van een Publisher destination opvragen door een HTTP GET request 
te sturen naar de volgende URL:

`https://api.copernica.com/v2/publisher/destination/$id/statistics?access_token=xxxx`

Hier moet `$id` vervangen worden door de ID van de destination.

## Teruggegeven velden

Het **data** veld van het teruggegeven JSON object bevat de statistieken. 
De volgende velden zijn beschikbaar:

* **abuses**: De abuses ontvangen voor deze destination.
* **clicks**: De clicks ontvangen voor deze destination.
* **deliveries**: De deliveries afgeleverd voor deze destination.
* **errors**: De errors ontvangen voor deze destination.
* **impressions**: De impressions ontvangen voor deze destination.
* **unsubscribes**: De unsubscribes ontvangen voor deze destination.

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

