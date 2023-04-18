# REST API: GET deliveries (Marketing Suite)

Er worden statistieken bijgehouden over elke mailing die verstuurd wordt met 
Copernica om je meer inzicht te geven in de prestatie hiervan. Deliveries zijn 
een van de statistieken die worden bijgehouden. 
Je kan alle deliveries voor een account opvragen met een HTTP GET call naar de volgende URL:

`https://api.copernica.com/v3/ms/deliveries?access_token=xxxx`

## Parameters

De parameters voor deze methode kunnen ingesteld worden om alleen de 
statistieken voor een bepaalde periode op te halen. De volgende optionele 
parameters zijn beschikbaar:

* **begintime**: De tijdstempel waarna de delivery gemaakt moet zijn (YYYY-MM-DD HH:MM:SS format).
* **endtime**: De tijdstempel waarvoor de delivery gemaakt moet zijn (YYYY-MM-DD HH:MM:SS format).

## Teruggegeven velden

Deze methode geeft een JSON object terug met deliveries onder het 'data' 
veld. Voor elke delivery is de volgende informatie beschikbaar:

* **ID**: De ID van de delivery.         
* **mailing**: De ID van de mailing.
* **timestamp**: Tijdstempel van de delivery.
* **attempts**: Aantal pogingen voor de delivery.
* **destination**: De ID van de destination voor de delivery.

### JSON voorbeeld

Een enkele delivery ziet er bijvoorbeeld zo uit:

```json
{  
   "ID":"1",
   "mailing":"33",
   "timestamp":"2014-11-06 13:43:17",
   "attempts":1,
   "destination":"312"
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
print_r($api->get("ms/deliveries"));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php).

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Opvragen van abuses voor MS](./rest-get-ms-abuses)
* [Opvragen van clicks voor MS](./rest-get-ms-clicks)
* [Opvragen van errors voor MS](./rest-get-ms-errors)
* [Opvragen van impressions voor MS](./rest-get-ms-impressions)
* [Opvragen van unsubscribes voor MS](./-rest-get-ms-unsubscribes)
