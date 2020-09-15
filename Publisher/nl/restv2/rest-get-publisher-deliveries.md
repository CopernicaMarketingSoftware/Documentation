# REST API: GET deliveries (Publisher)

Er worden statistieken bijgehouden over elke mailing die verstuurd wordt met 
Copernica om je meer inzicht te geven in de prestatie hiervan. Deliveries zijn 
een van de statistieken die worden bijgehouden. Je kan deze opvragen met een 
HTTP GET call naar de volgende URL:

`https://api.copernica.com/v2/publisher/deliveries?access_token=xxxx`

Deze methode ondersteunt ook het gebruik van de [fields parameter](./rest-fields-parameter) 
voor het **id** en **timestamp** veld.

## Teruggegeven velden

Deze methode geeft een JSON object terug met deliveries onder het 'data' veld. 
Voor elke delivery is de volgende informatie beschikbaar:

* **ID**: De ID van de delivery.     
* **timestamp**: De tijdstempel van de delivery.
* **attempt**: De attempt van de delivery.
* **smtp-response**: De beschrijving van de delivery zoals ontvangen van de SMTP server.
* **emailing**: De ID van de afgeleverde mailing.
* **destination**: De ID van de destination.
* **profile**: De ID van het profiel waaraan het bericht geleverd is.
* **subprofile**: De ID van het subprofiel waaraan het bericht geleverd is (als deze beschikbaar is).

### JSON voorbeeld

De JSON voor een enkele delivery ziet er bijvoorbeeld zo uit:

```json
{  
   "ID":"1",
   "timestamp":"2010-01-04 12:17:51",
   "attempt":"0",
   "smtp-response":"test",
   "emailing":"671",
   "destination":"57092",
   "profile":"2384041",
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

// stel de periode in
$parameters = array(
    'fields'    =>  array('timestamp>2019-01-01', 'timestamp<2019-02-01')
);

// voer het verzoek uit
print_r($api->get("publisher/deliveries/", $parameters));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php).

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Opvragen van abuses voor Publisher](./rest-get-publisher-abuses)
* [Opvragen van clicks voor Publisher](./rest-get-publisher-clicks)
* [Opvragen van errors voor Publisher](./rest-get-publisher-errors)
* [Opvragen van impressions voor Publisher](./rest-get-publisher-impressions)
* [Opvragen van unsubscribes voor Publisher](./rest-get-publisher-unsubscribes)
