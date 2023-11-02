# REST API: PUT couponcampaign

Methode om een nieuwe couponcampagne aan te maken. Dit is een HTTP PUT-methode naar het volgende adres:

`https://api.copernica.com/v4/couponcampaign/$id?access_token=xxxx`

## Beschikbare parameters

* **name**: naam van de nieuw aan te maken coupon campagne
* **description**: optionele omschrijving van de coupon campagne
* **archived**: optionele boolean waarde om de coupon campagne direct te archiveren
* **tags**: optionele array met tags voor de coupon campagne

## Voorbeeld in JSON

```json
{
    "name" : "Test campaign",
    "description" : "This is a test campaign"
}
```

## Voorbeeld in PHP

Het volgende PHP-script demonstreert hoe je de API-methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica-rest-api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 4);

// data voor de methode
$data = array(
    'name'          =>  'Test campaign',
    'description'   =>  'This is a test campaign'
);

// voer het verzoek uit
$api->put("couponcampaign/$id", $data);
```

Dit voorbeeld vereist de [REST API-klasse](rest-php).

## Meer informatie

* [Overzicht van alle API-calls](rest-api)
