# REST API: GET errors (Publisher mailing)

Er worden statistieken bijgehouden over elke mailing die verstuurd wordt met 
Copernica om je meer inzicht te geven in de prestatie hiervan. Errors zijn 
een van de statistieken die voor een mailing worden bijgehouden. Je kan deze opvragen met een 
HTTP GET call naar de volgende URL:

`https://api.copernica.com/v3/publisher/emailing/$id/errors?access_token=xxxx`

Hier moet `$id` vervangen worden door de ID van de mailing. Deze methode 
ondersteunt ook het gebruik van de [fields parameter](./rest-fields-parameter) 
voor het **timestamp** veld.

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

// stel de periode in
$parameters = array(
    'fields'    =>  array('timestamp>2019-01-01', 'timestamp<2019-02-01')
);

// voer het verzoek uit
print_r($api->get("publisher/emailing/{$emailingID}/errors/", $parameters));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php).

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Opvragen van een Publisher emailing](./rest-get-publisher-emailing)
* [Opvragen van abuses voor een Publisher emailing](./rest-get-publisher-emailing-abuses)
* [Opvragen van clicks voor een Publisher emailing](./rest-get-publisher-emailing-clicks)
* [Opvragen van deliveries voor een Publisher emailing](./rest-get-publisher-emailing-deliveries)
* [Opvragen van impressions voor een Publisher emailing](./rest-get-publisher-emailing-impressions)
* [Opvragen van unsubscribes voor een Publisher emailing](./rest-get-publisher-emailing-unsubscribes)
