# REST API: GET emailing templates (Publisher)

Je kunt de REST API gebruiken om een overzicht van alle emailing templates op te vragen 
door een HTTP GET verzoek te versturen naar de volgende URL:

`https://api.copernica.com/v2/publisher/emailingtemplates?access_token=xxxx`

## Beschikbare parameters

De volgende parameters zijn beschikbaar voor deze API call:

* **archived**: Boolean die aangeeft of alleen templates uit het archief 
worden opgehaald (true) of alleen templates die niet gearchiveerd zijn (false). 
Standaard worden alle templates opgehaald.
* **modifiedfromdate**: Datum waarna de template bewerkt moet zijn in YYYY-MM-DD HH:MM:SS formaat
* **modifiedtodate**: Datum waarvoor de template bewerkt moet zijn in YYYY-MM-DD HH:MM:SS formaat

## Teruggegeven velden

Deze methode geeft een JSON object met een array van emailing templates 
in het **data** veld. Elke template bevat de volgende informatie:

* **id**: De ID van de template.    
* **name**: De naam van de template. 
* **archived**: De archiefstatus van de template.

## PHP voorbeeld

Het onderstaande script demonstreert hoe je deze API methode gebruikt. 

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// parameters voor het verzoek (sluit gearchiveerde templates uit)
$params = new array(
    'archived'  => false
);

// voer het verzoek uit
print_r($api->get("publisher/emailingtemplates", $params));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php)

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Opvragen van een emailing template](./rest-get-publisher-emailingtemplate)
