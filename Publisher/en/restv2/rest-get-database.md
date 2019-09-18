# REST API: GET database

A method to request all metadata from a database. This method does not 
support parameters. By sending a GET request to the following URL, 
you can fetch the database metadata:

`https://api.copernica.com/v2/database/$id?access_token=xxxx`

where `$id` should be replaced by the identifier of the database you want 
to get the metadata of.

## Returned fields

| Variable          | Description                                                                           |
|-------------------|---------------------------------------------------------------------------------------|
| **ID**            | Unique numerical identifier of the database.                                          |
| **name**          | Name of the database.                                                                 |
| **description**   | Description of the database.                                                          |
| **archived**      | Whether or not the database is archived.                                              |
| **created**       | When the database was created.                                                        |
| **fields**        | Array of fields in the database.                                                      |
| **interests**     | Array with interests in the database.                                                 |
| **collections**   | Array with the collections in the database.                                           |
| **intentions**    | Array with the intentions for the database (either 1 or null for email/sms/fax/pdf).  |

Fields, interests and collections are returned as arrays of objects. 
If you want to know how these arrays are built, you can check out 
the pages of these API methods, which return similar data:

- [GET database fields](rest-get-database-fields)
- [GET database interests](rest-get-database-interests)
- [GET database collections](rest-get-database-collections)

### JSON example

The JSON for the database might look something like this:

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

## PHP example

The following example demonstrates how to use this method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// do the call, and print result
print_r($api->get("database/{$databaseID}"));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

- [Overview of all REST API methods](rest-api)
- [POST database](rest-post-databases)
