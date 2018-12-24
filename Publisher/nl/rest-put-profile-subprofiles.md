# REST API: PUT profile subprofiles

Je kunt een subprofiel bewerken door een HTTP PUT request sturen naar de volgende 
URL:

`https://api.copernica.com/v2/subprofile/$id/fields?access_token=xxxx`

De code `$id` moet je vervangen door de numerieke identifier van het subprofiel 
waaraan je een data wilt toevoegen De inhoud van het subprofiel kun je in de message body plaatsen.

## Body data

Je kunt een field bewerken door properties mee te geven aan de data
array.

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe de API methode aan kan worden geroepen.

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
$api->put("subprofile/{$subprofielID}/fields", $data);
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [POST profile subprofiles](rest-post-profile-subprofiles)
* [PUT profile interests](rest-put-profile-interests)
* [GET subprofile](rest-get-subprofile)
* [DELETE subprofile](rest-delete-subprofile)
