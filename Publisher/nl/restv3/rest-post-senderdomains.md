# REST API: POST senderdomains

Deze methode wordt gebruikt om een senderdomain aan te maken met de REST API. Je doet dit door een HTTP POST verzoek te sturen naar de volgende URL.

`https://api.copernica.com/v3/senderdomains?access_token=xxxx`

## Beschikbare parameters

| Naam              | Beschrijving                                                                                      |
|-------------------|---------------------------------------------------------------------------------------------------|
| **name**          | Het domein waarmee je e-mails wilt versturen.                                                     |
| **tracking**      | (optioneel) Het domein waarop de impressies van de mailings geregistreerd kunnen worden.          |
| **bounce**        | (optioneel) Het domein waarop de bounces van de mailings geregistreerd kunnen worden.             |

## PHP voorbeeld

Het onderstaande script demonstreert hoe je deze API methode gebruikt. Vergeet niet de ID in de URL te vervangen voor je het verzoek uitvoert.

```php
// vereiste script
require_once("copernica_rest_api.php");

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// data
$data = array(
    'name'   =>  'mysenderdomain.com',
    'tracking'   =>  'tracking.mysenderdomain.com',
    'bounce'   =>  'bounces.mysenderdomain.com',
);

// voer het verzoek uit
$api->post("senderdomains/{$id}", $data);
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie 

- [GET senderdomain](rest-get-senderdomain)
- [PUT senderdomain](rest-put-senderdomain)
- [POST senderdomain](rest-post-senderdomain)
- [Overzicht van alle REST API calls](rest-api)
