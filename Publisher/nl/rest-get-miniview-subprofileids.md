# REST API: opvragen van subprofiel identifiers

Als je alleen maar de ID's van de subprofielen in een miniselectie wilt opvragen,
kan dat met een heel simpele methode. Je kunt een HTTP GET request sturen 
naar het volgende adres:

`https://api.copernica.com/v1/miniview/$id/subprofileids?access_token=xxxx`

De code `$id` moet je vervangen door de numerieke identifier van de 
miniselectie waar je de ID's van wilt opvragen.

## Beschikbare parameters

Deze methode ondersteunt geen parameters.

## Geretourneerde velden

De methode retourneert een JSON array bestaande uit numerieke identifiers.

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen.

    // vereiste scripts
    require_once('copernica_rest_api.php');
    
    // verander dit naar je access token
    $api = new CopernicaRestApi("your-access-token");

    // voer de methode uit en print het resultaat
    print_r($api->get("miniview/1234/subprofileids"));

Dit voorbeeld vereist de [REST API class](rest-php).
    
## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Subprofielen inclusief alle subprofieldata opvragen](rest-get-view-subprofiles)
