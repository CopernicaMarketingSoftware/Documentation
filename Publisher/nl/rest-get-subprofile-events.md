# REST API: Opvragen van subprofiel gebeurtenissen

Als je alle subprofiel gebeurtenissen wilt downloaden, dan kun je een eenvoudige
HTTP GET call naar de volgende URL sturen.

`https://api.copernica.com/v1/subprofile/$id/events?access_token=xxxx`

De `$id` moet je vervangen door de numerieke identifier van het subprofiel
waarvoor je de gebeurtenissen wilt hebben.


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

    // vereiste scripts
    require_once('copernica_rest_api.php');
    
    // verander dit naar je access token
    $api = new CopernicaRestApi("your-access-token");

    // voer de methode uit en print het resultaat
    print_r($api->get("subprofile/1234/events"));

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.

## More information

* [Overzicht van alle API calls](rest-api)
