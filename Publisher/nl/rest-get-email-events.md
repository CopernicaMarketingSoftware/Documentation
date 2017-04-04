# REST API: Opvragen van gebeurtenissen bij een email adres

Als je gebeurtenissen van de afgelopen maandelijkse periode bij een email
adres wilt downloaden, dan kun je die opvragen door middel van een eenvoudige
HTTP GET call naar de volgende URL

`https://api.copernica.com/v1/email/$adres/events?access_token=xxxx`

Het `$adres` moet je vervangen door het email adres waarvoor je de gebeurtenissen
wilt hebben. Als je voor een eerdere maandelijkse periode gebeurtenissen 
bij een email adres wilt hebben dan kun je een start datum aan de URL
toevoegen.

`https://api.copernica.com/v1/email/$adres/events/$datum?access_token=xxxx`

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
    print_r($api->get("email/john.doe@example.com/events"));

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.


## More information## Meer informatie

* [Overzicht van alle API calls](rest-api)
