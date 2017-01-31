# REST API: opvragen collecties in een database

Als je een HTTP GET request naar de volgende URL stuurt, krijg je een lijst
terug van alle collecties binnen een database:

`https://api.copernica.com/database/$id/fields?access_token=xxxx`

De code $id moet je vervangen door de nummerieke identifier of de naam van 
de database waar je de collecties van wilt opvragen.

## Beschikbare parameters

De volgende parameters kunnen aan de URL als variabelen worden toegevoegd:

* **start**: eerste collectie die wordt opgevraagd
* **limit**: lengte van de batch die wordt opgevraagd
* **total**: toon wel/niet het totaal aantal beschikbare collecties

Meer informatie over de betekenis van deze parameters vind je in het
[artikel over paging](rest-paging).


## Geretourneerde velden

De methode retourneert een lijst van collecties in de database. Voor elke collectie
worden de volgende eigenschappen teruggegeven:

* **ID**: nummerieke identifier van de collectie
* **name**: naam van de collectie
* **database**: nummerieke identifier van de database waartoe de collectie behoort
* **fields**: array van velden binnen de collectie

De *fields* property bevat een array van de velden in de collectie. Elke veld
in dit array is ook een object. Zie de documentatie van de 
[methode om velden op te vragen](./rest-get-collection-fields) voor de betekenis
van deze geneste data.


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
    print_r($api->get("database/1234/collections", $parameters));

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.
    

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Collectie toevoegen aan een database](rest-post-database-collections)
* [Veld van een collectie opvragen](rest-get-collection-fields)
* [Veld toevoegen aan een collectie](rest-post-collection-fields)
