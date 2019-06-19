# REST API: GET miniview

A method to request all metadata from a selection in a collection 
(miniview). This method does not support parameters. It is called by 
sending an HTTP GET request to the following URL:

`https://api.copernica.com/v2/miniview/$id?access_token=xxxx`

In this, `$id` needs to be replaced by the numerical identifier or the 
name of the collection you wish to request the miniselections for.

## Returned fields

The method returns a JSON object with the following fields: 

* **ID**: Unique numerical identifier
* **name**: Name of the selection
* **description**: Description of the selection
* **parent-type**: Type of the parent: view or collection
* **parent-id**: ID of the database or view
* **collection**: ID of the collection this miniview belongs to
* **last-built**: Timestamp of last build

### JSON example

The JSON for a miniview might look something like this:
 
```
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

The following example demonstrates how to use this method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// do the call, and print result
print_r($api->get("view/{$viewID}"));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all REST API methods](./rest-api)
* [GET miniview rules](./rest-get-miniview-rules)
