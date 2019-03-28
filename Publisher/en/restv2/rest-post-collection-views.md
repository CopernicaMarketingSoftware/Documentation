# REST API: POST collection views

Copernica also supports selections for collections. To add a selection 
to your collection you can send an HTTP POST request to the following URL:

`https://api.copernica.com/v2/collection/$id/views?access_token=xxxx`

The `$id` needs to be replaced by the numerical identifier of the 
collection. After a successful call the ID of the created request is returned.

## Available parameters

The call requires the **name** parameter to create a selection with this name.

- **name**: Name of the selection

## PHP example

The following PHP example demonstrates how to use the method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// parameters to pass to the call
$data = array(
    'name'     =>  'New selection'
);

// do the call
$api->post("collection/{$collectionID}/views", array(), $data);

// return id of created request if successful
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all API methods](rest-api)
