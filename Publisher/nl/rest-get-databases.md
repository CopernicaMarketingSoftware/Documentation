# REST API: opvragen databases

Methode om een overzicht op te vragen van alle beschikbare databases. Dit is
een HTTP GET call naar het volgende adres:

`https://api.copernica.com/databases?access_token=xxxx`

## Beschikbare parameters

De volgende parameters kunnen aan de URL als variabelen worden toegevoegd:

* **start**: eerste database die wordt opgevraagd
* **limit**: lengte van de batch die wordt opgevraagd
* **total**: toon wel/niet het totaal aantal databases in de output

Meer informatie over de betekenis van deze parameters vind je in het
[artikel over paging](rest-paging).

## Geretourneerde velden

De methode retourneert een lijst van databases. Van elke database in de lijst
wordt een aantal velden teruggegeven:

* **ID**: Unieke nummerieke identifier
* **name**: Naam van de database
* **description**: Omschrijving van de database
* **archived**: Is de database gearchiveerd of niet?
* **created**: Tijdstip waarop de database is aangemaakt
* **fields**: Array met de velden in de database
* **interests**: Array met de interesses in de database
* **collections**: Array met de collecties in de database


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
    print_r($api->get("databases", $parameters));

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.
    

## Meer informatie

* [Overzicht van alle API calls](rest-reference)
* [Opvragen van een enkele database](rest-get-database)
* [Aanmaken van een database](rest-post-databases)
