# REST API: PUT unsubscribe (HTML-templates)

Door een HTTP PUT-verzoek te sturen naar het volgende adres kun je een (sub)profiel uitschrijven op basis van een verzonden mailing:

`https://api.copernica.com/v4/publisher/emailing/$id/unsubscribe?access_token=xxxx`

## Beschikbare parameters

De volgende parameters zijn beschikbaar, waarvan alleen 'target' verplicht is:

* **target**: De ID van de target (profiel/subprofiel) van de mailing.
* **behavior**: Moet het ingestelde uitschrijfgedrag op de database/collectie worden uitgevoerd? (true/false)
* **statistics**: Moet de uitschrijving meegenomen worden als uitschrijving in de statistieken van de verzonden mailing? (true/false)

## Voorbeeld in JSON

De volgende JSON demonstreert hoe je de API methode kunt gebruiken:

```json
{
    "target": 5555,
    "behavior": true,
    "statistics": false
}
```

## Voorbeeld in PHP

Het onderstaande PHP script laat zien hoe je deze API-methode kunt gebruiken. 

```php
<?php

// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 4);

// parameters om mee te geven aan de call
$parameters = array(
    'target'        => 5555,
    'behavior'      => true,
    'statistics'    => false,
);

// voer het verzoek uit
print_r($api->put("publisher/emailing/$id/unsubscribe", $parameters));
```

Het bovenstaande voorbeeld vereist onze [REST API-klasse](rest-php).

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
