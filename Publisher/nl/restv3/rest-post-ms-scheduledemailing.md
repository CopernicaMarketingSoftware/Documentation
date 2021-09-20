# REST API: POST scheduledemailing (Marketing Suite)

Een scheduled emailing is een emailing die ingeroosterd is. De start datum
hiervoor kan in het verleden of de toekomst liggen en de emailing kan
een of meerdere keren verstuurd worden. Je kunt de REST API gebruiken om
een ingeroosterde emailing aan te maken door een HTTP GET verzoek te versturen naar de volgende URL:

`https://api.copernica.com/v3/ms/scheduledemailing?access_token=xxxx`

## Parameters

De methode accepteert de volgende parameters:

* **targettype**    : Type van de target (database, selectie, collectie, etc).
* **target**        : ID van de target.
* **template**      : ID van de template to send.
* **start**         : Tijdstempel voor de startdatum (YYYY-MM-DD HH:MM:SS formaat). Wanneer deze in het verleden ligt zal de emailing meteen verstuurd worden.
* **rrule**         : RRule specificatie voor herhaling (optioneel, zie informatie hieronder).

### RRules

Een RRule is een regel die herhaling specificeert, bijvoorbeeld voor een
maandelijkse mailing. De RRules die binnen Copernica gebruikt worden volgen het
[iCalendar formaat](https://icalendar.org/RFC-Specifications/iCalendar-RFC-5545/ "Het iCalendar formaat")
(RFC 5545). Er bestaan vele tools om je op weg te helpen met RRules, zoals
bijvoorbeeld de = [tool op de iCalendar website](https://icalendar.org/rrule-tool.html).
Als je geen RRule meegeeft zal de mailing maar een keer verzonden worden.

### JSON voorbeeld

De JSON voor de mailing, die je kunt vinden onder de 'data' eigenschap
in de output ziet er bijvoorbeeld zo uit:

```json
{
   "id":"1742",
   "start":"2019-06-27 17:30:00",
   "rrule":"FREQ=DAILY;COUNT=2",
   "template":"2112",
   "next":"2019-06-28 17:30:00",
   "previous":"2019-06-27 17:30:00",
   "subject":"Test emailing",
   "from_address":{
      "name":"Test",
      "email":"test@copernica.com"
   },
   "destinations":200,
   "type":"mass",
   "target":{
      "type":"database",
      "sources":[
         {
            "id":"7141",
            "type":"database"
         }
      ]
   }
}
```

## PHP voorbeeld

Het onderstaande script demonstreert hoe je deze API methode gebruikt.
Vergeet niet de ID in de URL te vervangen voor je het verzoek uitvoert.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// stel de data voor het verzoek in
$data = array(
    'targettype'    =>  "database",
    'target'        =>  1234,
    'template'      =>  123,
    'start'         =>  "2019-07-01 12:00:00",
    'rrule'         =>  "FREQ=DAILY;COUNT=2"
);

// voer het verzoek uit
print_r($api->get("ms/scheduledemailing", $parameters));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php)

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Vraag alle Marketing Suite mailings op](./rest-get-ms-emailings)
* [Vraag alle Marketing Suite scheduled mailings op](./rest-get-ms-scheduledemailings)
* [Aanmaken van een Marketing Suite emailing](./rest-post-ms-emailing)

De volgende links helpen je op weg met RRules. Deze pagina's zijn geschreven
in het Engels.

* [Het iCalendar/RFC5545 formaat](https://icalendar.org/RFC-Specifications/iCalendar-RFC-5545/ "Het iCalendar formaat")
* [RRule tool op de iCalendar website](https://icalendar.org/rrule-tool.html "Tool voor het creëren van RRules")

