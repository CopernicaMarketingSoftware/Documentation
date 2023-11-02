# REST API: GET template translations (drag-and-drop-templates)

Methode om vertaling van een template op te halen. Dit is een HTTP GET-methode
naar het volgende adres:

`https://api.copernica.com/v3/ms/templates/$id/translations?access_token=xxxx`

## Beschikbare parameters

De volgende parameters kunnen aan de URL als variabelen worden toegevoegd:

* **url**: optie om enkel de URL attributen uit de template op te halen (true/false)
* **simpleshorttext**: optie om enkel de tekst attributen van minder of gelijk aan 80 tekens uit de template op te halen (true/false)
* **simplelongtext**: optie om enkel de tekst attributen van meer dan 80 tekens uit de template op te halen (true/false)
* **complextext**: optie om enkel de HTML tekst attributen uit de template op te halen (true/false)

## Voorbeeld in PHP

Het volgende PHP-script demonstreert hoe je de API methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit in je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// parameters om mee te geven
$parameters = array(
    'simpleshorttext' =>  true
);

// voer de methode uit en print de resultaten
print_r($api->get("ms/templates/{$templateID}/translations", $parameters));
```

Dit voorbeeld vereist de [REST API-klasse](rest-php).

## Meer informatie

* [Overzicht van alle API-calls](rest-api)
