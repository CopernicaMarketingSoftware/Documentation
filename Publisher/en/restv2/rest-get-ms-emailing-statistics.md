# REST API: GET statistics (Marketing Suite mailing)

You can retrieve the statistics of a Marketing Suite mailing by sending an HTTP GET request to the following URL:

`https://api.copernica.com/v2/ms/emailing/$id/statistics?access_token=xxxx`

Where the `$id` should be replaced with the ID of the mailing.

## Available parameters

* **begintime**: Start date (and time) for the statistics (YYYY-MM-DD HH:MM:SS format).
* **endtime**: End date (and time) for the statistics (YYYY-MM-DD HH:MM:SS format).

## Return value

### Fields

The following fields are available in the JSON object:

* **destinations**: The number of destinations for this mailing.
* **abuses**: An array with field 'total' for the total 
number of abuses.
* **clicks**: An array with fields 'total' and 'unique' for the total 
number of clicks and number of unique clicks respectively.
* **errors**: An array with field 'total' for the total 
number of errors.
* **impressions**: An array with fields 'total' and 'unique' for the 
total number impressions and number of unique impressions respectively.
* **retries**: An array with field 'total' for the total 
number of retries.
* **unsubscribes**: An array with field 'total' and 'unique' for the total number of unsubscribes.

### Example

The JSON output will look something like this:

```json
{  
   "destinations":"13801",
   "abuses":{  
      "total":0
   },
   "clicks":{  
      "total":15,
      "unique":11
   },
   "deliveries":{  
      "total":39
   },
   "errors":{  
      "total":0
   },
   "impressions":{  
      "total":24,
      "unique":18
   },
   "retries":{  
      "total":0
   },
   "unsubscribes":{  
      "total":3,
      "unique":2
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

// set the period
$data = array(
    'begintime' => "2019-01-01 00:00:00", 
    'endtime'   => "2019-02-01 00:00:00"
);

// execute the call
print_r($api->get("ms/emailing/{$emailingID}/statistics/", $data));
```

This example requires the [REST API class](./rest-php).

## More information 

* [Overview of all REST API calls](./rest-api)
* [Retrieve a Marketing Suite emailing](./rest-get-ms-emailing)

