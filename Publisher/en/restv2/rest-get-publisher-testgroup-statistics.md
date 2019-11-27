# REST API: GET testgroup statistics (Publisher)

You can retrieve the statistics for a test group from a Publisher mailing by sending an 
HTTP GET request to the following URL:

`https://api.copernica.com/v2/publisher/testgroup/$id/statistics?access_token=xxxx`

Where the `$id` should be replaced with the ID of the testgroup.

## Available parameters

* **begintime**: Start date (and time) for the statistics (YYYY-MM-DD HH:MM:SS format).
* **endtime**: End date (and time) for the statistics (YYYY-MM-DD HH:MM:SS format).

## Returned fields

The return value is a JSON object containing the following fields:

* **abuses**: An array containing the 'total' and 'unique' number of abuses.
* **clicks**: An array containing the 'total' and 'unique' number of clicks.
* **errors**: An array containing the 'total' and 'unique' number of errors.
* **impressions**: An array containing the 'total' and 'unique' number of impressions.
* **unknown**: An array containing the 'total' of other statistics.
* **unsubscribes**: An array containing the 'total' and 'unique' number of unsubscribes.

### JSON example

The JSON for the statistics might look something like this:

```json
{  
   "clicks":{  
      "total":"3",
      "unique":"2"
   },
   "impressions":{  
      "total":"5",
      "unique":"5"
   },
   "errors":{  
      "total":"0",
      "unique":"0"
   },
   "unsubscribes":{  
      "total":"1",
      "unique":"1"
   },
   "abuses":{  
      "total":"0",
      "unique":"0"
   },
   "unknown":{  
      "total":"1"
   }
}
```

## PHP example

The following script demonstrates how to use this API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// execute the call
print_r($api->get("publisher/testgroup/{$testgroupID}/statistics"));
```

This example requires the [REST API class](./rest-php).

## More information 

* [Overview of all REST API calls](./rest-api)
* [GET testgroup](./rest-get-publisher-testgroups)
* [GET emailing testgroups](./rest-get-publisher-emailing-testgroups)

