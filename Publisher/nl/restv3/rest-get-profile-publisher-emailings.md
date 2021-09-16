# REST API: GET profile emailings (Publisher)

Deze methode vraagt een lijst op van alle mailings verstuurd met Publisher 
naar een specifiek profiel. 
De methode maakt een HTTP call naar het volgende adres:

`https://api.copernica.com/v3/profile/{$profileID}/publisher/emailings?access_token=xxxx`

Vergeet niet hier `{$profileID}` te vervangen door de ID van het profiel 
waarvoor je de mailings op wilt vragen.

## Beschikbare parameters

* **include_subprofiles**: Boolean die aangeeft of mailings naar subprofiles 
meegeteld moeten worden ("yes", "no"). De standaardwaarde is "yes".
* **type**: Het type mailing. Dit kan een massa ("mass") mailing zijn of 
een individuele ("individual") mailing. De methode zal standaard beide 
opvragen ("both").
* **followups**: Geeft aan of we alleen opvolgactie mailings ("yes") gebruiken, alleen mailings 
die *niet* het resultaat waren van een opvolgactie ("no") of alle mailings ("both"). Standaardwaarde "both".
* **test**: Geeft aan of we alleen test mailings ("yes") gebruiken, alleen mailings 
die *geen* test waren ("no") of alle mailings ("both"). Standaardwaarde "both".
* **mindestinations**: Vraag alleen mailings met dit minimum aantal ontvangers op.
* **maxdestinations**: Vraag alleen mailings met dit maximum aantal ontvangers op.
* **fromdate**: Vraag alleen mailings na deze datum op (YYYY-MM-DD HH:MM:SS formaat).
* **todate**: Vraag alleen mailings voor deze datum op (YYYY-MM-DD HH:MM:SS formaat). 

Deze methode ondersteunt ook [paging parameters](./rest-paging).

## Teruggegeven velden

Deze methode geeft een JSON object met meerdere emailings onder het **data** 
veld. Elke mailing bevat de volgende informatie:

* **id**: De ID van de mailing. 
* **timestamp**: De tijdstempel van de mailing.
* **document**: ID van het document gebruikt voor de mailing.
* **template**: ID van de template gebruikt voor de mailing.
* **subject**: Onderwerp van de mailing.
* **from_address**: Afzenderadres van de mailing als een array (met 'name' en 'email' als waarden)
* **destinations**: Het aantal destinations van de mailing.
* **testgroups**: Het aantal testgroepen (alleen bij AB test of splitrun)
* **finalgroup**: ID van de finalgroup (alleen relevant voor een splitrun mailing)
* **type**: Het type van de mailing: 'mass' (massa mailing) of 'individual' (individuele mailing).
* **clicks**: Aantal kliks voor deze mailing.
* **impressions**: Aantal opens voor deze mailing.
* **contenttype**: Het type content in de mailing: 'html', 'text' of 'both' (beide).
* **target**: Array die het target type en de ID en het type van zijn sources bevat (een source is bijvoorbeeld de database waartoe een collectie behoort).

## JSON Voorbeeld

De JSON ziet er bijvoorbeeld zo uit:

```json
{  
   "id":"1281",
   "timestamp":"2010-04-14 15:02:14",
   "document":"114",
   "template":"621",
   "subject":"Reminder",
   "from_address":{  
      "name":"test",
      "email":"test@copernica.nl"
   },
   "destinations":"3",
   "testgroups":0,
   "type":"individual",
   "clicks":"5",
   "impressions":"2",
   "contenttype":"html",
   "target":{  
      "type":"database",
      "sources":[  
         {  
            "id":"214",
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
$api = new CopernicaRestAPI("your-access-token", 2);

// parameters om aan de call mee te geven
$parameters = array(
    'limit'                 => 10,
    'include_subprofiles'   => 'yes',
    'type'                  => 'mass',
    'followups'             => 'no',
    'registerclicks'        => 'yes',
);

// voer het verzoek uit en print het resultaat
print_r($api->get("profile/{$profileID}/publisher/emailings", $parameters));
```

Het bovenstaande voorbeeld vereist de [CopernicaRestApi klasse](./rest-php).

## Meer informatie

* [Overzicht van alle API calls](./rest-api)
* [Opvragen van Publisher mailings](./rest-get-publisher-emailings)
* [Opvragen van Marketing Suite mailings voor een profiel](./rest-get-profile-ms-emailings)
