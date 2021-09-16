# REST API: GET destinations (Marketing Suite)
This method can be used if you want to retrieve the destinations of Marketing Suite mailings for a specific period. By sending a GET request to the following URL,
you can fetch the destinations:
`https://api.copernica.com/v3/ms/destinations?access_token=xxxx`

## Parameters
* **from**: The timestamp indicating the begin of the period for which the destinations should be retrieved (YYYY-MM-DD format).
* **to**: The timestamp indicating the end of the period for which the destinations should be retrieved (YYYY-MM-DD format).

## Optional parameters
* **Unsubscribed**: If 'true' only the unsubscribed destinations are visible.

## Response data
This method returns a JSON object containing the following fields:
* **id**: ID of the destination
* **messageID**: Message ID of the destination
* **timestampsent**: Timestamp of the sent mailing
* **profile**: ID of the profile that received the mailing
* **subprofile**: ID of the subprofile that received the mailing (if the mailing was sent to a subprofile)
* **mailing**: ID of the mailing
* **unsubscribed**: Has the user triggered the unsubscribe behavior?

## PHP example
The following PHP script calls this API method:
```php
// dependencies
require_once('copernica_rest_api.php');
// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);
// set the required parameters
$parameters = array(
    'from'  => "2021-02-01",
    'to'    => "2021-02-02"
);
// do the call, and print result
print_r($api->get("ms/destinations", $parameters));
```
The example above requires the [CopernicaRestApi class](rest-php).

## More information
* [Overview of all API calls](./rest-api.md)
