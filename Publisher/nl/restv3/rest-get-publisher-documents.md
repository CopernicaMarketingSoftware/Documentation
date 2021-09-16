# REST API: GET documents (Publisher)

Je kunt de REST API gebruiken om een overzicht van alle emailing documents op te vragen 
door een HTTP GET verzoek te versturen naar de volgende URL:

`https://api.copernica.com/v3/publisher/documents?access_token=xxxx`

## Beschikbare parameters

De volgende parameters zijn beschikbaar voor deze API call:

* **archived**: Boolean die aangeeft of alleen documenten uit het archief 
worden opgehaald (true) of alleen documenten die niet gearchiveerd zijn (false). 
Standaard worden alle documenten opgehaald.
* **source**: Boolean die aangeeft of de HTML inhoud van het document opgevraagd moet 
worden. Standaard staat de waarde op 'true', maar de methode is sneller wanneer 
'false' wordt gebruikt.
* **modifiedfromdate**: Datum waarna de documenten bewerkt moet zijn in YYYY-MM-DD HH:MM:SS formaat
* **modifiedtodate**: Datum waarvoor de documenten bewerkt moet zijn in YYYY-MM-DD HH:MM:SS formaat

De paging parameters **start**, **limit** en **total** parameters worden 
ook ondersteund. Meer over deze parameters vind je in het [artikel over paging](rest-paging). 

## Teruggegeven velden

Deze methode geeft een JSON object met een array van emailing documents 
in het **data** veld. Elk document bevat de volgende informatie:

* **id**: De ID van het emailing document.    
* **template**: De ID van de bijhorende template.
* **name**: De naam van het document. 
* **from_address**: Het 'from address' van het document.
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
