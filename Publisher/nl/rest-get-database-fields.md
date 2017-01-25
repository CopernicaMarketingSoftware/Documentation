# REST API: opvragen velden in een database

Methode om een overzicht op te vragen van alle beschikbare velden in een database. 
Dit is een HTTP GET call naar het volgende adres:

`GET https://api.copernica.com/database/$id/fields?access_token=xxxx`

De code $id moet je vervangen door de nummerieke identifier van de database
waar je de velden van wilt opvragen, of de naam van de database.

## Beschikbare parameters

De volgende parameters kunnen aan de URL als variabelen worden toegevoegd:

* **start**: eerste database die wordt opgevraagd
* **limit**: lengte van de batch die wordt opgevraagd
* **total**: toon wel/niet het totaal aantal databases in de output

Meer informatie over de betekenis van deze parameters vind je in het
[artikel over paging](rest-paging).


## Geretourneerde velden

De methode retourneert een lijst van velden in de database. Voor elk veld
worden de volgende eigenschappen teruggegeven:

* **ID**: nummeriek ID van het veld
* **name**: naam van het veld
* **type**: veld type
* **value**: standaardwaarde voor dit veld
* **displayed**: boolean waarde of het veld wordt weergegeven in lijsten en grids in de user interface
* **ordered**: wordt dit veld in de user interface gebruikt standaard gesorteerd
* **length**: voor tekstvelden de maximum lengte van waardes die kunnen worden opgeslagen
* **textlines**: voor meerregelige velden: het aantal regels dat beschikbaar is om het veld te bewerken
* **hidden**: boolean waarde of dit veld verborgen is en *nooit* wordt getoond in de user interface
* **index**: wordt er een index voor dit veld bijgehouden zodat lookups en selecties sneller zijn?


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
    print_r($api->get("database/1234/fields", $parameters));

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.
    

## Meer informatie

* [Overzicht van alle API calls](rest-reference)
* [Veld toevoegen aan een database](rest-post-database-fields)
* [Veld bijwerken](rest-put-database-field)
* [Veld verwijderen](rest-delete-database-field)
