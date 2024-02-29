# REST API: GET SMS mailing

Je kunt de REST API gebruiken om informatie van een SMS mailing op te vragen 
door een HTTP GET-verzoek te versturen naar de volgende URL:

`https://api.copernica.com/v3/smsmailing/$id?access_token=xxxx`

Hier moet `$id` vervangen worden door de ID van de SMS mailing.

## Teruggegeven velden

Deze methode geeft een JSON-object met de volgende informatie:

* **id**: De ID van de SMS mailing
* **timestamp**: De tijdstempel van de SMS mailing
* **document**: ID van het document gebruikt voor de SMS mailing
* **message**: Het bericht van de SMS mailing
* **from**: Afzender van de SMS mailing
* **destinations**: Het aantal destinations van de SMS mailing
* **successes**: Het aantal bestemmingen waarbij de SMS mailing is afgeleverd
* **errors**: Het aantal bestemmingen waarbij de SMS mailing een fout heeft opgeleverd
* **unknown**: Het aantal bestemmingen waarbij de afleverstatus van SMS mailing onbekend is
* **target**: Bestemming van de SMS mailing

## JSON Voorbeeld

De JSON ziet er bijvoorbeeld zo uit:

```json
{
  "id": "1",
  "timestamp": "2024-02-23 14:41:02",
  "document": "117",
  "message": "Hello {$profile.firstname} ({$profile.id})!",
  "from": "Copernica",
  "destinations": "4",
  "successes": "3",
  "errors": "1",
  "unknown": "0",
  "target": {
    "type": "view",
    "sources": [
      {
        "id": "12",
        "type": "view"
      },
      {
        "id": "1",
        "type": "database"
      }
    ]
  }
}
```

## PHP voorbeeld

Het onderstaande script demonstreert hoe je deze API-methode gebruikt. 
Vergeet niet de ID in de URL te vervangen voor je het verzoek uitvoert.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// voer het verzoek uit
print_r($api->get("smsmailing/{$ID}"));
```

Dit voorbeeld vereist de [REST API-klasse](./rest-php)

## Meer informatie

* [Overzicht van alle REST API-calls](./rest-api)
