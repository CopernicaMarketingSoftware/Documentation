# REST API: GET scheduledemailing (Publisher)

Een scheduled emailing is een emailing die ingeroosterd is. De start datum 
hiervoor kan in het verleden of de toekomst liggen en de emailing kan 
een of meerdere keren verstuurd worden. Deze methode vraagt een scheduled 
mailing verstuurd voor de Publisher op. De methode maakt een HTTP call 
naar het volgende adres:

`https://api.copernica.com/v2/ms/scheduledemailing/$id?access_token=xxxx`

Je kunt de methode om alle Publisher scheduled emailings op te vragen 
[hier](./rest-get-publisher-scheduledemailings) vinden.

## Teruggegeven velden

Deze methode geeft een JSON object met de scheduled emailing, die de 
volgende velden bevat:

* **id**:                   De ID van de ingeroosterde mailing.
* **next**:                 De tijdstempel van de volgende mailing (YYYY-MM-DD HH:MM:SS formaat).
* **previous**:             De tijdstempel van de vorige mailing (YYYY-MM-DD HH:MM:SS formaat).
* **interval**:             Een array voor de tijd interval die de hoeveelheid ('count') en eenheid ('unit') aangeeft.
* **iterations**:           Het totale aantal keren dat de mailing verstuurd wordt, of -1 als deze oneindig door gaat.
* **processed_iterations**: Het aantal keren dat de mailing al is verstuurd.
* **scheduled_iterations**: Het aantal keren dat de mailing nog verstuurd zal worden, of -1 als deze oneindig door gaat.
* **document**:             De ID van het document dat gebruikt is voor deze mailing.
* **template**:             De ID van de template die gebruikt is voor deze mailing.
* **subject**:              Het onderwerp van de mailing.
* **from_address**:         Een array met de naam ('name') en het e-mailadres ('email') 
                            van de afzender.
* **testgroups**:           Het aantal testgroepen gebruikt in deze mailing.
* **emailing_type**:        Type van de mailing (splitrun, A/B test, normaal).
* **contenttype**:          Type content van de mailing; html ('html'), tekst ('text') of beide ('both').
* **target**:               Bevat het type van het doelwit van de mailing en de ID 
                            en types van de entiteiten hierboven (bijvoorbeeld de database waar een 
                            collectie onder valt).

### JSON voorbeeld

De JSON die terug wordt gegeven ziet er bijvoorbeeld zo uit:

```json
{
    "id":"456",
    "next":"2020-01-01 00:00:00",
    "previous":"2020-01-02 00:00:00",
    "interval":
        {
            "count":1,
            "unit":"day"
        },
    "iterations":-1,
    "processed_iterations":"168",
    "scheduled_iterations":"-1",
    "document":123,
    "template":234,
    "subject":"Your daily reminder",
    "from_address":
        {
            "name":John Doe,
            "email":test@copernica.com
        },
    "testgroups":2,
    "emailing_type":"splitrun",
    "contenttype":"both",
    "target":
        {
            "type":"database",
            "sources":
            [{
                "id":"1234",
                "type":"database"
            }]
        }
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
$api = new CopernicaRestAPI("your-access-token", 2);

// voer het verzoek uit en print het resultaat
print_r($api->get("publisher/scheduledemailing/{$emailingID}"));
```

Het bovenstaande voorbeeld vereist de [CopernicaRestApi klasse](./rest-php).

## Meer informatie

* [Overzicht van alle API calls](./rest-api)
* [Opvragen van scheduled emailings in Publisher ](./rest-get-publisher-scheduledemailings)
