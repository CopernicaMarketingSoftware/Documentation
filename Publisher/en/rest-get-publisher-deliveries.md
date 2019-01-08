# REST API: GET deliveries (Publisher)

Each emailing is tracked, which allows Copernica to provide you with 
emailing statistics. Deliveries are one of these statistics. You can 
retrieve all deliveries by sending an HTTP GET call to the following URL:

`https://api.copernica.com/v2/deliveries?access_token=xxxx`

This method also support the use of the [fields parameter](./rest-fields-parameter) 
for the **timestamp** field.

## Returned fields

The method returns a JSON object with several deliveries. For each delivery 
the following information is available:

* **ID**: The ID of the delivery.     
* **timestamp**: The timestamp of delivery.
* **attempt**: The attempt of the delivery.
* **smtp-response**: The description of the delivery returned by the SMTP server.
* **emailing**: The ID of the mailing that was delivered.
* **destination**: The ID of the destination.
* **profile**: The ID of the profile that was delivered to.
* **subprofile**: The ID of the subprofile that was delivered to (if applicable).

## PHP example

This script demonstrates how to use this API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// execute the call
print_r($api->get("publisher/deliveries/"));
```

This example requires the [REST API class](./rest-php).

## More information

* [Overview of all REST API calls](./rest-api)
* [Get abuses for Publisher](./rest-get-publisher-abuses)
* [Get clicks for Publisher](./rest-get-publisher-clicks)
* [Get errors for Publisher](./rest-get-publisher-errors)
* [Get impressions for Publisher](./rest-get-publisher-impressions)
* [Get unsubscribes for Publisher](./rest-get-publisher-unsubscribes)

