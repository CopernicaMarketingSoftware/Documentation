# REST API: GET abuses (Publisher mailing destination)

Net zoals je van een mailing statistieken op kunt vragen kun je ook de statistieken 
per emailing destination opvragen. Je kan deze opvragen met een 
HTTP GET call naar de volgende URL:

`https://api.copernica.com/v2/emailingdestination/$id/abuses?access_token=xxxx`

Hier moet `$id` vervangen worden door de ID van de mailing destination. Deze methode 
ondersteunt ook het gebruik van de [fields parameter](./rest-fields-parameter) 
voor het **timestamp** veld.

## Teruggegeven velden

Deze methode geeft een JSON object terug met abuses. Voor elke abuse 
is de volgende informatie beschikbaar:

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

## PHP voorbeeld

Dit script demonstreert hoe je de API methode kunt gebruiken:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token 
$api = new CopernicaRestAPI("your-access-token", 2);

// voer het verzoek uit
print_r($api->get("publisher/emailingdestination/{$emailingDestinationID}/abuses/"));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php).

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Opvragen van een Publisher emailing destination](./rest-get-publisher-emailingdestination)
* [Opvragen van clicks voor een Publisher emailing destination](./rest-get-publisher-emailingdestination-clicks)
* [Opvragen van deliveries voor een Publisher emailing destination](./rest-get-publisher-emailingdestination-deliveries)
* [Opvragen van errors voor een Publisher emailing destination](./rest-get-publisher-emailingdestination-errors)
* [Opvragen van impressions voor een Publisher emailing destination](./rest-get-publisher-emailingdestination-impressions)
* [Opvragen van unsubscribes voor een Publisher emailing destination](./rest-get-publisher-emailingdestination-unsubscribes)
