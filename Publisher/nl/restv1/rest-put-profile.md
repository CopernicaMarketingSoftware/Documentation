# REST API: PUT profile

Waarschuwing: Je bekijkt nu het overzicht voor de oude versie van onze 
API. Wij raden aan om [versie 2](../restv2/rest-api.md) van de API te gebruiken.

Dit is een methode om de eigenschappen van een bestaand profiel aan te passen. Het kan aangeroepen worden met een HTTP PUT verzoek naar de volgende URL:

`https://api.copernica.com/v1/profile/$id?access_token=xxxx`

De **$id** moet hier vervangen worden door de ID van het profiel waarvan je de eigenschappen aan wilt passen.

## Beschikbare parameters

De volgende parameters kunnen in de message body van het HTTP PUT command worden geplaatst:

- **fields**: Velden die het profiel bevat en hun waarden
- **interests**: Interesses van het profiel
- **secret**: De geheime code die gelinkt is aan het profiel

## Voorbeeld

Het volgende PHP voorbeeld laat zien hoe je deze API methode gebruikt:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestApi("your-access-token");

// data voor de methode

$data = array(
    "fields" => array(
        'firstname' =>  'John',
        'lastname'  =>  'Doe',
        'email'     =>  'johndoe@example.com'
    ),
    "interests" = array(
        'football'  =>  0,
        'tennis'    =>  1,
        'hockey'    =>  1
    ),
    "secret" => "geheimecode"
);

// voer het verzoek uit en print het resultaat
print_r($api->put("profile/1234", array(), $data));
```

Dit voorbeeld vereist de [REST API class](rest-php).

## Meer informatie

* [Overzicht van alle REST API methodes](./rest-api)
* [Het aanmaken van een profiel](./rest-put-profile)
* [Het aanpassen van de velden van een profiel](./rest-put-profile-fields)
* [Het aanpassen van de interesses van een profiel](./rest-put-profile-interests)
