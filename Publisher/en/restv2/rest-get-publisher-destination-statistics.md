# REST API: GET statistics (Publisher destination)

You can retrieve the statistics for a Publisher destination by sending an HTTP GET request to the following URL:

`https://api.copernica.com/v2/publisher/destination/$id/statistics?access_token=xxxx`

Where the `$id` should be replaced with the ID of the destination.

## Return value

### Fields

The JSON object contains the following fields:

* **abuses**: An array with a 'total' field for the abuses that this mailing received.
* **clicks**: An array with a 'total' field for the clicks that this mailing received.
* **deliveries**: An array with a 'total' field for the deliveries to this destination.
* **errors**: An array with a 'total' field for the errors that this mailing received.
* **impressions**: An array with a 'total' field for the impressions that this mailing received.
* **unsubscribes**: An array with a 'total' field for the unsubscribes that this mailing received.

### Example

The JSON output will look something like this:

```json
Array
(
    [abuses] => Array
        (
            [total] => 0
        )
        
    [clicks] => Array
        (
            [total] => 3
        )
        
    [deliveries] => Array
        (
            [total] => 1
        )
        
    [errors] => Array
        (
            [total] => 0
        )
        
    [impressions] => Array
        (
            [total] => 0
        )
        
    [unsubscribes] => Array
        (
            [total] => 0
        )

)
```

## PHP example

This script demonstrates how to use this API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// execute the call
print_r($api->get("publisher/destination/{$destinationID}/statistics/"));
```

This example requires the [REST API class](./rest-php).

## More information 

* [Overview of all REST API calls](./rest-api)
* [Retrieve a Publisher destination](./rest-get-publisher-destination)

