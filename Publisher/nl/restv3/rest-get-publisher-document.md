# REST API: GET emailing document (Publisher)

Je kunt de REST API gebruiken om een overzicht van een emailing document op te vragen 
door een HTTP GET verzoek te versturen naar de volgende URL:

`https://api.copernica.com/v3/publisher/document/$id?access_token=xxxx`

Hier moet `$id` vervangen worden door de ID van het emailing document.

## Beschikbare parameters

Deze methode ondersteunt de **source** parameter. Deze boolean geeft aan of 
de HTML bron van het bestand opgevraagd moet worden ('true') of niet ('false'). 
Standaard zal deze op 'true' staan, maar de call kan sneller uitgevoerd worden 
door deze op 'false' te zetten.

## Teruggegeven velden

Deze methode geeft een JSON object terug dat de volgende informatie bevat:

* **id**: De ID van het emailing document.    
* **template**: De ID van de bijhorende template.
* **name**: De naam van het document. 
* **from_address**: Het afzenderadres van het document.
* **subject**: Het onderwerp van het document.
* **archived**: Geeft aan of dit document gearchiveerd is (1) of niet (null).
* **source**: De bron van het document.

### JSON voorbeeld

De JSON voor een document ziet er bijvoorbeeld zo uit:

```json
{  
   "id":"79",
   "template":"31",
   "name":"Hallo",
   "from_address":"\"test\" <test@copernica.nl>",
   "subject":"test",
   "archived":null,
   "source":"<html><head><title>Title</title></head><body><p>Paragraph</p></body></html>"
}
```

## PHP voorbeeld

Het onderstaande script demonstreert hoe je deze API methode gebruikt. 
Vergeet niet de ID in de URL te vervangen voor je het verzoek uitvoert.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// voer het verzoek uit
print_r($api->get("publisher/document/{$documentID}"));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php)

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
