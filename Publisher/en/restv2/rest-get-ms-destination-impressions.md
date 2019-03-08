# REST API: GET destination impressions (Marketing Suite)

Each emailing is tracked, which allows Copernica to provide you with 
emailing statistics. Impressions are one of these statistics. You can 
retrieve all impressions for a specific destination by sending an HTTP GET call to the following URL:

`https://api.copernica.com/v2/ms/destination/{$destinationID}/impressions?access_token=xxxx`

This method also support the use of the [fields parameter](./rest-fields-parameter) 
for the **timestamp** field.

## Returned fields

The method returns a JSON object with several impressions. For each impression 
the following information is available:

* **ID**: The ID of the impression.         
* **mailing**: The ID of the mailing.
* **timestamp**: The timestamp of the impression. 
* **ip**: The IP where the impression occurred from.
* **user-agent**: User agent string of the machine the impression occurred from.
* **destination**: The ID of the destination that caused an impression.
* **profile**: The ID of the profile that caused an impression.
* **subprofile**: The ID of the subprofile that caused an impression.

## PHP example

This script demonstrates how to use this API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// execute the call
print_r($api->get("ms/destination/{$destinationID}/impressions"));
```

This example requires the [REST API class](./rest-php).

## More information

* [Overview of all REST API calls](./rest-api)
* [Get all impressions](./rest-get-ms-impressions)
* [Get destination abuses](./rest-get-ms-destination-abuses)
* [Get destination clicks](./rest-get-ms-destination-clicks)
* [Get destination deliveries](./rest-get-ms-destination-deliveries)
* [Get destination errors](./rest-get-ms-destination-errors)
