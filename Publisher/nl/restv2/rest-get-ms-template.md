# REST API: GET template (Marketing Suite)

Je kunt de REST API gebruiken om een overzicht van een emailing template op te vragen 
door een HTTP GET verzoek te versturen naar de volgende URL:

`https://api.copernica.com/v2/ms/template/$id?access_token=xxxx`

Hier moet `$id` vervangen worden door de ID van het emailing template.

## Teruggegeven velden

Deze methode geeft een JSON object terug dat de volgende informatie bevat:

* **id**: De ID van de template.    
* **name**: De naam van het template.
* **from_address**: Adres van de afzender. Array met een 'name' (naam) en 'email' veld.
* **subject**: Het onderwerp van de template
* **type**: Het type van de template ('json' of 'html').

## PHP voorbeeld

Het onderstaande script demonstreert hoe je deze API methode gebruikt. 
Vergeet niet de ID in de URL te vervangen voor je het verzoek uitvoert.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// voer het verzoek uit
print_r($api->get("ms/template/{$templateID}"));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php)

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Opvragen van een Marketing Suite document](./rest-get-publisher-document)
* [Opvragen van alle Marketing Suite templates](./rest-get-publisher-templates)
