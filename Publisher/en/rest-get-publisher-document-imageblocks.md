# REST API: GET document imageblocks (Publisher)

You can use the REST API to retrieve the image blocks of an emailing document 
with an HTTP GET call to the following URL:

`https://api.copernica.com/v3/publisher/document/$id/imageblocks?access_token=xxxx`

Where `$id` should be replaced with the ID of the emailing document.

## Returned fields

The method returns a JSON object containing the following information:

* **id**: The ID of the image block.    
* **parent**: The ID of the parent image block
* **name**: The name of the image block.
* **iteration**: Iteration where the image block is in.
* **condition**: Conditions of the image block.

## JSON example

```json
{
    "id": "1",
    "parent": "",
    "name": "imageblock",
    "iteration": "0",
    "condition": "",
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
print_r($api->get("publisher/document/{$documentID}/imageblocks"));
```

This example requires the [REST API class](./rest-php)

## More information

* [Overview of all REST API calls](./rest-api)
