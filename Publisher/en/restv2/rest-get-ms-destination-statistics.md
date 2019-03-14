# REST API: GET statistics (Marketing Suite destination)

You can retrieve the statistics for a Marketing Suite destination by sending an HTTP GET request to the following URL:

`https://api.copernica.com/v2/ms/destination/$id/statistics?access_token=xxxx`

Where the `$id` should be replaced with the ID of the destination.

## Returned fields

The **data** field of returned JSON object contains the statistics. 
The following fields are available:

* **abuses**: The number of abuses for this destination.
* **clicks**: An array with fields 'total' and 'unique' for the total 
number of clicks and number of unique clicks respectively.
* **deliveries**: The amount of deliveries for this destination.
* **errors**: The number of errors for this destination.
* **impressions**: An array with fields 'total' and 'unique' for the 
total number impressions and number of unique impressions respectively.
* **retries**: The number of retries for this destination.
* **unsubscribes**: The number of unsubscribes for this mailing.

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

