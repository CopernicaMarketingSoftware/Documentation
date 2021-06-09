# REST API: PUT unsubscribe profielen op basis van veldwaarden

Je kunt het ingestelde uitschrijfgedrag van een profiel dat voldoet aan bepaalde criteria in een database
uitvoeren door HTTP PUT request te sturen naar de volgende URL:

`https://api.copernica.com/v2/database/$id/unsubscribes?access_token=xxxx`

De variabele `$id` moet vervangen worden door de numerieke identifier van de database waar je naar het profiel wilt zoeken waarvan het uitschrijfgedrag moet worden uitgevoerd.

## Beschikbare parameters

Om profielen te selecteren geven we de data mee via de URL, de volgende parameter moet hiervoor gebruikt worden:

* **fields**: verplichte parameter om profielen te selecteren waarvan het uitschrijfgedrag moet worden uitgevoerd.

De **fields** parameter is verplicht, om te voorkomen dat een enkele API call alle profielen in de database kan bijwerken. Alleen de matchende profielen worden bijgewerkt. Meer informatie over het gebruik van deze fields parameter kun je vinden in een
[artikel over de fields parameter](./rest-fields-parameter.md).

## Body data

Er hoeft geen extra data meegegeven te worden in de body. De [REST API klasse](rest-php)
vereist wel dat er een body moet worden meegegeven, in dit geval dus een lege array.


## PHP voorbeeld

Het volgende PHP script demonstreert hoe de API methode aan kan worden geroepen.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// body data
$data = array();

// parameters voor de profiel selectie
$parameters = array(
    'fields'    =>  array("ID==4567")
);

// voer het verzoek uit
$api->put("database/{$databaseID}/unsubscribes", $data, $parameters));
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Unsubscribe subprofiel op basis van veldwaarden](rest-put-collection-unsubscribes)