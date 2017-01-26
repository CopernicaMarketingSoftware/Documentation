# REST API: aanmaken van een collectie in een database

Om een collectie (een tweede laag dus) aan een database toe te voegen, kun
je een HTTP POST request sturen naar het volgende adres:

`https://api.copernica.com/database/$id/collections?access_token=xxxx`

De code $id moet je vervangen door de nummerieke identifier of de naam van de 
database waar je de collectie aan wilt toevoegen. De naam van de collectie
moet als message body aan het HTTP request worden toegevoegd.

## Beschikbare parameters

De volgende variabelen moeten in de body van de HTTP POST call worden geplaatst.

* **name**: Naam van de nieuw aan te maken collectie

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // data to pass to the call
    $data = array(
        'name'      =>  'example-collection',
    );
    
    // do the call
    $api->post("database/1234/collections", $data);

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.
    

## Meer informatie

* [Overzicht van alle API calls](rest-reference)
* [Opvragen van alle collecties in een database](rest-get-database-collections)
* [Opvragen van elle velden in een collectie](rest-get-collection-fields)
* [Veld toevoegen aan een collectie](rest-post-collection-fields)
