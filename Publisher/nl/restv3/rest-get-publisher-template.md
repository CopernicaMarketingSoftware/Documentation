# REST API: GET template (Publisher)

Je kunt de REST API gebruiken om een overzicht van een emailing template op te vragen 
door een HTTP GET verzoek te versturen naar de volgende URL:

`https://api.copernica.com/v3/publisher/template/$id?access_token=xxxx`

Hier moet `$id` vervangen worden door de ID van het emailing template.

## Teruggegeven velden

Deze methode geeft een JSON object terug dat de volgende informatie bevat:

* **id**: De ID van de template.    
* **name**: De naam van het template. 
* **archived**: De archiefstatus van de template ('true' voor gearchiveerd en 'false' voor niet gearchiveerd).

### JSON voorbeeld

De JSON voor een template ziet er bijvoorbeeld zo uit:

```json
{  
   "id":"551",
   "name":"TestTemplate",
   "archived":false
}
```

## PHP voorbeeld

Het onderstaande script demonstreert hoe je deze API methode gebruikt. 
Vergeet niet de ID in de URL te vervangen voor je het verzoek uitvoert.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// voer het verzoek uit
print_r($api->get("publisher/template/{$templateID}"));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php)

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Opvragen van een document](./rest-get-publisher-document)
* [Opvragen van alle templates](./rest-get-publisher-templates)
