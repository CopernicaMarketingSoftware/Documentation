# REST API: GET view views

Selecties kunnen worden genest. Om op te vragen welke selecties er direct
onder een andere selectie vallen, kun je een HTTP GET request naar de 
volgende URL sturen:

`https://api.copernica.com/v3/view/$id/views?access_token=xxxx`

De code `$id` moet je vervangen door de numerieke identifier van de selectie 
waarvan je de geneste selecties wilt opvragen.

## Beschikbare parameters

De volgende parameters kunnen aan de URL als variabelen worden toegevoegd:

* **start**: eerste selectie die wordt opgevraagd
* **limit**: lengte van de batch die wordt opgevraagd
* **total**: toon wel/niet het totaal aantal selecties in de output

Meer informatie over de betekenis van deze parameters vind je in het
[artikel over paging](rest-paging).

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

## Voorbeeld

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// parameters to pass to the call
$parameters = array(
    'limit'     =>  100
);

// do the call, and print result
print_r($api->get("view/{$view}/views", $parameters));
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Selectie toevoegen aan selectie](rest-post-view-views)
* [Opvragen top level selecties](rest-get-database-views)
* [Selectieregels opvragen](rest-get-view-rules)
