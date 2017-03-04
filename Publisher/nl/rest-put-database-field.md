# REST API: bijwerken eigenschappen van een databaseveld

Als je de eigenschappen van een databaseveld wilt bijwerken, zoals de naam
of het type van het veld, dan kun je dit doen door een HTTP PUT request naar
de volgende URL te sturen:

`https://api.copernica.com/v1/database/$id/field/$id?access_token=XXX`

De eerste $id variabele in de URL moet worden vervangen door de numerieke 
identifier of de naam van de database waarvan je een veld wilt bewerken. De
tweede $id variabele bevat de naam of het ID van het veld.

## Beschikbare parameters

De volgende variabelen kunnen in de body van het HTTP PUT commando worden
geplaatst:

* **name**: Naam van het nieuw aan te maken veld. Dit veld is verplicht
* **type**: Type van het nieuwe veld
* **value**: Standaardwaarde van het nieuwe veld
* **textlines**: Voor tekstvelden: het aantal regels in formulieren om het veld te bewerken
* **length**: Maximum lengte voor teksten
* **index**: Boolean waarde of een index op het veld moet worden aangemaakt
* **displayed**: Boolean waarde om aan te geven dat het veld in de user interface in lijsten en grids moet worden geplaatst
* **hidden**: Boolean waarde om aan te geven dat een velt nooit zichtbaar mag zijn in de user interface
* **ordered**: Boolean waarde of profielen standaard op basis van dit veld zijn gesorteerd

Dit zijn precies dezelfde velden die ook worden ondersteund door de
[methode om nieuwe velden aan te maken](./rest-post-database-fields).


## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

    // dependencies
    require_once('copernica-rest-api.php');

    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");
    
    // additional url based paramaters
    $parameters = array();
    
    // data to be sent to the api
    $data = array(
        'name'          =>  'new-field-name'
    );
    
    // do the call
    api->put("database/1234/field/456", $parameters, $data);

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Opvragen van alle velden van de database](rest-get-database-fields)
* [Verwijderen van een veld](rest-delete-database-field)
