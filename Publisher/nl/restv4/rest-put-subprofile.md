# REST API: PUT subprofile

Dit is een methode om de eigenschappen van een bestaand subprofiel aan te passen. Het kan aangeroepen worden met een HTTP PUT verzoek naar de volgende URL:

`https://api.copernica.com/v3/subprofile/$id?access_token=xxxx`

De `$id` moet hier vervangen worden door de ID van het subprofiel waarvan je de eigenschappen aan wilt passen.

## Beschikbare parameters

De volgende parameters kunnen in de message body van het HTTP PUT command worden geplaatst:

- **fields**: Velden die het subprofiel bevat en hun waarden
- **secret**: De geheime code die gelinkt is aan het subprofiel

## Voorbeeld

Het volgende PHP voorbeeld laat zien hoe je deze API methode gebruikt:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// data voor de methode
$data = array(
    "fields" => array(
        'firstname' =>  'John',
        'lastname'  =>  'Doe',
        'email'     =>  'johndoe@example.com'
    ),
    "secret" => "geheimecode"
);

// voer het verzoek uit en print het resultaat
print_r($api->put("subprofile/{$subprofielID}", array(), $data));
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle REST API methodes](./rest-api)
* [Het aanmaken van een profiel](./rest-put-profile)
* [Het aanpassen van de velden van een subprofiel](./rest-put-subprofile-fields)
