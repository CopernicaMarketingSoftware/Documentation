# REST API: PUT profile fields

Om de velden van een profiel bij te werken, moet je een HTTP PUT request
sturen naar de volgende URL:

`https://api.copernica.com/v3/profile/$id/fields?access_token=xxxx`

De code `$id` moet je vervangen door de numerieke identifier van het profiel
waarvan je de velden wilt veranderen. De nieuwe veldwaardes van het profiel
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
$api->put("profile/{$profielID}/fields", $data);
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Opvragen van profieldata](rest-get-profile)
* [Een profiel bijwerken](rest-put-profile)
* [Een profiel verwijderen](rest-delete-profile)
