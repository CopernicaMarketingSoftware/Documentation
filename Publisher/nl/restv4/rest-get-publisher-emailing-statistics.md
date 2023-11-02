# REST API: GET statistics (Publisher mailing)

Je kunt de statistieken van een Publisher mailing opvragen door een HTTP GET request 
te sturen naar de volgende URL:

`https://api.copernica.com/v4/publisher/emailing/$id/statistics?access_token=xxxx`

Hier moet `$id` vervangen worden door de ID van de mailing.

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
* **dominant_results**: Array met het [dominante resultaat](./../statistics-dominant-result.md) per onderdeel.

### Voorbeeld

Hieronder vind je een voorbeeld van zo'n JSON object:

```json
{
    "destinations": 10,
    "deliveries": {
        "total": 10
    },
    "errors": {
        "total": 1,
        "unique": 1
    },
    "impressions": {
        "total": 4,
        "unique": 3
    },
    "clicks": {
        "total": 2,
        "unique": 2
    },
    "unsubscribes": {
        "total": 0,
        "unique": 0
    },
    "abuses": {
        "total": 0,
        "unique": 0
    },
    "unknown": {
        "total": 0
    },
    "dominant_results": {
        "destinations": 10,
        "errors": 1,
        "abuses": 0,
        "unsubscribes": 0,
        "clicks": 2,
        "impressions": 2,
        "deliveries": 0
    }
}
```

## PHP voorbeeld

Het volgende script demonstreert hoe je deze API methode kunt gebruiken:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 4);

// stel de periode in
$data = array(
    'begintime' => "2019-01-01 00:00:00", 
    'endtime'   => "2019-02-01 00:00:00"
);

// voer het verzoek uit
print_r($api->get("publisher/emailing/{$emailingID}/statistics/", $data));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php).

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Opvragen van een Publisher emailing](./rest-get-publisher-emailing)

