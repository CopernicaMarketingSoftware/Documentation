# REST API: DELETE subprofiel

Het verwijderen van een subprofiel kan gedaan worden door een HTTP DELETE verzoek te sturen naar de volgende URL:

`https://api.copernica.com/v2/subprofile/$id?access_token=xxxx`

De **$id** hier moet vervangen worden door de ID van het subprofiel dat je wilt verwijderen.

## Beschikbare parameters

De volgende parameters kunnen in de message body worden geplaatst:

- **completely**: Profiel volledig uit de backend verwijderen (Yes/**No**)

\* Dikgedrukte waarde is de standaardwaarde.

## Voorbeeld in PHP

Het volgende voorbeeld demonstreert hoe je gebruik maakt van deze methode met de API:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// voer het verzoek uit
$api->delete("subprofile/{$subprofielID}");

// bij een succesvolle call wordt het id van het aangemaakte verzoek teruggegeven
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle REST API calls](rest-api)
