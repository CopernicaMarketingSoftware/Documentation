# REST API: PUT couponcampaign coupons

Methode om coupons toe te voegen aan een campagne. Dit is een HTTP PUT-methode naar het volgende adres:

`https://api.copernica.com/v3/couponcampaign/$couponcampaign/coupons?access_token=xxxx`

## Beschikbare parameters

* **source**: array van data

## Voorbeeld in JSON

```json
{
    "status" :[
        {
            "code":"1234AA",
            "validfrom":"2023-02-25",
            "validuntil":"2023-02-28"
        },
        {
            "code":"1234BB",
            "validfrom":"2023-02-25",
            "validuntil":"2023-02-28"
        }
    ]
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
    'source'          =>  '[
        {
            "code":"1234AA",
            "validfrom":"2023-02-25",
            "validuntil":"2023-02-28"
        },
        {
            "code":"1234BB",
            "validfrom":"2023-02-25",
            "validuntil":"2023-02-28"
        }
    ]'
);

// voer het verzoek uit
$api->put("couponcampaign/$couponcampaignID/coupons", $data);
```

Dit voorbeeld vereist de [REST API-klasse](rest-php).

## Meer informatie

* [Overzicht van alle API-calls](rest-api)
