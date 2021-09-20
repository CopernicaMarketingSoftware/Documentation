# REST API: POST view rules

Deze methode voegt een regel toe aan een bestaande selectie. 
Om deze methode uit te voeren kan er een HTTP POST verzoek verstuurd 
worden naar de volgende URL:

`https://api.copernica.com/v3/view/$id/rules?access_token=xxxx`

De `$id` moet hier vervangen worden door de ID van de selectie waar 
een regel aan toegevoegd moet worden. De naam van de regel en de andere 
waarden moeten toegevoegd worden aan de message body.

## Beschikbare parameters

De volgende eigenschappen kunnen meegegeven worden in de message body. Er moet tenminste een naam worden meegegeven.

- name:     naam van de regel. Deze moet uniek zijn binnen de regelnamen in de selectie en is verplicht;
- inversed: boolean waarde die met waarde "True" alleen profielen teruggeeft die juist *niet* aan de regel voldoen;
- disabled: boolean waarde die aangeeft of de regel wel of niet uitgeschakeld is.

Condities kunnen toegevoegd worden met de [POST regel condities methode](./rest-post-rule-conditions).

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe deze methode gebruikt kan worden:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// data voor de methode
$data = array(
    'name'      =>  'rule-name',
    'inversed'  =>  false,
    'disabled'  =>  false, 
);

// voer het verzoek uit en sla het result op
$resultaat = $api->post("view/{$id}/rules", $data);
```

Zoals andere POST calls wordt bij een succesvol verzoek de ID van het 
nieuwe object teruggegeven, in dit geval de regel. Je kunt hier meteen 
nieuwe condities aan toevoegen met de [POST regel condities methode](./rest-post-rule-conditions).
Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [PUT view](rest-put-view)
* [POST rule conditions](rest-post-rule-conditions)
* [GET view rules](rest-get-view-rules)

