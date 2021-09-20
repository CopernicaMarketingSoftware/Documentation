# REST API: GET emailings (Marketing Suite)

Deze methode vraagt een lijst op van alle mailings verstuurd met de
Marketing Suite. De methode maakt een HTTP call naar het volgende adres:

`https://api.copernica.com/v3/ms/emailings?access_token=xxxx`

Je kunt de methode om alle Publisher emailings op te vragen [hier](./rest-get-publisher-emailings) vinden.

## Beschikbare parameters

* **type**: Het type mailing. Dit kan een massa ('mass') mailing zijn of
een individuele ('individual') mailing. De methode zal standaard beide
opvragen.
* **followups**: Geeft aan of we alleen opvolgactie mailings ("yes") gebruiken, alleen mailings
die *niet* het resultaat waren van een opvolgactie ("no") of alle mailings ("both"). Standaardwaarde "both".
* **mindestinations**: Vraag alleen mailings met dit minimum aantal ontvangers op.
* **maxdestinations**: Vraag alleen mailings met dit maximum aantal ontvangers op.
* **fromdate**: Vraag alleen mailings na deze datum op (YYYY-MM-DD HH:MM:SS formaat).
* **todate**: Vraag alleen mailings voor deze datum op (YYYY-MM-DD HH:MM:SS formaat).

Deze methode ondersteunt ook [paging parameters](./rest-paging).

## Teruggegeven velden

Deze methode geeft een JSON object met emailings.
Elke emailing bevat de volgende velden:

* **id**: De ID van de mailing.
* **timestamp**: Tijdstempel van de mailing.
* **template**: De ID van de template die gebruikt is voor deze mailing.
* **subject**: Het onderwerp van de mailing.
* **from_address**: Een array met de naam ('name') en het e-mailadres ('email')
van de afzender.
* **destinations**: Hoeveelheid (geplande) ontvangers van de mailing.
* **type**: Type van de mailing. Een individuele mailing is 'individual'
en een massa mailing is 'massa'.
* **target**: Bevat het type van het doelwit van de mailing en de ID
en types van de entiteiten hierboven (bijvoorbeeld de database waar een
collectie onder valt).

### JSON voorbeeld

De JSON die terug wordt gegeven bevat een property 'data', die een array
met alle emailings bevat. Een enkele emailing ziet er bijvoorbeeld zo uit:

```json
{
   "id":"169",
   "timestamp":"2015-01-13 15:09:49",
   "template":"579",
   "subject":"Test",
   "from_address":{
      "name":"Test",
      "email":"test@copernica.com"
   },
   "destinations":25,
   "type":"mass",
   "target":{
      "type":"database",
      "sources":[
         {
            "id":"7578",
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
    'registerclicks'    => 'yes',
);

// voer het verzoek uit en print het resultaat
print_r($api->get("ms/emailings", $parameters));
```

Het bovenstaande voorbeeld vereist de [CopernicaRestApi klasse](./rest-php).

## Meer informatie

* [Overzicht van alle API calls](./rest-api)
* [Opvragen van ingeroosterde mailings](./rest-get-ms-scheduledemailings)
* [Opvragen van Publisher mailings](./rest-get-emailings)
