# REST API: bijwerken gegevens van een database

Methode om de properties van een database bij te werken. Dit is een HTTP PUT
methode die toegankelijk is via het volgende adres:

`https://api.copernica.com/database/$id?access_token=XXX`

De variabele $id in de URL moet worden vervangen door de nummerieke identifier
of de naam van de database die je wilt bewerken.

## Beschikbare parameters

De volgende variabelen kunnen in de body van het HTTP PUT commando worden
geplaatst:

* *name*: de optionele nieuwe naam van de database
* *description*: de optionele nieuwe omschrijving van de database
* *archived*: optionele boolean waarde om de database te archiveren

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

    // dependencies
    require_once('copernica-rest-api.php');

    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");
    
    // additional url based paramaters
    $parameters = array();
    
    // data to be sent to the api
    $data = array(
        'description'   =>  'een nieuwe omschrijving',
        'archived'      =>  true
    );
    
    // do the call
    api->put("database/1234", $parameters, $data);

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Opvragen van een lijst van databases](rest-get-databases)
* [Verwijderen van een database](rest-delete-database)
