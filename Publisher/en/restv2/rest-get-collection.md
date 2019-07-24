# REST API: GET collection

A collection is somewhat like a second layer within a database. These collections
have a numerical ID which can be used to fetch information with an HTTP GET request
to the following URL:

`https://api.copernica.com/v2/collection/$id?access_token=xxxx`

The `$id` here should be replaced with the numerical identifier of the collection.

## Returned fields

The method returns a JSON object that contains the following fields:

| Variable      | Description                                     |
|---------------|-------------------------------------------------|
| **ID**        | The ID of the collection.                       |
| **name**      | Name of the collection.                         |
| **database**  | ID of the database this collection belongs to.  |
| **fields**    | Array with the fields in the collection.        |

### JSON example

The JSON for this method might look something like this:

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

## PHP example

The following PHP scripts is an example of how to call this API method:

```php
// dependencies
require_once('copernica_rest_api.php');
    
// change this to your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// execute the call and print the result.
print_r($api->get("collection/{$collectionID}"));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all API calls](rest-api)
* [PUT database](rest-put-database)
