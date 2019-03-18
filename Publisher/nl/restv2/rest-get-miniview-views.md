# REST API: GET miniviews views

Je kunt bekijken welke selecties afhankelijk zijn voor een miniselectie 
door een HTTP GET request te sturen naar de volgende URL:

`https://api.copernica.com/v2/miniview/$id/views?access_token=xxxx`

De `$id` moet je vervangen door de numerieke identifier of de naam van de 
miniselectie waar je de selecties van wilt opvragen.

## Beschikbare parameters

De volgende parameters kunnen aan de URL als variabelen worden toegevoegd:

* start: 		eerste database die wordt opgevraagd;
* limit: 		lengte van de batch die wordt opgevraagd;
* total: 		toon wel/niet het totaal aantal databases in de output.

Meer informatie over de betekenis van deze parameters vind je in het
[artikel over paging](rest-paging).

## Geretourneerde velden

De methode retourneert een lijst van selecties. Voor elke selectie
worden de volgende eigenschappen teruggegeven:

* **id**: 				Numeriek id van de selectie;
* **name**: 			Naam van de selectie;
* **description**: 		Omschrijving van de selectie;
* **parent-type**: 		Mogelijke waardes: "database" of "view", gebruikt om aan te geven of 
dit een selectie direct onder een database is, of een geneste selectie onder een andere selectie;
* **parent-id**: 		Id van de database of selectie waar deze selectie onder valt;
* **has-children**: 	Boolean waarde; heeft deze selectie geneste selecties onder zich?
* **has-referred**: 	Boolean waarde; zijn er andere selectie die verwijzen naar deze selectie?
* **has-rules**: 		Boolean waarde; zijn er selectie-regels voor deze selectie ingesteld?
* **database**:			Id van de database waar deze selectie onder valt
* **lastbuilt**:        Tijdstip wanneer de selectie voor het laatst is opgebouwd

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// parameters voor de methode
$parameters = array(
    'limit'     =>  100
);

// voer de methode uit en print het resultaat
print_r($api->get("miniview/{$miniviewID}/views", $parameters));
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
- [Opvragen van een miniselectie](./rest-get-miniview)
- [Opvragen van miniselectie regels](./rest-get-miniview-rules)

