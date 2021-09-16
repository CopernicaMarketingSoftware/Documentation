# REST API: GET scheduledemailing (Marketing Suite)

Een scheduled emailing is een emailing die ingeroosterd is. De start datum 
hiervoor kan in het verleden of de toekomst liggen en de emailing kan 
een of meerdere keren verstuurd worden. Je kunt de REST API gebruiken om 
een overzicht van een mailing op te vragen 
door een HTTP GET verzoek te versturen naar de volgende URL:

`https://api.copernica.com/v3/ms/scheduledemailing/$id?access_token=xxxx`

Hier moet `$id` vervangen worden door de ID van de mailing.

## Teruggegeven velden

Deze methode geeft een JSON object terug dat de volgende informatie bevat:

* **id**:           De ID van de mailing.
* **start**:        De startdatum van de mailing (YYYY-MM-DD HH:MM:SS formaat).
* **rrule**:        De RRule voor de mailing (optioneel, zie informatie hieronder).
* **next**:         Tijdstempel van volgende verzending.
* **previous**:     Tijdstempel van vorige verzending.
* **template**:     De ID van de template die gebruikt is voor deze mailing.
* **subject**:      Het onderwerp van de mailing.
* **from_address**: Een array met de naam ('name') en het e-mailadres ('email') 
                    van de afzender.
* **type**:         Type van de mailing. Een individuele mailing is 'individual' 
                    en een massa mailing is 'massa'.
* **target**:       Bevat het type van het doelwit van de mailing en de ID 
                    en types van de entiteiten hierboven (bijvoorbeeld de database waar een 
                    collectie onder valt).
* **tags**:         Een array met de gebruikte labels voor de mailing.      

### RRules

Een RRule is een regel die herhaling specificeert, bijvoorbeeld voor een 
maandelijkse mailing. De RRules die binnen Copernica gebruikt worden volgen het 
[iCalendar formaat](https://icalendar.org/RFC-Specifications/iCalendar-RFC-5545/ "Het iCalendar formaat") 
(RFC 5545). Er bestaan vele tools om je op weg te helpen met RRules, zoals 
bijvoorbeeld de = [tool op de iCalendar website](https://icalendar.org/rrule-tool.html).

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
   "type":"mass",
   "target":{
      "type":"database",
      "sources":[
         {
            "id":"7141",
            "type":"database"
         }
      ]
   },
   "tags":[
      "test1", 
      "Test2"
   ]
}
```

## PHP voorbeeld

Het onderstaande script demonstreert hoe je deze API methode gebruikt. 
Vergeet niet de ID in de URL te vervangen voor je het verzoek uitvoert.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// voer het verzoek uit
print_r($api->get("ms/emailing/{$emailingID}", $parameters));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php)

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Vraag alle Marketing Suite mailings op](./rest-get-ms-emailings)
* [Vraag alle Marketing Suite scheduled mailings op](./rest-get-ms-scheduled-emailings)
* [Aanmaken van een Marketing Suite scheduled emailing](./rest-post-ms-scheduled-emailing)

De volgende links helpen je op weg met RRules. Deze pagina's zijn geschreven 
in het Engels.

* [Het iCalendar/RFC5545 formaat](https://icalendar.org/RFC-Specifications/iCalendar-RFC-5545/ "Het iCalendar formaat") 
* [RRule tool op de iCalendar website](https://icalendar.org/rrule-tool.html "Tool voor het creëren van RRules")

