# REST API: GET destination/message clicks (Marketing Suite)

Each emailing is tracked, which allows Copernica to provide you with 
emailing statistics. Clicks are one of these statistics. You can 
retrieve all clicks for a specific destination by sending an HTTP GET call to the following URL:

`https://api.copernica.com/v2/ms/destination/{$destinationID}/clicks?access_token=xxxx`

This method also support the use of the [fields parameter](./rest-fields-parameter) 
for the **timestamp** field.

Note: The terms 'destination' and 'message' can be used interchangeably 
in this article, including the code examples.

## Returned fields

The method returns a JSON object with several clicks under the 'data' property. 
For each click the following fields is available:

* **ID**: The ID of the click.  
* **mailing**: The ID of the mailing.
* **link**: The link that was clicked.
* **timestamp**: Timestamp of the click.
* **ip**: The IP where the click occurred from.
* **useragent**: User agent string of the machine used to click.
* **destination**: The ID of the destination that clicked the link.
* **profile**: The ID of the profile that clicked the link.
* **subprofile**: The ID of the subprofile that clicked the link.

### JSON example

A single click might look something like this:

```json
{  
   "ID":"1",
   "mailing":"2",
   "link":"http:\/\/www.myshop.nl\/promotions\/customer\/{$profile.customerid}",
   "timestamp":"2014-10-14 11:33:22",
   "ip":"2a03:e280:0:1::1",
   "useragent":"Mozilla\/5.0 (Ubuntu; X11; Linux x86_64; rv:8.0) Gecko\/20100101 Firefox\/8.0",
   "destination":"1",
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
print_r($api->get("ms/destination/{$destinationID}/clicks"));
```

This example requires the [REST API class](./rest-php).

## More information

* [Overview of all REST API calls](./rest-api)
* [Get all clicks](./rest-get-ms-clicks)
* [Get destination/message abuses](./rest-get-ms-destination-abuses)
* [Get destination/message deliveries](./rest-get-ms-destination-deliveries)
* [Get destination/message errors](./rest-get-ms-destination-errors)
* [Get destination/message impressions](./rest-get-ms-destination-impressions)
* [Get destination/message unsubscribes](./rest-get-ms-destination-unsubscribes)
