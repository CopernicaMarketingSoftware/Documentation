# REST API: bijwerken gegevens van een selectie

Methode om de properties van een selectie bij te werken. Dit is een HTTP PUT
methode die toegankelijk is via het volgende adres:

`https://api.copernica.com/v1/view/$id?access_token=XXX`

De variabele `$id` in de URL moet worden vervangen door de numerieke identifier
van de selectie die je wilt bewerken.

## Beschikbare parameters

De volgende variabelen kunnen in de body van het HTTP PUT commando worden
geplaatst:

- **name**: de optionele nieuwe naam van de selectie
- **description**: de optionele nieuwe omschrijving van de selectie
- **parent-type**: geeft aan of de selectie onder een selectie of database valt
- **parent-id**: id van de database of selectie waar de selectie onder valt
- **has-children**: boolean waarde om aan te geven of er selecties onder deze selectie vallen
- **has-referred**: boolean waarde om aan te geven of er andere selecties naar deze selectie refereren
- **has-rules**: boolean waarde om aan te geven of de selectie regels heeft of niet

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

    // vereiste scripts
    require_once('copernica-rest-api.php');

    // verander dit naar je access token
    $api = new CopernicaRestApi("your-access-token");
    
    // data voor de methode
    $data = array(
        'description'   =>  'een nieuwe omschrijving',
    );
    
    // voer het verzoek uit
    api->put("view/1234", $parameters, $data);

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Opvragen van een lijst van selecties in een databases](rest-get-databases-views)
* [Verwijderen van een selectie](rest-delete-view)
