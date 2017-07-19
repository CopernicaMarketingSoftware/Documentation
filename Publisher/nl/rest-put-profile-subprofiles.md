# REST API: PUT profile subprofiles

Je kunt een subprofile bewerken door een 
HTTP PUT request sturen naar de volgende 
URL:

`https://api.copernica.com/v1/profile/$id/subprofiles/$collectionID?access_token=xxxx`

De code `$id` moet je vervangen door de numerieke identifier van het profiel 
waaraan je een subprofiel wil toevoegen en `$collectionID` moet vervangen worden
met de identifier van de collectie waarin je het subprofiel wil toevoegen.
De inhoud van het subprofiel kun je in de message body plaatsen. Bij een 
succesvolle call wordt de ID van het aangemaakte verzoek teruggegeven.

## Body data

Je kunt een field bewerken door properties mee te geven aan de data
array.

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestApi("your-access-token");

// data voor de methode
$data = array(
    'firstname' =>  'John',
    'lastname'  =>  'Doe',
    'email'     =>  'johndoe@example.com'
);

// voer het verzoek uit
$api->put("profile/id/subprofiles/id", $data);
```

Dit voorbeeld vereist de [REST API class](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [POST profile subprofiles](rest-post-profile-subprofiles)
* [PUT profiel interesses](rest-put-profile-interests)
* [GET subprofiel](rest-get-subprofile)
* [DELETE subprofiel](rest-delete-subprofile)