# REST API: GET statistics (Publisher mailing)

You can retrieve the statistics of a Publisher mailing by sending an HTTP GET request to the following URL:

`https://api.copernica.com/v2/publisher/emailing/$id/statistics?access_token=xxxx`

Where the `$id` should be replaced with the ID of the mailing.

## Available parameters

* **begintime**: Start date (and time) for the statistics.
* **endtime**: End date (and time) for the statistics.

## Returned fields

The **data** field of returned JSON object contains the statistics. 
The following fields are available:

* **abuses**: The abuses that this mailing received.
* **clicks**: The clicks that this mailing received.
* **errors**: The errors that this mailing received.
* **impressions**: The impressions that this mailing received.
* **unsubscribes**: The unsubscribes that this mailing received.
* **unknown**: The statistics not fitting the categories above.

## PHP example

This script demonstrates how to use this API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// execute the call
print_r($api->get("publisher/emailing/{$emailingID}/statistics/"));
```

This example requires the [REST API class](./rest-php).

## More information 

* [Overview of all REST API calls](./rest-api)
* [Retrieve a Publisher emailing](./rest-get-publisher-emailing)

