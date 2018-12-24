# REST API: POST view views (nested selections)

Copernica supports nested selections. To add a nested selection you can 
send a HTTP POST request to the following URL:

`https://api.copernica.com/v2/view/$id/views?access_token=xxxx`

The `$id` needs to be replaced by the numerical identifier of the 
selection. After a successful call the ID of the created request is returned.

## Available parameters

The following parameters can be added to the message body. Note that because this is a nested view it has the exact same properties as a regular view.

- **name**: Name of the selection
- **description**: Description of the selection
- **parent-type**: Type of the parent; does the selection belong to another selection or a database?
- **parent-id**: ID of the parent
- **has-children**: Boolean value that indicates whether or not there are selections below this
- **has-referred**: Boolean value to indicate whether any other selections refer to this selection
- **has-rules**: Indicates whether the selection has rules or not

## PHP example

The following PHP example demonstrates how to use the method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestApi("your-access-token");

// parameters to pass to the call
$data = array(
    'description'     =>  'new description'
);

// do the call
$api->post("view/{$viewID}/views", array(), $data);

// return id of created request if successful
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all API methods](rest-api)
* [GET view views](./rest-get-view-views)
