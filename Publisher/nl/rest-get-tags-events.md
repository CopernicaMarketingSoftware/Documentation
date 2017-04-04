# REST API: Opvragen van gebeurtenissen met een tag

Als je  gebeurtenissen met een bepaalde tag wilt downloaden voor de afgelopen
maandelijkse periode, dan kun je die opvragen door middel van een eenvoudige
HTTP GET call naar de volgende URL.

`https://api.copernica.com/v1/tags/$tag/events?access_token=xxxx`

De `$tag` moet je vervangen door de tag waarvoor je de gebeurtenissen wilt
hebben.
Als je op meerdere tags tegelijkertijd wilt filteren, dan kun je de tags
scheiden door middel van puntkomma's.

`https://api.copernica.com/v1/tags/$tag1;$tag2;$tag3/events?access_token=xxxx`

Als je gebeurtenissen voor een eerdere maandelijkse periode wilt downloaden
dat kun je een start datum aan de URL toevoegen:

`https://api.copernica.com/v1/tags/$tag/events/$datum?access_token=xxxx`

waarbij $datum de form heeft van jjjj-mm-dd.

Merk op: Momenteel kunnen gebeurtenissen gedownload worden per maandelijkse
periode. Deze periode kan echter gewijzigd worden wanneer performance dit
vereist.


## Returned fields

A JSON with all the events for the provided tags.

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


## PHP Example

The following PHP script demonstrates how to use the API method.

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // do the call, and print result
    print_r($api->get("tags/myTag/events"));

For the example above you need the [CopernicaRestApi class](rest-php).

## More information

* [List of all API calls](rest-api)
* [Fetching all profile information](rest-get-profile)
