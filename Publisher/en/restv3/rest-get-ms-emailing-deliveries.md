# REST API: GET emailing deliveries (Marketing Suite)

Each emailing is tracked, which allows Copernica to provide you with 
emailing statistics. Deliveries are one of these statistics. You can 
retrieve all deliveries for a specific emailing by sending an HTTP GET call to the following URL:

`https://api.copernica.com/v3/ms/emailing/{$emailingID}/deliveries?access_token=xxxx`

## Parameters

The parameters for this method can be set to retrieve the statistics from 
a certain period. The following optional parameters are available:

* **begintime**: The timestamp after which the deliveries must have occurred (YYYY-MM-DD HH:MM:SS format).
* **endtime**: The timestamp before which the deliveries must have occurred (YYYY-MM-DD HH:MM:SS format).

## Returned fields

The method returns a JSON object with several deliveries. For each delivery 
the following information is available:

* **ID**: The ID of the delivery.         
* **mailing**: The ID of the mailing.
* **timestamp**: The timestamp of delivery.
* **attempts**: Number of attempts made before the delivery.
* **destination**: The ID of the destination that was delivered to.
* **profile**: The ID of the profile that was delivered to.
* **subprofile**: The ID of the subprofile that was delivered to.

### JSON example

A single delivery might look something like this:

```json
{  
   "ID":"1",
   "mailing":"33",
   "timestamp":"2014-11-06 13:43:17",
   "attempts":1,
   "destination":"312",
   "profile":null,
   "subprofile":null
}
```

## PHP example

This script demonstrates how to use this API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// execute the call
print_r($api->get("ms/emailing/{$emailingID}/deliveries"));
```

This example requires the [REST API class](./rest-php).

## More information

* [Overview of all REST API calls](./rest-api)
* [Get all deliveries](./rest-get-ms-deliveries)
* [Get emailing abuses](./rest-get-ms-emailing-abuses)
* [Get emailing clicks](./rest-get-ms-emailing-clicks)
* [Get emailing errors](./rest-get-ms-emailing-errors)
* [Get emailing impressions](./rest-get-ms-emailing-impressions)
* [Get emailing unsubscribes](./rest-get-ms-emailing-unsubscribes)
