# REST API: GET documents (Publisher)

Je kunt de REST API gebruiken om een overzicht van alle emailing documents op te vragen 
door een HTTP GET verzoek te versturen naar de volgende URL:

`https://api.copernica.com/v2/publisher/documents?access_token=xxxx`

## Beschikbare parameters

De volgende parameters zijn beschikbaar voor deze API call:

* **archived**: Boolean die aangeeft of alleen documenten uit het archief 
worden opgehaald (true) of alleen documenten die niet gearchiveerd zijn (false). 
Standaard worden alle documenten opgehaald.
* **modifiedfromdate**: Datum waarna de documenten bewerkt moet zijn in YYYY-MM-DD HH:MM:SS formaat
* **modifiedtodate**: Datum waarvoor de documenten bewerkt moet zijn in YYYY-MM-DD HH:MM:SS formaat

## Teruggegeven velden

Deze methode geeft een JSON object met een array van emailing documents 
in het **data** veld. Elk document bevat de volgende informatie:

* **id**: De ID van het document.
* **template**: De ID van de bijhorende template.
* **name**: De naam van het document. 
* **from_address**: Het afzenderadres van het document.
* **subject**: Het onderwerp van het document.
* **source**: De bron van het document.

## PHP voorbeeld

Het onderstaande script demonstreert hoe je deze API methode gebruikt.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// parameters voor het verzoek (sluit gearchiveerde documenten uit)
$params = array(
    'archived'  => false
);

// voer het verzoek uit
print_r($api->get("publisher/documents", $params));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php)

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Opvragen van een document](./rest-get-publisher-document)
