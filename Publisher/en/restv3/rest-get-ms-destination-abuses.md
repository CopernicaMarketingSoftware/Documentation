# REST API: GET destination/message abuses (Marketing Suite)

Each emailing is tracked, which allows Copernica to provide you with 
emailing statistics. Abuses are one of these statistics. You can 
retrieve all abuses for a specific destination by sending an HTTP GET call to the following URL:

`https://api.copernica.com/v3/ms/destination/{$destinationID}/abuses?access_token=xxxx`

Note: The terms 'destination' and 'message' can be used interchangeably 
in this article, including the code examples.

# Parameters

The parameters for this method can be set to retrieve the statistics from 
a certain period. The following optional parameters are available:

* **begintime**: The timestamp after which the abuses must have occurred (YYYY-MM-DD HH:MM:SS format).
* **endtime**: The timestamp before which the abuses must have occurred (YYYY-MM-DD HH:MM:SS format).

## Returned fields

The method returns a JSON object with several abuses under the 'data' property. 
For each abuse the following information is available:

* **ID**: The ID of the abuse.
* **mailing**: The ID of the mailing.
* **timestamp**: Timestamp of the abuse.
* **report**: The abuse report.
* **destination**: The ID of the destination that reported the abuse.
* **profile**: The ID of the profile that reported the abuse.
* **subprofile**: The ID of the subprofile that reported the abuse.

### JSON example

A single abuse might look something like this:

```json
{  
   "ID":"12",
   "mailing":"233482",
   "timestamp":"2019-03-05 14:44:52",
   "report":{  

   },
   "destination":"1264524",
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
$api = new CopernicaRestAPI("your-access-token", 3);

// execute the call
print_r($api->get("ms/destination/{$destinationID}/abuses"));
```

This example requires the [REST API class](./rest-php).

## More information

* [Overview of all REST API calls](./rest-api)
* [Get all abuses](./rest-get-ms-abuses)
* [Get destination/message clicks](./rest-get-ms-destination-clicks)
* [Get destination/message deliveries](./rest-get-ms-destination-deliveries)
* [Get destination/message errors](./rest-get-ms-destination-errors)
* [Get destination/message impressions](./rest-get-ms-destination-impressions)
* [Get destination/message unsubscribes](./rest-get-ms-destination-unsubscribes)
