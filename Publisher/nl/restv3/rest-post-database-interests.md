# REST API: POST database interests

De HTTP POST methode om een interesse toe te voegen aan een bestaande database
is beschikbaar via het volgende adres:

`https://api.copernica.com/v3/database/$id/interests?access_token=xxxx`

De code `$id` moet je vervangen door de numerieke identifier of de naam van de 
database waar je een interesse aan wilt toevoegen. De naam van de interesse, 
en eventuele andere waardes moeten als message body aan het HTTP request worden toegevoegd.

## Beschikbare parameters

De volgende variabelen kunnen in de body van de HTTP POST call worden geplaats.

* **name**: Naam van de nieuw aan te maken interesse (verplicht)
* **group**: Optionele groepnaam. Interesses met dezelfde groepnaam worden bij elkaar gezet in de user interface

## PHP voorbeeld

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// data voor de methode
$data = array(
    'name'      =>  'Voetbal',
    'group'     =>  'Sport'
);

// voer het verzoek uit
$api->post("database/{$databaseID}/interests", $data);
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Alle interesses van een database opvragen](rest-get-database-interests)
* [Interesse verwijderen](rest-delete-database-interest)
