# REST API: GET statistics (Marketing Suite destination)

You can retrieve the statistics for a Marketing Suite destination by sending an HTTP GET request to the following URL:

`https://api.copernica.com/v2/ms/destination/$id/statistics?access_token=xxxx`

Where the `$id` should be replaced with the ID of the destination.

## Return value

### Fields

The following fields are available in the JSON object:

* **abuses**: An array with field 'total' for the total 
number of abuses.
* **clicks**: An array with fields 'total' and 'unique' for the total 
number of clicks and number of unique clicks respectively.
* **deliveries**: An array with field 'total' for the total 
number of deliveries.
* **errors**: An array with field 'total' for the total 
number of errors.
* **impressions**: An array with fields 'total' and 'unique' for the 
total number impressions and number of unique impressions respectively.
* **retries**: An array with field 'total' for the total 
number of retries.

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
            [unique] => 1
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
        
    [retries] => Array
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
print_r($api->get("ms/destination/{$destinationID}/statistics/"));
```

This example requires the [REST API class](./rest-php).

## More information 

* [Overview of all REST API calls](./rest-api)
* [Retrieve a Marketing Suite destination](./rest-get-ms-destination)

