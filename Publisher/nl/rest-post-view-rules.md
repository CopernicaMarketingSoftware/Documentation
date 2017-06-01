# REST API - POST view rules

Deze methode voegt een regel toe aan een bestaande selectie. Om deze methode uit te voeren kan er een HTTP POST verzoek verstuurd worden naar de volgende URL:

`https://api.copernica.com/v1/view/$id/rules?access_token=xxxx`

De `$id` moet hier vervangen worden door de ID van de selectie waar een regel aan toegevoegd moet worden. De naam van de regel en de andere waarden moeten toegevoegd worden aan de message body.


## Beschikbare parameters

De volgende eigenschappen kunnen meegegeven worden in de message body. Er moet tenminste een naam worden meegegeven.

- name:                     naam van de regel. Deze moet uniek zijn binnen de regelnamen in de selectie en is verplicht;
- view:                     id van de selectie waar de regel bij hoort;
- conditions:               array van condities waar profielen binnen de selectie aan moeten voldoen, zoals bepaalde waarden in bepaalde velden;
- inversed:                 boolean waarde die met waarde "True" alleen profielen teruggeeft die juist *niet* aan de regel voldoen;
- disabled:                 boolean waarde die aangeeft of de regel wel of niet uitgeschakeld is.


## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe deze methode gebruikt kan worden:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestApi("your-access-token");

// data voor de methode
$data = array(
    'name'      =>  'rule-name',
    'view'      =>  1234,
    'inversed'  =>  False
);

// voer het verzoek uit
$api->post("view/id/rules", $data);
// bij een succesvolle call wordt het id van het aangemaakte verzoek teruggegeven
```

Dit voorbeeld vereist de [REST API class](rest-php).


## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [PUT view](rest-put-view)
* [POST rule conditions](rest-post-rule-conditions)
* [GET view rules](rest-get-view-rules)

