# REST API: interesse toevoegen aan een database

De HTTP POST methode om een interesse toe te voegen aan een bestaande database
is beschikbaar via het volgende adres:

`https://api.copernica.com/database/$id/interests?access_token=xxxx`

De code $id moet je vervangen door de nummerieke identifier of de naam van de 
database waar je een interesse aan wilt toevoegen. De naam van de interesse, 
en eventuele andere waardes moeten als message body aan het HTTP request worden toegevoegd.

## Beschikbare parameters

De volgende variabelen kunnen in de body van de HTTP POST call worden geplaats.

* **name**: Naam van de nieuw aan te maken interesse. Dit veld is verplicht
* **group**: Optionele groepnaam. Interesses met dezelfde groupnaam worden bij elkaar gezet in de user interface

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // data to pass to the call
    $data = array(
        'name'      =>  'Voetbal',
        'group'     =>  'Sport'
    );
    
    // do the call
    $api->post("database/1234/interests", $data);

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.
    

## Meer informatie

* [Overzicht van alle API calls](rest-reference)
* [Alle interesses van een database opvragen](rest-get-database-interests)
* [Interesse bijwerken](rest-put-database-interest)
* [Interesse verwijderen](rest-delete-database-interest)
