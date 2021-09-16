# REST API: GET destination/message statistics (Marketing Suite)

You can retrieve the statistics for a Marketing Suite destination by sending an HTTP GET request to the following URL:

`https://api.copernica.com/v3/ms/destination/$id/statistics?access_token=xxxx`

Where the `$id` should be replaced with the ID of the destination.

Note: The terms 'destination' and 'message' can be used interchangeably 
in this article, including the code examples.

## Parameters

Using the parameters for this method you can select a certain period 
to retrieve statistics for. The following parameters are available:

* **begintime**: The starting date for the statistics (YYYY-MM-DD HH:MM:SS format).
* **endtime**: The end date for the statistics (YYYY-MM-DD HH:MM:SS format).

## Returned fields

The following fields are available in the JSON object:

* **ID**: ID of the destination statistics report.
* **abuses**: An array with field 'total' for the total 
number of abuses.
* **clicks**: An array with fields 'total' and 'unique' for the total 
number of clicks and number of unique clicks respectively.
* **deliveries**: An array with field 'total' for the total 
number of deliveries.
* **errors**: An array with field 'total' for the total 
number of errors.
* **impressions**: An array with fields 'total' and 'unique' for the 
total number impressions and number of unique impressions respectively.
* **retries**: An array with field 'total' for the total 
number of retries.

### Example

The JSON output will look something like this:

```json
{  
   "ID":"735929",
   "abuses":{  
      "total":0
   },
   "clicks":{  
      "total":3,
      "unique":2
   },
   "deliveries":{  
      "total":0
   },
   "errors":{  
      "total":1
   },
   "impressions":{  
      "total":4
   },
   "retries":{  
      "total":0
   }
}
```

## PHP example

This script demonstrates how to use this API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// set the period using the parameters
$data = array(
    'begintime'     =>  '2020-01-01 00:00:00',
    'endtime'       =>  '2020-02-01 00:00:00'
);

// execute the call
print_r($api->get("ms/destination/{$destinationID}/statistics/", $data));
```

This example requires the [REST API class](./rest-php).

## More information 

* [Overview of all REST API calls](./rest-api)
* [Retrieve a destination/message](./rest-get-ms-destination)

