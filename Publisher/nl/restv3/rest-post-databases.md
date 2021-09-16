# REST API: POST databases

Methode om een nieuwe database aan te maken. Dit is een HTTP POST methode
naar het volgende adres:

`https://api.copernica.com/v3/databases?access_token=xxxx`

## Beschikbare parameters

* **name**: naam van de nieuw aan te maken database
* **description**: optionele omschrijving van de database
* **archived**: optionele boolean waarde om de database direct te archiveren

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica-rest-api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// data voor de methode
$data = array(
    'name'          =>  'mijn-test-database',
    'description'   =>  'omschrijving van de database'
);

// voer het verzoek uit
$api->post("databases", $data);
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Opvragen van een lijst van databases](rest-get-databases)
* [Verwijderen van een database](rest-delete-database)
