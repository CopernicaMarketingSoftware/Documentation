# REST API: DELETE subprofile

Het verwijderen van een subprofiel kan gedaan worden door een HTTP DELETE verzoek te sturen naar de volgende URL:

`https://api.copernica.com/v1/subprofile/$id?access_token=xxxx`

De `$id` hier moet vervangen worden door de ID van het subprofiel dat je wilt verwijderen.


## Voorbeeld in PHP

Het volgende voorbeeld demonstreert hoe je gebruik maakt van deze methode met de API:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestApi("your-access-token");

// voer het verzoek uit
$api->delete("subprofile/id");

// bij een succesvolle call wordt het id van het aangemaakte verzoek teruggegeven
```

Dit voorbeeld vereist de [REST API class](rest-php).


## More information

* [Overzicht van alle REST API calls](rest-api)
* [GET profile](rest-get-profile)
* [PUT profile](rest-put-profile)