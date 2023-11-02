# REST API: GET couponcampaigns

Je kunt alle informatie over alle couponcampagnes opvragen met de onderstaande methode. 
Dit is een HTTP GET-call naar het volgende adres:

`https://api.copernica.com/v4/couponcampaigns`

## Geretourneerde velden

De methode retourneert een JSON-object dat de volgende velden bevat:

| Variabele         | Omschrijving                                                                      |
|-------------------|-----------------------------------------------------------------------------------|
| **ID**            | ID van de couponcampagne                                                          |
| **name**          | Naam van de couponcampagne                                                        |
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
  "start": 0,
  "limit": 100,
  "count": 2,
  "data": [
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
    },
    {
      "ID": "2",
      "code": "Summer VIP Sale",
      "description": "Campaign for VIP clients during summer",
      "archived": false,
      "available": 20,
      "sent": 151,
      "redeemed": 23,
      "tags": []
    }
  ],
  "total": 2
}
```

## Voorbeeld in PHP

Het volgende PHP-script demonstreert hoe je de API-methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit in je access code access token
$api = new CopernicaRestAPI("your-access-token", 4);

// voer de opdracht uit en print het resultaat
print_r($api->get("couponcampaigns"));
```

Dit voorbeeld vereist de [REST API-klasse](rest-php).

## Meer informatie
* [Overzicht van alle API-calls](rest-api)
