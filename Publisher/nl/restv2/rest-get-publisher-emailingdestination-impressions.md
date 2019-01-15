# REST API: GET impressions (Publisher mailing destination)

Net zoals je van een mailing statistieken op kunt vragen kun je ook de statistieken 
per emailing destination opvragen. Je kan deze opvragen met een 
HTTP GET call naar de volgende URL:

`https://api.copernica.com/v2/emailingdestination/$id/impressions?access_token=xxxx`

Hier moet `$id` vervangen worden door de ID van de mailing destination. Deze methode 
ondersteunt ook het gebruik van de [fields parameter](./rest-fields-parameter) 
voor het **timestamp** veld.

## Teruggegeven velden

Deze methode geeft een JSON object terug met impressions. Voor elke impression 
is de volgende informatie beschikbaar:

* **ID**: De ID van de impression.
* **timestamp**: De tijdstempel van de impression.
* **ip**: De IP waar de impression vandaan kwam.
* **user-agent**: De user agent string van de gebruiker die de mail opende.
* **referer**: De referer van de gebruiker die de mail opende.
* **emailing**: De ID van de mailing.
* **destination**: De ID van de destination.
* **profile**: De ID van het profiel.
* **subprofile**: De ID van het subprofiel (als deze beschikbaar is).

## PHP voorbeeld

Dit script demonstreert hoe je de API methode kunt gebruiken:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token 
$api = new CopernicaRestAPI("your-access-token", 2);

// voer het verzoek uit
print_r($api->get("publisher/emailingdestination/{$emailingDestinationID}/impressions/"));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php).

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Opvragen van een Publisher emailing destination](./rest-get-publisher-emailingdestination)
* [Opvragen van abuses voor een Publisher emailing destination](./rest-get-publisher-emailingdestination-abuses)
* [Opvragen van clicks voor een Publisher emailing destination](./rest-get-publisher-emailingdestination-clicks)
* [Opvragen van deliveries voor een Publisher emailing destination](./rest-get-publisher-emailingdestination-deliveries)
* [Opvragen van errors voor een Publisher emailing destination](./rest-get-publisher-emailingdestination-errors)
* [Opvragen van unsubscribes voor een Publisher emailing destination](./rest-get-publisher-emailingdestination-unsubscribes)
