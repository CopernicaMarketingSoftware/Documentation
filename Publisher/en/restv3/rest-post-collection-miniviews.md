# REST API: POST collection miniviews

In order to create a new selection using the REST API, you need to send 
an HTTP POST request to the following URL. The selection will then be 
created, nested underneath the collection.

`https://api.copernica.com/v3/collection/$id/miniviews?access_token=xxxx`

In this, `$id` should be replaced by the numerical identifier, the ID, of 
the collection you want to add a selection to. The name of the selection 
is not in the URL, as it needs to be added to the message body of the 
HTTP request. After a successful call the ID of the created request is returned.

## Available parameters

The following variables can be added to the body of the HTTP POST call:

- **name**: The name of the selection that is to be created. (mandatory)
- **description**: Description of the newly created selection 

## JSON example

The following JSON demonstrates how to use the API method:

```json
{
  "name": "my_miniselection",
  "description": "This is a miniselection"
}
```


## PHP example

The following PHP example demonstrates how to use the API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// data to pass to the call
$data = array(
    'name'          =>  'my-selection',
    'description'   =>  'description of the selection',
);

// do the call
$api->post("collection/{$collectionID}/miniviews", $data);
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

- [Overview of all API calls](rest-api)
- [GET collection miniviews](rest-get-collection-miniviews)
- [GET miniview rules](rest-get-miniview-rules)
- [POST miniview rules](rest-post-miniview-rules)
