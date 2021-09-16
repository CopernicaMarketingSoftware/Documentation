# REST API: GET logfiles .json

Copernica houdt logfiles bij die je op kunt vragen met de API. 
Deze methode kan gebruikt worden om een logfile op te vragen als een JSON 
bestand met de bestandsnaam. Instructies voor het opvragen van een bestandsnaam 
kun je vinden onder het kopje "Meer informatie". Om deze methode uit te voeren kun je een HTTP GET 
verzoek sturen naar de volgende URL:

`https://api.copernica.com/v3/logfile/$bestandsnaam/json?access_token=xxxx`

Hier moet je `$bestandsnaam` vervangen door de bestandsnaam.

## Teruggegeven bestand

Deze functie geeft een JSON representatie terug van de opgevraagde logfile. 
Hieronder staat een voorbeeld van hoe deze representatie eruit ziet.

```json
[
    {
        "id":"XXXXXXXXXX1",
        "time":"2016-11-04 11:01:00",
        "mailingid":12345,
        "profileid":1111111,
        "subprofileid":2,
        "databaseid":133,
        "collectionid":0,
        "senderdomain":
        "copernica.com",
        "templateid":1234,
        "tags":"",
        "email":"employee1234@copernica.com"
    },
    {
        "id":"XXXXXXXXXX2",
        "time":"2016-11-04 11:06:00",
        "mailingid":12345,
        "profileid":1111111,
        "subprofileid":2,
        "databaseid":133,
        "collectionid":0,
        "senderdomain":"copernica.com",
        "templateid":1234,
        "tags":"",
        "email":"employee1235@copernica.com"
    },
        ...
]
```

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode gebruikt. Vergeet 
niet de bestandsnaam in te voeren. Een voorbeeld van zo'n bestandsnaam is 
`cdm-attempts.2016-11-04.log` om de afleverpogingen van 4 November 2016 op 
te vragen.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// voer het verzoek uit en print het resultaat
print_r($api->get("logfile/{$bestandsnaam}/json"));
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Vraag namen van logfiles op](rest-get-logfiles-names)
* [Downloaden van een logfile in JSON formaat](./rest-get-logfiles-json.md)
* [Downloaden van een logfile in CSV formaat](./rest-get-logfiles-csv.md)
* [Downloaden van een logfile in XML formaat](./rest-get-logfiles-xml.md)
