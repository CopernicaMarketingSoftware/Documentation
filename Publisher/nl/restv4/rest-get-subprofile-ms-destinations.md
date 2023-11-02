# REST API: GET MS destinations (subprofiel)

Je kan de Marketing Suite destinations van een subprofiel opvragen met 
een HTTP GET call naar de volgende URL:

`https://api.copernica.com/v3/subprofile/$id/ms/destinations?access_token=xxxx`

Hier moet `$id` vervangen worden door de ID van het subprofiel. Deze methode 
ondersteunt ook het gebruik van de [fields parameter](./rest-fields-parameter) 
voor het **timestampsent** veld.

## Teruggegeven velden

Deze methode geeft een JSON object terug met destinations. Voor elke destination 
is de volgende informatie beschikbaar:

* **ID**: De ID van de destination.
* **timestampsent**: De tijdstempel van het aankomen van de mailing bij deze destination.
* **profile**: De ID van het profiel van deze destination.
* **subprofile**: De ID van het subprofiel van deze destination.
* **mailing**: De ID van de mailing.

## PHP voorbeeld

Dit script demonstreert hoe je de API methode kunt gebruiken:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token 
$api = new CopernicaRestAPI("your-access-token", 3);

// voer het verzoek uit
print_r($api->get("subprofile/{$subprofileID}/ms/destinations/"));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php).

## Meer informatie

* [Overzicht van alle calls](./rest-api)
* [Opvragen van een subprofiel](./rest-get-subprofile)
* [Opvragen van een MS destination](./rest-get-ms-destination)





