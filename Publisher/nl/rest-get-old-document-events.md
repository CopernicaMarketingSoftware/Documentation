# REST API: Opvragen van Publisher document events

Als je gebeurtenissen van de afgelopen maandelijkse periode bij een Publisher
document wilt downloaden, dan kun je die opvragen door middel van een
eenvoudige HTTP GET call naar de volgende URL

`https://api.copernica.com/v1/old/document/$id/events?access_token=xxxx`

De `$id` moet je vervangen door de numerieke identifier van het document
waarvoor je de gebeurtenissen wilt hebben. Als je gebeurtenissen van een
eerdere maandelijkse periode wilt downloadend, dan kun je een start datum
aan de URL toevoegen:

`https://api.copernica.com/v1/old/document/$id/events/$date?access_token=xxxx`

waar de datum de form jjjj-mm-dd moet hebben.

Merk op: Momenteel kunnen gebeurtenissen gedownload worden per maandelijkse
periode. Deze periode kan echter gewijzigd worden wanneer performance dit
vereist.


## Geretourneerde informatie

Deze methode retourneert een JSON met daarin alle gebeurtenissen. De JSON
ziet er als volgt uit:

```json
[
    {
        "event" : "open|click|failure|...",
        "fieldname1" : "data1",
        "fieldname2" : "data2",
        ...
    },
    {
        "type" : "open|click|failure|...",
        "fieldname1" : "data1",
        "fieldname2" : "data2",
        ...
    },
    ...
]
```

## PHP Voorbeeld

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen.

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // do the call, and print result
    print_r($api->get("old/document/1234/events"));

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.

## Meer informatie

* [Overzicht van alle API calls](rest-api)
