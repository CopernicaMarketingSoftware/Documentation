# REST API: POST profile subprofiles

Om een subprofile aan een profiel in een bepaalde collectie toe te voegen,
kun je een HTTP POST request sturen naar de volgende URL:

`https://api.copernica.com/v2/profile/$id/subprofiles/$id?access_token=xxxx`

De eerste `$id` moet je vervangen door de numerieke identifier van het profiel 
waaraan je een subprofiel wil toevoegen en de tweede `$id` moet vervangen worden
met de identifier of naam van de collectie waarin je het subprofiel wil toevoegen.
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
$api = new CopernicaRestAPI("your-access-token", 2);

// data voor de methode
$data = array(
    'firstname' =>  'John',
    'lastname'  =>  'Doe',
    'email'     =>  'johndoe@example.com'
);

// voer het verzoek uit
$api->post("profile/{$profielID}/subprofiles/{$collectieID}", $data);
// bij een succesvolle call wordt het id van het aangemaakte verzoek teruggegeven
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Opvragen van profieldata](rest-get-subprofile)
* [Alle profiel bijwerken](rest-put-subprofile)
* [Profiel verwijderen](rest-delete-subprofile)
