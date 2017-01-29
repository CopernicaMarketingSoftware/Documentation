# REST API: aanmaken van een profiel

Als je een profiel wilt aanmaken, dien je een HTTP POST request te sturen
naar de volgende URL:

`https://api.copernica.com/database/$id/profiles?access_token=xxxx`

De code $id moet je vervangen door de nummerieke identifier of de naam van de 
database waar je het profiel in wilt opslaan. De veldwaardes van het profiel
kun je in de body van het bericht plaatsen.

## Beschikbare parameters

De parameters die je in de body van het HTTP POST request plaatst, zijn de
velden van het aan te maken profiel. Omdat de velden van elke database anders
zijn, staan de namen van de parameters ook niet vast. 


## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // data to pass to the call
    $data = array(
        'firstname' =>  'John',
        'lastname'  =>  'Doe',
        'email'     =>  'johndoe@example.com'
    );
    
    // do the call
    $api->post("database/1234/profiles", $data);

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.
    

## Meer informatie

* [Overzicht van alle API calls](rest-reference)
* [Opvragen van alle profielen](rest-get-database-profiles)
* [Profiel bijwerken](rest-put-profile-fields)
* [Profiel verwijderen](rest-delete-profile)
