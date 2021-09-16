# REST API: GET unsubscribes (Publisher mailing)

Er worden statistieken bijgehouden over elke mailing die verstuurd wordt met 
Copernica om je meer inzicht te geven in de prestatie hiervan. Unsubscribes zijn 
een van de statistieken die voor een mailing worden bijgehouden. Je kan deze opvragen met een 
HTTP GET call naar de volgende URL:

`https://api.copernica.com/v3/publisher/emailing/$id/unsubscribes?access_token=xxxx`

Hier moet `$id` vervangen worden door de ID van de mailing. Deze methode 
ondersteunt ook het gebruik van de [fields parameter](./rest-fields-parameter) 
voor het **timestamp** veld.

## Teruggegeven velden

Deze methode geeft een JSON object terug met unsubscribes onder het 'data' 
veld. Voor elke unsubscribe is de volgende informatie beschikbaar:

* **ID**: De ID van de unsubscribe. 
* **timestamp**: De tijdstempel van de unsubscribe.
* **source**: De source van de unsubscribe: van een link of een email.
* **success**: Boolean die aangeeft of de unsubscribe succesvol was.
* **emailing**: De ID van de emailing.
* **destination**: De ID van de destination.
* **profile**: De ID van de profile.
* **subprofile**: De ID van de subprofile (als deze beschikbaar is).

### JSON voorbeeld

Een enkele unsubscribe ziet er bijvoorbeeld als volgt uit:

```json
{  
   "ID":"1",
   "timestamp":"2011-11-09 12:42:35",
   "source":"link",
   "success":true,
   "emailing":"42341",
   "destination":"847259",
   "profile":"5063195",
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
print_r($api->get("publisher/emailing/{$emailingID}/unsubscribes/", $parameters));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php).

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Opvragen van een Publisher emailing](./rest-get-publisher-emailing)
* [Opvragen van abuses voor een Publisher emailing](./rest-get-publisher-emailing-abuses)
* [Opvragen van clicks voor een Publisher emailing](./rest-get-publisher-emailing-clicks)
* [Opvragen van deliveries voor een Publisher emailing](./rest-get-publisher-emailing-deliveries)
* [Opvragen van errors voor een Publisher emailing](./rest-get-publisher-emailing-errors)
* [Opvragen van impressions voor een Publisher emailing](./rest-get-publisher-emailing-impressions)
