# REST API: GET Publisher destinations (profiel)

Je kan de Publisher destinations van een profiel opvragen met 
een HTTP GET call naar de volgende URL:

`https://api.copernica.com/v3/profile/$id/publisher/destinations?access_token=xxxx`

Hier moet `$id` vervangen worden door de ID van het profiel. Deze methode 
ondersteunt ook het gebruik van de [fields parameter](./rest-fields-parameter) 
voor het **timestampsent** veld.

## Teruggegeven velden

Deze methode geeft een JSON object terug met destinations. Voor elke destination 
is de volgende informatie beschikbaar:

* **ID**: De ID van de destination.
* **timestampsent**: De tijdstempel van het aankomen van de mailing bij deze destination.
* **internal**: De interne ID van deze destination.
* **profile**: De ID van het profiel van deze destination.
* **subprofile**: De ID van het subprofiel van deze destination (als deze beschikbaar is).
* **mailing**: De ID van de mailing.

## JSON voorbeeld

De JSON voor een enkele destination ziet er bijvoorbeeld zo uit:

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

Dit script demonstreert hoe je de API methode kunt gebruiken:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token 
$api = new CopernicaRestAPI("your-access-token", 3);

// voer het verzoek uit
print_r($api->get("profile/{$profileID}/publisher/destinations/"));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php).

## Meer informatie

* [Overzicht van alle calls](./rest-api)
* [Opvragen van een profiel](./rest-get-profile)
* [Opvragen van een Publisher destination](./rest-get-publisher-destination)





