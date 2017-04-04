# REST API: Opvragen van gebeurtenissen bij een Publisher bericht

Als je gebeurtenissen bij een met Publisher verstuurd bericht wilt
downloaden, dan kun je die opvragen door middel van een eenvoudige
HTTP GET call naar de volgende URL

`https://api.copernica.com/v1/old/message/$id/events?access_token=xxxx`

De `$id` moet je vervangen door de unieke string van het bericht waarvoor 
je de gebeurtenissen wilt hebben. Je krijgt de gebeurtenissen tot een maand
nadat het bericht verstuurd is. Wanneer je latere gebeurtenissen bij het
bericht wilt opvragen dan kun je een datum aan de URL toevoegen vanaf wanneer
gezocht moet worden

`https://api.copernica.com/v1/old/message/$id/events/$datum?access_token=xxxx`

waarbij $datum de form heeft van jjjj-mm-dd.

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

    // vereiste scripts
    require_once('copernica_rest_api.php');
    
    // verander dit naar je access token
    $api = new CopernicaRestApi("your-access-token");

    // voer de methode uit en print het resultaat
    print_r($api->get("old/message/1sadf323/events"));

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.


## More information## Meer informatie

* [Overzicht van alle API calls](rest-api)
