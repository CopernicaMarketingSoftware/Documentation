# REST API: GET logfiles (datums)

Copernica houdt logfiles bij met verschillende informatie zoals clicks, 
geopende mails, errors, geaccepteerde berichten, etc. 
Deze logfiles kunnen opgevraagd worden met de API. Zie 
[het artikel over namen van logfiles opvragen](./rest-get-logfiles-names.md) 
voor meer informatie over de verschillende logfiles die beschikbaar zijn. 
Door een HTTP GET verzoek te sturen naar de volgende URL kun je een lijst 
terugkrijgen van alle datums waarvoor logfiles zijn opgeslagen.

`https://api.copernica.com/v3/logfiles?access_token=xxxx`

## Geretourneerde velden

Deze methode geeft een JSON array terug van datum strings. De links onder 
"Meer informatie" bevatten instructies om de logfiles voor een datum te downloaden 
in het gewenste formaat.

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen vanuit een PHP script:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// voer het verzoek uit en print het resultaat
print_r($api->get("logfiles"));
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](./rest-api.md)
* [Logfile namen opvragen voor een datum](./rest-get-logfiles-names.md)
* [Een logfile opvragen in JSON formaat](rest-get-logfiles-json)
* [Een logfile opvragen in CSV formaat](rest-get-logfiles-csv)
* [Een logfile opvragen in XML formaat](rest-get-logfiles-xml)
