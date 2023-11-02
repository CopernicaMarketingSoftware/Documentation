# REST API: GET statistics (Marketing Suite mailing)

You can retrieve the statistics of a Marketing Suite mailing by sending an HTTP GET request to the following URL:

`https://api.copernica.com/v4/ms/emailing/$id/statistics?access_token=xxxx`

Where the `$id` should be replaced with the ID of the mailing.

## Available parameters

* **begintime**: Start date (and time) for the statistics (YYYY-MM-DD HH:MM:SS format).
* **endtime**: End date (and time) for the statistics (YYYY-MM-DD HH:MM:SS format).

## Return value

### Fields

The following fields are available in the JSON object:

* **destinations**: The number of destinations for this mailing.
* **abuses**: An array with field 'total' and 'unique' for the total 
number of abuses.
* **clicks**: An array with fields 'total' and 'unique' for the total 
number of clicks and number of unique clicks respectively.
* **deliveries**: An array with field 'total' for the total 
number of deliveries.
* **errors**: An array with fields 'total' and 'unique' for the total 
number of errors.
* **impressions**: An array with fields 'total' and 'unique' for the 
total number impressions and number of unique impressions respectively.
* **retries**: An array with field 'total' and 'unique' for the total 
number of retries.
* **unsubscribes**: An array with field 'total' and 'unique' for the total number of unsubscribes.
* **dominant_results**: Array with the [dominant result](./../statistics-dominant-result.md).

### Example

The JSON output will look something like this:

```json
{
    "destinations": 10,
    "deliveries": {
        "total": 10
    },
    "errors": {
        "total": 1,
        "unique": 1
    },
    "impressions": {
        "total": 4,
        "unique": 3
    },
    "clicks": {
        "total": 2,
        "unique": 2
    },
    "unsubscribes": {
        "total": 0,
        "unique": 0
    },
    "abuses": {
        "total": 0,
        "unique": 0
    },
    "unknown": {
        "total": 0
    },
    "dominant_results": {
        "destinations": 10,
        "errors": 1,
        "abuses": 0,
        "unsubscribes": 0,
        "clicks": 2,
        "impressions": 2,
        "deliveries": 0
    }
}
```

## PHP example

This script demonstrates how to use this API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 4);

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

