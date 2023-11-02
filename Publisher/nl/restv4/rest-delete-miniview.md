# REST API: DELETE miniview

Een miniview kan verwijderd worden door een HTTP DELETE verzoek te sturen naar de volgende URL:

`https://api.copernica.com/v4/miniview/$id`

De `$id` hier moet vervangen worden door de ID van de selectie die je wilt verwijderen. 
Let op dat je alleen de miniview verwijderd op deze manieren, 
alle profielen in de miniview blijven bestaan.


## Voorbeeld in PHP

Het volgende voorbeeld demonstreert hoe je deze methode gebruikt in PHP:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 4);

// voer het verzoek uit
$api->delete("miniview/{$miniviewID}");
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Vraag miniview regels op](rest-get-miniview)
* [Pas miniview regels aan](rest-put-miniview)

