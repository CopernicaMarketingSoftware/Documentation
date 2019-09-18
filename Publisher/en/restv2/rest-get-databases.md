# REST API: GET databases

A method to request a list of all available databases. This is an HTTP 
GET call to the following address:

`https://api.copernica.com/v2/databases?access_token=xxxx`

## Available parameters

| Parameter | Description                                                        |
|-----------|--------------------------------------------------------------------|
| **start** | The first database to be requested.                                |
| **limit** | Length of the requested batch.                                     |
| **total** | Whether or not the total number of databases should be counted.    |

More information on the meaning of start, limit and total parameters 
can be found in the [article on paging](rest-paging).

## Returned fields

The method returns a list of databases. For each database in the list, the following properties are returned:

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

If you want to know more about *fields*, *interests* and *collections*  
take a look at the articles below. These methods return similar data:

- [Requesting fields](rest-get-database-fields)
- [Requesting interests](rest-get-database-interests)
- [Requesting collections](rest-get-database-collections) 

### JSON example

The JSON for a single database might look something like this:

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

The following PHP script demonstrates how to use the method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// parameters to pass to the call
$parameters = array(
    'limit'     =>  100
);

// do the call, and print result
print_r($api->get("databases", $parameters));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

- [Overview of all API methods](rest-api)
- [GET database](rest-get-database)
- [PUT database](rest-put-database)
