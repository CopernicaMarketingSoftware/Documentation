# REST API: GET database fields

Methode om een overzicht op te vragen van alle beschikbare velden in een database. 
Dit is een HTTP GET call naar het volgende adres:

`https://api.copernica.com/v4/database/$id/fields`

De code `$id` moet je vervangen door de numerieke identifier of de naam van de 
database waar je de velden van wilt opvragen.

## Beschikbare parameters

De volgende parameters kunnen aan de URL als variabelen worden toegevoegd:

* start: eerste database die wordt opgevraagd
* limit: lengte van de batch die wordt opgevraagd
* total: toon wel/niet het totaal aantal databases in de output

Meer informatie over de betekenis van deze parameters vind je in het
[artikel over paging](rest-paging).

## Geretourneerde velden

De methode retourneert een lijst van velden in de database. Voor elk veld
worden de volgende eigenschappen teruggegeven:

* **ID**: numeriek ID van het veld
* **name**: naam van het veld
* **type**: veld type
* **value**: standaardwaarde voor dit veld
* **displayed**: boolean waarde of het veld wordt weergegeven in lijsten en grids in de user interface
* **ordered**: wordt dit veld in de user interface gebruikt standaard gesorteerd
* **length**: voor tekstvelden de maximum lengte van waardes die kunnen worden opgeslagen
* **textlines**: voor meerregelige velden: het aantal regels dat beschikbaar is om het veld te bewerken
* **hidden**: boolean waarde of dit veld verborgen is en *nooit* wordt getoond in de user interface
* **index**: boolean waarde die aangeeft of er een index bijgehouden word (dit maakt lookups en selecties sneller)

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 4);

// parameters voor de methode
$parameters = array(
    'limit'     =>  100
);

// voer methode uit en print resultaat
print_r($api->get("database/{$databaseID}/fields", $parameters));
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Veld toevoegen aan een database](rest-post-database-fields)
* [Veld bijwerken](rest-put-database-field)
* [Veld verwijderen](rest-delete-database-field)
