# REST API: GET statistics (Marketing Suite mailing)

Je kunt de statistieken van een Marketing Suite mailing opvragen door een HTTP GET request 
te sturen naar de volgende URL:

`https://api.copernica.com/v2/ms/emailing/$id/statistics?access_token=xxxx`

Hier moet `$id` vervangen worden door de ID van de mailing.

## Beschikbare parameters

* **begintime**: Start datum (en tijd) voor de statistieken.
* **endtime**: Eind datum (en tijd) voor de statistieken.

## Teruggegeven velden

Het **data** veld van het teruggegeven JSON object bevat de statistieken. 
De volgende velden zijn beschikbaar:

* **destinations**: Aantal ontvangers van deze mailing.
* **abuses**: Aantal abuses gerapporteerd voor deze mailing.
* **clicks**: Array met de velden 'total' en 'unique' voor het aantal kliks 
en het aantal unieke kliks respectievelijk.
* **errors**: Aantal errors ontvangen voor deze mailing.
* **impressions**: Array met de velden 'total' en 'unique' voor het aantal impressies 
en het aantal unieke impressies respectievelijk.
* **retries**: Aantal retries voor deze mailing.
* **unsubscribes**: Aantal unsubscribes voor deze mailing.

## PHP voorbeeld

Het volgende script demonstreert hoe je deze API methode kunt gebruiken:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// voer het verzoek uit
print_r($api->get("ms/emailing/{$emailingID}/statistics/"));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php).

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Opvragen van een Marketing Suite emailing](./rest-get-ms-emailing)

