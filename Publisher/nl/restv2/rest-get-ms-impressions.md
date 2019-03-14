# REST API: GET impressions (Marketing Suite)

Er worden statistieken bijgehouden over elke mailing die verstuurd wordt met 
Copernica om je meer inzicht te geven in de prestatie hiervan. Impressions zijn 
een van de statistieken die worden bijgehouden. 
Je kan deze opvragen met een HTTP GET call naar de volgende URL:

`https://api.copernica.com/v2/ms/impressions?access_token=xxxx`

Deze methode ondersteunt ook het gebruik van de [fields parameter](./rest-fields-parameter) 
voor het **timestamp** veld.

## Teruggegeven velden

Deze methode geeft een JSON object terug met impressions. Voor elke impression 
is de volgende informatie beschikbaar:

* **ID**: De ID van de impression.         
* **mailing**: De ID van de mailing.
* **timestamp**: Tijdstempel van de impression. 
* **ip**: De IP waar de impression vandaan kwam.
* **user-agent**: User agent string van de machine waar de impression vandaan kwam.
* **destination**: De ID van de destination die de impression veroorzaakte.
* **profile**: De ID van het profiel die de impression veroorzaakte.
* **subprofile**: De ID van het subprofiel die de impression veroorzaakte.

## PHP voorbeeld

Dit script demonstreert hoe je de API methode kunt gebruiken:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token 
$api = new CopernicaRestAPI("your-access-token", 2);

// voer het verzoek uit
print_r($api->get("ms/impressions"));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php).

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Opvragen van abuses voor MS](./rest-get-ms-abuses)
* [Opvragen van clicks voor MS](./rest-get-ms-clicks)
* [Opvragen van deliveries voor MS](./rest-get-ms-deliveries)
* [Opvragen van errors voor MS](./rest-get-ms-errors)
