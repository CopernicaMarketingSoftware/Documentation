# REST API: opvragen gegevens van een database

Methode om alle meta gegevens van een database op te vragen. De methode
ondersteunt geen parameters. De methode wordt aangeroepen via het volgende adres:

`GET https://api.copernica.com/database/$id?access_token=xxxx`

Als $id kun je de nummerieke identifier van een database opgeven, of de naam
van een database.

## Geretourneerde velden

* **ID**: Unieke nummerieke identifier
* **name**: Naam van de database
* **description**: Omschrijving van de database
* **archived**: Is de database gearchiveerd of niet?
* **created**: Tijdstip waarop de database is aangemaakt
* **fields**: Array met de velden in de database
* **interests**: Array met de interesses in de database
* **collections**: Array met de collecties in de database

De velden, interesses en collecties worden teruggegeven als arrays van
objecten.

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // do the call, and print result
    print_r($api->get("database/1234"));

## Meer informatie

* [Overzicht van alle API calls](rest-reference)
* [Bewerken van een database](rest-put-database)
