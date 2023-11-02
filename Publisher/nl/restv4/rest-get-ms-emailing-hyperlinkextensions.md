# REST API: GET hyperlink extensions (Marketing Suite mailing)

Je kan de hyperlinks extensions van een e-mailing opvragen met een HTTP GET-call naar de volgende URL:

`https://api.copernica.com/v4/ms/emailing/$id/hyperlinkextensions?access_token=xxxx`

Hier moet `$id` vervangen worden door de ID van de mailing. 

## JSON voorbeeld

De JSON ziet er bijvoorbeeld zo uit:

```json
{
    "data": [
    {
         "parameter": "utm_source",
         "value": "copernica",
         "type": "setparameter",
         "last": false,
         "unique": false,
         "checks": []
    },
    {
         "parameter": "utm_medium",
         "value": "email",
         "type": "setparameter",
         "last": false,
         "unique": false,
         "checks": []
    },
    {
         "parameter": "utm_campaign",
         "value": "test_message",
         "type": "setparameter",
         "last": false,
         "unique": false,
         "checks": []
    },
    {
         "parameter": "utm_content",
         "value": "button",
         "type": "setparameter",
         "last": false,
         "unique": false,
         "checks": []
    },
    {
         "parameter": "utm_content",
         "value": "link",
         "type": "setparameter",
         "last": false,
         "unique": false,
         "checks": [
        {
             "type": "domain",
             "value": "copernica.com",
             "comparison": "contains"
        }]
    }]
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
print_r($api->get("ms/emailing/{$emailingID}/hyperlinkextensions/"));
```

Dit voorbeeld vereist de [REST API-klasse](./rest-php).

## Meer informatie

* [Overzicht van alle REST API-calls](./rest-methods)
