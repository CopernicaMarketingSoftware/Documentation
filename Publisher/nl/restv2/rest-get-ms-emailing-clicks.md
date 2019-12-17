# REST API: GET emailing clicks (Marketing Suite)

Er worden statistieken bijgehouden over elke mailing die verstuurd wordt met 
Copernica om je meer inzicht te geven in de prestatie hiervan. Clicks zijn 
een van de statistieken die worden bijgehouden. 
Je kan de clicks voor een specifieke emailing opvragen met een HTTP GET call naar de volgende URL:

`https://api.copernica.com/v2/ms/emailing/{$emailingID}/clicks?access_token=xxxx`

Deze methode ondersteunt ook het gebruik van de [fields parameter](./rest-fields-parameter) 
voor het **timestamp** veld.

## Parameters

De parameters voor deze methode kunnen ingesteld worden om alleen de 
statistieken voor een bepaalde periode op te halen en om te filteren op 
alleen unieke clicks. De volgende optionele parameters zijn beschikbaar:

* **begintime**: De tijdstempel waarna de click gemaakt moet zijn (YYYY-MM-DD HH:MM:SS format).
* **endtime**: De tijdstempel waarvoor de click gemaakt moet zijn (YYYY-MM-DD HH:MM:SS format).
* **unique**: De boolean parameter die aangeeft of alleen unieke clicks ('true') of 
alle clicks ('false') teruggegeven moeten worden. Standaard worden alle clicks teruggegeven.

## Teruggegeven velden

Deze methode geeft een JSON object terug met clicks. Voor elke click 
is de volgende informatie beschikbaar:

* **ID**: De ID van de click.  
* **mailing**: De ID van de mailing.
* **link**: De geklikte link.
* **timestamp**: Tijdstempel van de click.
* **ip**: De IP waar de click vandaan kwam.
* **user-agent**: User agent string van de machine waar de click vandaan kwam.
* **destination**: De ID van de destination die de link klikte.
* **profile**: De ID van het profiel die de link klikte.
* **subprofile**: De ID van het subprofiel die de link klikte.

### JSON voorbeeld

Een enkele klik ziet er bijvoorbeeld zo uit:

```json
{  
   "ID":"1",
   "mailing":"2",
   "link":"http:\/\/www.myshop.nl\/promotions\/customer\/{$profile.customerid}",
   "timestamp":"2014-10-14 11:33:22",
   "ip":"2a03:e280:0:1::1",
   "useragent":"Mozilla\/5.0 (Ubuntu; X11; Linux x86_64; rv:8.0) Gecko\/20100101 Firefox\/8.0",
   "destination":"1",
   "profile":null,
   "subprofile":null
}
```

## PHP voorbeeld

Dit script demonstreert hoe je de API methode kunt gebruiken:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token 
$api = new CopernicaRestAPI("your-access-token", 2);

// alleen unieke clicks opvragen
$data = array(
    'unique'    =>  true
);

// voer het verzoek uit
print_r($api->get("ms/emailing/{$emailingID}/clicks", $data));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php).

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Opvragen van alle clicks](./rest-get-ms-clicks)
* [Opvragen van emailing abuses voor MS](./rest-get-ms-emailing-abuses)
* [Opvragen van emailing deliveries voor MS](./rest-get-ms-emailing-deliveries)
* [Opvragen van emailing errors voor MS](./rest-get-ms-emailing-errors)
* [Opvragen van emailing impressions voor MS](./rest-get-ms-emailing-impressions)
* [Opvragen van destination unsubscribes voor MS](./rest-get-ms-destination-unsubscribes)
