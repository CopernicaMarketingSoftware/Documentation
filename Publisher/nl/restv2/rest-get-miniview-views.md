# REST API: GET miniview views

De methode om de selecties die afhankelijk zijn van een miniselectie 
op te vragen is een HTTP GET methode beschikbaar op het volgende adres:

`https://api.copernica.com/v2/miniview/$id/views?access_token=xxxx`

De `$id` moet je vervangen door de numerieke identifier of de naam van de 
miniselectie waar je de selecties van wilt opvragen.

## Beschikbare parameters

De volgende parameters kunnen aan de URL als variabelen worden toegevoegd:

* **start**: Eerste ID om op te vragen
* **limit**: Aantal profielen om op te vragen
* **total**: Boolean. Geeft aan of het totale aantal profielen getoond moet worden. 
De methode is sneller wanneer dit op 'false' staat.

### Paging

Meer over de **start**, **limit** en **total** parameters vind je in het [artikel over paging](rest-paging). 

## Geretourneerde velden

De methode retourneert een JSON object met selecties onder het **data** veld. 
Elke selectie bevat de volgende velden:

* **id**: Unieke numerieke identifier van selectie.
* **name**: Naam van de selectie.
* **description**: Beschrijving van de selectie.
* **parent-type**: Type van de parent (view/database).
* **parent-id**: ID van de parent.
* **has-children**: Boolean die aangeeft of de selectie zelf selecties bevat.
* **has-referred**: Boolean die aangeeft of er andere selecties zijn die naar deze selectie refereren.
* **has-rules**: Boolean die aangeeft of de selectie regels heeft.
* **database**: ID van de database waar deze selectie onder valt.
* **last-built**: Tijdstempel laatste bouw van de selectie.

### JSON voorbeeld

De JSON voor een enkele selectie ziet er bijvoorbeeld zo uit:

```json
{  
   "ID":"1384",
   "name":"Leadscoring",
   "description":"",
   "parent-type":"database",
   "parent-id":"7616",
   "has-children":false,
   "has-referred":false,
   "has-rules":true,
   "database":"7616",
   "last-built":"2019-04-17 00:21:26"
}
```

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

