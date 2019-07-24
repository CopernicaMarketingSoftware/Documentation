# REST API: GET collection miniviews

What selections are to a database is what miniselections, or miniviews, 
are to a collection. To fetch the miniselections applied to this collection 
the following HTTP GET request can be used:

`https://api.copernica.com/v2/collection/$id/miniviews?access_token=xxxx`

The code `$id` should be replaced by the ID of the collection you want to 
fetch the miniviews of.

## Available parameters

The following parameters can be added to the URL as variables:

* **start**: first miniselection to fetch
* **limit**: length of the batch to fetch
* **total**: boolean value for displaying the total amount of miniselections

More information on the meaning of these parameters can be found in the 
[article on paging](./rest-paging).

## Returned fields

The method returns a JSON object with miniselections in the **data** 
field. For each selection the following information is returned:

* **ID**: Unique numerical identifier
* **name**: Name of the selection
* **description**: Description of the selection
* **parent-type**: Type of the parent: view or collection
* **parent-id**: ID of the database or view
* **collection**: ID of the collection this miniview belongs to
* **last-built**: Timestamp of last build

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
