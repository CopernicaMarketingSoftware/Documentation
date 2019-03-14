# REST API: GET emailing templates (Marketing Suite)

Je kunt de REST API gebruiken om een overzicht van alle emailing templates op te vragen 
door een HTTP GET verzoek te versturen naar de volgende URL:

`https://api.copernica.com/v2/templates?access_token=xxxx`

## Beschikbare parameters

De volgende parameters zijn beschikbaar voor deze API call:

* **name**: Naam van de template   
* **keyword**: Trefwoorden van de template
* **type**: Type van de template ('json' or 'html'). Standaard zullen beide opgevraagd worden.
* **created_before**: Datum waarvoor de template aangemaakt moet zijn in YYYY-MM-DD HH:MM:SS formaat.
* **created_after**: Datum waarna de template aangemaakt moet zijn in YYYY-MM-DD HH:MM:SS formaat.

## Teruggegeven velden

Deze methode geeft een JSON object met een array van emailing templates 
in het **data** veld. Elke template bevat de volgende informatie:

* **id**: De ID van de template.    
* **name**: De naam van de template.
* **from_address**: Een array met de naam en het emailadres van de 
afzender van de template.
* **subject**: Het onderwerp van de template.
* **type**: Het type van de template ('json' of 'html').

## PHP voorbeeld

Het onderstaande script demonstreert hoe je deze API methode gebruikt.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// parameters voor het verzoek (alleen JSON templates)
$params = array(
    'type'  => 'json'
);

// voer het verzoek uit
print_r($api->get("ms/templates", $params));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php)

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Opvragen van een emailing template](./rest-get-publisher-emailingtemplate)
