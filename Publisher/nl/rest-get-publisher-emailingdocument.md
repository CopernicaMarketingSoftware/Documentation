# REST API: GET emailing document (Publisher)

Je kunt de REST API gebruiken om een overzicht van een emailing document op te vragen 
door een HTTP GET verzoek te versturen naar de volgende URL:

`https://api.copernica.com/v2/publisher/emailingdocument/$id?access_token=xxxx`

Hier moet `$id` vervangen worden door de ID van het emailing document.

## Teruggegeven velden

Deze methode geeft een JSON object terug dat de volgende informatie bevat:

* **id**: De ID van het emailing document.    
* **template_id**: De ID van de bijhorende template.
* **name**: De naam van het document. 
* **from_address**: Het 'from address' van het document.
* **subject**: Het onderwerp van het document.
* **source**: De bron van het document.

## PHP voorbeeld

Het onderstaande script demonstreert hoe je deze API methode gebruikt. 
Vergeet niet de ID in de URL te vervangen voor je het verzoek uitvoert.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// voer het verzoek uit
print_r($api->get("publisher/emailingdocument/{$emailingDocumentID}"));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php)

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
