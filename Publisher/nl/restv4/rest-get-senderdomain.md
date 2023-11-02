# REST API: GET senderdomain

Deze methode wordt gebruikt om een bestaande senderdomain op te halen met de REST API. Je doet dit door een HTTP GET verzoek te sturen naar de volgende URL. 

`https://api.copernica.com/v3/senderdomain/$id?access_token=xxxx`

Hier moet `$id` vervangen worden door het ID van de senderdomain.

## Teruggegeven velden

Deze methode geeft een JSON object terug dat de volgende data bevat:

| Naam              | Beschrijving                                                                          |
|-------------------|---------------------------------------------------------------------------------------|
| **ID**            | Uniek ID van de senderdomain                                                          |
| **domain**        | Het domein waarmee je e-mails verstuurd.                                              |
| **approved**      | Of het senderdomain gevalideerd is.                                                    |
| **records**       | Een lijst met de verschillende DNS records.                                           |

### JSON voorbeeld

De JSON ziet er bijvoorbeeld zo uit:

```json
{  
   "ID": "113",
   "domain": "https://mysenderdomain.com",
   "approved": true,
   "records": [{
       "type": "dns",
       "property": "validation",
       "record": "TXT",
       "name": "copernica-mysenderdomain.nl",
       "value": "Q3YzYwMGI0ODNlYzUxMmE2ZWVhM2JjMDY1MTUwOGQ4OTZiNjhhMjgzMzQ1MGE1MWZkNjhiZDgwNwxx",
       "actual": [],
       "valid": "valid"
   }, ...]
}
```

## PHP voorbeeld

Het onderstaande script demonstreert hoe je deze API methode gebruikt. Vergeet niet de ID in de URL te vervangen voor je het verzoek uitvoert.

```php
// vereiste scripts
require_once("copernica_rest_api.php");

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// voer het verzoek uit
$api->get("senderdomain/{$id}");
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie 

- [GET senderdomain](rest-get-senderdomain)
- [PUT senderdomain](rest-put-senderdomain)
- [POST senderdomains](rest-post-senderdomains)
- [Overzicht van alle REST API calls](rest-api)
