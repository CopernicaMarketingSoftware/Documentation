# REST API: GET destination/message unsubscribes (Marketing Suite)

Each emailing is tracked, which allows Copernica to provide you with 
emailing statistics. Unsubscribe clicks are one of these statistics and 
represent a click on an unsubscribe link in your emailing. You can 
retrieve all unsubscribes for a specific destination by sending an HTTP GET call to the following URL:

`https://api.copernica.com/v2/ms/destination/{$destinationID}/unsubscribes?access_token=xxxx`

This method also support the use of the [fields parameter](./rest-fields-parameter) 
for the **timestamp** field.

Note: The terms 'destination' and 'message' can be used interchangeably 
in this article, including the code examples.

## Parameters

There is one parameter available for this method. The 'unique' parameter 
indicates whether only unique unsubscribes should be retrieved or not. By default 
all unsubscribes will be returned.

## Returned fields

The method returns a JSON object with several unsubscribe clicks. For each unsubscribe 
the following information is available:

* **ID**: The ID of the unsubcribe click.  
* **mailing**: The ID of the mailing.
* **timestamp**: Timestamp of the unsubscribe.
* **ip**: The IP where the unsubscribe occurred from.
* **user-agent**: User agent string of the machine used to unsubscribe.
* **destination**: The ID of the destination that unsubscribed.
* **profile**: The ID of the profile that unsubscribed.
* **subprofile**: The ID of the subprofile that unsubscribed.

## PHP example

This script demonstrates how to use this API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// retrieve only unique unsubscribes
$data = array(
    'unique'    =>  true
);

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// execute the call
print_r($api->get("ms/destination/{$destinationID}/unsubscribes", $data));
```

This example requires the [REST API class](./rest-php).

## More information

* [Overview of all REST API calls](./rest-api)
* [Get all unsubscribes](./rest-get-ms-unsubscribes)
* [Get destination/message clicks](./rest-get-ms-destination-clicks)
* [Get destination/message abuses](./rest-get-ms-destination-abuses)
* [Get destination/message deliveries](./rest-get-ms-destination-deliveries)
* [Get destination/message errors](./rest-get-ms-destination-errors)
* [Get destination/message impressions](./rest-get-ms-destination-impressions)
