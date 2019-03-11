# REST API: GET destination unsubscribes (Marketing Suite)

Er worden statistieken bijgehouden over elke mailing die verstuurd wordt met 
Copernica om je meer inzicht te geven in de prestatie hiervan. Unsubscribe clicks zijn 
een van de statistieken die worden bijgehouden en representeren de kliks op de 
uitschrijflinks in de mailings die je verstuurt. Je kan de clicks voor 
een specifieke destination opvragen met een HTTP GET call naar de volgende URL:

`https://api.copernica.com/v2/ms/destination/{$destinationID}/unsubscribes?access_token=xxxx`

Deze methode ondersteunt ook het gebruik van de [fields parameter](./rest-fields-parameter) 
voor het **timestamp** veld.

## Parameters

Er is een parameter beschikbaar voor deze methode; de 'unique' parameter 
geeft aan of er alleen unieke unsubscribes teruggegeven moeten worden. Standaard 
zullen alle unsubscribes worden geretourneerd.

## Teruggegeven velden

Deze methode geeft een JSON object terug met unsubscribe clicks. Voor elke unsubscribe 
is de volgende informatie beschikbaar:

* **ID**: De ID van de unsubscribe click.  
* **mailing**: De ID van de mailing.
* **timestamp**: Tijdstempel van de unsubscribe.
* **ip**: De IP waar de unsubscribe vandaan kwam.
* **user-agent**: User agent string van de machine waar de unsubscribe vandaan kwam.
* **destination**: De ID van de destination die zich uitschreef.
* **profile**: De ID van het profiel die de zich uitschreef.
* **subprofile**: De ID van het subprofiel die zich uitschreef.

## PHP voorbeeld

Dit script demonstreert hoe je de API methode kunt gebruiken:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token 
$api = new CopernicaRestAPI("your-access-token", 2);

// alleen unieke unsubscribes opvragen
$data = array(
    'unique'    =>  true
);

// voer het verzoek uit
print_r($api->get("ms/destination/{$destinationID}/unsubscribes", $data));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php).

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Opvragen van alle unsubscribes](./rest-get-ms-unsubscribes)
* [Opvragen van destination abuses voor MS](./rest-get-ms-destination-abuses)
* [Opvragen van destination clicks voor MS](./rest-get-ms-destination-clicks)
* [Opvragen van destination deliveries voor MS](./rest-get-ms-destination-deliveries)
* [Opvragen van destination errors voor MS](./rest-get-ms-destination-errors)
* [Opvragen van destination impressions voor MS](./rest-get-ms-destination-impressions)
