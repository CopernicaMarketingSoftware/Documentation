# REST API: GET snapshot (Publisher mailing)

Je kunt een snapshot van een Publisher mailing opvragen door een HTTP GET request 
te sturen naar de volgende URL:

`https://api.copernica.com/v3/publisher/emailing/$id/snapshot?access_token=xxxx`

Hier moet `$id` vervangen worden door de ID van de mailing.

## Teruggegeven velden

Het **data** veld van het teruggegeven JSON object bevat de snapshot informatie. 
De volgende velden zijn beschikbaar:

* **document**: De ID van het document gebruikt voor de mailing
* **name**: De naam van de snapshot.
* **from_address**: Het 'from address' van de mailing.
* **subject**: Het onderwerp van de mailing.

### JSON voorbeeld

De JSON voor een snapshot ziet er bijvoorbeeld zo uit:

```json
{  
   "document":"58",
   "name":"New emailing",
   "from_address":"\"Test\" <test@copernica.com>",
   "subject":"Title!"
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
print_r($api->get("publisher/emailing/{$emailingID}/snapshot/"));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php).

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Opvragen van een Publisher emailing](./rest-get-publisher-emailing)

