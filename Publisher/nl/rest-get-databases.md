# GET databases

Je kunt alle informatie omtrent databases opvragen 
met de onderstaande methode. Dit is een HTTP GET 
call naar het volgende adres:

`https://api.copernica.com/v1/databases?access_token=xxxx`


## Beschikbare parameters

De volgende parameters kunnen aan de URL als parameters worden
toegevoegd:

* start: eerste database die wordt opgevraagd;
* limit: lengte van de batch die wordt opgevraagd;
* total: toon wel/niet het totaal aantal databases in de output.


## Geretourneerde velden

De methode retourneert een lijst van databases. 
Van elke database in de lijst wordt een aantal velden teruggegeven:

* ID:             unieke ID;
* name:           naam van de database;
* description:    omschrijving van de database;
* archived:       is de database gearchiveerd of niet?;
* created:        tijdstip waarop de database is aangemaakt;
* fields:         array met de fields in de database;
* interests:      array met de interests in de database;
* collections:    array met de collections in de database.

Het is ook mogelijk om apart informatie over fields, interests en
collections op te vragen:

* [GET fields](rest-get-database-fields)
* [GET interests](rest-get-database-interests)
* [GET collections](rest-get-database-collections) 


## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen 
vanuit een PHP script:

```php
// vereiste scripts
require_once("copernica_rest_api.php");

// verander dit naar je access token
$api = new CopernicaRestApi("your-access-token");

// parameters voor de methode
$parameters = array(
    'limit'     =>  100
);

// voer de methode uit en print het resultaat
print_r($api->get("databases", $parameters));
```

Dit voorbeeld kun je gebruiken in onze [Copernica REST API class](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Opvragen van een enkele database](rest-get-database)
* [Aanmaken van een database](rest-post-databases)
