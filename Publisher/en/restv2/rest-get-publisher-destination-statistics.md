# REST API: GET statistics (Publisher destination)

You can retrieve the statistics for a Publisher destination by sending an HTTP GET request to the following URL:

`https://api.copernica.com/v2/publisher/destination/$id/statistics?access_token=xxxx`

Where the `$id` should be replaced with the ID of the destination.

## Returned fields

The **data** field of returned JSON object contains the statistics. 
The following fields are available:

* **abuses**: The abuses that this mailing received.
* **clicks**: The clicks that this mailing received.
* **deliveries**: The deliveries to this destination.
* **errors**: The errors that this mailing received.
* **impressions**: The impressions that this mailing received.
* **unsubscribes**: The unsubscribes that this mailing received.

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

