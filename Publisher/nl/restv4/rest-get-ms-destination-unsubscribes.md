# REST API: GET destination unsubscribes (Marketing Suite)

Er worden statistieken bijgehouden over elke mailing die verstuurd wordt met 
Copernica om je meer inzicht te geven in de prestatie hiervan. Uitschrijvingen zijn 
een van de statistieken die worden bijgehouden. Je kan de uitschrijvingen voor 
een specifieke destination opvragen met een HTTP GET-call naar de volgende URL:

`https://api.copernica.com/v3/ms/destination/{$destinationID}/unsubscribes?access_token=xxxx`

## Parameters

De volgende optionele parameters zijn beschikbaar:

* **begintime**: De tijdstempel waarna de uitschrijving gemaakt moet zijn (YYYY-MM-DD HH:MM:SS format).
* **endtime**: De tijdstempel waarvoor de uitschrijving gemaakt moet zijn (YYYY-MM-DD HH:MM:SS format).
* **unique**: Toon enkel unieke uitschrijvingen per profiel (true / **false**)

Dikgedrukte is de standaardwaarde.

## Teruggegeven velden

Deze methode geeft een JSON object terug met uitschrijvingen onder het 'data' veld. 
Voor elke uitschrijving is de volgende informatie beschikbaar:

* **ID**: De ID van de uitschrijving.         
* **mailing**: De ID van de mailing.
* **timestamp**: Tijdstempel van de uitschrijving. 
* **destination**: De ID van de destination die de uitschrijving veroorzaakte.
* **source**: De bron van de uitschrijving.

### JSON voorbeeld

Een enkele uitschrijving ziet er bijvoorbeeld zo uit.

```json
{  
   "ID":"1",
   "mailing":"412",
   "timestamp":"2021-10-09 13:41:46",   
   "destination":"112",
   "source":"click"
}
```

## PHP voorbeeld

Dit script demonstreert hoe je de API-methode kunt gebruiken:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token 
$api = new CopernicaRestAPI("your-access-token", 3);

// voer het verzoek uit
print_r($api->get("ms/destination/{$destinationID}/unsubscribes"));
```

Dit voorbeeld vereist de [REST API-klasse](./rest-php).

## Meer informatie

* [Overzicht van alle REST API-calls](./rest-api)
