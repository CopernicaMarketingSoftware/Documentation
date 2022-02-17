# REST API: POST miniview rules

Deze methode voegt een regel toe aan een bestaande miniselectie van een collectie. 
Om deze methode uit te voeren kan er een HTTP POST-verzoek verstuurd worden 
naar de volgende URL:

`https://api.copernica.com/v3/miniview/$id/rules?access_token=xxxx`

De `$id` moet hier vervangen worden door de ID van de miniselectie waar een 
regel aan toegevoegd moet worden. De naam van de regel moet toegevoegd worden aan de message body.

## Beschikbare parameters

De volgende eigenschappen kunnen meegegeven worden in de message body. Er moet tenminste een naam worden meegegeven.

- **name**: Naam van de regel. Deze moet uniek zijn binnen de regelnamen in de selectie en is verplicht.

## Voorbeeld in PHP

Het volgende PHP-script demonstreert hoe deze methode gebruikt kan worden:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// data voor de methode
$data = array(
    'name'      =>  'rulename'
);

// voer het verzoek uit
$api->post("miniview/{$miniviewID}/rules", $data);
// bij een succesvolle call wordt het id van het aangemaakte verzoek teruggegeven
```

Dit voorbeeld vereist de [REST API-klasse](rest-php).

## Meer informatie

* [Overzicht van alle API-calls](rest-api)
* [Aanmaken van een nieuwe selectie](rest-put-miniview)
* [Toevoegen van condities aan een regel](rest-post-minirule-conditions)
* [Selectie regels opvragen](rest-get-miniview-rules)
