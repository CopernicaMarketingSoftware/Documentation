# REST API: verwijderen van een database

Methode om een database (en dus ook alle bijbehorende profielen!) te verwijderen.
Dit is een HTTP DELETE methode, naar het volgende adres:

`https://api.copernica.com/database/$id?access_token=xxxx`

De variabele $id moet worden vervangen door de nummerieke identifier of de naam
van de te verwijderen database.

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // do the call
    $api->delete("database/1234");

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.

## Meer informatie

* [Overzicht van alle API calls](rest-reference)
* [Alle databases opvragen](rest-get-databases)
* [Nieuwe database aanmaken](rest-post-databases)

