# REST API: opvragen databases

Methode om een overzicht op te vragen van alle beschikbare databases. Dit is
een HTTP GET call naar het volgende adres:

`https://api.copernica.com/v1/databases?access_token=xxxx`

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

* **ID**: Unieke numerieke identifier
* **name**: Naam van de database
* **description**: Omschrijving van de database
* **archived**: Is de database gearchiveerd of niet?
* **created**: Tijdstip waarop de database is aangemaakt
* **fields**: Array met de velden in de database
* **interests**: Array met de interesses in de database
* **collections**: Array met de collecties in de database

Als je wilt weten hoe de *fields*, *interests* en *collections* arrays zijn
opgebouwd, kun je een blik werpen op de documentatien van de volgende API
methodes. Deze methodes retourneren dezelfde soort gegevens:

* [Opvragen van velden](rest-get-database-fields)
* [Opvragen van interesses](rest-get-database-interests)
* [Opvragen van collecties](rest-get-database-collections) 


## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen 
vanuit een PHP script:

    // vereiste scripts
    require_once('copernica_rest_api.php');
    
    // verander dit naar je access token
    $api = new CopernicaRestApi("your-access-token");

    // parameters voor de methode
    $parameters = array(
        'limit'     =>  100
    );
    
    // voer de methode uit en print het resultaat
    print_r($api->get("databases", $parameters));

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Opvragen van een enkele database](rest-get-database)
* [Aanmaken van een database](rest-post-databases)
