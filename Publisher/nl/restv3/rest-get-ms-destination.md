# REST API: GET destination (Marketing Suite)

Je kunt de REST API gebruiken om een overzicht van een destination op te vragen 
door een HTTP GET verzoek te versturen naar de volgende URL:

`https://api.copernica.com/v3/ms/destination/$id?access_token=xxxx`

Hier moet `$id` vervangen worden door de ID van de destination. Dit kan of 
een numerieke ID zijn of een string van letters en getallen, deze wordt 
ook wel de message ID genoemd.

Let op: De termen 'destination' en 'message' kunnen uitwisselbaar gebruikt worden, 
ook in de voorbeeldcode.

## Teruggegeven velden

Deze methode geeft een JSON object terug dat de volgende informatie bevat:

* **ID**: Unieke identifier van de destination.
* **messageID**: De gehashte ID, ook wel de bericht ID.
* **timestampsent**: Tijdstempel van versturen naar deze destination.
* **profile**: Corresponderend profiel ID.
* **subprofile**: Corresponderend subprofiel ID.
* **mailing**: ID van de mailing die naar deze destination is verstuurd.

## JSON example

De JSON ziet er bijvoorbeeld zo uit:

```json
{  
   "ID":"783919",
   "messageID":"b4icbaqjswyrb7tc",
   "timestampsent":"2015-06-08 13:53:45",
   "profile":"9033832",
   "subprofile":null,
   "mailing":"466"
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
print_r($api->get("ms/destination/{$destinationID}"));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php)

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
