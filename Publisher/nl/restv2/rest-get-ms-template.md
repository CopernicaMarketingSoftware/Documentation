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

### JSON voorbeeld

De template ziet er dan bijvoorbeeld zo uit:

```json
{  
   "id":"2820",
   "name":"Theme: conference",
   "from_address":{  
      "name":"Infinity",
      "email":"info@valtaf.nl"
   },
   "subject":"Infinity conference",
   "type":"json"
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
print_r($api->get("ms/template/{$templateID}"));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php)

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Opvragen van alle templates](./rest-get-ms-templates)
* [Opvragen van de body van een template](./rest-get-ms-template-body)
