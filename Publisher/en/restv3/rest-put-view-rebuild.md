# REST API: PUT view rebuild

The HTTP PUT call to rebuild a selection can be found at 
the following address:

`https://api.copernica.com/v3/view/$id/rebuild?access_token=xxxx`

The `$id` in the URL should be replaced by the unique identifier of the 
view.

## PHP example

The following example demonstrates how to use this method.

```php
// dependencies
require_once('copernica_rest_api.php');

// change this to your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// voer het verzoek uit
$api->post("view/{$viewID}/rebuild", $data);
```

This method requires the [CopernicaRestAPI class](./rest-php).

## More information

* [Overview of all REST API calls](./rest-api)
