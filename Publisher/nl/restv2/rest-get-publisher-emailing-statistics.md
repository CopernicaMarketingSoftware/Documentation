# REST API: GET statistics (Publisher mailing)

Je kunt de statistieken van een Publisher mailing opvragen door een HTTP GET request 
te sturen naar de volgende URL:

`https://api.copernica.com/v2/publisher/emailing/$id/statistics?access_token=xxxx`

Hier moet `$id` vervangen worden door de ID van de mailing.

## Beschikbare parameters

* **begintime**: Start datum (en tijd) voor de statistieken.
* **endtime**: Eind datum (en tijd) voor de statistieken.

## Teruggegeven velden

Het **data** veld van het teruggegeven JSON object bevat de statistieken. 
De volgende velden zijn beschikbaar:

* **abuses**: De abuses ontvangen voor deze mailing.
* **clicks**: De clicks ontvangen voor deze mailing.
* **errors**: De errors ontvangen voor deze mailing.
* **impressions**: De impressions ontvangen voor deze mailing.
* **unsubscribes**: De unsubscribes ontvangen voor deze mailing.
* **unknown**: De statistieken die niet binnen de bovenstaande categorieën vallen.

## PHP voorbeeld

Het volgende script demonstreert hoe je deze API methode kunt gebruiken:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// voer het verzoek uit
print_r($api->get("publisher/emailing/{$emailingID}/statistics/"));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php).

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Opvragen van een Publisher emailing](./rest-get-publisher-emailing)

