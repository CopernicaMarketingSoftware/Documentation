# REST API: POST database profiles

Als je een profiel wilt aanmaken, dien je een HTTP POST request te sturen
naar de volgende URL.

`https://api.copernica.com/v1/database/$id/profiles?access_token=xxxx`

De code `$id` moet je vervangen door de numerieke identifier of de naam van de 
database waar je het profiel in wilt opslaan. De veldwaardes van het profiel
kun je in de body van het HTTP request plaatsen. 
Bij een succesvolle call wordt de ID van het aangemaakte verzoek teruggegeven.

Zorg ervoor dat je hier een POST request stuurt en geen PUT request. 
Hoewel deze vaak niet verschillen zou je in dit geval een methode 
aanroepen om meerdere profielen te bewerken, zie 
[meerdere profielen bewerken](rest-put-database-profiles).

## Body data

Naast de parameters die je aan de URL meegeeft, moet je ook body data aan de
POST request toevoegen. In de body van de request plaats je de velden waarmee het 
profiel wordt aangemaakt.

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestApi("your-access-token");

// de veld waarden van het profiel
$data = array(
    'firstname' =>  'John',
    'lastname'  =>  'Doe',
    'email'     =>  'johndoe@example.com'
);

// voer het verzoek uit
$api->post("database/1234/profiles", $data);

// bij een succesvolle call wordt de id van het aangemaakte verzoek teruggegeven
```

Dit voorbeeld vereist de [REST API class](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [GET database profiles](rest-get-database-profiles)
* [PUT profile fields](rest-put-profile-fields)
* [DELETE profile](rest-delete-profile)
* [PUT profile fields](rest-put-profile-fields)
* [POST profile interests](rest-post-profile-interests)
