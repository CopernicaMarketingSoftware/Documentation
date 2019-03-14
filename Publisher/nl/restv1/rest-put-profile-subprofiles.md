# REST API: PUT profile subprofiles

Waarschuwing: Je bekijkt nu het overzicht voor de oude versie van onze 
API. Wij raden aan om [versie 2](../restv2/rest-api.md) van de API te gebruiken.

Je kunt een subprofile bewerken door een 
HTTP PUT request sturen naar de volgende 
URL:

`https://api.copernica.com/v1/subprofile/$id/fields?access_token=xxxx`

De code **$id** moet je vervangen door de numerieke identifier van het subprofiel 
waaraan je een data wilt toevoegen De inhoud van het subprofiel kun je in de message body plaatsen.

## Body data

Je kunt een field bewerken door properties mee te geven aan de data
array.

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe de API methode aan kan worden geroepen.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// database en subprofiles id dat je wilt bewerken
$id = 1;
$id2 = 2; 

// verander dit naar je access token
$api = new CopernicaRestApi("your-access-token");

// data voor de methode
$data = array(
    'firstname' =>  'John',
    'lastname'  =>  'Doe',
    'email'     =>  'johndoe@example.com'
);

// voer het verzoek uit
$api->put("subprofile/{$id}/fields", $data);
```

Dit voorbeeld vereist de [REST API class](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [POST profile subprofiles](rest-post-profile-subprofiles)
* [PUT profile interests](rest-put-profile-interests)
* [GET subprofile](rest-get-subprofile)
* [DELETE subprofile](rest-delete-subprofile)
