# REST API: GET scheduledemailings (Marketing Suite)

Een scheduled emailing is een emailing die ingeroosterd is. De start datum 
hiervoor kan in het verleden of de toekomst liggen en de emailing kan 
een of meerdere keren verstuurd worden. Deze methode vraagt een lijst op 
van alle scheduled mailings verstuurd met de 
Marketing Suite. De methode maakt een HTTP call naar het volgende adres:

`https://api.copernica.com/v3/ms/scheduledemailings?access=token=xxxx`

Je kunt de methode om alle Publisher emailings op te vragen [hier](./rest-get-publisher-emailings) vinden.

## Beschikbare parameters

* **active**: Geef alleen actieve mailings ('true') of niet actieve mailings ('false') 
terug. Laat dit veld leeg voor beide.
* **repeated**: Geef alleen herhalende mailings ('true') of niet herhalende mailings ('false')
terug. Laat dit veld leeg voor beide.
* **mass**: Vraag alleen massa mailings op ('true') of alle mailings ('false'/standaard gedrag).
* **nextrunbefore**: Volgende verzending moet voor deze tijdstempel plaatsvinden (YYYY-MM-DD HH:MM:SS formaat). 
* **nextrunafter**: Volgende verzending moet na deze tijdstemp plaatsvinden (YYYY-MM-DD HH:MM:SS formaat).

Deze methode ondersteunt ook [paging parameters](./rest-paging).

## Teruggegeven velden

Deze methode geeft een JSON object met scheduled emailings onder het **data** veld 
terug. Elke emailing bevat de volgende velden:

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

### RRules

Een RRule is een regel die herhaling specificeert, bijvoorbeeld voor een 
maandelijkse mailing. De RRules die binnen Copernica gebruikt worden volgen het 
[iCalendar formaat](https://icalendar.org/RFC-Specifications/iCalendar-RFC-5545/ "Het iCalendar formaat") 
(RFC 5545). Er bestaan vele tools om je op weg te helpen met RRules, zoals 
bijvoorbeeld de = [tool op de iCalendar website](https://icalendar.org/rrule-tool.html).

### JSON voorbeeld

De JSON die terug wordt gegeven bevat een property 'data', die een array 
met alle emailings bevat. Een enkele emailing ziet er bijvoorbeeld zo uit:

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
   }
}
```

## PHP Voorbeeld

Het volgende script demonstreert hoe je deze methode kunt gebruiken. Omdat we de 
CopernicaRestAPI klasse gebruiken hoef je je geen zorgen te maken over het escapen 
van speciale karakters; dit wordt automatisch afgehandeld.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// parameters om aan de call mee te geven
$parameters = array(
    'limit'             => 10,
    'type'              => 'mass',
    'followups'         => 'no',
);

// voer het verzoek uit en print het resultaat
print_r($api->get("ms/scheduledemailings", $parameters));
```

Het bovenstaande voorbeeld vereist de [CopernicaRestApi klasse](./rest-php).

## Meer informatie

* [Overzicht van alle API calls](./rest-api)
* [Opvragen van Publisher mailings](./rest-get-emailings)
* [Opvragen van (standaard) Marketing Suite mailings](./rest-get-ms-emailings)

De volgende links helpen je op weg met RRules. Deze pagina's zijn geschreven 
in het Engels.

* [Het iCalendar/RFC5545 formaat](https://icalendar.org/RFC-Specifications/iCalendar-RFC-5545/ "Het iCalendar formaat") 
* [RRule tool op de iCalendar website](https://icalendar.org/rrule-tool.html "Tool voor het creëren van RRules")
