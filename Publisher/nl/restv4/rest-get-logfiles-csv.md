# REST API: GET logfiles .csv

Copernica houdt logfiles bij die je op kunt vragen met de API.
Deze methode kan gebruikt worden om een logfile op te vragen als een CSV
bestand met de bestandsnaam. Instructies voor het opvragen van een bestandsnaam
kun je vinden onder het kopje "Meer informatie". Om de methode aan te roepen
verstuur je een HTTP GET verzoek naar de volgende URL voor een file zonder header:

`https://api.copernica.com/v4/logfile/$filename`

In beide URLs moet je `$filename` vervangen door de bestandsnaam.


## Teruggegeven bestand

Deze functie geeft een CSV file terug met of zonder header, afhankelijk van
welke URL gebruikt is. De CSV file is vergelijkbaar met de tabel hieronder, maar
gebruikt komma's in plaatst van lijnen om de waardes te scheiden.

| id  |        time         | mailingid | profileid | subprofileid | databaseid | ... |
|-----|---------------------|-----------|-----------|--------------|------------|-----|
| XX1 | 2016-11-04 11:01:00 | 12345     | 111111    | 2            | 123        | ... |
| XX2 | 2016-11-04 11:06:00 | 12346     | 111112    | 3            | 123        | ... |


## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode gebruikt. Vergeet
niet de bestandsnaam in te voeren. Een voorbeeld van zo'n bestandsnaam is
`cdm-attempts.2016-11-04.log` om de afleverpogingen van 4 November 2016 op
te vragen.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 4);

// voer het verzoek uit en print het resultaat
print_r($api->get("logfile/{$bestandsnaam}/csv"));
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Vraag namen van logfiles op](rest-get-logfiles-names)
* [Downloaden van een logfile in JSON formaat](./rest-get-logfiles-json.md)
* [Downloaden van een logfile in XML formaat](./rest-get-logfiles-xml.md)
