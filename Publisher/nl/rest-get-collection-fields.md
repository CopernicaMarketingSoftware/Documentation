# REST API: opvragen velden van een collectie

Een collectie is een geneste tweede laag bij een database. Een collectie 
heeft dus ook velden. Om deze velden op te vragen kun je een HTTP GET request
sturen naar het volgende adres:

`https://api.copernica.com/collection/$id/fields?access_token=xxxx`

De code $id moet je vervangen door de numerieke identifier van de 
collectie waar je de velden van wilt opvragen.

## Beschikbare parameters

De volgende parameters kunnen aan de URL als variabelen worden toegevoegd:

* **start**: eerste veld dat wordt opgevraagd
* **limit**: lengte van de batch die wordt opgevraagd
* **total**: toon wel/niet het totaal aantal beschikbare velden

Meer informatie over de betekenis van deze parameters vind je in het
[artikel over paging](rest-paging).


## Geretourneerde velden

De methode retourneert een lijst van velden in de database. Voor elk veld
worden de volgende eigenschappen teruggegeven:

* **ID**: numeriek ID van het veld
* **name**: naam van het veld
* **type**: veld type


## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // parameters to pass to the call
    $parameters = array(
        'limit'     =>  100
    );
    
    // do the call, and print result
    print_r($api->get("collection/1234/fields", $parameters));

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.
    

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Veld toevoegen aan een collection](rest-post-collection-fields)
* [Veld bijwerken](rest-put-collection-field)
* [Veld verwijderen](rest-delete-collection-field)
