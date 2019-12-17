# REST API: GET destination/message abuses (Marketing Suite)

Er worden statistieken bijgehouden over elke mailing die verstuurd wordt met 
Copernica om je meer inzicht te geven in de prestatie hiervan. Abuses zijn 
een van de statistieken die worden bijgehouden. 
Je kan de abuses voor een specifieke destination opvragen met een HTTP GET call naar de volgende URL:

`https://api.copernica.com/v2/ms/destination/{$destinationID}/abuses?access_token=xxxx`

Let op: De termen 'destination' en 'message' kunnen uitwisselbaar gebruikt worden, 
ook in de voorbeeldcode.

## Parameters

De parameters voor deze methode kunnen ingesteld worden om alleen de 
statistieken voor een bepaalde periode op te halen. De volgende optionele 
parameters zijn beschikbaar:

* **begintime**: De tijdstempel waarna de abuse gemeld moet zijn (YYYY-MM-DD HH:MM:SS format).
* **endtime**: De tijdstempel waarvoor de abuse gemeld moet zijn (YYYY-MM-DD HH:MM:SS format).

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
print_r($api->get("ms/destination/{$destinationID}/abuses"));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php).

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Opvragen van alle abuses](./rest-get-ms-abuses)
* [Opvragen van destination/message clicks voor MS](./rest-get-ms-destination-clicks)
* [Opvragen van destination/message deliveries voor MS](./rest-get-ms-destination-deliveries)
* [Opvragen van destination/message errors voor MS](./rest-get-ms-destination-errors)
* [Opvragen van destination/message impressions voor MS](./rest-get-ms-destination-impressions)
* [Opvragen van destination/message unsubscribes voor MS](./rest-get-ms-destination-unsubscribes)
