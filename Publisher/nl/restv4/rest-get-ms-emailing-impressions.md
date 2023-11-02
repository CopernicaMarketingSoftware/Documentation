# REST API: GET emailing impressions (Marketing Suite)

Er worden statistieken bijgehouden over elke mailing die verstuurd wordt met 
Copernica om je meer inzicht te geven in de prestatie hiervan. Impressions zijn 
een van de statistieken die worden bijgehouden. 
Je kan de impressions voor een specifieke emailing opvragen met een HTTP GET call naar de volgende URL:

`https://api.copernica.com/v3/ms/emailing/{$emailingID}/impressions?access_token=xxxx`

## Parameters

De parameters voor deze methode kunnen ingesteld worden om alleen de 
statistieken voor een bepaalde periode op te halen. De volgende optionele 
parameters zijn beschikbaar:

* **begintime**: De tijdstempel waarna de impression gemaakt moet zijn (YYYY-MM-DD HH:MM:SS format).
* **endtime**: De tijdstempel waarvoor de impression gemaakt moet zijn (YYYY-MM-DD HH:MM:SS format).

## Teruggegeven velden

Deze methode geeft een JSON object terug met impressions onder het 'data' veld. 
Voor elke impression is de volgende informatie beschikbaar:

* **ID**: De ID van de impression.         
* **mailing**: De ID van de mailing.
* **timestamp**: Tijdstempel van de impression. 
* **ip**: De IP waar de impression vandaan kwam.
* **useragent**: User agent string van de machine waar de impression vandaan kwam.
* **device**: Type apparaat waar de klik vandaan kwam ('desktop','tablet','mobile','unknown').
* **destination**: De ID van de destination die de impression veroorzaakte.
* **profile**: De ID van het profiel die de impression veroorzaakte.
* **subprofile**: De ID van het subprofiel die de impression veroorzaakte.

### JSON voorbeeld

Een enkele impression ziet er bijvoorbeeld zo uit.

```json
{  
   "ID":"1",
   "mailing":"412",
   "timestamp":"2014-10-09 13:41:46",
   "ip":"2a03:e280:0:1::1",
   "useragent":"Mozilla\/5.0 (Ubuntu; X11; Linux x86_64; rv:8.0) Gecko\/20100101 Firefox\/8.0",
   "device":"desktop",
   "destination":"112",
   "profile":13453,
   "subprofile":null
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
print_r($api->get("ms/emailing/{$emailingID}/impressions"));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php).

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Opvragen van alle impressions](./rest-get-ms-impressions)
* [Opvragen van emailing abuses voor MS](./rest-get-ms-emailing-abuses)
* [Opvragen van emailing clicks voor MS](./rest-get-ms-emailing-clicks)
* [Opvragen van emailing deliveries voor MS](./rest-get-ms-emailing-deliveries)
* [Opvragen van emailing errors voor MS](./rest-get-ms-emailing-errors)
* [Opvragen van unsubscribes voor MS](./-rest-get-ms-unsubscribes)
* [Opvragen van destination unsubscribes voor MS](./rest-get-ms-destination-unsubscribes)
