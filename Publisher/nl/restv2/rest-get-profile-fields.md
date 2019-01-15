# REST API: GET profile fields

Om alleen de velden van een profiel op te vragen, kun je een HTTP GET
request sturen naar de volgende URL:

`https://api.copernica.com/v2/profile/$id/fields?access_token=xxxx`

De code `$id` moet je vervangen door de numerieke identifier van het profiel
dat je opvraagt.

## Geretourneerde velden

De methode retourneert de velden van een profiel.

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen.

```php
    // vereiste scripts
    require_once('copernica_rest_api.php');
    
    // verander dit naar je access token
    $api = new CopernicaRestAPI("your-access-token", 2);

    // voer het verzoek uit en print het resultaat
    print_r($api->get("profile/{$profielID}/fields"));
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Opvragen van alle gegevens van een profiel](rest-get-profile)
