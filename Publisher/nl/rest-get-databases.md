# REST API: opvragen databases

Methode om een overzicht op te vragen van alle beschikbare databases. Op deze
methode zijn de [paging parameters](rest-paging) van toepassing.

## Geretourneerde velden

De methode retourneert een lijst van databases. Van elke database in de lijst
wordt een aantal velden teruggegeven. Meer informatie over de betekenis
van deze velden kun je vinden in het artikel over het 
[opvragen van een enkele database](rest-get-database).

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

    // dependencies
    require_once('copernica_rest_api.php');

    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");
    
    // do the call, and print result
    print_r($api->get("databases"));

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.
    

## Meer informatie

* [Overzicht van alle API calls](rest-reference)
* [Opvragen van een enkele database](rest-get-database)
* [Aanmaken van een database](rest-post-databases)
