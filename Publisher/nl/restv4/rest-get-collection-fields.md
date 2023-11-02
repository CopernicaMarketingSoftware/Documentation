# REST API: GET collection fields

Een collectie is een geneste tweede laag bij een database. Een collectie 
heeft dus ook velden. Om deze velden op te vragen kun je een HTTP GET request
sturen naar het volgende adres:

`https://api.copernica.com/v3/collection/$id/fields?access_token=xxxx`

De code `$id` moet je vervangen door de numerieke identifier van de 
collectie waar je de velden van wilt opvragen.

## Beschikbare parameters

De volgende parameters kunnen aan de URL als variabelen worden toegevoegd:

* start: eerste veld dat wordt opgevraagd
* limit: lengte van de batch die wordt opgevraagd
* total: toon wel/niet het totaal aantal beschikbare velden

Meer informatie over de betekenis van deze parameters vind je in het
[artikel over paging](rest-paging).

## Geretourneerde velden

De methode retourneert een lijst van velden in de collectie. Voor elk veld
worden de volgende eigenschappen teruggegeven:

* id: 	numeriek id van het veld
* name: naam van het veld
* type: veld type

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit in je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// parameters om mee te geven
$parameters = array(
    'limit' =>  100,
);

// voer de methode uit en print de resultaten
print_r($api->get("collection/{$collectieID}/fields", $parameters));
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Veld toevoegen aan een collection](rest-post-collection-fields)
* [Veld bijwerken](rest-put-collection-field)
* [Veld verwijderen](rest-delete-collection-field)
