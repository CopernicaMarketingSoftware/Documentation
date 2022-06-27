# REST API: POST documents (Publisher)

Methode om een nieuw document aan te maken. Dit is een HTTP POST-methode
naar het volgende adres:

`https://api.copernica.com/v3/publisher/documents?access_token=xxxx`

## Beschikbare parameters

* **template**: ID van het template waar het document onder komt
* **name**: naam van de nieuw aan te maken document 
* **description**: omschrijving van het document
* **from_address**: array met 'name' en 'email' voor het afzenderadres
* **subject**: onderwerp van het document

## Voorbeeld in PHP

Het volgende PHP-script demonstreert hoe je de API-methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica-rest-api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// data voor de methode
$data = array(
    'template'    =>  '123',
    'name'        =>  'mijn-test-document'
);

// voer het verzoek uit
$api->post("documents", $data);
```

Dit voorbeeld vereist de [REST API-klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
