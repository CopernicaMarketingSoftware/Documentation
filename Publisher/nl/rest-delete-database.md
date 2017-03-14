# REST API: verwijderen van een database

Methode om een database (en dus ook alle bijbehorende profielen!) te verwijderen.
Dit is een HTTP DELETE methode, naar het volgende adres:

`https://api.copernica.com/v1/database/$id?access_token=xxxx`

De variabele `$id` moet worden vervangen door de numerieke identifier of de naam
van de te verwijderen database.

## Voorbeeld in PHP

Het volgende voorbeeld demonstreert hoe je deze methode uitvoert in PHP:

    // vereiste scripts
    require_once('copernica_rest_api.php');
    
    // verander dit naar je access token
    $api = new CopernicaRestApi("your-access-token");

    // voer het verzoek uit
    $api->delete("database/1234");

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Alle databases opvragen](rest-get-databases)
* [Nieuwe database aanmaken](rest-post-databases)

