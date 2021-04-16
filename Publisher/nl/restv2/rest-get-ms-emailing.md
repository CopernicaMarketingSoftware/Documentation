# REST API: GET emailing (Marketing Suite)

Je kunt de REST API gebruiken om een overzicht van een mailing op te vragen
door een HTTP GET verzoek te versturen naar de volgende URL:

`https://api.copernica.com/v2/ms/emailing/$id?access_token=xxxx`

Hier moet `$id` vervangen worden door de ID van de mailing.

## Teruggegeven velden

Deze methode geeft een JSON object terug dat de volgende informatie bevat:

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
* **tags**: Een array met de gebruikte labels voor de mailing.

### JSON voorbeeld

De JSON voor de mailing, die je kunt vinden onder de 'data' eigenschap
in de output ziet er bijvoorbeeld zo uit:

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
   "tags":{
      "test1", 
      "Test2"
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
$api = new CopernicaRestAPI("your-access-token", 2);

// voer het verzoek uit
print_r($api->get("ms/emailing/{$emailingID}", $parameters));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php)

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Vraag alle Marketing Suite mailings op](./rest-get-ms-emailings)
* [Vraag een ingeroosterde
   Marketing Suite mailing op](./rest-get-ms-scheduledemailing)
