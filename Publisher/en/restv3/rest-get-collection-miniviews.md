# REST API: GET collection miniviews

What selections are to a database is what miniselections, or miniviews, 
are to a collection. To fetch the miniselections applied to this collection 
the following HTTP GET request can be used:

`https://api.copernica.com/v3/collection/$id/miniviews?access_token=xxxx`

The code `$id` should be replaced by the ID of the collection you want to 
fetch the miniviews of.

## Available parameters

The following parameters can be added to the URL as variables:

| Parameter | Description                                                       |
|-----------|-------------------------------------------------------------------|
| **start** | The first miniview to be requested.                               |
| **limit** | Length of the requested batch.                                    |
| **total** | Whether or not the total number of miniviews should be counted.   |

More information on the meaning of these parameters can be found in the 
[article on paging](./rest-paging).

## Returned fields

The method returns a JSON object with miniselections in the **data** 
field. For each selection the following information is returned:

| Variable          | Description                                                                               |
|-------------------|-------------------------------------------------------------------------------------------|
| **ID**            | Unique numerical identifier.                                                              |
| **name**          | Name of the selection.                                                                    |
| **description**   | Description of the selection.                                                             |
| **parent-type**   | Type of the parent: collection in this case.                                              |
| **parent-id**     | ID of the view or collection.                                                             |
| **collection**    | ID of the collection this selection belongs to.                                           |
| **last-built**    | Timestamp of the last time the view was built.                                            |
| **intentions**    | Array with the intentions for the view (either 1 or null for email/sms/fax/pdf).          |

### JSON example

The JSON for a miniview might look something like this:
 
```json
{  
   "ID":"1525",
   "name":"Miniselection",
   "description":"",
   "parent-type":"collection",
   "parent-id":"21448",
   "collection":"21448",
   "last-built":"2019-06-19 00:48:37"
}
```

## PHP example

The following PHP script demonstrates how to call the API method:

```php
// dependencies
require_once('copernica_rest_api.php');
  
// insert your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// parameters for the call
$parameters = array(
    'limit'     =>  100
);
    
// execute the method and print the results
print_r($api->get("collection/{$collectionID}/miniviews", $parameters));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all API calls](./rest-api)
* [POST collection ](./rest-post-collection-miniviews)
* [GET miniview rules](./rest-get-miniview-rules)
