# REST API: aanmaken van een nieuwe selectie

Om een nieuwe selectie aan te maken, moet je een HTTP POST request sturen
naar de volgende URL. De selectie wordt dan direct onder de database aangemaakt.

`https://api.copernica.com/database/$id/views?access_token=xxxx`

De code $id moet je vervangen door de nummerieke identifier of de naam van de 
database waar je een selectie aan wilt toevoegen. De naam van de selectie moet
als message body aan het HTTP request worden toegevoegd.

## Beschikbare parameters

De volgende variabele moet in de body van de HTTP POST call worden geplaatst.

* **name**: Naam van de nieuw aan te maken selectie. Dit veld is verplicht


## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // data to pass to the call
    $data = array(
        'name'      =>  'my-selection',
    );
    
    // do the call
    $api->post("database/1234/views", $data);

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.
    

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Opvragen selecties van een database](rest-get-database-views)
* [Selectieregels opvragen](rest-get-view-rules)
* [Selectieregel aanmaken](rest-post-view-rules)
