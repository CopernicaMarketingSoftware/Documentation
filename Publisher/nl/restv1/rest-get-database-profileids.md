# REST API: GET database profile id

Waarschuwing: Je bekijkt nu het overzicht voor de oude versie van onze 
API. Wij raden aan om [versie 2](../restv2/rest-api.md) van de API te gebruiken.

Als je alleen maar de ID's van de profielen in een database wilt opvragen,
kan dat met een heel simpele methode. Je kunt een HTTP GET request sturen 
naar het volgende adres:

`https://api.copernica.com/v1/database/$id/profileids?access_token=xxxx`

De code **$id** moet je vervangen door de numerieke identifier of de naam van de 
database waar je de ID's van wilt opvragen.


## Beschikbare parameters

Deze methode ondersteunt geen parameters


## Geretourneerde velden

De methode retourneert een JSON array bestaande uit numerieke identifiers.


## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestApi("your-access-token");

// voer de methode uit en print resultaat
print_r($api->get("database/1234/profileids"));
```

Dit voorbeeld vereist de [REST API class](rest-php).


## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Profielen inclusief alle profieldata opvragen](rest-get-database-profiles)
