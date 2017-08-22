# REST API: POST profile subprofiles

Om een subprofile aan een profiel in een bepaalde collectie toe te voegen,
kun je een HTTP POST request sturen naar de volgende URL:

`https://api.copernica.com/v1/profile/$id/subprofiles/$collectionID?access_token=xxxx`

De code **$id** moet je vervangen door de numerieke identifier van het profiel 
waaraan je een subprofiel wil toevoegen en **$collectionID** moet vervangen worden
met de identifier van de collectie waarin je het subprofiel wil toevoegen.
De inhoud van het subprofiel kun je in de message body plaatsen.


## Body data

Het subprofile kan de volgende eigenschappen hebben:

- secret:           geheime code geassocieerd met dit subprofile;
- profile:          id van het subprofile waar het subprofile bij hoort;
- fields:           velden van het subprofile;
- collection:       id van de collectie waar het subprofile bij hoort;
- created:          tijdstip van aanmaken in YYYY-MM-DD hh:mm:ss formaat;
- modified:         tijdstip van laatste aanpassing YYYY-MM-DD hh:mm:ss formaat.


## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen.

```php
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
$api->post("profile/id/subprofiles/321", $data);
// bij een succesvolle call wordt het id van het aangemaakte verzoek teruggegeven
```

Dit voorbeeld vereist de [REST API class](rest-php).


## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Interesses van een profiel overschrijven](rest-put-subprofile-interests)
* [Opvragen van profieldata](rest-get-subprofile)
* [Alle profiel bijwerken](rest-put-subprofile)
* [Profiel verwijderen](rest-delete-subprofile)
