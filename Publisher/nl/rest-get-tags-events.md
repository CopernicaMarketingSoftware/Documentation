# REST API: Opvragen van gebeurtenissen met een tag

Als je  gebeurtenissen met een bepaalde tag wilt downloaden, dan kun je
die opvragen door middel van een eenvoudige HTTP GET call naar de volgende
URL.

`https://api.copernica.com/v1/tags/$tag/events?access_token=xxxx`

De `$tag` moet je vervangen door de tag waarvoor je de gebeurtenissen wilt
hebben.
Als je op meerdere tags tegelijkertijd wilt filteren, dan kun je de tags
scheiden door middel van puntkomma's.

`https://api.copernica.com/v1/tags/$tag1;$tag2;$tag3/events?access_token=xxxx`

## Beschikbare parameters

De volgende parameters kunnen aan de URL als variabelen worden toegevoegd:

- **start**: de start datum (jjjj-mm-dd) vanaf wanneer de events gedownload worden,
- **end**:   de (exclusieve) eind datum (jjjj-mm-dd) tot wanneer de events gedownload worden,

### Start en end

Als er geen start en end parameters opgegeven worden, krijg je de events
tot een maand geleden. Als je een start parameter opgegeven wordt, krijg
je de events vanaf de startdatum tot een maand na de startdatum. Als je
een einddatum opgeeft, krijg je de events van een maand voor de einddatum
tot aan (exclusief) de einddatum. Als de start- en einddatum verder dan
een maand uit elkaar liggen, krijg je de gebeurtenissen van de start tot
een maand na start. De einddatum wordt dus genegeerd. Houd er rekening
mee dat de data als een UTC datum geïnterpreteerd wordt. Deze datum begint
1 of 2 uur later  (afhankelijk van zomer- en wintertijd) dan de Nederlandse
tijd. Houd er ook rekening mee dat de beperking van de periode tot een
maand gewijzigd kan worden als als de performance dit vereist.


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
    
    // parameters voor de methode
    $parameters = array(
        "start"     =>  "2017-02-27"
    );
    
    // do the call, and print result
    print_r($api->get("tags/myTag/events", $parameters));

For the example above you need the [CopernicaRestApi class](rest-php).

## More information

* [List of all API calls](rest-api)
* [Fetching all profile information](rest-get-profile)
