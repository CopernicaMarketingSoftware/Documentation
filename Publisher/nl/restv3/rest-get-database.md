# REST API: GET database

Dit is een methode om meta gegevens van een database op te vragen. 
Deze methode ondersteunt geen parameters. De methode is aan te 
roepen met een HTTP GET request naar de volgende URL:

`https://api.copernica.com/v3/database/$id?access_token=xxxx`

Als `$id` kun je de numerieke identifier van een database opgeven, of de naam
van een database.

## Beschikbare parameters

Deze methode ondersteunt alleen paging parameters. Meer informatie over 
deze parameters vind je in het [artikel over paging](rest-paging).

## Geretourneerde velden

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
collections op te vragen. In de onderstaande artikelen kun je ook zien 
hoe de JSON hiervoor opgebouwd wordt.

* [GET fields](rest-get-database-fields)
* [GET interests](rest-get-database-interests)
* [GET collections](rest-get-database-collections) 

### JSON voorbeeld

De JSON voor een database ziet er bijvoorbeeld zo uit:

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
         {  
            "ID":"20990",
            "name":"birthday",
            "type":"date",
            "value":"2018-03-16",
            "displayed":true,
            "ordered":false,
            "length":"100",
            "textlines":"3",
            "hidden":false,
            "index":false
         },
         {  
            "ID":"20991",
            "name":"email",
            "type":"email",
            "value":"bla@bla.nl",
            "displayed":true,
            "ordered":false,
            "length":"100",
            "textlines":"3",
            "hidden":false,
            "index":false
         }
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
         {  
            "ID":"3054",
            "name":"baseball",
            "group":"sport"
         }
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
                  {  
                     "ID":"9475",
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
         },
      ],
      "total":1
   }
}
```

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

```php
// vereiste scripts
require_once("copernica_rest_api.php");

// verander dit in je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// voer de opdracht uit en print het resultaat
print_r($api->get("database/{$databaseID}"));
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Bewerken van een database](rest-put-database)
