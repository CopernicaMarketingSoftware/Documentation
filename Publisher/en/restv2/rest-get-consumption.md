# REST API: GET account consumption
This method can be used if you want to retrieve the account-wide consumption
statistics. These consist of counters of various services, such as the number 
of emails or api calls sent. By sending a GET request to the following URL,
you can fetch the account-wide consumption statistics:
`https://api.copernica.com/v2/consumption?access_token=xxxx`

## Parameters
The following parameters are **required**:
* **begin**: The timestamp indicating the start of the period for which statistics should be retrieved (YYYY-MM-DD format).
* **end**: The timestamp indicating the end of the period for which statistics should be retrieved (YYYY-MM-DD format).

## Response data
This method returns a JSON object containing the following fields:
* **emails**: the number of emails sent
* **texts**: the number of text messages sent
* **fax**: the number of fax messages sent
* **webpages**: the number of webpages
* **apicalls**: the number of api calls
* **litmustests**: the number of Litmus tests
* **twofiftyoktests**: the number of twoFiftyOk tests

## PHP example
The following PHP script calls this API method:
```php
// dependencies
require_once('copernica_rest_api.php');
// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);
// set the required parameters
$parameters = array(
    'begin'  => "2020-06-01",
    'end'    => "2020-07-01"
);
// do the call, and print result
print_r($api->get("consumption", $parameters));
```
The example above requires the [CopernicaRestApi class](rest-php).

## More information
* [Overview of all API calls](./rest-api.md)
