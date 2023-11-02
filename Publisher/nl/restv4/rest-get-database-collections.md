# REST API: GET database collections

Je kunt collecties van een database opvragen middels een HTTP GET 
request:

`https://api.copernica.com/v3/database/$id/collections?access_token=xxxx`

De `$id` moet je vervangen door de numerieke identifier of de naam van 
de database waar je de collecties van wilt opvragen.

## Beschikbare parameters

De volgende parameters kunnen aan de URL als variabelen worden toegevoegd:

| Parameter | Beschrijving                                            |
|-----------|---------------------------------------------------------|
| **start** | Eerste collectie die wordt opgevraagd;                  |
| **limit** | Lengte van de batch die wordt opgevraagd;               |
| **total** | Toon wel/niet het totaal aantal beschikbare collecties. |

Meer informatie over de betekenis van deze parameters vind je in het
[artikel over paging](rest-paging).

## Geretourneerde velden

De methode retourneert een JSON object dat de collecties voor de databases 
bevat onder het 'data' veld. Elke collectie bevat de volgende velden:

| Variabele         | Omschrijving                                                                      |
|-------------------|-----------------------------------------------------------------------------------|
| **ID**            | ID van de collectie.                                                              |
| **name**          | Naam van de collectie.                                                            |
| **database**      | ID van de database waartoe de collectie behoort.                                  |
| **fields**        | Array met de velden in de collectie.                                              |
| **intentions**    | Array met de intenties voor deze collectie (1 of null voor email/sms/fax/pdf).    |

### JSON voorbeeld

De JSON voor een collectie ziet er bijvoorbeeld zo uit:

```json
{  
   "ID":"25935",
   "name":"Orders",
   "database":"7453",
   "fields":{  
      "start":0,
      "limit":100,
      "count":7,
      "data":[  
         {  
            "ID":"9277",
            "name":"email",
            "type":"email",
            "value":"test@copernica.nl",
            "displayed":true,
            "ordered":false,
            "length":"100",
            "textlines":"0",
            "hidden":false,
            "index":false
         },
         {  
            "ID":"9879",
            "name":"order_number",
            "type":"integer",
            "value":"0",
            "displayed":true,
            "ordered":false,
            "length":"100",
            "textlines":"0",
            "hidden":false,
            "index":false
         }
      ],
      "total":2
   }
}
```

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// parameters voor de methode
$parameters = array(
    'limit'     =>  100
);

// voer de methode uit en print het resultaat
print_r($api->get("database/{$databaseID}/collections", $parameters));
```

Dit voorbeeld vereist de [REST API klasse](rest-php).
    
## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [POST database collections](rest-post-database-collections)
* [GET collection fields](rest-get-collection-fields)
* [POST collection fields](rest-post-collection-fields)
