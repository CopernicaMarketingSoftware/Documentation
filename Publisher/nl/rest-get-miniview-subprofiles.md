# REST API: GET miniview subprofiles

Subprofielen zijn voor collecties wat reguliere profielen zijn in een database. Je kunt een lijst van subprofielen van een miniselectie
opvragen door een HTTP GET verzoek naar de volgende URL te sturen:

`https://api.copernica.com/v1/miniview/$id/subprofiles?access_token=xxxx`

De `$id` moet vervangen worden met de ID van de miniselectie.


## Teruggeven velden

Deze methode geeft een array van subprofielen terug. Deze subprofielen zijn JSON objecten met de volgende eigenschappen:

- **id**: unieke numerieke identifier van het subprofiel
- **secret**: geheime code geassocieerd met het subprofiel
- **fields**: velden die bij het subprofiel horen
- **profile**: ID van het profiel waar het subprofiel bij hoort
- **collection**: ID van de collectie waar het subprofiel bij hoort
- **created**: tijdstip van aanmaken van het subprofiel in YYYY-MM-DD hh:mm:ss formaat
- **modified**: tijdstip van laatste aanpassing van het subprofiel in YYYY-MM-DD hh:mm:ss formaat


## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe de API method te gebruiken is.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestApi("your-access-token");

// voer het verzoek uit en print het resultaat
print_r($api->get("miniview/id/subprofiles"));
```

Dit voorbeeld vereist de [REST API class](rest-php).


## Meer informatie

- [Overzicht van alle API methodes](rest-api)
- [Alle selectie metadata opvragen](rest-get-miniview)