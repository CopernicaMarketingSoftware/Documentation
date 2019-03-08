# REST API: GET errors (Marketing Suite)

Er worden statistieken bijgehouden over elke mailing die verstuurd wordt met 
Copernica om je meer inzicht te geven in de prestatie hiervan. Errors zijn 
een van de statistieken die worden bijgehouden. 
Je kan deze opvragen met een HTTP GET call naar de volgende URL:

`https://api.copernica.com/v2/ms/errors?access_token=xxxx`

Deze methode ondersteunt ook het gebruik van de [fields parameter](./rest-fields-parameter) 
voor het **timestamp** veld.

## Teruggegeven velden

Deze methode geeft een JSON object terug met errors. Voor elke error 
is de volgende informatie beschikbaar:

* **ID**: The ID van de error.
* **mailing**: The ID van de mailing.
* **timestamp**: Tijdstempel van de error.
* **status**: De status van de error.
* **errorcode**: De code geassocieerd met deze error.
* **description**: Beschrijving van de error.
* **errortype**: Het type error dat herkend is.
* **destination**: De ID van de destination die de error veroorzaakte.
* **profile**: De ID van het profiel die de error veroorzaakte.
* **subprofile**: De ID van het subprofiel die de error veroorzaakte.

## PHP voorbeeld

Dit script demonstreert hoe je de API methode kunt gebruiken:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token 
$api = new CopernicaRestAPI("your-access-token", 2);

// voer het verzoek uit
print_r($api->get("ms/errors"));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php).

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Opvragen van abuses voor MS](./rest-get-ms-abuses)
* [Opvragen van clicks voor MS](./rest-get-ms-clicks)
* [Opvragen van deliveries voor MS](./rest-get-ms-deliveries)
* [Opvragen van impressions voor MS](./rest-get-ms-impressions)
