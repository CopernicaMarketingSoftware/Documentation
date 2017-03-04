# REST API: opvragen gegevens van een collectie

Een collectie is een "tweede laag" binnen een database. Als je de numerieke
identifier van een collectie weet, dan kun je met een HTTP GET request de
gegevens van de collectie ophalen:

`GET https://api.copernica.com/v1/collection/$id?access_token=xxxx`

Als $id moet je de numerieke identifier van de collectie opgeven.


## Geretourneerde velden

* **ID**: Unieke numerieke identifier
* **name**: Naam van de collectie
* **database**: ID van de database waartoe de collectie behoort
* **fields**: Array met de velden in de collectie

De velden worden teruggegeven als arrays van objecten. Als je wilt weten hoe 
deze arrays zijn opgebouwd, kun je een blik werpen op de documentatien van de 
volgende API methode:

* [Opvragen van velden in een collectie](rest-get-collection-fields)


## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // do the call, and print result
    print_r($api->get("collection/1234"));

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Bewerken van een collectie](rest-put-database)
