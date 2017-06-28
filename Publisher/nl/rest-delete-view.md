# REST API: DELETE view

Om een selectie van profielen te verwijderen kan er een HTTP DELETE verzoek gestuurd worden naar de volgende URL:

`https://api.copernica.com/v1/view/$id?access_token=xxxx`

De `$id` moet vervangen worden door de ID van de selectie die je wilt verwijderen. Met deze methode verwijder je alleen de selectie, niet de profielen die erin zitten. Als je de profielen ook wilt verwijderen kun je de hele database verwijderen of individuele profielen verwijderen.


## Voorbeeld in PHP

Het volgende voorbeeld demonstreert het gebruik van deze methode met de API:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestApi("your-access-token");

// voer het verzoek uit
$api->delete("view/id");
```

Dit voorbeeld vereist de [REST API class](rest-php).

## Meer informatie

* [Overzicht van alle REST API calls](rest-api)
* [GET view profiles](rest-get-view-profiles)
* [DELETE profile](rest-delete-profile)

