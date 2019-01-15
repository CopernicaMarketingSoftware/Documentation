# REST API: GET emailing template (Publisher)

Je kunt de REST API gebruiken om een overzicht van een emailing template op te vragen 
door een HTTP GET verzoek te versturen naar de volgende URL:

`https://api.copernica.com/v2/publisher/emailingtemplate/$id?access_token=xxxx`

Hier moet `$id` vervangen worden door de ID van het emailing template.

## Teruggegeven velden

Deze methode geeft een JSON object terug dat de volgende informatie bevat:

* **id**: De ID van de template.    
* **name**: De naam van het template. 
* **archived**: De archiefstatus van de template.

## PHP voorbeeld

Het onderstaande script demonstreert hoe je deze API methode gebruikt. 
Vergeet niet de ID in de URL te vervangen voor je het verzoek uitvoert.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// voer het verzoek uit
print_r($api->get("publisher/emailingtemplate/{$emailingTemplateID}"));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php)

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Opvragen van een emailing document](./rest-get-publisher-emailingdocument)
* [Opvragen van alle emailing templates](./rest-get-publisher-emailingtemplates)
