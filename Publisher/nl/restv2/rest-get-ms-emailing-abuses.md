# REST API: GET emailing abuses (Marketing Suite)

Er worden statistieken bijgehouden over elke mailing die verstuurd wordt met 
Copernica om je meer inzicht te geven in de prestatie hiervan. Abuses zijn 
een van de statistieken die worden bijgehouden. 
Je kan de abuses voor een specifieke emailing opvragen met een HTTP GET call naar de volgende URL:

`https://api.copernica.com/v2/ms/emailing/{$emailingID}/abuses?access_token=xxxx`

Deze methode ondersteunt ook het gebruik van de [fields parameter](./rest-fields-parameter) 
voor het **timestamp** veld.

## Teruggegeven velden

Deze methode geeft een JSON object terug met abuses. Voor elke abuse 
is de volgende informatie beschikbaar:

* **ID**: De ID van de abuse.
* **mailing**: De ID van de mailing.
* **timestamp**: Tijdstempel van de abuse.
* **report**: Rapportage over de abuse.
* **destination**: De ID van de destination die de abuse rapporteerde.
* **profile**: De ID van het profiel die de abuse rapporteerde.
* **subprofile**: De ID van het subprofiel die de abuse rapporteerde.

### JSON voorbeeld

Een enkele abuse ziet er bijvoorbeeld zo uit:

```json
{  
   "ID":"12",
   "mailing":"233482",
   "timestamp":"2019-03-05 14:44:52",
   "report":{  

   },
   "destination":"1264524",
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

// voer het verzoek uit
print_r($api->get("ms/emailing/{$emailingID}/abuses"));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php).

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Opvragen van alle abuses](./rest-get-ms-abuses)
* [Opvragen van emailing clicks voor MS](./rest-get-ms-emailing-clicks)
* [Opvragen van emailing deliveries voor MS](./rest-get-ms-emailing-deliveries)
* [Opvragen van emailing errors voor MS](./rest-get-ms-emailing-errors)
* [Opvragen van emailing impressions voor MS](./rest-get-ms-emailing-impressions)
