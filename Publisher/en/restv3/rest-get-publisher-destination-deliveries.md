# REST API: GET deliveries (Publisher destination)

You can retrieve the statistics per emailing destination just like you 
would retrieve the statistics of a mailing. You can 
retrieve the deliveries for an emailing destination by sending an HTTP GET call to the following URL:

`https://api.copernica.com/v3/publisher/destination/$id/deliveries?access_token=xxxx`

Where the `$id` should be replaced with the ID of the emailing destination. This method 
also support the use of the [fields parameter](./rest-fields-parameter) 
for the **timestamp** field.

## Returned fields

The method returns a JSON object with several deliveries under the 'data' property. 
For each delivery the following information is available:

* **ID**: The ID of the delivery.     
* **timestamp**: The timestamp of delivery.
* **attempt**: The attempt of the delivery.
* **smtp-response**: The description of the delivery returned by the SMTP server.
* **emailing**: The ID of the mailing that was delivered.
* **destination**: The ID of the destination.
* **profile**: The ID of the profile that was delivered to.
* **subprofile**: The ID of the subprofile that was delivered to (if applicable).

### JSON example

The JSON for a single delivery looks somewhat like this:

```json
{  
   "ID":"1",
   "timestamp":"2010-01-04 12:17:51",
   "attempt":"0",
   "smtp-response":"test",
   "emailing":"671",
   "destination":"57092",
   "profile":"2384041",
   "subprofile":null
}
```

## PHP example

This script demonstrates how to use this API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// set the period
$parameters = array(
    'fields'    =>  array('timestamp>2019-01-01', 'timestamp<2019-02-01')
);

// execute the call
print_r($api->get("publisher/destination/{$destinationID}/deliveries/", $parameters));
```

This example requires the [REST API class](./rest-php).

## More information

* [Overview of all REST API calls](./rest-api)
* [Retrieve a Publisher destination](./rest-get-publisher-destination)
* [Get abuses for a Publisher destination](./rest-get-publisher-destination-abuses)
* [Get clicks for a Publisher destination](./rest-get-publisher-destination-clicks)
* [Get errors for a Publisher destination](./rest-get-publisher-destination-errors)
* [Get impressions for a Publisher destination](./rest-get-publisher-destination-impressions)
* [Get unsubscribes for a Publisher destination](./rest-get-publisher-destination-unsubscribes)

