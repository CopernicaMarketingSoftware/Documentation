# REST API: GET unsubscribes (Marketing Suite)

Each emailing is tracked, which allows Copernica to provide you with 
emailing statistics. Unsubscribe clicks are one of these statistics and 
represent a click on an unsubscribe link in your emailing. You can 
retrieve all unsubscribes by sending an HTTP GET call to the following URL:

`https://api.copernica.com/v2/ms/unsubscribes?access_token=xxxx`

## Parameters

The parameters for this method can be set to retrieve the statistics from 
a certain period. The following optional parameters are available:

* **begintime**: The timestamp after which the abuses must have occurred (YYYY-MM-DD HH:MM:SS format).
* **endtime**: The timestamp before which the abuses must have occurred (YYYY-MM-DD HH:MM:SS format).

## Returned fields

The method returns a JSON object with several unsubscribe clicks. For each unsubscribe 
the following information is available:

* **ID**: The ID of the unsubscribe click.  
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
print_r($api->get("ms/unsubscribes", $data));
```

This example requires the [REST API class](./rest-php).

## More information

* [Overview of all REST API calls](./rest-api)
* [Get all abuses](./rest-get-ms-abuses)
* [Get all clicks](./rest-get-ms-clicks)
* [Get all deliveries](./rest-get-ms-deliveries)
* [Get all errors](./rest-get-ms-errors)
* [Get all impressions](./rest-get-ms-impressions)
