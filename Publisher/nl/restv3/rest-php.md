# REST API voorbeeld

Hieronder vind je een REST API script, geschreven in PHP.
Met dit voorbeeld kun je gemakkelijk een HTTP request doen.
Alle calls worden ondersteund. Je kunt dus gebruik maken
van: GET, POST, PUT en DELETE calls.

[Download de hulpklasse](../../documentation/downloads/copernica_rest_api.zip "Download de CopernicaRestAPI klasse")

## Gebruik in eigen applicatie

Het bovenstaande script kun je gemakkelijk kopiëren en plakken, zodat je het kunt
gebruiken in je eigen applicatie. Door onderstaande code te implementeren kun je
vanuit andere scripts ook de API aanroepen. De variabele `$versie` kun je
vervangen door een '2' om de nieuwste versie van de API te gebruiken.

```php
<?php
// required code
require_once('copernica_rest_api.php');

// create an api object (add your own access token!)
$api = new CopernicaRestAPI("my-access-token", $version);

// do the call
$result = $api->get("databases");

// print the result
print_r($result);
```

