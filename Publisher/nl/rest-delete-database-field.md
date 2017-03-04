# REST API: verwijderen van een veld uit een database

Als je een HTTP DELETE request stuurt naar de volgende URL, verwijder je een 
veld uit een database:

`https://api.copernica.com/v1/database/$id/field/$id?access_token=xxxx`

De eerste $id variabele moet je vervangen door de numerieke identifier of de naam
van de database, en de tweede door het ID of de naam van het veld dat je wilt
verwijderen.

## Voorbeeld in PHP

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // do the call
    $api->delete("database/1234/field/firstname");

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Alle velden van een database opvragen](rest-get-database-fields)
* [Nieuw veld aanmaken](rest-post-database-fields)

