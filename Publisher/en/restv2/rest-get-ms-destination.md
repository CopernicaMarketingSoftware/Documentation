# REST API: GET destination (Marketing Suite)

You can use the REST API to retrieve a summary of a destination with an HTTP 
GET call to the following URL:

`https://api.copernica.com/v2/ms/destination/$id?access_token=xxxx`

Where `$id` should be replaced with the ID of the destination you want summarized.

## Returned fields

The method returns a JSON object containing the following information:

* **ID**: Unique ID of the destination.           
* **timestampsent**: Timestamp of sending to the destination.
* **profile**: Profile ID of the destination.
* **subprofile**: Subprofile ID of the destination.
* **mailing**: ID of the mailing this destination received.

## PHP example

The script below demonstrates how to use this API method. Don't forget 
to replace the ID in the URL before executing the call.

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// execute the call
print_r($api->get("ms/destination/{$destinationID}", $parameters));
```

This example requires the [REST API class](./rest-php)

## More information

* [Overview of all REST API calls](./rest-api)
