# REST API: GET clicks (Marketing Suite)

Each emailing is tracked, which allows Copernica to provide you with 
emailing statistics. Clicks are one of these statistics. You can 
retrieve all clicks for an account by sending an HTTP GET call to the following URL:

`https://api.copernica.com/v2/ms/clicks?access_token=xxxx`

# Parameters

The parameters for this method can be set to retrieve the statistics from 
a certain period and to only receive unique clicks. The latter means 
that only one click per destination per link will be counted. 
The following optional parameters are available:

* **begintime**: The timestamp after which the clicks must have occurred (YYYY-MM-DD HH:MM:SS format).
* **endtime**: The timestamp before which the clicks must have occurred (YYYY-MM-DD HH:MM:SS format).
* **unique**: Boolean parameter that when set to true only retrieves unique clicks. By default all 
clicks are returned.

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

// retrieve only unique clicks
$data = array(
    'unique'    =>  true
);

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// execute the call
print_r($api->get("ms/clicks", $data));
```

This example requires the [REST API class](./rest-php).

## More information

* [Overview of all REST API calls](./rest-api)
* [Get all abuses](./rest-get-ms-abuses)
* [Get all deliveries](./rest-get-ms-deliveries)
* [Get all errors](./rest-get-ms-errors)
* [Get all impressions](./rest-get-ms-impressions)
* [Get all unsubscribes](./rest-get-ms-unsubscribes)
