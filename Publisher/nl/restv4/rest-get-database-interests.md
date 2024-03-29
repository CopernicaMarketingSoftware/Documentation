# REST API: GET database interests

Een overzicht van alle beschikbare interesses in een database kun je opvragen
met de volgende URL:

`https://api.copernica.com/v4/database/$id/interests`

De variabele `$id` moet je vervangen door de numerieke identifier of de naam
van de database waar je de interesses van wilt opvragen.

## Beschikbare parameters

De volgende parameters kunnen aan de URL als variabelen worden toegevoegd:

* **start**: eerste interesse die wordt opgevraagd
* **limit**: lengte van de batch die wordt opgevraagd
* **total**: toon wel/niet het totaal aantal interesses in de output

Meer informatie over de betekenis van deze parameters vind je in het
[artikel over paging](rest-paging).

## Geretourneerde velden

De methode retourneert een lijst van interesses in de database. Voor elke interesse
worden de volgende eigenschappen teruggegeven:

* **ID**: numeriek ID van de interesse
* **name**: naam van de interesse
* **group**: naam van de interessegroep waar de interesse bij hoort

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander naar je acces token
$api = new CopernicaRestAPI("your-access-token", 4);

// parameters voor de methode
$parameters = array(
    'limit'     =>  100
);

// voer methode uit en print resultaat
print_r($api->get("database/{$databaseID}/interests", $parameters));
```

Dit voorbeeld vereist de [REST API klasse](rest-php).
    
## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Interesse toevoegen aan een database](rest-post-database-interests)
* [Interesse bijwerken](rest-post-database-interest)
* [Interesse verwijderen](rest-delete-database-interest)
