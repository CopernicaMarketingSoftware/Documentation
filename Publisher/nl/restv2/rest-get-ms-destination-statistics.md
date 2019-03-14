# REST API: GET statistics (Marketing Suite destination)

Je kunt de statistieken van een Marketing Suite destination opvragen door een HTTP GET request 
te sturen naar de volgende URL:

`https://api.copernica.com/v2/ms/destination/$id/statistics?access_token=xxxx`

Hier moet `$id` vervangen worden door de ID van de destination.

## Teruggegeven waarde

### Velden

Het JSON object bevat de volgende velden:

* **abuses**: Array met het veld 'total' voor het aantal abuses.
* **clicks**: Array met de velden 'total' en 'unique' voor het aantal kliks 
en het aantal unieke kliks respectievelijk.
* **deliveries**: Array met het veld 'total' voor het aantal deliveries.
* **errors**: Array met het veld 'total' voor het aantal errors.
* **impressions**: Array met de velden 'total' en 'unique' voor het aantal impressies 
en het aantal unieke impressies respectievelijk.
* **retries**: Array met het veld 'total' voor het aantal retries.
* **unsubscribes**: Array met het veld 'total' voor het aantal unsubscribes.

### Voorbeeld

Hieronder vind je een voorbeeld van zo'n JSON object:

```json
Array
(
    [abuses] => Array
        (
            [total] => 0
        )
        
    [clicks] => Array
        (
            [total] => 3
            [unique] => 1
        )
        
    [deliveries] => Array
        (
            [total] => 1
        )
        
    [errors] => Array
        (
            [total] => 0
        )
        
    [impressions] => Array
        (
            [total] => 0
        )
        
    [retries] => Array
        (
            [total] => 0
        )
        
)
```

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

