# REST API: GET clicks (Publisher)

Er worden statistieken bijgehouden over elke mailing die verstuurd wordt met 
Copernica om je meer inzicht te geven in de prestatie hiervan. Clicks zijn 
een van de statistieken die worden bijgehouden. Je kan deze opvragen met een 
HTTP GET call naar de volgende URL:

`https://api.copernica.com/v2/publisher/clicks?access_token=xxxx`

Deze methode ondersteunt ook het gebruik van de [fields parameter](./rest-fields-parameter) 
voor het **timestamp** veld.

## Teruggegeven velden

Deze methode geeft een JSON object terug met clicks onder het 'data' veld. 
Voor elke click is de volgende informatie beschikbaar:

* **ID**: ID van de click.
* **link_id**: ID van de geklikte link.
* **link**: De geklikte link.
* **link_title**: Titel van de geklikte link.
* **timestamp**: Tijdstempel van de click.
* **ip**: De IP waar de click vandaan kwam.
* **user-agent**: De user agent string van de clicker.
* **referer**: De referer van de clicker.
* **emailing**: De ID van de emailing waar de click vandaan kwam.
* **destination**: De destination waar de click vandaan kwam.
* **profile**: De ID van het profiel waar de click vandaan kwam.
* **subprofile**: De ID van het subprofiel waar de click vandaan kwam (als deze beschikbaar is).

### JSON voorbeeld

De JSON van een enkele click ziet er bijvoorbeeld zo uit:

```json
{  
   "ID":"19431",
   "link_id":"3145",
   "link":"{webversion}",
   "link_title":"",
   "timestamp":"2010-11-03 15:07:33",
   "ip":"0.0.0.0",
   "useragent":"Firefox 3.6, WinXP",
   "referer":null,
   "emailing":"1914",
   "destination":"823456",
   "profile":"2290961",
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

// voer het verzoek uit
print_r($api->get("publisher/clicks/"));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php).

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Opvragen van abuses voor Publisher](./rest-get-publisher-abuses)
* [Opvragen van deliveries voor Publisher](./rest-get-publisher-deliveries)
* [Opvragen van errors voor Publisher](./rest-get-publisher-errors)
* [Opvragen van impressions voor Publisher](./rest-get-publisher-impressions)
* [Opvragen van unsubscribes voor Publisher](./rest-get-publisher-unsubscribes)
