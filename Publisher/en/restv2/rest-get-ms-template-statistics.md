# REST API: GET statistics (Marketing Suite template)

You can retrieve the statistics of a Marketing Suite template by sending an HTTP GET request to the following URL:

`https://api.copernica.com/v2/ms/template/$id/statistics?access_token=xxxx`

Where the `$id` should be replaced with the ID of the template.

## Available parameters

* **begintime**: Start date (and time) for the statistics.
* **endtime**: End date (and time) for the statistics.

## Returned fields

The **data** field of returned JSON object contains the statistics. 
The following fields are available:

* **destinations**: The number of destinations for this template.
* **abuses**: The number of abuses for this template.
* **clicks**: An array with fields 'total' and 'unique' for the total 
number of clicks and number of unique clicks respectively.
* **errors**: The number of errors for this template.
* **impressions**: An array with fields 'total' and 'unique' for the 
total number impressions and number of unique impressions respectively.
* **retries**: The number of retries for this template.

## PHP example

This script demonstrates how to use this API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// execute the call
print_r($api->get("ms/template/{$templateID}/statistics/"));
```

This example requires the [REST API class](./rest-php).

## More information 

* [Overview of all REST API calls](./rest-api)
* [Retrieve a Marketing Suite template](./rest-get-ms-template)

