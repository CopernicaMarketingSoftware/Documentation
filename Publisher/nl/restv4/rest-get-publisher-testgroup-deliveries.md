# REST API: GET abuses (Publisher testgroep)

Er worden statistieken bijgehouden over elke mailing die verstuurd wordt met 
Copernica om je meer inzicht te geven in de prestatie hiervan. Zeker voor testgroepen 
is dit handig, zodat je gemakkelijk resultaten kunt vergelijken. Abuses zijn 
een van de statistieken die voor een testgroep worden bijgehouden. Je kan deze opvragen met een 
HTTP GET call naar de volgende URL:

`https://api.copernica.com/v3/publisher/testgroup/$id/abuses?access_token=xxxx`

Hier moet `$id` vervangen worden door de ID van de testgroep.

## Teruggegeven velden

Deze methode geeft een JSON object terug met abuses onder het 'data' veld. 
Voor elke abuse is de volgende informatie beschikbaar:

* **ID**: ID van de abuse.
* **timestamp**: Tijdstempel van de abuse.
* **recognized_as**: Herkende soort van de abuse ('arf', 'JMR', 'none').
* **feedback_type**: Type feedback van de abuse ('abuse', 'dkim', 'fraud', 'miscategorized', 'not-spam', 'opt-out' or 'other')
* **arf_version**: Versie van het ARF protocol gebruikt voor deze abuse.
* **details**: Het abuse report (als deze beschikbaar is).
* **emailing**: ID van de emailing.
* **destination**: ID van de destination.
* **profile**: ID van het profiel.
* **subprofile**: ID van het subprofiel (als deze beschikbaar is)

### JSON voorbeeld

Een enkele abuse ziet er bijvoorbeeld zo uit:

```json
{  
   "ID":"2",
   "timestamp":"2009-12-01 10:00:00",
   "recognized_as":"arf",
   "feedback_type":"opt-out",
   "arf_version":"0.1",
   "details":"",
   "emailing":"613",
   "destination":"60716",
   "profile":"2231853",
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
print_r($api->get("publisher/testgroup/{$testgroupID}/abuses/", $parameters));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php).

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Opvragen van een Publisher testgroup](./rest-get-publisher-testgroup)
* [Opvragen van clicks voor een Publisher testgroup](./rest-get-publisher-testgroup-clicks)
* [Opvragen van deliveries voor een Publisher testgroup](./rest-get-publisher-testgroup-deliveries)
* [Opvragen van errors voor een Publisher testgroup](./rest-get-publisher-testgroup-errors)
* [Opvragen van impressions voor een Publisher testgroup](./rest-get-publisher-testgroup-impressions)
* [Opvragen van unsubscribes voor een Publisher testgroup](./rest-get-publisher-testgroup-unsubscribes)
