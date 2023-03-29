# REST API: PUT couponcampaign coupon

Methode om de status van een coupon te wijzigen. Dit is een HTTP PUT-methode naar het volgende adres:

`https://api.copernica.com/v3/couponcampaign/$couponcampaign/coupon/$coupon?access_token=xxxx`

## Beschikbare parameters

* **redeemed**: boolean to indicate that a coupon has been redeemed (true/false)

## Voorbeeld in JSON

```json
{
    "redeemed" : true
}
```

## Voorbeeld in PHP

Het volgende PHP-script demonstreert hoe je de API-methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica-rest-api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// data voor de methode
$data = array(
    'redeemed'          =>  true
);

// voer het verzoek uit
$api->put("couponcampaign/$couponcampaignID/coupon/$coupon", $data);
```

Dit voorbeeld vereist de [REST API-klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
