# REST API: een subprofiel aan een profiel toevoegen

Om een subprofiel aan een profiel toe te voegen, kun je een HTTP POST
request sturen naar de volgende URL:

`https://api.copernica.com/v1/profile/$id/subprofiles?access_token=xxxx`

De code `$id` moet je vervangen door de numerieke identifier van het profiel 
waaraan je een subprofiel wil toevoegen. De inhoud van het subprofiel kun je in de message body plaatsen.

## Body data

Het subprofiel kan de volgende eigenschappen hebben:

- **secret**: Geheime code geassocieerd met dit subprofiel
- **profile**: ID van het profiel waar het subprofiel bij hoort
- **fields**: Velden van het subprofiel
- **collection**: ID van de collectie waar het subprofiel bij hoort
- **created**: Tijdstip van aanmaken in YYYY-MM-DD hh:mm:ss formaat
- **modified**: Tijdstip van laatste aanpassing YYYY-MM-DD hh:mm:ss formaat

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen.

    // vereiste scripts
    require_once('copernica_rest_api.php');
    
    // verander dit naar je access token
    $api = new CopernicaRestApi("your-access-token");

    // data voor de methode
    $data = array(
        'collection'  =>  '13',
        'profile'    =>  '1234'
    );
    
    // voer het verzoek uit
    $api->post("profile/1234/interests", $data);

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Interesses van een profiel overschrijven](rest-put-subprofile-interests)
* [Opvragen van profieldata](rest-get-subprofile)
* [Alle profiel bijwerken](rest-put-subprofile)
* [Profiel verwijderen](rest-delete-subprofile)
