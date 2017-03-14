# REST API: opvragen van profiel identifiers

Als je alleen maar de ID's van de profielen in een selectie wilt opvragen,
kan dat met een heel simpele methode. Je kunt een HTTP GET request sturen 
naar het volgende adres:

`https://api.copernica.com/v1/view/$id/profileids?access_token=xxxx`

De code `$id` moet je vervangen door de numerieke identifier van de 
collectie waar je de ID's van wilt opvragen.

## Beschikbare parameters

Deze methode ondersteunt geen parameters

## Geretourneerde velden

De methode retourneert een JSON array bestaande uit numerieke identifiers.

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen.

    // vereiste scripts
    require_once('copernica_rest_api.php');
    
    // verander naar je access token
    $api = new CopernicaRestApi("your-access-token");

    // voer de methode uit en print het resultaat
    print_r($api->get("collection/1234/profileids"));

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Profielen inclusief alle profieldata opvragen](rest-get-view-profiles)
