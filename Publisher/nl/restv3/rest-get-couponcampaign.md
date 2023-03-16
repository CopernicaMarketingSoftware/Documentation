# REST API: GET couponcampaign

Je kunt alle informatie omtrent een couponcampagne opvragen met de onderstaande methode. 
Dit is een HTTP GET-call naar het volgende adres:

`https://api.copernica.com/v3/couponcampaign/$id?access_token=xxxx`

Als `$id` moet je de numerieke identifier van de couponcampagne opgeven.

## Geretourneerde velden

De methode retourneert een JSON-object dat de volgende velden bevat:

| Variabele         | Omschrijving                                                                      |
|-------------------|-----------------------------------------------------------------------------------|
| **ID**            | ID van de couponcampagne                                                          |
| **code**          | Naam van de couponcampagne                                                        |
| **description**   | Beschrijving van de couponcampagne                                                |
| **archived**      | Geeft aan of de database wel of niet gearchiveerd is                              |
| **available**     | Aantal beschikbare coupons                                                        |
| **sent**          | Aantal verzonden coupons                                                          |
| **redeemed**      | Aantal ingewisselde coupons                                                       |
| **tags**          | Array met tags gekoppeld aan de couponcampagne                                    |

## Voorbeeld in JSON

### Teruggegeven waardes
```json
{
  "ID": "1",
  "code": "Winter VIP Sale",
  "description": "Campaign for VIP clients during winter",
  "archived": false,
  "available": 514,
  "sent": 751,
  "redeemed": 91,
  "tags": [
    "10euro",
    "discount"
  ]
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
print_r($api->get("couponcampagne/{$id}"));
```

Dit voorbeeld vereist de [REST API-klasse](rest-php).

## Meer informatie
* [Overzicht van alle API calls](rest-api)
