# REST API: GET databases

Je kunt alle informatie omtrent databases opvragen 
met de onderstaande methode. Dit is een HTTP GET 
call naar het volgende adres:

`https://api.copernica.com/v2/databases?access_token=xxxx`

## Beschikbare parameters

Deze methode ondersteunt alleen paging parameters. Meer informatie over 
deze parameters vind je in het [artikel over paging](rest-paging).

## Geretourneerde velden

De methode retourneert een lijst van databases. 
Van elke database in de lijst wordt een aantal velden teruggegeven:

| Variabele         | Omschrijving                                                                  |
|-------------------|-------------------------------------------------------------------------------|
| **id**            | Unieke identifier van de database.                                            |
| **name**          | Naam van de database.                                                         |
| **description**   | Omschrijving van de database.                                                 |
| **archived**      | Geeft aan of de database wel (1) of niet (null) gearchiveerd is.              |
| **created**       | Tijdstip waarop de database is aangemaakt.                                    |
| **fields**        | Array met de fields in de database.                                           |
| **interests**     | Array met de interests in de database.                                        |
| **collections**   | Array met de collections in de database.                                      |
| **intentions**    | Array met de intenties voor deze database (1 of null voor email/sms/fax/pdf). |

Het is ook mogelijk om apart informatie over fields, interests en
collections op te vragen:

* [GET fields](rest-get-database-fields)
* [GET interests](rest-get-database-interests)
* [GET collections](rest-get-database-collections) 

### JSON voorbeeld

De JSON voor een enkele database ziet er bijvoorbeeld zo uit:

```json
{  
   "ID":"3144",
   "name":"Test database",
   "description":"This is a test database.",
   "archived":false,
   "created":"2018-03-08 10:47:01",
   "fields":{  
      "start":0,
      "limit":1000,
      "count":3,
      "data":[  
         {  
            "ID":"20989",
            "name":"name",
            "type":"text",
            "value":"",
            "displayed":true,
            "ordered":false,
            "length":"255",
            "textlines":"3",
            "hidden":false,
            "index":false
         },
         ...
      ],
      "total":3
   },
   "interests":{  
      "start":0,
      "limit":1000,
      "count":2,
      "data":[  
         {  
            "ID":"3053",
            "name":"soccer",
            "group":"sports"
         },
         ...
      ],
      "total":2
   },
   "collections":{  
      "start":0,
      "limit":1000,
      "count":1,
      "data":[  
         {  
            "ID":"20981",
            "name":"Orders",
            "database":"3144",
            "fields":{  
               "start":0,
               "limit":100,
               "count":2,
               "data":[  
                  {  
                     "ID":"9474",
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
                  ...
               ],
               "total":2
            }
         },
      ],
      "total":1
   }
}
```

## PHP Voorbeeld

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

```php
// vereiste scripts
require_once("copernica_rest_api.php");

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// parameters voor de methode
$parameters = array(
	'limit'	=>  100
);

// voer de methode uit en print het resultaat
print_r($api->get("databases", $parameters));
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [GET id van database](rest-get-database)
* [POST databases](rest-post-databases)
