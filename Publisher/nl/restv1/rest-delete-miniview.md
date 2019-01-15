# REST API: DELETE miniview

Waarschuwing: Je bekijkt nu het overzicht voor de oude versie van onze 
API. Wij raden aan om [versie 2](../restv2/rest-api.md) van de API te gebruiken.

Een miniview kan verwijderd worden door een HTTP DELETE verzoek te sturen naar de volgende URL:

`https://api.copernica.com/v1/miniview/$id?access_token=xxxx`

De **$id** hier moet vervangen worden door de ID van de selectie die je wilt verwijderen. Let op dat je alleen de miniview verwijderd op deze manieren, alle profielen die het bevat blijven bestaan.


## Voorbeeld in PHP

Het volgende voorbeeld demonstreert hoe je deze methode gebruikt in PHP:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestApi("your-access-token");

// voer het verzoek uit
$api->delete("miniview/id");
```

Dit voorbeeld vereist de [REST API class](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Vraag miniview regels op](rest-get-miniview)
* [Pas miniview regels aan](rest-put-miniview)

