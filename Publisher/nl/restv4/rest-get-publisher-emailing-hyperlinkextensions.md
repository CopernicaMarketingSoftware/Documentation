# REST API: GET hyperlink extensions (Publisher mailing)

Je kan de hyperlinks extensions van een e-mailing opvragen met een HTTP GET-call naar de volgende URL:

`https://api.copernica.com/v4/publisher/emailing/$id/hyperlinkextensions`

Hier moet `$id` vervangen worden door de ID van de mailing. 

## JSON voorbeeld

De JSON ziet er bijvoorbeeld zo uit:

```json
{
    "all": {
       "utm_source": "copernica",
       "utm_medium": "email",
       "utm_campaign": "test_message",
       "utm_content": "button"
    },
    "copernica.com": {
       "utm_source": "copernica",
       "utm_medium": "email",
       "utm_campaign": "test_message",
       "utm_content": "link"
    }
}
```

## PHP voorbeeld

Dit script demonstreert hoe je de API-methode kunt gebruiken:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token 
$api = new CopernicaRestAPI("your-access-token", 4);

// voer het verzoek uit
print_r($api->get("publisher/emailing/{$emailingID}/hyperlinkextensions/"));
```

Dit voorbeeld vereist de [REST API-klasse](./rest-php).

## Meer informatie

* [Overzicht van alle REST API-calls](./rest-methods)
