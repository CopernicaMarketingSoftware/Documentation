# REST API: bijwerken gegevens van een collectie

Als je de gegevens van een collectie (eigenlijk alleen de naam) wilt bijwerken,
kun je dit doen door een HTTP PUT request naar de volgende URL te sturen:

`https://api.copernica.com/collection/$id?access_token=XXX`

De variabele $id in de URL moet worden vervangen door de numerieke identifier
van de collectie die je wilt bewerken.

## Beschikbare parameters

De volgende variabele kan in de body van het HTTP PUT commando worden
geplaatst:

* *name*: de optionele nieuwe naam van de collectie

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

    // dependencies
    require_once('copernica-rest-api.php');

    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");
    
    // no parameters are supported
    $parameters = array();
    
    // data to be sent to the api
    $data = array(
        'name'  =>  'new-collection-name'
    );
    
    // do the call
    api->put("collection/1234", $parameters, $data);

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Opvragen van een lijst van collecties](rest-get-databases-collections)
* [Verwijderen van een collectie](rest-delete-collection)
