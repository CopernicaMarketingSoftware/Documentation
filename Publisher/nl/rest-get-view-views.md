# REST API: GET view views

Selecties kunnen worden genest. Om op te vragen welke selecties er direct
onder een andere selectie vallen, kun je een HTTP GET request naar de 
volgende URL sturen:

`https://api.copernica.com/v1/view/$id/views?access_token=xxxx`

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

De methode retourneert een lijst van selecties. Voor elke selectie
worden de volgende eigenschappen teruggegeven:

* **id**: numeriek id van de selectie
* **name**: naam van de selectie
* **description**: omschrijving van de selectie
* **parent-type**: mogelijke waardes: "database" of "view", gebruikt om aan te geven
    of dit een selectie direct onder een database is, of een geneste selectie onder een andere selectie
* **parent-id**: id van de database of selectie waar deze selectie onder valt
* **has-children**: boolean waarde; heeft deze selectie geneste selecties onder zich?
* **has-referred**: boolean waarde; zijn er andere selecties die verwijzen naar deze selectie?
* **has-rules**: boolean waarde; zijn er selectie-regels voor deze selectie ingesteld?

## Voorbeeld

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestApi("your-access-token");

// parameters to pass to the call
$parameters = array(
    'limit'     =>  100
);

// do the call, and print result
print_r($api->get("view/1234/views", $parameters));
```

Dit voorbeeld vereist de [REST API class](rest-php).
    
## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [POST view views](rest-post-view-views)
* [GET database views](rest-get-database-views)
* [GET view rules](rest-get-view-rules)
