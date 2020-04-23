# REST API: GET impressions (Publisher testgroep)

Er worden statistieken bijgehouden over elke mailing die verstuurd wordt met 
Copernica om je meer inzicht te geven in de prestatie hiervan. Zeker voor testgroepen 
is dit handig, zodat je gemakkelijk resultaten kunt vergelijken. Impressions zijn 
een van de statistieken die voor een testgroep worden bijgehouden. Je kan deze opvragen met een 
HTTP GET call naar de volgende URL:

`https://api.copernica.com/v2/publisher/testgroup/$id/impressions?access_token=xxxx`

Hier moet `$id` vervangen worden door de ID van de testgroep.

## Ondersteunde parameters

Voor deze methode wordt ook de 'unique' parameter ondersteund. Dit is een 
boolean die aangeeft of alle clicks teruggegeven worden (false) of hooguit 
een click per destination (true).

## Teruggegeven velden

Deze methode geeft een JSON object terug met impressions onder het 'data' 
veld. Voor elke impression is de volgende informatie beschikbaar:

* **ID**: De ID van de impression.
* **timestamp**: De tijdstempel van de impression.
* **ip**: De IP waar de impression vandaan kwam.
* **useragent**: De user agent string van de gebruiker die de mail opende.
* **device**: Type apparaat waar de klik vandaan kwam ('desktop','tablet','mobile','unknown').
* **referer**: De referer van de gebruiker die de mail opende.
* **emailing**: De ID van de mailing.
* **destination**: De ID van de destination.
* **profile**: De ID van het profiel.
* **subprofile**: De ID van het subprofiel (als deze beschikbaar is).

### JSON voorbeeld

Een enkele impressie ziet er bijvoorbeeld zo uit:

```json
{  
   "ID":"44807",
   "timestamp":"2010-07-20 14:34:32",
   "ip":"0.0.0.0",
   "useragent":"Microsoft Outlook 2007, WinXP",
   "device":"desktop",
   "referer":null,
   "emailing":"1328",
   "destination":"822758",
   "profile":"2590894",
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

// data voor het verzoek
$data = array(
    'unique'    =>  true
);

// voer het verzoek uit
print_r($api->get("publisher/testgroup/{$testgroupID}/impressions/", $data));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php).

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Opvragen van een Publisher testgroup](./rest-get-publisher-testgroup)
* [Opvragen van abuses voor een Publisher testgroup](./rest-get-publisher-testgroup-abuses)
* [Opvragen van clicks voor een Publisher testgroup](./rest-get-publisher-testgroup-clicks)
* [Opvragen van deliveries voor een Publisher testgroup](./rest-get-publisher-testgroup-deliveries)
* [Opvragen van errors voor een Publisher testgroup](./rest-get-publisher-testgroup-errors)
* [Opvragen van unsubscribes voor een Publisher testgroup](./rest-get-publisher-testgroup-unsubscribes)
