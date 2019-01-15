# REST API: GET emailing (Publisher)

Je kunt de REST API gebruiken om een overzicht van een mailing op te vragen 
door een HTTP GET verzoek te versturen naar de volgende URL:

`https://api.copernica.com/v2/publisher/emailing/$id?access_token=xxxx`

Hier moet `$id` vervangen worden door de ID van de mailing.

## Teruggegeven velden

Deze methode geeft een JSON object terug dat de volgende informatie bevat:

* **id**: De ID van de mailing. 
* **timestamp**: De tijdstempel van de mailing.
* **destinations**: Het aantal destinations van de mailing.
* **type**: Het type van de mailing: 'mass' (massa mailing) of 'individual' (individuele mailing). Vraagt 
standaard beide op.
* **embedded**: Boolean die aangeeft of de afbeeldingen in de mailing ingebed zijn of niet.
* **contenttype**: Het type content in de mailing: 'html', 'text' of 'both' (beide).
* **registerclicks**: Boolean die aangeeft of kliks geregistreerd worden voor deze mailing of niet.
* **registerimpressions**: Boolean die aangeeft of impressies geregistreerd worden voor deze mailing of niet.
* **registererrors**: Boolean die aangeeft of errors geregistreerd worden voor deze mailing of niet.
* **target**: Array die het target type en de ID en het type van zijn sources bevat (een source is bijvoorbeeld de database waartoe een collectie behoort).

## PHP voorbeeld

Het onderstaande script demonstreert hoe je deze API methode gebruikt. 
Vergeet niet de ID in de URL te vervangen voor je het verzoek uitvoert.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// voer het verzoek uit
print_r($api->get("publisher/emailing/{$emailingID}"));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php)

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Vraag alle Publisher mailings op](./rest-get-publisher-emailings)
