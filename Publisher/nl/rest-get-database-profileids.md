# REST API: opvragen van profiel identifiers

Als je alleen maar de ID's van de profielen in een database wilt opvragen,
kan dat met een heel simpele methode. Je kunt een HTTP GET request sturen 
naar het volgende adres:

`https://api.copernica.com/database/$id/profileids?access_token=xxxx`

De code $id moet je vervangen door de numerieke identifier of de naam van de 
database waar je de ID's van wilt opvragen.

## Beschikbare parameters

Deze methode ondersteunt geen parameters

## Geretourneerde velden

De methode retourneert een JSON array bestaande uit numerieke identifiers.

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen.

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // do the call, and print result
    print_r($api->get("database/1234/profileids"));

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.
    

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Profielen inclusief alle profieldata opvragen](rest-get-database-profiles)
