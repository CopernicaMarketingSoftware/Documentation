# REST API: POST database collections

Om een collectie (een tweede laag dus) aan een database toe te voegen, kun
je een HTTP POST request sturen naar het volgende adres:

`https://api.copernica.com/v2/database/$id/collections?access_token=xxxx`

De code `$id` moet je vervangen door de numerieke identifier of de naam van de 
database waar je de collectie aan wilt toevoegen. De naam van de collectie
moet als message body aan het HTTP request worden toegevoegd.

## Beschikbare parameters

De volgende variabelen kunnen in de body van de HTTP POST call worden geplaatst.

* name:             naam van de nieuw aan te maken collectie

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// data om mee te geven aan de methode
$data = array(
    'name'      =>  'example-collection',
);

// voer het verzoek uit
$api->post("database/{$databaseID}/collections", $data);

// bij een succesvolle call wordt het id van het aangemaakte verzoek teruggegeven
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [GET database collections](rest-get-database-collections)
* [GET collection fields](rest-get-collection-fields)
* [POST collection fields](rest-post-collection-fields)
