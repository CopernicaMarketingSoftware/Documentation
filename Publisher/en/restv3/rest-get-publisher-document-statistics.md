# REST API: GET document statistics (Publisher mailing)

You can retrieve the statistics of a Publisher emailing document by sending 
an HTTP GET request to the following URL:

`https://api.copernica.com/v3/publisher/document/$id/statistics?access_token=xxxx`

Where the `$id` should be replaced with the ID of the emailing document.

## Available parameters

* **begintime**: Start date (and time) for the statistics (YYYY-MM-DD HH:MM:SS format).
* **endtime**: End date (and time) for the statistics (YYYY-MM-DD HH:MM:SS format).

## Return value

### Fields

The following fields are available in the JSON object:

* **abuses**: An array with fields 'total' and 'unique' for the total 
number of clicks and number of unique clicks respectively.
* **clicks**: An array with fields 'total' and 'unique' for the total 
number of clicks and number of unique clicks respectively.
* **errors**: An array with fields 'total' and 'unique' for the total 
number of clicks and number of unique clicks respectively.
* **impressions**: An array with fields 'total' and 'unique' for the total 
number of clicks and number of unique clicks respectively.
* **unsubscribes**: An array with fields 'total' and 'unique' for the total 
number of clicks and number of unique clicks respectively.
* **unknown**: An array with the field 'total' for all of the statistics not fitting the categories above.

### Example

The JSON output will look something like this:

```json
{  
   "clicks":{  
      "total":"53",
      "unique":"14"
   },
   "impressions":{  
      "total":"80",
      "unique":"49"
   },
   "errors":{  
      "total":"2412",
      "unique":"2289"
   },
   "unsubscribes":{  
      "total":"0",
      "unique":"0"
   },
   "abuses":{  
      "total":"0",
      "unique":"0"
   },
   "unknown":{  
      "total":"22"
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
print_r($api->get("publisher/document/{$documentID}/statistics/", $data));
```

This example requires the [REST API class](./rest-php).

## More information 

* [Overview of all REST API calls](./rest-api)
* [Retrieve a Publisher document](./rest-get-publisher-document)

