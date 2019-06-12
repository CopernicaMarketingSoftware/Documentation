# REST API: GET database collections

This method is used to request all collections in a database. It is an 
HTTP GET call to the following address:

`https://api.copernica.com/v2/database/$id/collections?access_token=xxxx`

In this, `$id` should be replaced by the numerical identifier or the 
name of the database of which you want to request the collections.

## Available parameters

The following parameters can be added to the URL as variables:

| Parameter | Description |
|-----------|--------------------------------------------------------------------|
| **start** | The first collection to be requested.                              |
| **limit** | Length of the requested batch.                                     |
| **total** | Whether or not the total number of collections should be counted.  |

More information on the meaning of these parameters can be found [in the article on paging](rest-paging).

## Returned fields

The method returns a JSON object that contains a 'data' property with 
all the collections for the database. Each collection contains the following fields:

| Variable      | Description                                     |
|---------------|-------------------------------------------------|
| **ID**        | The ID of the collection.                       |
| **name**      | Name of the collection.                         |
| **database**  | ID of the database this collection belongs to.  |
| **fields**    | Array with the fields in the collection.        |

### JSON example

The JSON for a single collection might look something like this:

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

The following PHP script demonstrates how to use the API method:

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
print_r($api->get("database/{$databaseID}/collections", $parameters));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

- [Overview of all API methods](rest-api)
- [POST database collections](rest-post-database-collections)
- [GET collection fields](rest-get-collection-fields)
- [POST collection fields](rest-post-collection-fields)
