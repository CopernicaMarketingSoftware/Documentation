# REST API: GET couponcampaign coupon

Methode om een specifieke coupon op te vragen.
Dit is een HTTP GET-call naar het volgende adres:

`https://api.copernica.com/v3/couponcampaign/$id/coupon/$id?access_token=xxxx`

Bij het eerste `$id` geef je de numerieke identifier van de couponcampagne op. Als tweede `$id` geef je de numerieke indentifier van de coupon op.

## Geretourneerde velden

De methode retourneert een JSON-object dat de volgende velden bevat:

| Variabele         | Omschrijving                                                                      |
|-------------------|-----------------------------------------------------------------------------------|
| **ID**            | ID van de coupon                                                                  |
| **code**          | Code van de coupon                                                                |
| **validfrom**     | Datum vanaf wanneer de coupon geldig is                                           |
| **validuntil**    | Datum tot wanneer de coupon geldig is                                             |
| **status**        | Status van de coupon (available, sent, redeemed)                                  |

## Voorbeeld in JSON

### Teruggegeven waardes
```json
{
  "ID": "1",
  "code": "1234CD",
  "validfrom": {
    "date": "2023-02-16 10:03:58.000000",
    "timezone_type": 3,
    "timezone": "Europe/Amsterdam"
  },
  "validuntil": null,
  "status": "redeemed"
}
```

## Voorbeeld in PHP

Het volgende PHP-script demonstreert hoe je de API-methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit in je access code access token
$api = new CopernicaRestAPI("your-access-token", 3);

// voer de opdracht uit en print het resultaat
print_r($api->get("couponcampaign/{$couponcampaignID}/coupon/{$couponID}"));
```

Dit voorbeeld vereist de [REST API-klasse](rest-php).

## Meer informatie
* [Overzicht van alle API calls](rest-api)
