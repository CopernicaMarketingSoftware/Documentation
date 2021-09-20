# REST API: GET message (Publisher)

Als je algemene informatie van een met Publisher verstuurde mail wilt
hebben, dan kun je een eenvoudige HTTP GET call naar de volgende URL sturen.

`https://api.copernica.com/v3/publisher/message/$id?access_token=xxxx`

De `$id` moet hier vervangen worden door de unieke identifier van het bericht.

Je kunt de methode om een Marketing Suite bericht op te vragen [hier](./rest-get-ms-message) vinden.

## Geretourneerde waarde

Een JSON met de algemene informatie.

## Voorbeeld

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// voer de methode uit en print het resultaat
print_r($api->get("publisher/message/{$berichtID}"));
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
