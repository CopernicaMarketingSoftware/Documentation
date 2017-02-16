# REST API: opvragen van subprofiel identifiers

Als je alleen maar de ID's van de subprofielen in een collectie wilt opvragen,
kan dat met een heel simpele methode. Je kunt een HTTP GET request sturen 
naar het volgende adres:

`https://api.copernica.com/collection/$id/subprofileids?access_token=xxxx`

De code $id moet je vervangen door de numerieke identifier van de 
collectie waar je de ID's van wilt opvragen.

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
    print_r($api->get("collection/1234/subprofileids"));

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.
    

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Subprofielen inclusief alle subprofieldata opvragen](rest-get-collection-subprofiles)
