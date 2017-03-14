# REST API: bijwerken gegevens van een collectie

Als je de gegevens van een collectie wilt bijwerken,
kun je dit doen door een HTTP PUT verzoek naar de volgende URL te sturen:

`https://api.copernica.com/v1/collection/$id?access_token=xxxx`

De variabele `$id` in de URL moet worden vervangen door de numerieke identifier
van de collectie die je wilt bewerken.

## Beschikbare parameters

De volgende variabele kan in de body van het HTTP PUT commando worden
geplaatst:

* **name**: de optionele nieuwe naam van de collectie
* **database**: de ID van de database waar de collectie in staat
* **fields**: velden in de collectie

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

    // vereiste scripts
    require_once('copernica-rest-api.php');

    // verander dit naar access token
    $api = new CopernicaRestApi("your-access-token");

    // data voor de methode
    $data = array(
        'name'  =>  'new-collection-name'
    );
    
    // voer het verzoek uit
    api->put("collection/1234", $data);

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Opvragen van een lijst van collecties](rest-get-databases-collections)
* [Verwijderen van een collectie](rest-delete-collection)
