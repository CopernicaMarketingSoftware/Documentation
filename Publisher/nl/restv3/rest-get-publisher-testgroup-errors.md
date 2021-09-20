# REST API: GET errors (Publisher testgroep)

Er worden statistieken bijgehouden over elke mailing die verstuurd wordt met 
Copernica om je meer inzicht te geven in de prestatie hiervan. Zeker voor testgroepen 
is dit handig, zodat je gemakkelijk resultaten kunt vergelijken. Errors zijn 
een van de statistieken die voor een testgroep worden bijgehouden. Je kan deze opvragen met een 
HTTP GET call naar de volgende URL:

`https://api.copernica.com/v3/publisher/testgroup/$id/errors?access_token=xxxx`

Hier moet `$id` vervangen worden door de ID van de testgroep.

## Teruggegeven velden

Deze methode geeft een JSON object terug met errors in een array onder het 
'data' veld. Voor elke error is de volgende informatie beschikbaar:

* **ID**: De ID van de error.          
* **timestamp**: De tijdstempel van de error.
* **errorcode**: De error code.
* **description**: De beschrijving van de error zoals ontvangen van de SMTP server.
* **errortype**: Het type van de error ('nocontent', 'nohost', 'unreachable', 'unexpected', 'error', 'mailerror', 'mailmessage', 'nodata', 'privateiprange' or 'other'). 
* **errortypedescription**: De omschrijving van de error gebaseerd op het type.
* **emailing**: De ID van de mailing.
* **destination**: De ID van de destination.
* **profile**: De ID van het profiel.
* **subprofile**: De ID van het subprofiel (als deze beschikbaar is).

### JSON voorbeeld

Een enkele error ziet er bijvoorbeeld zo uit:

```json
{  
   "ID":"16",
   "timestamp":"2008-06-25 14:23:05",
   "errorcode":"5.1.2",
   "description":"Resolver error: no mailservers found for domain",
   "errortype":"nohost",
   "errortypedescription":"Map domain name to IP address",
   "emailing":"401",
   "destination":"54215",
   "profile":"52647",
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
print_r($api->get("publisher/testgroup/{$testgroupID}/errors/", $parameters));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php).

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Opvragen van een Publisher testgroup](./rest-get-publisher-testgroup)
* [Opvragen van abuses voor een Publisher testgroup](./rest-get-publisher-testgroup-abuses)
* [Opvragen van clicks voor een Publisher testgroup](./rest-get-publisher-testgroup-clicks)
* [Opvragen van deliveries voor een Publisher testgroup](./rest-get-publisher-testgroup-deliveries)
* [Opvragen van impressions voor een Publisher testgroup](./rest-get-publisher-testgroup-impressions)
* [Opvragen van unsubscribes voor een Publisher testgroup](./rest-get-publisher-testgroup-unsubscribes)
