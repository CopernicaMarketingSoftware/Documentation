# REST API: GET destination/message unsubscribes (Marketing Suite)

Er worden statistieken bijgehouden over elke mailing die verstuurd wordt met 
Copernica om je meer inzicht te geven in de prestatie hiervan. Unsubscribe clicks zijn 
een van de statistieken die worden bijgehouden en representeren de kliks op de 
uitschrijflinks in de mailings die je verstuurt. Je kan de clicks voor 
een specifieke destination opvragen met een HTTP GET call naar de volgende URL:

`https://api.copernica.com/v3/ms/destination/{$destinationID}/unsubscribes?access_token=xxxx`

Let op: De termen 'destination' en 'message' kunnen uitwisselbaar gebruikt worden, 
ook in de voorbeeldcode.

## Parameters

De parameters voor deze methode kunnen ingesteld worden om alleen de 
statistieken voor een bepaalde periode op te halen. De volgende optionele 
parameters zijn beschikbaar:

* **begintime**: De tijdstempel waarna de abuse gemeld moet zijn (YYYY-MM-DD HH:MM:SS format).
* **endtime**: De tijdstempel waarvoor de abuse gemeld moet zijn (YYYY-MM-DD HH:MM:SS format).

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
* [Opvragen van destination/message abuses voor MS](./rest-get-ms-destination-abuses)
* [Opvragen van destination/message clicks voor MS](./rest-get-ms-destination-clicks)
* [Opvragen van destination/message deliveries voor MS](./rest-get-ms-destination-deliveries)
* [Opvragen van destination/message errors voor MS](./rest-get-ms-destination-errors)
* [Opvragen van destination/message impressions voor MS](./rest-get-ms-destination-impressions)
