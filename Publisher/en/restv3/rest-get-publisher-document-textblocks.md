# REST API: GET document textblocks (Publisher)

You can use the REST API to retrieve the text blocks of an emailing document 
with an HTTP GET call to the following URL:

`https://api.copernica.com/v3/publisher/document/$id/textblocks?access_token=xxxx`

Where `$id` should be replaced with the ID of the emailing document.

## Returned fields

The method returns a JSON object containing the following information:

* **id**: The ID of the text block.    
* **parent**: The ID of the parent text block
* **name**: The name of the text block.
* **iteration**: Iteration where the text block is in.
* **condition**: Conditions of the text block.
* **content**: Content of the text block.

## JSON example

```json
{
    "id": "1",
    "parent": "",
    "name": "textlock",
    "iteration": "0",
    "condition": "",
    "content": "This is a test"
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
print_r($api->get("publisher/document/{$documentID}/textblocks"));
```

This example requires the [REST API class](./rest-php)

## More information

* [Overview of all REST API calls](./rest-api)
