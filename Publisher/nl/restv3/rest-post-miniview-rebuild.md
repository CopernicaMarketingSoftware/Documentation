# REST API: POST miniview rebuild

De HTTP POST-methode om een miniselectie opnieuw op te bouwen 
is beschikbaar op het volgende adres:

`https://api.copernica.com/v3/miniview/$id/rebuild?access_token=xxxx`

De `$id` moet hier vervangen worden door de unieke identifier van de miniselectie. 

## Voorbeeld in PHP
Het volgende PHP script demonstreert hoe je de API-methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// voer het verzoek uit
$api->post("miniview/{$miniviewID}/rebuild");
```

Dit voorbeeld vereist de [REST API-klasse](rest-php).

## Meer informatie

* [Overzicht van alle REST API-calls](./rest-api)
