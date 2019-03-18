# REST API: PUT subprofile fields

Om de velden van een subprofiel bij te werken, moet je een HTTP PUT request
sturen naar de volgende URL:

`https://api.copernica.com/v2/subprofile/$id/fields?access_token=xxxx`

De code `$id` moet je vervangen door de numerieke identifier van het subprofiel 
waarvan je de velden wilt veranderen. De nieuwe veldwaardes van het subprofiel
kun je in de body van het bericht plaatsen.

## Body data

De nieuwe veldwaardes moet je als body data aan je request meegeven. Deze
data bestaat simpelweg uit de veldnamen die je wilt veranderen, en hun nieuwe
waardes. Als je de data als JSON data verstuurt, moet je dus een object met
als **keys** de veldnamen en als **values** de veldwaardes versturen.

Als je gebruik maakt van een traditioneel x-www-form-urlencoded formaat, dan
moeten de variabelen de namen van de te wijzigen velden bevatten, en de 
waardes van die variabelen zijn de nieuwe waardes van de profielvelden.

## Voorbeeld

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
$api->put("subprofile/{$subprofielID}/fields", array(), $data);
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Opvragen van subprofiel data](rest-get-subprofile)
- [Subprofielen aan een profiel toevoegen](./rest-put-profile-subprofiles)
- [Subprofiel verwijderen](rest-delete-subprofile)
