# REST API: GET emailing destination + velden (Publisher)

Je kunt de REST API gebruiken om een overzicht van een mailing destination 
inclusief alle (sub)profiel velden op te vragen 
door een HTTP GET verzoek te versturen naar de volgende URL:

`https://api.copernica.com/v2/publisher/emailingdestination/$id?access_token=xxxx`

Hier moet `$id` vervangen worden door de ID van de mailing destination. Deze methode 
ondersteunt ook het gebruik van de [fields parameter](./rest-fields-parameter) 
voor het **timestampsent** veld.

## Teruggegeven velden

Deze methode geeft een JSON object terug dat de volgende informatie bevat:

* **ID**: De ID van de destination.
* **timestampsent**: De tijdstempel van het aankomen van de mailing bij deze destination.
* **internal**: De interne ID van deze destination.
* **profile**: Array met de ID en velden van het destination profiel.
* **subprofile**: Array met de ID en velden van het destination subprofiel (als deze beschikbaar is).
* **mailing**: De ID van de mailing.

## PHP voorbeeld

Het onderstaande script demonstreert hoe je deze API methode gebruikt. 
Vergeet niet de ID in de URL te vervangen voor je het verzoek uitvoert.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// voer het verzoek uit
print_r($api->get("publisher/emailingdestination/{$emailingDestinationID}/fields"));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php)

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
