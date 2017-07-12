# REST API: GET logfiles

Copernica houdt logfiles bij met verschillende informatie zoals clicks, geopende mails, errors, geaccepteerde berichten, etc. Deze logfiles kunnen opgevraagd worden met de API. Zie [Namen van logfiles voor een datum opvragen](./rest-get-logfiles-names.md) voor meer informatie over de verschillende logfiles die beschikbaar zijn. Door een HTTP GET verzoek te sturen naar de volgende URL kun je een lijst terugkrijgen van alle datums waarvoor logfiles zijn opgeslagen.

`https://api.copernica.com/v1/logfiles?access_token=xxxx`

## Geretourneerde velden

Deze methode geeft een JSON array terug van datum strings. De links onder 
"Meer informatie" bevatten instructies om de logfiles voor een datum te downloaden 
in het gewenste formaat.

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen vanuit een PHP script:

```php
    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // do the call, and print result
    print_r($api->get("logfiles"));
```

Dit voorbeeld vereist de [REST API class](rest-php).

## Meer informatie

* [Overzicht van alle API calls](./rest-api.md)
* [GET logfiles names](./rest-get-logfiles-names.md)
* [GET logfiles JSON](rest-get-logfiles-json)
* [GET logfiles CSV](rest-get-logfiles-csv)
* [GET logfiles XML](rest-get-logfiles-xml)
