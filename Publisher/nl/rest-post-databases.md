# REST API: aanmaken nieuwe database

Methode om een nieuwe database aan te maken.

## Beschikbare parameters

* *name*: naam van de nieuw aan te maken database
* *description*: optionele omschrijving van de database
* *archived*: optionele boolean waarde om de database direct te archiveren

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

    // dependencies
    require_once('copernica-rest-api.php');

    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");
    
    // data to be sent to the api
    $data = array(
        'name'          =>  'mijn-test-database',
        'description'   =>  'omschrijving van de database'
    );
    
    // do the call
    api->post("databases", $data);

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.
