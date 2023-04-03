# REST API: POST databases

Waarschuwing: Je bekijkt nu het overzicht voor de oude versie van onze 
API. Wij raden aan om [versie 2](../restv2/rest-api.md) van de API te gebruiken.

Methode om een nieuwe database aan te maken. Dit is een HTTP POST methode
naar het volgende adres:

`https://api.copernica.com/v1/databases?access_token=xxxx`


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
$api = new CopernicaRestApi("your-access-token");

// data voor de methode
$data = array(
    'name'          =>  'mijn_test_database',
    'description'   =>  'omschrijving van de database'
);

// voer het verzoek uit
$api->post("databases", $data);
```

Dit voorbeeld vereist de [REST API class](rest-php).


## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Opvragen van een lijst van databases](rest-get-databases)
* [Verwijderen van een database](rest-delete-database)
