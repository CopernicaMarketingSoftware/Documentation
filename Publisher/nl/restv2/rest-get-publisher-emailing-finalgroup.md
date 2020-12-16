# REST API: GET finalgroup (Publisher mailing)

Je kunt de definitieve groep van een Publisher mailing opvragen door een HTTP GET request 
te sturen naar de volgende URL:

`https://api.copernica.com/v2/publisher/emailing/$id/finalgroup?access_token=xxxx`

Hier moet `$id` vervangen worden door de ID van de mailing.

## Teruggegeven velden

Het **data** veld van het teruggegeven JSON object bevat de snapshot informatie. 
De volgende velden zijn beschikbaar:

* **document**: De ID van het document van de mailing.
* **name**: De naam van de mailing snapshot verstuurd naar de definitieve groep.
* **from_address**: Het 'from address' van de mailing.
* **subject**: Het onderwerp van de mailing.
* **timestamp**: De tijdstempel van de mailing.
* **destinations**: Het aantal destinations in de definitieve groep.

### JSON voorbeeld

De JSON voor een testgroep ziet er bijvoorbeeld zo uit:

```json
{  
   "ID":"2481",
   "document":"12",
   "name":"Finalgroup",
   "from_address":"\"Mr. Test\" <test@copernica.com>",
   "subject":"Emailing!",
   "timestamp":"2010-10-12 12:37:26",
   "destinations":"1"
}
```

## PHP voorbeeld

Het volgende script demonstreert hoe je deze API methode kunt gebruiken:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// voer het verzoek uit
print_r($api->get("publisher/emailing/{$emailingID}/finalgroup/"));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php).

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Opvragen van een Publisher emailing](./rest-get-publisher-emailing)

