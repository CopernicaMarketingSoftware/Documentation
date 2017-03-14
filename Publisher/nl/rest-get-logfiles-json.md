# REST API: Downloaden van een logfile als JSON bestand

Copernica houdt logfiles bij die je op kunt vragen met de API. 
Deze methode kan gebruikt worden om een logfile op te vragen als een JSON 
bestand met de bestandsnaam. Instructies voor het opvragen van een bestandsnaam 
kun je vinden onder het kopje "Meer informatie". Om deze methode uit te voeren ku je een HTTP GET 
verzoek sturen naar de volgende URL:

`https://api.copernica.com/v1/logfiles/$filename/json?access_token=xxxx`

Hier moet je `$filename` vervangen door de bestandsnaam.

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

Het volgende PHP script demonstreert hoe je de API methode gebruikt.

    // vereiste scripts
    require_once('copernica_rest_api.php');
    
    // verander dit naar je access token
    $api = new CopernicaRestApi("your-access-token");

    // voer het verzoek uit en print het resultaat
    print_r($api->get("logfiles/cdm-attempts.2016-11-04.log/json"));

Dit voorbeeld vereist de [CopernicaRestApi klasse](./rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Vraag namen van logfiles op](rest-get-logfiles-names)
* [Downloaden van een logfile in JSON formaat](./rest-get-logfiles-json.md)
* [Downloaden van een logfile in CSV formaat](./rest-get-logfiles-csv.md)
* [Downloaden van een logfile in XML formaat](./rest-get-logfiles-xml.md)
