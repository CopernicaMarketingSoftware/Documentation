# REST API: opvragen beschikbare miniselecties

Wat selecties zijn voor een database, zijn miniselecties voor een collectie.
Om op te vragen welke miniselecties er op een collectie beschikbaar zijn,
kun je een HTTP GET requet naar het volgende adres sturen:

`https://api.copernica.com/v1/collection/$id/miniviews?access_token=xxxx`

De code `$id` moet je vervangen door de numerieke identifier van de 
collectie waar je de miniselecties van wilt opvragen.

## Beschikbare parameters

De volgende parameters kunnen aan de URL als variabelen worden toegevoegd:

* **start**: eerste miniselectie die wordt opgevraagd
* **limit**: lengte van de batch die wordt opgevraagd
* **total**: toon wel/niet het totaal aantal beschikbare miniselecties

Meer informatie over de betekenis van deze parameters vind je in het
[artikel over paging](rest-paging).

## Geretourneerde velden

De methode retourneert een lijst van miniselecties. Voor elke selectie
worden de volgende eigenschappen teruggegeven:

* **ID**: numeriek ID van de miniselectie
* **name**: naam van de miniselectie
* **description**: omschrijving van de miniselectie
* **parent-type**: dit is altijd de string "collection"
* **parent-id**: ID van de collectie waar deze miniselectie onder valt

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

    // vereiste scripts
    require_once('copernica_rest_api.php');
    
    // verander dit in je access token
    $api = new CopernicaRestApi("your-access-token");

    // parameters voor de opvraag
    $parameters = array(
        'limit'     =>  100
    );
    
    // voer de methode uit en print de resultaten
    print_r($api->get("collection/1234/miniviews", $parameters));

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Miniselectie toevoegen aan collectie](rest-post-collection-views)
* [Selectieregels opvragen](rest-get-miniview-rules)
