# REST API: PUT unsubscribe subprofiel

Je kunt het ingestelde uitschrijfgedrag van een subprofiel in de collectie van
een database uitvoeren door HTTP PUT request te sturen naar de volgende URL:

`https://api.copernica.com/v2/subprofile/$id/unsubscribe/?access_token=xxxx`

De variabele `$id` moet vervangen worden door de numerieke identifier van het
subprofiel waarvan het uitschrijfgedrag moet worden uitgevoerd.

## Body data

Er hoeft geen extra data meegegeven te worden in de body. De [REST API klasse](rest-php)
vereist wel dat er een body moet worden meegegeven, in dit geval dus een lege array.


## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe de API methode aan kan worden geroepen.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// body data
$data = array();

// voer het verzoek uit
$api->put("subprofile/{$subprofielID}/unsubscribe", $data));
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Unsubscribe profiel](rest-put-profile-unsubscribe)