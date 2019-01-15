# REST API: GET deliveries (Publisher mailing)

Each emailing is tracked, which allows Copernica to provide you with 
emailing statistics. Deliveries are one of these statistics. You can 
retrieve the deliveries for an emailing by sending an HTTP GET call to the following URL:

`https://api.copernica.com/v2/emailing/$id/deliveries?access_token=xxxx`

Where the `$id` should be replaced with the ID of the emailing. This method 
also support the use of the [fields parameter](./rest-fields-parameter) 
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
print_r($api->get("publisher/emailing/{$emailingID}/deliveries/"));
```

This example requires the [REST API class](./rest-php).

## More information

* [Overview of all REST API calls](./rest-api)
* [Retrieve a Publisher emailing](./rest-get-publisher-emailing)
* [Get abuses for a Publisher emailing](./rest-get-publisher-emailing-abuses)
* [Get clicks for a Publisher emailing](./rest-get-publisher-emailing-clicks)
* [Get errors for a Publisher emailing](./rest-get-publisher-emailing-errors)
* [Get impressions for a Publisher emailing](./rest-get-publisher-emailing-impressions)
* [Get unsubscribes for a Publisher emailing](./rest-get-publisher-emailing-unsubscribes)

