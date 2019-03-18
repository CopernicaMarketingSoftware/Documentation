# REST API: GET old template events

Waarschuwing: Je bekijkt nu het overzicht voor de oude versie van onze 
API. Wij raden aan om [versie 2](../restv2/rest-api.md) van de API te gebruiken.

Als je events van een Publisher template wilt downloaden, dan kun je die
opvragen door middel van een eenvoudige HTTP GET call naar de volgende URL:

`https://api.copernica.com/v1/old/template/$id/events?access_token=xxxx`

De **$id** moet je vervangen door de numerieke identifier van de template
waarvoor je de gebeurtenissen wilt hebben.


## Beschikbare parameters

De volgende parameters kunnen aan de URL als variabelen worden toegevoegd:

- **start**: de start datum (jjjj-mm-dd) vanaf wanneer de events gedownload worden,
- **end**:   de (exclusieve) eind datum (jjjj-mm-dd) tot wanneer de events gedownload worden,
- **tags**:  optionele tags waarop gefilterd wordt.


## Start en end

Als er geen start en end parameters opgegeven worden, krijg je de events
tot een maand geleden. Als een start parameter opgegeven wordt, krijg
je de events vanaf de startdatum tot een maand na de startdatum. Als je
een einddatum opgeeft, krijg je de events van een maand voor de einddatum
tot aan (exclusief) de einddatum. Als de start- en einddatum verder dan
een maand uit elkaar liggen, krijg je de gebeurtenissen van de start tot
een maand na start. De einddatum wordt dus genegeerd. Houd er rekening
mee dat de data als een UTC datum geïnterpreteerd wordt. Deze datum begint
1 of 2 uur later  (afhankelijk van zomer- en wintertijd) dan de Nederlandse
tijd. Houd er ook rekening mee dat de beperking van de periode tot een
maand gewijzigd kan worden als als de performance dit vereist.


## Tags

Als er een tag parameter opgegeven wordt, worden de events ook gefilterd
op de tag. Als je op meerdere tags tegelijkertijd wilt filteren, dan kun
je meerdere tags gescheiden door puntkomma's opgeven.


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
        "event" : "open|click|failure|...",
        "fieldname1" : "data1",
        "fieldname2" : "data2",
        ...
    },
    ...
]
```
De **event** property in de JSON geeft het type event weer. De mogelijke
types staan beschreven op de [event types pagnina](./event-types.md).


## Voorbeeld

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestApi("your-access-token");

// parameters voor de methode
$parameters = array(
    "start"     =>  "2017-02-27"
);

// voer de methode uit en print het resultaat
print_r($api->get("old/template/1234/events", $parameters));
```

Dit voorbeeld vereist de [REST API class](rest-php).


## Meer informatie

* [Overzicht van alle API calls](rest-api)
