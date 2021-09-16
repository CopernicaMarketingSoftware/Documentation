# REST API: GET destination (Publisher)

Je kunt de REST API gebruiken om een overzicht van een mailing destination (bestemming) op te vragen 
door een HTTP GET verzoek te versturen naar de volgende URL:

`https://api.copernica.com/v3/publisher/destination/$id?access_token=xxxx`

Hier moet `$id` vervangen worden door de ID van de destination. Deze methode 
ondersteunt ook het gebruik van de [fields parameter](./rest-fields-parameter) 
voor het **timestampsent** veld.

## Teruggegeven velden

Deze methode geeft een JSON object terug dat de destination representeert. 
Deze bevat de volgende velden:

* **ID**: De ID van de destination.
* **timestampsent**: De tijdstempel van het aankomen van de mailing bij deze destination.
* **internal**: De interne ID van deze destination.
* **profile**: De ID van het profiel van deze destination.
* **subprofile**: De ID van het subprofiel van deze destination (als deze beschikbaar is).
* **mailing**: De ID van de mailing.

### (Sub)profielvelden opvragen

Het is daarnaast mogelijk om ook de velden van het corresponderende (sub)profiel 
op te vragen. In dit geval zullen de 'profile' en 'subprofile' velden een 
array bevatten met velden 'ID' voor de identifier en 'fields' voor 
de (subprofiel) velden. Je kunt de methode aanroepen met een HTTP GET call 
naar de volgende URL:

`https://api.copernica.com/v3/publisher/destination/$id/fields?access_token=xxxx`

### JSON voorbeeld

De JSON voor de destination ziet er bijvoorbeeld zo uit:

```json
{  
   "ID":"56ed14bf71f7bc4e200e712e646ed32f",
   "timestampsent":"2014-08-26 10:14:15",
   "internal":"802345",
   "profile":"9180926",
   "subprofile":null,
   "mailing":"42913"
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
print_r($api->get("publisher/destination/{$destinationID}"));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php)

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Opvragen van profiel velden](./rest-get-profile-fields)
* [Opvragen van subprofiel velden](./rest-get-subprofile-fields)
