# REST API: GET couponcampaign coupons

Methode om een overzicht op te vragen van alle coupons in een couponcampagne.
Dit is een HTTP GET-call naar het volgende adres:

`https://api.copernica.com/v3/couponcampaign/$id/coupons?access_token=xxxx`

Als `$id` moet je de numerieke identifier van de couponcampagne opgeven.

## Beschikbare parameters
De volgende parameters kunnen aan de URL als variabelen worden toegevoegd:

* **start**: Eerste ID om op te vragen
* **limit**: Aantal coupons om op te vragen
* **total**: Boolean. Geeft aan of het totale aantal coupons getoond moet worden
De methode is sneller wanneer dit op 'false' staat
* **fields**: Optionele parameter om condities voor coupons mee in te stellen

### Paging

Meer over de **start**, **limit** en **total** parameters vind je in het [artikel over paging](rest-paging). 

### Fields 

De **fields** parameter kun je gebruiken om coupons te selecteren. Als je bijvoorbeeld
alleen beschikbare coupons wil opvragen. 

Beschikbare filters:
* **code**: informatie over een specifieke code ophalen
* **status**: status van de coupons (available, sent, redeemed)
* **valid**: Boolean. Hiermee kun je aangeven of je alle coupons of enkel beschikbare terug wilt krijgen

**Voorbeeld**:  
https://api.copernica.com/v3/couponcampaign/$id/coupons?fields[]=code==$code&access_token=xxxx

Meer informatie over het gebruik van de **fields** parameter kun je vinden in een 
[artikel over de fields parameter](rest-fields-parameter).

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
  "start": 0,
  "limit": 100,
  "count": 3,
  "data": [
    {
      "ID": "8",
      "code": "2345DU",
      "validfrom": "2023-02-22 14:54:07",
      "validuntil": "",
      "status": "available"
    },
    {
      "ID": "9",
      "code": "2345FA",
      "validfrom": "2023-02-22 14:54:07",
      "validuntil": "",
      "status": "sent"
    },
    {
      "ID": "10",
      "code": "2345KI",
      "validfrom": "2023-02-22 14:54:07",
      "validuntil": "",
      "status": "redeemed"
    }
  ],
  "total": 3
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
print_r($api->get("couponcampaign/{$id}/coupons"));
```

Dit voorbeeld vereist de [REST API-klasse](rest-php).

## Meer informatie
* [Overzicht van alle API calls](rest-api)
