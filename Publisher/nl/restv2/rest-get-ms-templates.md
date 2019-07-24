# REST API: GET templates (Marketing Suite)

Je kunt de REST API gebruiken om een overzicht van alle emailing templates op te vragen 
door een HTTP GET verzoek te versturen naar de volgende URL:

`https://api.copernica.com/v2/ms/templates?access_token=xxxx`

## Beschikbare parameters

De volgende parameters zijn beschikbaar voor deze API call, je kunt deze 
gebruiken om templates met bepaalde eigenschappen op te vragen:

* **name**: Naam die de template moet hebben.
* **keyword**: Kernwoorden die de template moet hebben.
* **type**: Type van de template ('json' of 'html').
* **created_before**: Datum waarvoor de template aangemaakt moet zijn in YYYY-MM-DD HH:MM:SS formaat.
* **created_after**: Datum waarna de template aangemaakt moet zijn in YYYY-MM-DD HH:MM:SS formaat.

## Teruggegeven velden

Deze methode geeft een JSON object met een array van emailing templates 
in het **data** veld. Elke template bevat de volgende informatie:

* **id**: De ID van de template.    
* **name**: De naam van het template.
* **from_address**: Adres van de afzender. Array met een 'name' (naam) en 'email' veld.
* **subject**: Het onderwerp van de template
* **type**: Het type van de template ('json' of 'html').

### JSON voorbeeld

Een enkele template ziet er bijvoorbeeld zo uit:

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

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// parameters voor het verzoek (vraag alleen json templates op)
$params = array(
    type    = 'json'
);

// voer het verzoek uit
print_r($api->get("ms/templates", $params));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php)

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Opvragen van een Marketing Suite template](./rest-get-ms-template)
