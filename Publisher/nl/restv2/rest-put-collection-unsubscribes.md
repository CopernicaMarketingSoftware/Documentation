# REST API: PUT unsubscribe subprofielen op basis van veldwaarden

Je kunt het ingestelde uitschrijfgedrag van een subprofiel dat voldoet aan bepaalde criteria in een collectie
uitvoeren door HTTP PUT request te sturen naar de volgende URL:

`https://api.copernica.com/v2/collection/$id/unsubscribes?access_token=xxxx`

De variabele `$id` moet vervangen worden door de numerieke identifier van de collectie waar je naar het subprofiel wilt zoeken waarvan het uitschrijfgedrag moet worden uitgevoerd.

## Beschikbare parameters

Om subprofielen te selecteren geven we de data mee via de URL, de volgende parameter moet hiervoor gebruikt worden:

* **fields**: verplichte parameter om subprofielen te selecteren waarvan het uitschrijfgedrag moet worden uitgevoerd.

De **fields** parameter is verplicht, om te voorkomen dat een enkele API call alle subprofielen in de collectie kan bijwerken. Alleen de matchende subprofielen worden bijgewerkt. Meer informatie over het gebruik van deze fields parameter kun je vinden in een
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

// parameters voor de subprofiel selectie
$parameters = array(
    'fields'    =>  array("ID==4567")
);

// voer het verzoek uit
$api->put("collection/{$collectionID}/unsubscribes", $data, $parameters));
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Unsubscribe profiel op basis van veldwaarden](rest-put-database-unsubscribes)