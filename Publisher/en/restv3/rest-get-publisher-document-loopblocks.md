# REST API: GET document loopblocks (Publisher)

You can use the REST API to retrieve the loop blocks of an emailing document 
with an HTTP GET call to the following URL:

`https://api.copernica.com/v3/publisher/document/$id/loopblocks?access_token=xxxx`

Where `$id` should be replaced with the ID of the emailing document.

## Returned fields

The method returns a JSON object containing the following information:

* **id**: The ID of the loop block.    
* **parent**: The ID of the parent loop block
* **name**: The name of the loop block.
* **iteration**: Iteration where the loop block is in.
* **condition**: Conditions of the loop block.
* **iterations**: Number of iterations of the loop block.

## JSON example

```json
{
  "data": [
     {
        "id": "1",
        "parent": "",
        "name": "loopblock1",
        "iteration": "0",
        "condition": "",
        "iterations": "1"
    },
    {
        "id": "2",
        "parent": "1",
        "name": "loopblock2",
        "iteration": "1",
        "condition": "",
        "iterations": 0
    }
  ]
}
```

## PHP example

The script below demonstrates how to use this API method. Don't forget 
to replace the ID in the URL before executing the call.

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// execute the call
print_r($api->get("publisher/document/{$documentID}/loopblocks"));
```

This example requires the [REST API class](./rest-php)

## More information

* [Overview of all REST API calls](./rest-api)
