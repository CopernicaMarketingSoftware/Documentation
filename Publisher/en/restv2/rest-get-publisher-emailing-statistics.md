# REST API: GET statistics (Publisher mailing)

You can retrieve the statistics of a Publisher mailing by sending an HTTP GET request to the following URL:

`https://api.copernica.com/v2/publisher/emailing/$id/statistics?access_token=xxxx`

Where the `$id` should be replaced with the ID of the mailing.

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
Array
(
    [abuses] => Array
        (
            [total] => 0
            [unique] => 0
        )

    [clicks] => Array
        (
            [total] => 2
            [unique] => 1
        )

    [errors] => Array
        (
            [total] => 0
            [unique] => 0
        )

    [impressions] => Array
        (
            [total] => 4
            [unique] => 4
        )

    [unsubscribes] => Array
        (
            [total] => 1
            [unique] => 1
        )

    [unknown] => Array
        (
            [total] => 0
        )


)
```

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

