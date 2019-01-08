# REST API: GET emailing (Marketing Suite)

Je kunt de REST API gebruiken om een overzicht van een mailing op te vragen 
door een HTTP GET verzoek te versturen naar de volgende URL:

`https://api.copernica.com/v2/ms/emailing/$id?access_token=xxxx`

Hier moet `$id` vervangen worden door de ID van de mailing.

## Teruggegeven velden

Deze methode geeft een JSON object terug dat de volgende informatie bevat:

* **id**: ID van de mailing.
* **timestamp**: Array met de tijdstempel, tijdzone type en de tijdzone.
* **status**: Status van de mailing.
* **subject**: Ondeerwerp van de mailing.
* **fromaddress**: Het adres van de afstuurder.
* **target**: Array met informatie over de target van de mailing, waaronder 
het type en de ID.

## PHP voorbeeld

Het onderstaande script demonstreert hoe je deze API methode gebruikt. 
Vergeet niet de ID in de URL te vervangen voor je het verzoek uitvoert.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// voer het verzoek uit
print_r($api->get("ms/emailing/{$emailingID}", $parameters));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php)

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Vraag alle Marketing Suite mailings op](./rest-get-ms-emailings)
